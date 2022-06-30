<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Print Stock Summary</title>

        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="{{asset('admin_assets/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{asset('admin_assets/bower_components/font-awesome/css/font-awesome.min.css')}}">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
            integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

        <style>
            table {
                width: 100%;
                margin: 0px;
            }

            th,
            td {
                width: auto;
                text-align: left;
            }

        </style>

    </head>

    <body>

        {{-- <div style="text-align: center">
            <img src="{{ asset('bootstrap_assets/images/LOGO.png') }}" width="70" height="70">
        </div> --}}

        <div class="row">
            <div class="col-md-12">
                <h1 style="text-align: center">{{ $company->name }}</h1>
                <h3 style="text-align: center">Stock Summary</h3>

                <table class="table table-light table-responsive table-striped">
                    <thead>
                        <tr>
                            <th>Code #</th>
                            <th>Name</th>
                            <th>Unit Price (&#8358;)</th>
                            <th>Selling Price (&#8358;)</th>
                            <th>Quantity</th>
                            <th>Found In</th>
                            <th>Supplier</th>
                            <th>Created</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach ($stocks as $stock)
                       <tr>
                           <td>{{ $stock->code }}</td>
                           <td>{{ $stock->name }}</td>
                           <td>{{ number_format($stock->unitprice,2) }}</td>
                           <td>{{ number_format($stock->sellingprice,2) }}</td>
                           <td>{{ $stock->quantity }}</td>
                           <td>{{ $stock->branch->address }}</td>
                           <td>{{ $stock->supplier->name }}</td>
                           <td>{{ $stock->created_at }}</td>
                       </tr>
                       @endforeach
                    </tbody>
                </table>
                

            </div>
        </div>

    </body>

</html>