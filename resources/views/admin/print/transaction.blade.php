<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Print Transaction Summary</title>

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
                <h3 style="text-align: center">Transaction Summary</h3>

                <table class="table table-light table-responsive table-striped">
                    <thead>
                        <tr>
                            <th>Order #</th>
                            <th>Product</th>
                            {{-- <th>Customer</th> --}}
                            <th>Unit Price</th>
                            <th>Qty.</th>
                            <th>Total</th>
                            <th>Sold By</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transactions as $transaction)
                            @if (($transaction->user->id==auth()->user()->id) || Auth::user()->hasAnyRole(['Admin']) || Auth::user()->hasAnyRole(['Director']) || Auth::user()->hasAnyRole(['Manager']) || Auth::user()->hasAnyRole(['Accountant']))
                                <tr>
                                    <td>{{$transaction->ordernumber}}</td>
                                    <td>
                                    @foreach ($transaction->products as $product)
                                        {{$product->name.' ['.$product->brand->name.']'}}  
                                    @endforeach
                                    </td>
                                    {{-- <td>{{$transaction->customer->name}}</td> --}}
                                    <td>&#8358;{{number_format($transaction->unitprice,2)}}</td>
                                    <td>{{$transaction->quantity}}</td>                                                                  
                                    <td>&#8358;{{number_format($transaction->totalamount,2)}}</td>
                                    <td>{{$transaction->user->firstname.' '.$transaction->user->lastname}}</td>
                                    <td>{{ $transaction->created_at }}</td>

                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
                

            </div>
        </div>

    </body>

</html>