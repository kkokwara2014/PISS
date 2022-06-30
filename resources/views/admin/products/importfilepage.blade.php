@extends('admin.layout.app')

@section('title')
 Import Excel File
@endsection

@section('content')
{{-- @include('admin.layout.statboard') --}}
@include('admin.layout.statboardcontainer')
<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">
      
        {{--  <p>
            <a href="{{ route('products.index') }}" class="btn btn-primary btn-sm"><span class="fa fa-eye"></span> All Products</a>
        </p>  --}}
            
        <div class="row">
            <div class="col-md-10">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <p style="color: green">
                            The Excel columns should have: name,unitprice,sellingprice,quantity,expirydate,category_id,brand_id,branch_id,email,supplier_id
                        </p>
                        <div>
                            <a href="{{route('downloadsample', 'ExcelSample.xlsx')}}"
                            download="ExcelSample.xlsx"><span class="fa fa-download"></span> Download Sample Excel File</a>
                        </div>
                        <p></p>
                        <form action="{{ route('import-excel') }}" method="post" enctype="multipart/form-data">
                           @csrf
                            <div>
                                <input class="form-control{{ $errors->has('filename') ? ' is-invalid' : '' }}" type="file" name="filename" required>
                                @error('filename')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $errors->first('filename') }}</strong>
                                    </span>
                                    @enderror
                            </div>
                            <p></p>
                            <p>
                                <button type="submit" class="btn btn-success btn-sm"><span class="fa fa-arrow-circle-o-down"></span> Import</button>  
                            </p>
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
