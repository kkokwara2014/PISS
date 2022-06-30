@extends('admin.layout.app')

@section('title')
 All Products
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
            <a href="{{ route('products.create') }}" class="btn btn-primary btn-sm"><span class="fa fa-plus"></span> Add Product</a>
        </p>
        @endcan
        
        
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
                                    <th>Replenish</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                <tr>
                                    <td>{{$product->code}}</td>
                                    <td>{{$product->name}}</td>
                                    <td>&#8358;{{number_format($product->unitprice,2)}}</td>
                                    <td>&#8358;{{number_format($product->sellingprice,2)}}</td>
                                    <td>{{$product->quantity}}</td>
                                    <td>{{$product->reorderlevel}}</td>
                                    <td>{{$product->category->name}}</td>
                                    <td>{{$product->warehouse->name}}</td>
                                    <td>
                                        <a href="{{ route('products.show',$product->id) }}"><span
                                            class="fa fa-eye fa-2x text-primary"></span></a>
                                    </td>
                                    <th>
                                        @if ($product->quantity<=$product->reorderlevel)
                                        <a class="btn btn-danger btn-sm btn-block" href="{{ route('products.replenish',$product->id) }}"><span
                                            class="fa fa-refresh"></span> Replenish</a>
                                            
                                        @else
                                            <button class="btn btn-success btn-sm btn-block">Stock Okay</button>
                                        @endif
                                    </th>

                                    <td>
                                        <div class="dropdown"> <button type="button"
                                            class="btn btn-primary btn-sm dropdown-toggle" id="dropdownMenu1"
                                            data-toggle="dropdown"> Action &nbsp;&nbsp;<span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">

                                           
                                            <li role="presentation"> <a role="menuitem" tabindex="-1"
                                                    href="{{ route('products.edit',$product->id) }}"><span
                                                        class="fa fa-pencil-square"></span> Edit</a> </li>

                                            <form id="remove-{{$product->id}}" style="display: none"
                                                action="{{ route('products.destroy',$product->id) }}" method="post">
                                                {{ csrf_field() }}
                                                {{method_field('DELETE')}}
                                            </form>

                                            <li role="presentation">
                                                <a role="menuitem" tabindex="-1" href="" onclick="
                                                            if (confirm('Delete this?')) {
                                                                event.preventDefault();
                                                            document.getElementById('remove-{{$product->id}}').submit();
                                                            } else {
                                                                event.preventDefault();
                                                            }
                                                        "><span class="fa fa-trash-o"></span>
                                                    Delete
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    </td>
                                

                                </tr>
                                @endforeach
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
                                    <th>Replenish</th>
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
