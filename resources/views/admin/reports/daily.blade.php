@extends('admin.layout.app')

@section('title')
 Daily Report
@endsection

@section('content')
{{-- @include('admin.layout.statboard') --}}
@include('admin.layout.statboardcontainer')
<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">
              
        <div class="row">
            <div class="col-md-12">

                <div>
                    <p>
                        <a href="{{ route('weekly') }}" class="btn btn-primary btn-sm"><span class="fa fa-bar-chart"></span> Weekly Report</a>
                        <a href="{{ route('monthly') }}" class="btn btn-info btn-sm"><span class="fa fa-bar-chart"></span> Monthly Report</a>
                        <a href="{{ route('yearly') }}" class="btn btn-success btn-sm"><span class="fa fa-bar-chart"></span> Yearly Report</a>
                    </p>
                </div>
                

                @if ($dailyreports->count())
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
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
                                @foreach ($dailyreports as $transaction)
                                    @if (($transaction->user->id==auth()->user()->id) || Auth::user()->hasAnyRole(['Admin']))
                                            <tr>
                                                <td>{{$transaction->ordernumber}}</td>
                                                <td>
                                                    @foreach ($transaction->products as $product)
                                                    {{$product->name}}
                                                        
                                                    @endforeach
                                                </td>
                                                {{-- <td>{{$transaction->customer->name}}</td> --}}
                                                <td>&#8358;{{number_format($transaction->sellingprice,2)}}</td>
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
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
                    
                @else
                    <p>
                        <span class="badge badge-pill badge-danger" style="background-color: red;color: seashell">There is no report for today!</span>
                    </p>
                @endif
            </div>
            
        </div>


    </section>
    <!-- /.Left col -->
    <!-- right col (We are only adding the ID to make the widgets sortable)-->
    {{-- <section class="col-lg-5 connectedSortable"> --}}


    {{-- </section> --}}
    <!-- right col -->
</div>
<!-- /.row (main row) -->

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection
