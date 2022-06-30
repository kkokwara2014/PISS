@extends('admin.layout.app')

@section('title')
Add Stock
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
                All Stocks
            </a>
            <a href="{{ route('importfilepage') }}" class="btn btn-success btn-sm">
                <span class="fa fa-arrow-circle-o-down"></span> Import from Excel
            </a>
            <a href="{{ route('suppliers.index') }}" class="btn btn-primary btn-sm">
                <span class="fa fa-user-plus"></span> Add Supplier
            </a>
        </p>

        <div class="row">
            <div class="col-md-12">
                @include('admin.messages.success')
                @include('admin.messages.deleted')
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="{{ route('stocks.store') }}" method="post">
                            @csrf
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Branch <strong style="color:red;">*</strong></label>
                                        <select name="branch_id" class="form-control" required>
                                            <option value="" selected="disabled">Select Branch</option>
                                            @foreach ($branches as $branch)
                                            <option value="{{$branch->id}}">
                                                {{$branch->address.', '.$branch->town.'. '.$branch->state}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Supplier <strong style="color:red;">*</strong></label>
                                        <select name="supplier_id" class="form-control" required>
                                            <option value="" selected="disabled">Select Supplier</option>
                                            @foreach ($suppliers as $supplier)
                                            <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Category <strong style="color:red;">*</strong></label>
                                        <select name="category_id" class="form-control" required>
                                            <option value="" selected="disabled">Select Category</option>
                                            @foreach ($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Brand <strong style="color:red;">*</strong></label>
                                        <select name="brand_id" class="form-control" required>
                                            <option value="" selected="disabled">Select Brand</option>
                                            @foreach ($brands as $brand)
                                            <option value="{{$brand->id}}">{{$brand->name}}</option>
                                            @endforeach
                                        </select>

                                    </div>

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="name">Product Name <strong style="color:red;">*</strong></label>
                                <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                    name="name" value="{{ old('name') }}" placeholder="Product Name">
                                @error('name')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="unitprice">Unit Price <strong style="color:red;">*</strong></label>
                                        <input type="text"
                                            class="form-control{{ $errors->has('unitprice') ? ' is-invalid' : '' }}"
                                            name="unitprice" value="{{ old('unitprice') }}"
                                            placeholder="Unit Price e.g 1200" required pattern="[0-9]+"
                                            maxlength="10">
                                        @error('unitprice')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $errors->first('unitprice') }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="sellingprice">Selling Price <strong style="color:red;">*</strong></label>
                                        <input type="text"
                                            class="form-control{{ $errors->has('sellingprice') ? ' is-invalid' : '' }}"
                                            name="sellingprice" value="{{ old('sellingprice') }}"
                                            placeholder="Unit Price e.g 1500" required pattern="[0-9]+"
                                            maxlength="7">
                                        @error('sellingprice')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $errors->first('sellingprice') }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="quantity">Quantity <strong style="color:red;">*</strong></label>
                                        <input type="text"
                                            class="form-control{{ $errors->has('quantity') ? ' is-invalid' : '' }}"
                                            name="quantity" value="{{ old('quantity') }}" placeholder="Quantity e.g 5"
                                            required pattern="[0-9]+" maxlength="6">
                                        @error('quantity')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $errors->first('quantity') }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Expiry Date <strong style="color:red;">*</strong></label>
                                        <input type="date"
                                            class="form-control{{ $errors->has('expirydate') ? ' is-invalid' : '' }}"
                                            name="expirydate" value="{{ old('expirydate') }}"
                                            placeholder="Expiry Date" required>
                                        @error('expirydate')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $errors->first('expirydate') }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                
                            </div>

                            <a href="{{ route('stocks.index') }}" class="btn btn-danger btn-sm">
                                Cancel
                            </a>
                            <button type="submit" class="btn btn-primary btn-sm">Save</button>

                        </form>

                    </div>

                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->


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