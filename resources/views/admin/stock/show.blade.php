@extends('admin.layout.app')

@section('title')
Stock Details
@endsection

@section('content')
{{-- @include('admin.layout.statboard') --}}
@include('admin.layout.statboardcontainer')
<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">
        <p>
            <a href="{{ route('stocks.index') }}" class="btn btn-success btn-sm">
                Back</a>
        </p>
       
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    
                    <div class="col-md-11">
                        <div class="box">
                            <!-- /.box-header -->
                            <div class="box-body">

                                <p>
                                    <h3>{{ $stock->name }}</h3>
                                </p>
                                <hr>
                               
                                <div>Invoice Number : <strong>{{$stock->invoicenumber}}</strong> </div>
                                <div>Unit Price : &#8358;{{ number_format($stock->unitprice,2) }}</div>
                                <div>Quantity : {{$stock->quantity}}</div>
                                <div>Found In : {{$stock->branch->address}}</div>
                                <div>
                                    Available? :
                                    @if ($stock->isavailable==1)
                                            <span class="badge badge-success badge-pill"
                                            style="background-color: green; color:seashell"> Yes</span>
                                        @else
                                            <span class="badge badge-danger badge-pill"
                                            style="background-color: red; color:seashell"> No</span>
                                        @endif
                                </div>
                                <div>
                                    Reorder? :
                                    @if ($stock->quantity>$stock->reorderlevel)
                                            <span class="badge badge-success badge-pill"
                                            style="background-color: green; color:seashell"> Intact</span>
                                        @else
                                            <span class="badge badge-danger badge-pill"
                                            style="background-color: red; color:seashell"> Reorder</span>
                                        @endif
                                </div>
                                <div>
                                    Created by : <strong>{{ $stock->user->firstname.' '.strtoupper($stock->user->lastname) }}</strong>
                                </div>

                                <div>
                                    Created : {{date('d M, Y',strtotime($stock->created_at))}}
                                    [{{$stock->created_at->diffForHumans()}}] </div>
                                <div>

                                <hr>
                                <div>
                                    Supplied by : <strong>{{ $stock->supplier->name }}</strong>
                                </div>
                                <div>
                                    Supplier phone : {{ $stock->supplier->phone }}
                                </div>
                                <div>
                                    Supplier address : {{ $stock->supplier->address }}
                                </div>
                                
                                
                            </div>
                            
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>

{{--  </div>
</div>  --}}



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