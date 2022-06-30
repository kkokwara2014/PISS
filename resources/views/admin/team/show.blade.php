@extends('admin.layout.app')

@section('title')
 Team Member Details
@endsection

@section('content')
{{-- @include('admin.layout.statboard') --}}
@include('admin.layout.statboardcontainer')
<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">
    <a href="{{ route('teams.index') }}" class="btn btn-success btn-sm">Back</a>
        <br>
        <br>
        <div class="row">
            <div class="col-md-8">


                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row row-no-gutters">
                            <div class="col-md-12">
                                <h3>{{ucfirst($teammember->firstname).' '.ucfirst($teammember->lastname).'\'s'}} Profile
                                </h3>
                            </div>
                        </div>
                        <div class="row row-no-gutters">


                            <div class="col-md-5">

                                <img src="{{url('team_images',$teammember->image)}}" alt=""
                                    class="img-responsive img-circle"
                                    style="width: 250px; height: 200px; border-radius: 50%;">

                            </div>
                            <div class="col-md-7">

                                    <hr>
                                    <div>
                                       <h3> Name : <strong>{{$teammember->firstname.' '.$teammember->lastname}}</strong></h3>
                                    </div>
                                    <div>
                                       Phone : {{$teammember->phone}}
                                    </div>
                                    <div>
                                       Email Address : {{$teammember->email}}
                                    </div>
                                    <div>
                                       Position : {{$teammember->position}}
                                    </div>

                                    <div>
                                        Account Status :
                                        @if ($teammember->isactive==1)
                                        <span class="badge badge-pill badge-success" style="background-color: green; color: honeydew;">Active</span>
                                        @else
                                        <span class="badge badge-pill badge-danger" style="background-color: green; color: crimson;">Inactive</span>
                                        @endif

                                    </div>
                                    <hr>

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
