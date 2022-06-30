@include('admin.layout.statboardcontainer')
<!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
                <div>
                    <h3>{{$greeting .', '.ucfirst($user->firstname).' '.ucfirst($user->lastname).'!'}} <small>[Staff ID
                            : {{ $user->identitynum }}]</small></h3>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>

{{-- only Admin, Director and Manager --}}
@if(auth()->user()->hasAnyRole(['Admin']) || auth()->user()->hasAnyRole(['Director']) ||
auth()->user()->hasAnyRole(['Manager']))
<div class="row">
    <div class="col-lg-3 col-md-3">
        <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3>&#8358;{{ number_format($todaysales,2) }}</h3>

                <p>Today Sales</p>
            </div>
            <div class="icon">
                <i class="fa fa-money"></i>
            </div>

        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-md-3">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h3>{{ $countsalesstaff }}</h3>

                <p>Sales Person</p>
            </div>
            <div class="icon">
                <i class="fa fa-users"></i>
            </div>

        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-md-3">
        <!-- small box -->
        <div class="small-box bg-blue-active">
            <div class="inner">
                <h3>&#8358;{{ number_format($totalamountsold,2) }}</h3>

                <p>Transactions</p>
            </div>
            <div class="icon">
                <i class="fa fa-money"></i>
            </div>

        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-md-3">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3>{{ $totalstocks }}</h3>

                <p>Stocks</p>
            </div>
            <div class="icon">
                <i class="fa fa-tags"></i>
            </div>

        </div>
    </div>
    <!-- ./col -->
</div>

<div class="row">
    <div class="col-lg-6 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"> Summary </h3>
            </div>
            <div class="panel-body">
                <div>
                    <a href="{{ route('purchase.summary') }}">
                        All Purchases (Quantity) : <strong>{{ $totalstocks }}</strong>
                    </a>
                </div>
                <div>
                    <a href="{{ route('sales.summary') }}">
                        Sales (Quantity) : <strong>{{ $totalqtysold }}</strong>
                    </a>
                </div>
                <hr>
                <div>
                    <a href="{{ route('purchase.summary') }}">
                        Stocks (Amount) : <strong>&#8358;{{ number_format($totalamountofstocks,2) }}</strong>
                    </a>
                </div>
                <div>
                    <a href="{{ route('sales.summary') }}">
                        Sales (Amount) : <strong>&#8358;{{ number_format($totalamountsold,2) }}</strong>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"> {{ $replenishableproducts }} {{ Str::plural('stock',$replenishableproducts) }}
                    to be replenished </h3>
            </div>
            <div class="panel-body">
                @foreach ($allreplenishableproducts as $repleprod)
                <div><strong>{{ $repleprod->name }}</strong> is remaining <strong>{{ $repleprod->quantity }}</strong> in stock</div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-7 col-md-7">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"> Stock(s) in Branch</h3>
            </div>
            <div class="panel-body">
                @foreach ($stocksinbranches as $branchstock)
                <div>
                    <a href="{{ route('branches.show',$branchstock->id) }}">
                        {{ $branchstock->address.' '.$branchstock->town.', '.$branchstock->state.'.' }} &nbsp;{{
                        $branchstock->products->count() }} {{ Str::plural('stock',$branchstock->products->count()) }}
                        &nbsp; Qty. :
                        {{ $branchstock->products->sum('quantity') }}&nbsp; Amt. : &#8358;{{
                        number_format($branchstock->products->sum('unitprice'),2) }}
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="col-lg-5 col-md-5">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"> Staff and their Roles </h3>
            </div>
            <div class="panel-body">
                @foreach ($staffs as $staff)
                <a href="{{ route('staffprofile',$staff->id) }}">
                    <div><strong>{{$staff->firstname.' '.$staff->lastname}}</strong> &nbsp; - Role :
                        {{ implode(', ',$staff->roles()->get()->pluck('name')->toArray()) }}
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"> {{ $expiredmedicines->count() }} Expired {{ Str::plural('Stock',$expiredmedicines->count()) }} </h3>
            </div>
            <div class="panel-body">
                @if ($expiredmedicines->count())
                    <table id="example1" class="table table-bordered table-striped table-responsive">
                        <thead>
                            <tr>
                                <th>Code #</th>
                                <th>Product</th>
                                <th>Brand</th>
                                <th>Category</th>
                                <th>Quantity</th>
                                <th>Cost Price</th>
                                <th>Expiry Date</th>
                                <th>Found In</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($expiredmedicines as $expiredmed)
                            <tr>
                                <td>{{$expiredmed->code}}</td>
                                <td>
                                    {{$expiredmed->name}}
                                </td>
                                <td>
                                    {{$expiredmed->brand->name}}
                                </td>
                                <td>
                                    {{$expiredmed->category->name}}
                                </td>
                                <td>{{$expiredmed->quantity}}</td>
                                <td>&#8358;{{number_format($expiredmed->unitprice,2)}}</td>
                                {{-- <td>{{ $expiredmed->created_at }}</td> --}}
                                <td>
                                    {{date('Y-m',strtotime($expiredmed->expirydate))}}
                                </td>
                                <td>
                                    {{ $expiredmed->branch->address }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                <p>
                    <span class="badge badge-pill badge-danger" style="background-color: red;color: seashell">There is
                       no expired medicine for now!
                    </span>
                </p>
                @endif

            </div>
        </div>
    </div>
</div>
@endif
{{-- only Admin and Sales Person --}}
@if(auth()->user()->hasAnyRole(['Sales Person']))
<div class="row">


    <div class="col-lg-7 col-md-7">

        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"> Transaction Summary</h3>
            </div>
            <div class="panel-body">
                <table id="example1" class="table table-bordered table-striped table-responsive">
                    <thead>
                        <tr>
                            <th>Order #</th>
                            <th>Product</th>
                            {{-- <th>Customer</th> --}}
                            <th>Sold at</th>
                            <th>Qty.</th>
                            <th>Total</th>
                            <th>Sold By</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sumtodaystotalamount=0
                        ?>
                        @foreach ($transactions as $transaction)
                        @if (($transaction->user->id==auth()->user()->id) || Auth::user()->hasAnyRole(['Admin']))
                        <tr>
                            <td>{{$transaction->ordernumber}}</td>
                            <td>
                                @foreach ($transaction->products as $product)
                                {{$product->name.' ['.$product->brand->name.']'}}

                                @endforeach
                            </td>
                            {{-- <td>{{$transaction->customer->name}}</td> --}}
                            <td>&#8358;{{number_format($transaction->sellingprice,2)}}</td>
                            <td>{{$transaction->quantity}}</td>
                            <td>&#8358;{{number_format($transaction->totalamount,2)}}</td>
                            <td>{{$transaction->user->firstname.' '.$transaction->user->lastname}}</td>
                            <td>{{ $transaction->created_at }}</td>
                        </tr>

                        <?php 
                            $sumtodaystotalamount+=$transaction->totalamount
                        ?>
                        @endif
                        @endforeach
                    </tbody>
                </table>
                <hr>
                <div style="font-size: 18px;">
                    Your total sale : <strong>&#8358;{{ number_format($sumtodaystotalamount,2) }}</strong>
                </div>
                <hr>
            </div>
        </div>
    </div>
    <div class="col-lg-5 col-md-5">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"> {{ $replenishableproducts }} {{ Str::plural('stock',$replenishableproducts) }}
                    to be replenished </h3>
            </div>
            <div class="panel-body">
                @foreach ($allreplenishableproducts as $repleprod)
                <div>{{ $repleprod->name }} - {{ $repleprod->quantity }}</div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endif


<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-8"></div>
</div>



<!-- /.row -->