@extends('admin.layout.app')

@section('title')
Edit Pharmacy
@endsection

@section('content')
{{-- @include('admin.layout.statboard') --}}
@include('admin.layout.statboardcontainer')
<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">

        <p>
            <a href="{{ route('pharmacy.index') }}" class="btn btn-success btn-sm"><span class="fa fa-eye"></span>
                Pharmacy</a>
        </p>

        <div class="row">
            <div class="col-md-10">

                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="{{ route('pharmacy.update',$pharm->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')

                            <div class="form-group">
                                <label>Name <strong style="color: red">*</strong></label>
                                <input id="name" type="text"
                                    class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                    name="name" required autofocus
                                    placeholder="Pharmacy Name" value="{{ $pharm->name }}">

                                @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email <strong style="color: red">*</strong></label>
                                        <input id="email" type="email"
                                            class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                            name="email" required autofocus
                                            placeholder="Pharmacy email" value="{{ $pharm->email }}">
        
                                        @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Phone <strong style="color: red">*</strong></label>
                                        <input id="phone" type="text"
                                            class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}"
                                            name="phone" required autofocus
                                            placeholder="Pharmacy phone" value="{{ $pharm->phone }}" pattern="[0-9]+" maxlength="11">
        
                                        @if ($errors->has('phone'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Address <strong style="color: red">*</strong></label>
                                <textarea name="address" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" cols="30" rows="3">{{ $pharm->address }}</textarea>
                                
                                @if ($errors->has('address'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('address') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>VAT(%) <strong style="color: red">*</strong></label>
                                        <input id="vat" type="text"
                                            class="form-control{{ $errors->has('vat') ? ' is-invalid' : '' }}"
                                            name="vat" required autofocus
                                            placeholder="Value Added Tax" value="{{ $pharm->vat }}">
        
                                        @if ($errors->has('vat'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('vat') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Logo <strong style="color: red"> [.png, .jpg, .jpeg]</strong></label>
                                        <input type="file" name="logo">
                                    </div>
                                </div>
                            </div>

                            <a href="{{ route('pharmacy.index') }}" class="btn btn-danger btn-sm">Cancel</a>
                            <button type="submit" class="btn btn-primary btn-sm">Apply & Update</button>
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