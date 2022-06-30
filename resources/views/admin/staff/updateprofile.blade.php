@extends('admin.layout.app')

@section('title')
Update Profile
@endsection

@section('content')
{{-- @include('admin.layout.statboard') --}}
@include('admin.layout.statboardcontainer')
<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">

        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-10">
                        <div class="box">
                            <!-- /.box-header -->
                            <div class="box-body">

                                <form action="{{ route('profile.updated',$user->id) }}" method="post">
                                    @csrf
                                    @method('put')

                                    <div class="row">

                                        <div class="col-md-6">
                                            {{-- <div class="form-group">
                                                <label>Staff Number</label>
                                                <input type="text" style="font-weight:28px" class="form-control"
                                                    name="identitynum" value="{{ $user->identitynum }}" readonly>

                                            </div> --}}
                                            <div class="form-group">
                                                <label>First Name <strong style="color: red">*</strong></label>
                                                <input id="firstname" type="text"
                                                    class="form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}"
                                                    name="firstname" value="{{ $user->firstname }}" autofocus
                                                    placeholder="First Name" required>

                                                @if ($errors->has('firstname'))
                                                <span style="color:red;" class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('firstname') }}</strong>
                                                </span>
                                                @endif

                                            </div>
                                            <div class="form-group">
                                                <label>Last Name <strong style="color: red">*</strong></label>
                                                <input id="lastname" type="text"
                                                    class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}"
                                                    name="lastname" value="{{ $user->lastname }}" autofocus
                                                    placeholder="Last Name" required>

                                                @if ($errors->has('lastname'))
                                                <span style="color:red;" class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('lastname') }}</strong>
                                                </span>
                                                @endif

                                            </div>
                                            <div class="form-group">
                                                <label>New Password <strong style="color: red">*</strong></label>
                                                <input id="password" type="password"
                                                    class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                                    name="password"
                                                    placeholder="New Password" required autocomplete="new-password">

                                                @if ($errors->has('password'))
                                                <span style="color:red;" class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                                @endif

                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            {{-- <div class="form-group">
                                                <label>Branch</label>
                                                <input type="text" style="font-weight:28px" class="form-control"
                                                    name="branchname"
                                                    value="{{ $user->branch->address.', '.$user->branch->town.'. '.$user->branch->state.'.' }}"
                                                    readonly>

                                            </div> --}}

                                            <div class="form-group">
                                                <label>Email Address <strong style="color: red">*</strong></label>
                                                <input id="email" type="email"
                                                    class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                                    name="email" value="{{ $user->email }}" autofocus
                                                    placeholder="Email" required>

                                                @if ($errors->has('email'))
                                                <span style="color:red;" class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label>Phone Number <strong style="color: red">*</strong></label>
                                                <input id="phone" type="tel"
                                                    class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}"
                                                    name="phone" value="{{ $user->phone }}" placeholder="Phone"
                                                    maxlength="11" pattern="[0-9]+" required>

                                                @if ($errors->has('phone'))
                                                <span style="color:red;" class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('phone') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label>Repeat New Password <strong style="color: red">*</strong></label>
                                                <input id="password" type="password"
                                                    class="form-control"
                                                    name="password_confirmation" autofocus
                                                    placeholder="Repeat New Password" required autocomplete="new-password">
                                            </div>

                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-sm"> Update</button>
                                </form>


                            </div>

                        </div>
                    </div>
                    <!-- /.box-body -->
                    {{-- <div class="col-md-4">
                        <div class="box">
                            <!-- /.box-header -->
                            <div class="box-body">

                                <img src="{{url('user_images',$user->userimage)}}" alt=""
                    class="img-responsive img-rounded" width="250" height="250">
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div> --}}

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