@extends('admin.layout.app')

@section('title')
Edit Stock
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
            
        </p>
       
      
                <div class="row">
                    <div class="col-md-12">
                        <div class="box">
                            <!-- /.box-header -->
                            <div class="box-body">
                                <form action="{{ route('stocks.update',$stock) }}" method="post">
                           @csrf
                          @method('put')
                           <div class="form-group">
                                    <label>Branch <strong style="color:red;">*</strong></label>
                                    <select name="branch_id" class="form-control" required>
                                        <option value="" selected="disabled">Select Branch</option>
                                        @foreach ($branches as $branch)
                                            <option value="{{$branch->id}}" {{ $branch->id==$stock->branch_id?'selected':'' }}>{{$branch->address.', '.$branch->town.'. '.$branch->state}}</option>
                                        @endforeach
                                    </select>
                                </div>       
                           <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                              <label for="invoicenumber">Invoice Number <strong style="color:red;">*</strong></label>
                              <input type="text" class="form-control{{ $errors->has('invoicenumber') ? ' is-invalid' : '' }}" name="invoicenumber" value="{{ $stock->invoicenumber }}" placeholder="Invoice Number" maxlength="10">
                                    @error('invoicenumber')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $errors->first('invoicenumber') }}</strong>
                                    </span>
                                    @enderror
                          </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                              
                                    <label>Supplier <strong style="color:red;">*</strong></label>
                                    <select name="supplier_id" class="form-control" required>
                                        <option value="" selected="disabled">Select Supplier</option>
                                        @foreach ($suppliers as $supplier)
                                            <option value="{{$supplier->id}}" {{ $supplier->id==$stock->supplier_id?'selected':'' }}>{{$supplier->name}}</option>
                                        @endforeach
                                    </select>
                                   
                          </div>
                        
                        </div>
                        </div>

                    <div class="form-group">
                              <label for="name">Product Name <strong style="color:red;">*</strong></label>
                              <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $stock->name }}" placeholder="Product Name">
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
                              <input type="text" class="form-control{{ $errors->has('unitprice') ? ' is-invalid' : '' }}" name="unitprice" value="{{ $stock->unitprice }}" placeholder="Unit Price e.g 250000" required pattern="[0-9]+" maxlength="10">
                                    @error('unitprice')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $errors->first('unitprice') }}</strong>
                                    </span>
                                    @enderror
                          </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="unitprice">Quantity <strong style="color:red;">*</strong></label>
                                <input type="text" class="form-control{{ $errors->has('quantity') ? ' is-invalid' : '' }}" name="quantity" value="{{ $stock->quantity }}" placeholder="Quantity e.g 5" required pattern="[0-9]+" maxlength="6">
                                      @error('quantity')
                                      <span class="invalid-feedback text-danger" role="alert">
                                          <strong>{{ $errors->first('quantity') }}</strong>
                                      </span>
                                      @enderror
                            </div>
                        
                        </div>
                        </div>

                        <a href="{{ route('stocks.index') }}" class="btn btn-danger btn-sm">
                            Cancel
                        </a>
                          <button type="submit" class="btn btn-primary btn-sm">Update</button>

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