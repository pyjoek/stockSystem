<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- <div class="container my-5">
        <h2 class="text-center mb-4">All Stock Data</h2>
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>STOCK ITEM</th>
                    <th>QUANTITY</th>
                    <th>PRICE</th>
                    <th>DELIVERY NUMBER</th>
                    <th>DATE RECEIVED</th>
                    <th>DATE SOLD</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($datas as $data)
                <tr>
                    <td>{{ $data->stock_item }}</td>
                    <td>{{ $data->quantity }}</td>
                    <td>{{ $data->price }}</td>
                    <td>{{ $data->delivery_no }}</td>
                    <td>{{ $data->date_recieved }}</td>
                    <td>{{ $data->date_sold }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div> -->

    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Stock Information</h2>
            <a href="#" class="btn btn-primary">Request Stock</a>
            <a href="/logout" class="btn btn-primary">Logout</a>

        </div>
        <h3 class="text-muted">Vita Store Branch 3</h3>
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>STOCK ITEM</th>
                    <th>QUANTITY</th>
                    <th>PRICE</th>
                    <th>DELIVERY NUMBER</th>
                    <th>DATE RECEIVED</th>
                    <th>DATE SOLD</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($datas as $data)
                <tr>
                    <td>{{ $data->stock_item }}</td>
                    <td>{{ $data->quantity }}</td>
                    <td>{{ $data->price }}</td>
                    <td>{{ $data->delivery_no }}</td>
                    <td>{{ $data->date_recieved }}</td>
                    <td>{{ $data->date_sold }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
