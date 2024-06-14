@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-3">News</h1>
    <table id="news-table" class="display">
        <thead>
            <tr>
                <th>Title</th>
                <th>Link</th>
                <th>Published Date</th>
                <th>Image</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
</div>
@endsection

@push('scripts')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
<script>
$(document).ready(function() {
    $('#news-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '{{ url("/api/news") }}',
            type: 'GET'
        },
        columns: [
            { data: 'title' },
            { data: 'link', render: function(data) {
                return `<a href="${data}" target="_blank">${data}</a>`;
            }},
            { data: 'pubDate' },
            { data: 'enclosure.@url', render: function(data) {
                return `<img src="${data}" alt="News Image" width="100">`;
            }},
        ]
    });
});
</script>
@endpush
