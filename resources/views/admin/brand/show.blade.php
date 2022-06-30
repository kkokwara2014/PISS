@extends('admin.layout.app')

@section('title')
Brand Details
@endsection

@section('content')
{{-- @include('admin.layout.statboard') --}}
@include('admin.layout.statboardcontainer')
<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">

        <p>
            <a href="{{ route('dashboard') }}" class="btn btn-success btn-sm"> <span class="fa fa-dashboard"></span>
                Dashboard</a>
            <a href="{{ route('brands.index') }}" class="btn btn-primary btn-sm"><span
                    class="fa fa-list"></span> All Brands</a>
        </p>

        <div class="row">
            <div class="col-md-10">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <h3>{{ $brand->name }}</h3>

                        <hr>
                        @if ($brand->products->count())
                        <table id="example1" class="table table-bordered table-striped table-responsive">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Cost Price (&#8358;)</th>
                                    <th>Selling Price (&#8358;)</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($brand->products as $product)
                                <tr>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->quantity }}</td>
                                    <td>{{ number_format($product->unitprice,2) }}</td>
                                    <td>{{ number_format($product->sellingprice,2) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                            <span class="badge badge-pill badge-primary" style="background-color: red;color:whitesmoke">There is no
                                stock in this brand!
                            </span>
                        @endif
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