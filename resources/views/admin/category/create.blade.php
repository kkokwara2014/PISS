@extends('admin.layout.app')

@section('title')
Add Category
@endsection

@section('content')
{{-- @include('admin.layout.statboard') --}}
@include('admin.layout.statboardcontainer')
<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">

        <p>
            <a href="{{ route('categories.index') }}" class="btn btn-success btn-sm"><span class="fa fa-eye"></span> All
                Medicince Categories</a>
        </p>

        <div class="row">
            <div class="col-md-9">

                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="{{ route('categories.store') }}" method="post">
                            @csrf

                            <div class="form-group">
                                <label>Name <strong style="color: red">*</strong></label>
                                <input id="name" type="text"
                                    class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                    name="name" value="{{ old('name') }}" required autofocus
                                    placeholder="Category Name">

                                @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert" style="color: red">
                                    {{ $errors->first('name') }}
                                </span>
                                @endif

                            </div>

                            <a href="{{ route('categories.index') }}" class="btn btn-danger btn-sm">Cancel</a>
                            <button type="submit" class="btn btn-primary btn-sm">Save</button>
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