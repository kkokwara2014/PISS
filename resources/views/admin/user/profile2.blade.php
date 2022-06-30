@extends('admin.layout.app')

@section('title')
User Profile
@endsection

@section('content')
{{-- @include('admin.layout.statboard') --}}
@include('admin.layout.statboardcontainer')
<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">

        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-default-password"
            data-backdrop="static" data-keyboard="false">
            <span class="fa fa-gears"></span> Change Password
        </button>
        <br><br>
        @include('admin.messages.success')
        <div class="row">
            <div class="col-md-5">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <img src="{{url('user_images',$user->userimage)}}" alt=""
                                    class="img-responsive img-circle"
                                    style="width: 250px; height: 200px; border-radius: 50%;">
                                <form action="{{ route('user.profile.update') }}" method="post"
                                    enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <br>
                                    <input type="file" name="userimage" required>
                                    <p></p>

                                    <div class="form-group">
                                        <label for="">Select Department <b style="color:red">*</b> </label>
                                        <select name="department_id" id="" class="form-control"
                                            data-parsley-required="true">
                                            <option selected="disabled">Select Depeartment</option>
                                            @foreach ($departments as $department)

                                            <option value="{{$department->id}}"
                                                {{ (old("department_id") == $department->id ? 'selected':'') }}>
                                                {{$department->name.' - '.$department->code}}</option>

                                            @endforeach
                                        </select>

                                    </div>
                                    <button type="submit" class="btn btn-success text-center btn-sm"><span
                                            class="fa fa-upload"></span>
                                        Upload Photo
                                    </button>
                                </form>
                            </div>
                            <div class="col-md-2"></div>

                        </div>

                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <div class="col-md-7">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        @include('admin.user.profilestatus')


                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>


            </div>

            {{-- Modal for changing password --}}
            <div class="modal fade" id="modal-default-password">
                <div class="modal-dialog">

                    <form action="{{ route('user.change.password') }}" method="post">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title"><span class="fa fa-gears"></span> Change Password</h4>
                            </div>
                            <div class="modal-body">

                                <div class="form-group">
                                    <label for="">New Password <strong style="color: red">*</strong></label>
                                    <input type="password"
                                        class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                                        placeholder="New Password" autofocus value="{{ old('password') }}">
                                    @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <span
                                            style="color: red">{{ $errors->first('password','Enter New password') }}</span>
                                    </span>
                                    @endif
                                </div>
                                {{-- <div class="form-group">
                                    <label for="">Repeat Password <strong style="color: red">*</strong></label>
                                    <input type="text"
                                        class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                                        placeholder="New Password" autofocus value="{{ old('password') }}">
                                    @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <span
                                            style="color: red">{{ $errors->first('password','Enter New password') }}</span>
                                    </span>
                                    @endif
                                </div> --}}
                                <i style="color: red">You will be logged out automatically after changing your password. Login with your new password!</i>



                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary btn-sm">Change</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->

                    </form>
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->



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
