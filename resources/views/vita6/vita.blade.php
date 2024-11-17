<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{config('app.name')}}</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
    <h1 class="text-center">New Stock</h1>
    <div class="row justify-content-center">
        <main class="col-md-5">
            <form action="/vita6/add" class="vita1-form" method="post">
                @csrf
                <input type="text" class="form-control" name="stock_item" placeholder="Stock Item"><br>
                <input type="number" class="form-control" name="quantity" placeholder="Quantity"><br>
                <input type="number" class="form-control" name="price" placeholder="Price"><br>
                <input type="number" class="form-control" name="delivery_no" placeholder="Delivery Number"><br>
                <input type="date" class="form-control" name="date_recieved" placeholder="Date recieved"><br>
                <input type="date" class="form-control" name="date_sold" placeholder="Date sold"><br>
                <input type="submit" class="btn btn-primary" value="Submit">
            </form>
        </main>
    </div>
</div>

<!-- Include Bootstrap JS and Popper.js -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
