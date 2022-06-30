@extends('admin.layout.app')

@section('title')
Replenish Stock
@endsection

@section('content')
{{-- @include('admin.layout.statboard') --}}
@include('admin.layout.statboardcontainer')
<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">
        <a href="{{ route('products.index') }}" class="btn btn-success btn-sm">
            <span class="fa fa-eye"></span> All Stocks
        </a>
        <br><br>

        <div class="row">
            <div class="col-md-8">

                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div>
                            Product Code : {{ $product->code }}
                        </div>
                        <div>
                            Product Name : {{ $product->name }}
                        </div>
                        <div>
                            Unit Price : {{ $product->unitprice }}
                        </div>
                        <div>
                            Remaining Quantity : {{ $product->quantity }}
                        </div>
                        <div>
                            Found In : {{$product->warehouse->name}}
                        </div>
                        <div>
                            Category : {{$product->category->name}}
                        </div>
                        <hr>

                        <form action="{{ route('products.updatestock',$product->id) }}" method="post">
                            {{ csrf_field() }}
                            {{method_field('PUT')}}

                            <div class="row">
                                <div class="col-md-5">
                                    
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
                                
                            </div>                           
                        
                            <button type="submit" class="btn btn-primary btn-sm">Replenish</button>
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
