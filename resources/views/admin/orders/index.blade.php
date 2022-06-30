@extends('admin.layout.app')

@section('title')
 All Orders
@endsection

@section('content')
{{-- @include('admin.layout.statboard') --}}
@include('admin.layout.statboardcontainer')
<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">
        
        <p>
            <a href="" class="btn btn-primary btn-sm"><span class="fa fa-plus"></span> Add Product</a>
        </p>
        
        
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped table-responsive">
                            <thead>
                                <tr>
                                    <th>Code</th>
                                    <th>Name</th>
                                    <th>Unit Price</th>
                                    <th>Selling Price</th>
                                    <th>Qty.</th>
                                    <th>Reorder Level</th>
                                    <th>Category</th>
                                    <th>Found In</th>
                                    <th>Details</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{--  @foreach ($products as $product)  --}}
                                <tr>
                                    <td></td> 

                                </tr>
                                {{--  @endforeach  --}}
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Code</th>
                                    <th>Name</th>
                                    <th>Unit Price</th>
                                    <th>Selling Price</th>
                                    <th>Qty.</th>
                                    <th>Reorder Level</th>
                                    <th>Category</th>
                                    <th>Found In</th>
                                    <th>Details</th>
                                    <th>Action</th>
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
