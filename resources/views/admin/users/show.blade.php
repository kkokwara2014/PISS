@extends('admin.layout.app')

@section('title')
 User Details
@endsection

@section('content')
{{-- @include('admin.layout.statboard') --}}
@include('admin.layout.statboardcontainer')
<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">
        <div>
            <a href="{{ route('users.index') }}" class="btn btn-success btn-sm">
                Back</a>
        </div>
        <br>
        <div class="row">
            <div class="col-md-9">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-5">
                                <img src="{{url('user_images',$theuser->userimage)}}" alt=""
                                    class="img-responsive" width="230" style="border-radius: 50%">

                            </div>
                            <div class="col-md-7">
                                <p>
                                    <h2>{{ucfirst($theuser->firstname).' '.($theuser->middlename!=''?ucfirst($theuser->middlename):'').' '.ucfirst($theuser->lastname)}} <small>[{{$theuser->role->name}}]</small> </h2>
                                </p>
                                <hr>

                                <div>Unique Number : <strong>{{$theuser->useruniquenum}}</strong> </div>
                                <div>Email : {{$theuser->email}} </div>
                                <div>Phone : {{$theuser->phone}}</div>
                                <div>Created : {{date('d M, Y',strtotime($theuser->created_at))}} [{{$theuser->created_at->diffForHumans()}}] </div>
                                <div>
                                    Status :
                                    @if ($theuser->isactive==1)
                                        <span class="badge badge-success badge-pill" style="background-color: green; color:seashell"> Active</span>
                                        @else
                                        <span class="badge badge-danger badge-pill" style="background-color: red; color:seashell"> Inactive</span>

                                    @endif
                                 </div>
                                <div>
                                    Profile Picture Updated? :
                                    @if ($theuser->profileupdated==1)
                                        <span class="badge badge-success badge-pill" style="background-color: green; color:seashell"> Yes</span>
                                        @else
                                        <span class="badge badge-danger badge-pill" style="background-color: red; color:seashell"> No</span>

                                    @endif
                                 </div>


                                <br>

                            </div>

                        </div>

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
