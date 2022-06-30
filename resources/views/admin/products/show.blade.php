@extends('admin.layout.app')

@section('title')
 Product Details
@endsection

@section('content')
{{-- @include('admin.layout.statboard') --}}
@include('admin.layout.statboardcontainer')
<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">
        @can('admin-only', Auth::user())
        <p>
            <a href="{{ route('products.index') }}" class="btn btn-primary btn-sm"><span class="fa fa-eye"></span> All Products</a>
        </p>
        @endcan
        
        
        <div class="row">
            <div class="col-md-8">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div>
                            Code: <strong>{{ $product->code }}</strong>
                        </div>
                        <div>
                            Name: {{ $product->name }}
                        </div>
                        <div>
                            Unit Price: &#8358;{{number_format($product->unitprice,2)}}
                        </div>
                        <div>
                            Selling Price: &#8358;{{number_format($product->sellingprice,2)}}
                        </div>
                        <div>
                            Quantity: {{ $product->quantity }}
                        </div>
                        <div>
                            Reorder Level: {{ $product->reorderlevel }}
                        </div>
                        <div>
                            Found In : {{ $product->warehouse->name }}
                        </div>
                        <div>
                            Supplied By : {{ $product->supplier->name }}
                        </div>
                        <div>
                            Added By : <strong>{{ $product->user->firstname.' '.$product->user->lastname }}</strong>
                        </div>
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
