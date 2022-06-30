@extends('admin.layout.app')

@section('title')
{{ $user->firstname.'\'s'  }} Profile
@endsection

@section('content')
@include('admin.layout.statboardcontainer')
<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">
       
        <div class="row">
            <div class="col-md-4">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <img src="{{url('user_images',$user->userimage)}}" alt=""
                                    class="img-responsive img-circle"
                                    style="width: 180px; border-radius: 50%;">
                                <form action="{{ route('uploadprofileimage',$user->id) }}" method="post"
                                    enctype="multipart/form-data">
                                   @csrf
                                   {{--  @method('put')  --}}
                                    <br>
                                    <input type="file" name="userimage" required>
                                    <p></p>
                                    
                                    <button type="submit" class="btn btn-success text-center btn-sm btn-block"><span
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
            <div class="col-md-8">
                @include('admin.messages.success')
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <h3>{{ $user->firstname.' '.$user->lastname }} <small>[Staff ID: {{ $user->identitynum }}]</small></h3>
                        <hr>
                        <div>
                            Branch : {{ $user->branch->address.', '.$user->branch->town.'. '.$user->branch->state }}
                        </div>
                        <div>
                            Phone : {{ $user->phone }}
                        </div>
                        <div>
                            Email : {{ $user->email }}
                        </div>
                        <div>
                            Created on : {{ date('D d F, Y h:ia',strtotime($user->created_at)) }} [{{ $user->created_at->diffForHumans() }}]
                        </div>
                        <div>
                            Account Status
                            @if ($user->isactive==1)
                            <span class="badge badge-success badge-pill"
                                style="background-color: green; color:seashell"> Active</span>
                            @else
                            <span class="badge badge-danger badge-pill"
                                style="background-color: crimson; color:seashell"> Inactive</span>
                
                            @endif
                        </div>
                        <div>
                           Profile Updated?
                            @if ($user->profileupdated==1)
                            <span class="badge badge-success badge-pill"
                                style="background-color: green; color:seashell"> Yes</span>
                            @else
                            <span class="badge badge-danger badge-pill"
                                style="background-color: crimson; color:seashell"> No</span>
                
                            @endif
                        </div>
                        <br>
                        <hr>
                        <a data-toggle="modal" data-target="#modal-default" href="" class="btn btn-primary btn-sm"><span class="fa fa-lock"></span> Change Password</a>

                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>


            </div>

            {{-- Password change input modal area --}}
            <div class="modal fade" id="modal-default">
                <div class="modal-dialog">
                    <form action="{{ route('password.change') }}" method="post">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title"><span class="fa fa-lock"></span> Change Password</h4>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="">New Password <strong style="color:red;">*</strong></label>
                                    <input type="password" class="form-control" name="password"
                                        value="{{ old('password') }}" required placeholder="New password"
                                        autocomplete="new-password">
                                </div>
                                <div class="form-group">
                                    <label for="">Confirm Password <strong style="color:red;">*</strong></label>
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" placeholder="Confirm Password" required
                                        autocomplete="new-password">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary btn-sm">Save</button>
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
