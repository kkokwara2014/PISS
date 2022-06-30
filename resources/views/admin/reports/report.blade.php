@extends('admin.layout.app')

@section('title')
 Transaction Report
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
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped table-responsive">
                            <thead>
                                <tr>
                                    <th>Code</th>
                                    <th>Sold By</th>
                                    {{-- <th>Customer</th> --}}
                                    <th>Sold at</th>
                                    <th>Qty.</th>
                                    <th>Total</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transactions as $transaction)
                                <tr>
                                    <td>{{$transaction->code}}</td>
                                    <td>{{$transaction->user->firstname.' '.$transaction->user->lastname}}</td>
                                    {{-- <td>{{$transaction->customer->name.' - '.$transaction->customer->phone}}</td> --}}
                                    <td>&#8358;{{number_format($transaction->sellingprice,2)}}</td>
                                    <td>{{$transaction->quantity}}</td>                                                                  
                                    <td>&#8358;{{number_format($transaction->totalamount,2)}}</td>
                                    <td>{{ $transaction->created_at }}</td>

                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Code</th>
                                    <th>Sold By</th>
                                    <th>Customer</th>
                                    <th>Unit Price</th>
                                    <th>Qty.</th>
                                    <th>Total</th>
                                    <th>Date</th>
                                </tr>
                            </tfoot>
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
