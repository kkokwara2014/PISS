@extends('admin.layout.app')

@section('title')
Edit Product
@endsection

@section('content')
{{-- @include('admin.layout.statboard') --}}
@include('admin.layout.statboardcontainer')
<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">
        <a href="{{ route('products.index') }}" class="btn btn-success btn-sm">
            <span class="fa fa-eye"></span> All Products
        </a>
        <br><br>

        <div class="row">
            <div class="col-md-10">

                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">

                        <form action="{{ route('products.update',$product->id) }}" method="post">
                            {{ csrf_field() }}
                            {{method_field('PUT')}}

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Product Name *</label>
                                        <input type="text"
                                            class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                            name="name" value={{ $product->name }}" placeholder="Product Name" autofocus>
                                        @error('name')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Unit Price *</label>
                                        <input type="text"
                                            class="form-control{{ $errors->has('unitprice') ? ' is-invalid' : '' }}"
                                            name="unitprice" value="{{ $product->unitprice }}" placeholder="Unit Price e.g. 7000" pattern="[0-9]+" maxlength="6">
                                        @error('unitprice')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $errors->first('unitprice') }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Selling Price *</label>
                                        <input type="text"
                                            class="form-control{{ $errors->has('sellingprice') ? ' is-invalid' : '' }}"
                                            name="sellingprice" value="{{ $product->sellingprice }}"
                                            placeholder="Selling Price e.g. 5000" pattern="[0-9]+" maxlength="6">
                                        @error('sellingprice')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $errors->first('sellingprice') }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Quantity *</label>
                                        <input type="text"
                                            class="form-control{{ $errors->has('quantity') ? ' is-invalid' : '' }}"
                                            name="quantity" value="{{ $product->quantity }}" placeholder="Quantity e.g. 50" pattern="[0-9]+" maxlength="4">
                                        @error('quantity')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $errors->first('quantity') }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                    
                                    <div class="form-group">
                                        <label for="name">Reorder Level *</label>
                                        <input type="text"
                                            class="form-control{{ $errors->has('reorderlevel') ? ' is-invalid' : '' }}"
                                            name="reorderlevel" value="{{ $product->reorderlevel }}"
                                            placeholder="Reorder Level e.g. 20" pattern="[0-9]+" maxlength="3">
                                        @error('reorderlevel')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $errors->first('reorderlevel') }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Product Category *</label>
                                        <select name="category_id" class="form-control" required>
                                            <option selected="disabled">Select Category</option>
                                            @foreach ($categories as $category)
                                            <option value="{{$category->id}}" {{$category->id==$product->category_id ? 'selected':''}}>{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Warehouse *</label>
                                        <select name="warehouse_id" class="form-control" required>
                                            <option selected="disabled">Select Warehouse</option>
                                            @foreach ($warehouses as $warehouse)
                                            <option value="{{$warehouse->id}}" {{$warehouse->id==$product->warehouse_id ? 'selected':''}}>{{$warehouse->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Supplier *</label>
                                        <select name="supplier_id" class="form-control" required>
                                            <option selected="disabled">Select Supplier</option>
                                            @foreach ($suppliers as $supplier)
                                            <option value="{{$supplier->id}}" {{$supplier->id==$product->supplier_id ? 'selected':''}}>{{$supplier->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                    
                            
                           
                            <br>
                            <button type="submit" class="btn btn-primary btn-sm">Update</button>
                            <a href="{{ route('products.index') }}" class="btn btn-default btn-sm">Cancel</a>
                        </form>

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
