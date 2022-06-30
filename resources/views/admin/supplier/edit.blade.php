@extends('admin.layout.app')

@section('title')
Edit Supplier Details
@endsection

@section('content')
{{-- @include('admin.layout.statboard') --}}
@include('admin.layout.statboardcontainer')
<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">
        <a href="{{ route('suppliers.index') }}" class="btn btn-success btn-sm">
            <span class="fa fa-eye"></span> All Suppliers
        </a>
        <br><br>

        <div class="row">
            <div class="col-md-6">

                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">

                        <form action="{{ route('suppliers.update',$supplier->id) }}" method="post">
                           @csrf
                           @method('put')
                            <div>
                                <label for="name">Supplier Name *</label>
                                <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"
                                    value="{{$supplier->name}}">
                                    @error('name')
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @enderror
                            </div>
                            <div>
                                <label for="phone">Supplier Phone</label>
                                <input type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone"
                                    value="{{$supplier->phone}}" maxlength="11" pattern="[0-9]+">
                                    @error('phone')
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $errors->first('phone') }}</strong>
                            </span>
                            @enderror
                            </div>
                            
                           
                            <br>
                            <button type="submit" class="btn btn-primary btn-sm">Update</button>
                            <a href="{{ route('suppliers.index') }}" class="btn btn-default btn-sm">Cancel</a>
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
