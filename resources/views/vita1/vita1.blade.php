<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <title>{{config('app.name')}}</title>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <script src="{{ asset('js/app.js') }}"></script>
</head>
<body>

<!-- Title at the top center -->
<div class="container-fluid custom-container">
<h1 class="center-title"><a href="/">Online Web System Testing</a></h1>
  <div class="row">
    <!-- Left side with 20% width -->
    <div class="col-md-2 bg-light">
      <!-- Content for the left side goes here -->
      <h2>Sub Branch</h2>
      <p><a href="/vita1">Vita1</a></p>      
      <p><a href="/vita2">vita2</a></p>      
      <p><a href="/vita3">vita3</a></p>      
      <p><a href="/vita4">vita4</a></p>      
      <p><a href="/vita5">vita5</a></p>      
      <p><a href="/vita6">vita6</a></p>      
      <p><a href="/vita7">vita7</a></p>      
      <p><a href="/vita8">vita8</a></p>      
      <p><a href="/vita9">vita9</a></p>      
      <p><a href="/vita10">vita10</a></p>      
      <p><a href="/vita11">vita11</a></p>      
      <p><a href="/vita12">vita12</a></p>      
      <p><a href="/vita13">vita13</a></p>   
      <p><a href="/vita14">vita14</a></p>   
      <p><a href="/vita15">vita15</a></p>
      <p><a href="/logout">Logout</a></p>
    </div>
    
    <!-- Right side with 80% width -->
    <div id="right-side" class="col-md-10 bg-info">
      <!-- Content for the right side goes here -->
      <h2>Stock Information</h2>
      <button class="btn btn-primary"><a href="/vita1/new">Add New Stock</a></button>
      <h2>Vita Store Branch 1</h2>

      <table id="stock-table">
        <thead>
          <tr>
            <th>STOCK ITEM</th>
            <th>QUANTITY</th>
            <th>PRICE</th>
            <th>DELIVERY NUMBER</th>
            <th>DATE RECIEVED</th>
            <th>DATE SOLD</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($datas as $data)
            <tr>
                <td>{{$data->stock_item}}</td>
                <td>{{$data->quantity}}</td>
                <td>{{$data->price}}</td>
                <td>{{$data->delivery_no}}</td>
                <td>{{$data->date_recieved}}</td>
                <td>{{$data->date_sold}}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    var clickableWords = document.querySelectorAll('.clickable-word');
    var rightSideContent = document.getElementById('right-side');
    var stockTableBody = document.querySelector('#stock-table tbody');

    clickableWords.forEach(function (word) {
      word.addEventListener('click', function () {
        // Fetch random stock data from Alpha Vantage API
        fetchRandomStockData()
          .then(function (stockData) {
            // Update the right side content with stock information
            rightSideContent.innerHTML = '<h2>Stock Information</h2>' +
              '<p>Word Clicked: ' + word.textContent + '</p>';
            
            // Clear existing table rows
            stockTableBody.innerHTML = '';

            // Populate the table with stock data
            var newRow = stockTableBody.insertRow();
            Object.values(stockData).forEach(function (value) {
              var cell = newRow.insertCell();
              cell.textContent = value;
            });
          })
          .catch(function (error) {
            console.error('Error fetching stock data:', error);
          });
      });
    });
  });

  // Function to fetch random stock data from Alpha Vantage API
  function fetchRandomStockData() {
    // Replace 'YOUR_API_KEY' with your actual Alpha Vantage API key
    var apiKey = 'YOUR_API_KEY';
    var symbols = ['AAPL', 'GOOGL', 'MSFT', 'AMZN', 'FB', 'TSLA', 'NFLX', 'SPY', 'V', 'NVDA'];
    var randomSymbol = symbols[Math.floor(Math.random() * symbols.length)];

    var apiUrl = 'https://www.alphavantage.co/query?function=GLOBAL_QUOTE&symbol=' + randomSymbol + '&apikey=' + apiKey;

    return fetch(apiUrl)
      .then(function (response) {
        return response.json();
      })
      .then(function (data) {
        return data['Global Quote'];
      });
  }
</script>

</body>
</html>
