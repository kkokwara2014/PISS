<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title></title>
    </head>

    <body>
        <div id="invoice-POS">
            <div id="print_page">
                <center id="top">
                   @if ($company->logo!='')
                    <div class="logo">
                            <img src="{{url('pharmacy_logo',$company->logo)}}" alt=""
                            class="img-responsive img-circle"
                            style="width: 60px; border-radius:50%">
                    </div>
                   @endif
                    <div class="info">
                        <h2>{{ $company->name }}</h2>
                    </div>
                </center>

            </div>
            <div class="mid">
                <div class="info">
                    <p>                      
                        <div>
                            {{ $company->address }}
                        </div>
                        <div>
                            {{ $company->email }}
                        </div>
                        <div>
                            {{ $company->phone }}
                        </div>
                    </p>
                </div>
            </div>

            {{-- <div style="font-size: 13px; font-weight: bold">
                Customer : {{ $customer_detail->customer->name }}
            </div> --}}
            <br>

            <div class="bot">
                <div id="table">
                    <table>

                        <tr class="tabletitle">
                            <td class="item">
                                <h3>Item</h3>
                            </td>
                            <td class="Hours">
                                <h3>Qty.</h3>
                            </td>
                            <td class="Rate">
                                <h3>Price</h3>
                            </td>
                            <td class="Rate">
                                <h3>Total</h3>
                            </td>
                        </tr>

                         @foreach ($orderreceipts as $receipt)
                        <tr class="service">
                            <td class="tableitem">
                                @foreach ($receipt->products as $product)
                                <p class="itemtext">{{ $product->name }}</p>                                                        
                                @endforeach
                            </td>
                            <td class="tableitem">
                                <p class="itemtext">{{ $receipt->quantity }}</p>
                            </td>
                            <td class="tableitem">
                                <p class="itemtext">{{ number_format($receipt->unitprice,2) }}</p>
                            </td>
                            <td class="tableitem">
                                <p class="itemtext">{{ number_format($receipt->totalamount,2) }}</p>
                            </td>
                        </tr>
                        @endforeach 

                        <tr class="tabletitle">
                            <td></td>
                            <td></td>
                            <td>
                                <h3>Total = </h3>
                            </td>
                            <td class="Payment">
                                 <h3> {{ number_format($orderreceipts->sum('totalamount'),2) }}</h3> 
                            </td>
                        </tr>

                    </table>

                    <div class="legalcopy">
                        <p class="legal">
                            <strong>*** Thank you for patronizing us ***</strong><br>
                        </p>
                    </div>
                    <div class="serial-number">
                        {{-- Serial:
                    <span class="serial">
                        213801839190
                    </span> --}}
                        {{-- <span> 06/01/2020 &nbsp; &nbsp; 12:30</span>  --}}
                    </div>
                </div>
            </div>
        </div>

        <style>
            #invoice-POS {
                box-shadow: 0 0 1in 0.25in rgb(169, 169, 184);
                padding: 2mm;
                margin: 0 auto;
                width: 58mm;
                background-color: #fff;
            }

            #invoice-POS h1 {
                font: 1.5em;
            }

            #invoice-POS h2 {
                font: 0.7em;
            }

            #invoice-POS h3 {
                font: 1.2em;
                font-weight: 300;
                line-height: 2em;
            }

            #invoice-POS p {
                font: 0.7em;
                font-weight: 300;
                line-height: 1.2em;
                color: #666;
            }

            #invoice-POS #top,
            #invoice-POS #mid,
            #invoice-POS #bot {
                border-bottom: 1px solid #eee;
            }

            #invoice-POS #top {
                min-height: 100px;
            }

            #invoice-POS #mid {
                min-height: 80px;
            }

            #invoice-POS #bot {
                min-height: 50px;
            }

            #invoice-POS #top .logo {
                width: 60px;
                height: 60px;

                background-size: 60px 60px;
                border-radius: 50px;
            }

            #invoice-POS .info {
                display: block;
                margin-left: 0;
                text-align: center;
                font-size: 0.8em;
            }

            #invoice-POS .title {
                float: right;
            }

            #invoice-POS .title p {
                text-align: right;
            }

            #invoice-POS .table {
                width: 100%;
                border-collapse: collapse;
            }

            #invoice-POS .tabletitle {
                font-size: 0.6em;
                background: #eee;
            }

            #invoice-POS .service {
                border-bottom: 1px solid #eee;
            }

            #invoice-POS .item {
                width: 24mm;
            }

            #invoice-POS .itemtext {
                font-size: 0.7em;
            }

            #invoice-POS .legalcopy {
                margin-top: 5mm;
                text-align: center;
                font-size: 0.8em;
            }

            .serial-number {
                margin-top: 5mm;
                margin-bottom: 2mm;
                text-align: center;
                font-size: 12px;
            }

            .serial {
                font-size: 10px !important;
            }

        </style>

    </body>

</html>