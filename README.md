# mobcast
To fetch and display news data in a table format with search, sorting, and pagination using DataTables and AJAX in a Laravel application.
## Components Involved
### Controller (NewsController):
  Handles the HTTP requests for news data from TimesofIndia.
  Interacts with an external API to fetch news data.
  Processes the data to be sent back to the client (JavaScript DataTable).
  
### AJAX:
  Sends asynchronous HTTP requests.
  Fetching JSON data from given TimesofIndia website endpoint
  Receives the server's response and updates the DataTable without reloading the page.
  
### DataTables:
  A jQuery plugin that provides advanced interaction controls to HTML tables.
  Integrates with AJAX for server-side processing of data.

### Searching & Pagination
  Implemented dynamic search using JQuery
  Paginated for 10 data rows

### CURL - cacert
  (GuzzleHttp\Exception\RequestException cURL error 60: SSL certificate problem: unable to get local issuer certificate (see https://curl.haxx.se/libcurl/c/libcurl-      errors.html) for https://timesofindia.indiatimes.com/rssfeeds/-2128838597.cms?feedtype=json)
  Used cacert.pem to prevent CURL SSL errors and warnings.
  After using cacert.pem file Servers certificate is validated (which the GUzzleHttp uses) 
