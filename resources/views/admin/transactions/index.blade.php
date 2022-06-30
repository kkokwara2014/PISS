@extends('admin.layout.app')

@section('title')
 All Transactions
@endsection

@section('content')
{{-- @include('admin.layout.statboard') --}}
@include('admin.layout.statboardcontainer')
<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">        
        <p>
            <a class="btn btn-success btn-sm" href="{{ route('orders.create') }}"><i class="fa fa-exchange"></i> Make Sales</a>
            {{--  printing available transaction  --}}
            <a target="_blank" href="{{ route('print.transaction') }}" class="btn btn-primary btn-sm btnprnt" style="float: right"><span class="fa fa-print"></span>
                Print Transaction</a>
        </p>
        <div class="row">
            <div class="col-md-12">
                

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
                                @foreach ($transactions as $transaction)
                                    @if (($transaction->user->id==auth()->user()->id) || Auth::user()->hasAnyRole(['Admin']) || Auth::user()->hasAnyRole(['Director']))
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
                                    @endif
                                @endforeach
                            </tbody>
                           
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
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
