<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class NewsController extends Controller
{
    public function index()
    {
        return view('news.index');
    }

    public function getNews(Request $request)
    {
        try {
            $response = Http::withOptions([
                'verify' => storage_path('cacert.pem'), // Path for CA bundle
            ])->get('https://timesofindia.indiatimes.com/rssfeeds/-2128838597.cms?feedtype=json');

            if ($response->failed()) {
                Log::error('API request failed', [
                    'status' => $response->status(),
                    'body' => $response->body()
                ]);
                return response()->json(['error' => 'Unable to fetch data.'], 500);
            }

            $data = $response->json();

            if (!isset($data['channel']['item'])) {
                Log::error('Expected "channel.item" key not found in the response', ['response' => $data]);
                return response()->json(['error' => 'Invalid response format.'], 500);
            }

            $newsItems = $data['channel']['item'];

            // Apply search filter
            $search = $request->input('search.value');
            if ($search) {
                $newsItems = array_filter($newsItems, function($item) use ($search) {
                    return stripos($item['title'], $search) !== false || stripos($item['description'], $search) !== false;
                });
            }

            // Server-side pagination parameters
            $start = $request->input('start');
            $length = $request->input('length');
            $total = count($newsItems);

            // Slice the data array to simulate pagination
            $newsItems = array_slice($newsItems, $start, $length);

            return response()->json([
                'draw' => $request->input('draw'),
                'recordsTotal' => $total,
                'recordsFiltered' => $total,
                'data' => $newsItems
            ]);
        } catch (\Exception $e) {
            Log::error('Exception occurred while fetching data', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return response()->json(['error' => 'Unable to fetch data.'], 500);
        }
    }
}

