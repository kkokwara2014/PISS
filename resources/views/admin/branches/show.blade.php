@extends('admin.layout.app')

@section('title')
Branch Details
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
            <a href="{{ route('branches.index') }}" class="btn btn-primary btn-sm"><span
                    class="fa fa-map-marker"></span> All Branches</a>
        </p>

        <div class="row">
            <div class="col-md-10">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <h3>{{ $branch->address.', '.$branch->town.'. '.$branch->state }}</h3>

                        <hr>
                        @if ($branch->products->count())
                        <table id="example1" class="table table-bordered table-striped table-responsive">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Amount (&#8358;)</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($branch->products as $product)
                                <tr>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->quantity }}</td>
                                    <td>{{ number_format($product->unitprice,2) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                        <span class="badge badge-pill badge-primary" style="background-color: red;color:whitesmoke">No
                            product in this branch!</span>
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