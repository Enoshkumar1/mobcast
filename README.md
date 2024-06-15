# mobcast
To fetch and display news data in a table format with search, sorting, and pagination using DataTables and AJAX in a Laravel application.


https://github.com/Enoshkumar1/mobcast/assets/104003673/84ef3d3c-c191-4731-9159-08d75ab30614


## Components Involved
### Controller (NewsController):
  1. Handles the HTTP requests for news data from TimesofIndia.
  2. Interacts with an external API to fetch news data.
  3. Processes the data to be sent back to the client (JavaScript DataTable).
  
### AJAX:
  1. Sends asynchronous HTTP requests.
  2. Fetching JSON data from given TimesofIndia website endpoint
  3. Receives the server's response and updates the DataTable without reloading the page.
  
### DataTables:
  1. A jQuery plugin that provides advanced interaction controls to HTML tables.
  2. Integrates with AJAX for server-side processing of data.

### Searching & Pagination
  1. Implemented dynamic search using JQuery
  2. Paginated for 10 data rows

### CURL - cacert
####  Conversion done with mk-ca-bundle.pl version 1.29.
#### SHA256: 4d96bd539f4719e9ace493757afbe4a23ee8579de1c97fbebc50bba3c12e8c1e
  (GuzzleHttp\Exception\RequestException cURL error 60: SSL certificate problem: unable to get local issuer certificate (see https://curl.haxx.se/libcurl/c/libcurl-      errors.html) for https://timesofindia.indiatimes.com/rssfeeds/-2128838597.cms?feedtype=json)
  1. Used cacert.pem to prevent CURL SSL errors and warnings.
  2. After using cacert.pem file Servers certificate is validated (which the GUzzleHttp uses) 
