@extends('admin.layout.app')

@section('title')
Staff Details
@endsection

@section('content')
{{-- @include('admin.layout.statboard') --}}
@include('admin.layout.statboardcontainer')
<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">
        <div>
            <a href="{{ route('staffs.index') }}" class="btn btn-success btn-sm">
                Back</a>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4">
                        <div class="box">
                            <!-- /.box-header -->
                            <div class="box-body">

                                <img src="{{url('user_images',$staff->userimage)}}" alt=""
                                    class="img-responsive img-rounded" width="240">
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <div class="col-md-8">
                        <div class="box">
                            <!-- /.box-header -->
                            <div class="box-body">

                                <p>
                                    <h2>{{ucfirst($staff->firstname).' '.strtoupper($staff->lastname)}}
                                     <small>[Staff ID.: {{ $staff->identitynum }}]</small>
                                    </h2>
                                </p>
                                <hr>
                                <div>Role : <strong>{{ implode(', ',$staff->roles()->get()->pluck('name')->toArray()) }}</strong> </div>
                                <div>Email : {{$staff->email}} </div>
                                <div>Phone : {{$staff->phone}}</div>
                                <div>Deployed to : {{$staff->branch->address}}</div>
                                <div>Created : {{date('d M, Y',strtotime($staff->created_at))}}
                                    [{{$staff->created_at->diffForHumans()}}] </div>
                                <div>
                                    Status :
                                    @if ($staff->isactive==1)
                                    <span class="badge badge-success badge-pill"
                                        style="background-color: seagreen; color:seashell"> Active</span>
                                    @else
                                    <span class="badge badge-danger badge-pill"
                                        style="background-color: red; color:seashell"> Inactive</span>

                                    @endif
                                </div>
                                <div>
                                    Profile Updated? :
                                    @if ($staff->profileupdated==1)
                                    <span class="badge badge-success badge-pill"
                                        style="background-color: seagreen; color:seashell"> Yes</span>
                                    @else
                                    <span class="badge badge-danger badge-pill"
                                        style="background-color: red; color:seashell"> No</span>

                                    @endif
                                </div>
                                
                                
                            </div>
                            
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>

{{--  </div>
</div>  --}}



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