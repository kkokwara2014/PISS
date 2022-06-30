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

        <br>
        <div class="row">
            <div class="col-md-10">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h3>{{ucfirst($user->firstname).' '.ucfirst($user->lastname).'\'s'}} Profile
                                </h3>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-5">

                                <img src="{{url('user_images',$user->userimage)}}" alt=""
                                    class="img-responsive img-circle"
                                    style="width: 250px; height: 200px; border-radius: 50%;">

                                    @if ($user->profileupdated==1)
                                    <hr>
                                    <div>
                                        Name : <strong>{{$user->firstname.' '.$user->lastname}}</strong>
                                    </div>
                                    <div>
                                        Unique Number : <strong>{{$user->useruniquenum}}</strong>
                                    </div>
                                    <div>
                                        Year of Entry : {{$user->yearofentry=='0000'?'No Year of Entry':$user->yearofentry}}
                                    </div>
                                    <div>
                                        Staff Number : {{$user->idnumber==''?'No Staff Number':$user->idnumber}}
                                    </div>
                                    <div>
                                        Department : {{$user->department_id=='1'?'No Department':$user->department->name}}
                                    </div>
                                    <hr>
                                    @endif

                            </div>
                            <div class="col-md-7">
                                <form action="{{ route('user.profile.update') }}" method="post"
                                    enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Select Matric. Year <b style="color:red">*</b> </label>

                                                <select name="yearofentry" id="" class="form-control" required="">
                                                    <option selected="disabled">Select Matric. Year</option>

                                                    @for ($year =1983 ; $year <= date('Y') ; $year++) <option value="{{$year}}"
                                                        {{ (old("yearofentry") == $year ? 'selected':'') }}>
                                                        {{$year}}
                                                        </option>
                                                        @endfor
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Select Programme <b style="color:red">*</b> </label>

                                                <select name="classlevel_id" class="form-control">

                                                    <option value="">--- Select Programme ---</option>

                                                    @foreach ($classlevels as $classlevel)

                                                    <option value="{{ $classlevel->id }}">{{ $classlevel->name }}</option>

                                                    @endforeach

                                                </select>
                                            </div>
                                            <div class="form-group">

                                                <label for="">Select Level <b style="color:red">*</b> </label>

                                                <select name="subclasslevel_id" class="form-control">

                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Matric. Number <b style="color:red">*</b> </label>
                                                <input type="text" name="idnumber" id=""
                                                    class="form-control{{ $errors->has('idnumber') ? ' is-invalid' : '' }}"
                                                    maxlength="6" placeholder="Matric. Number eg. 24537"
                                                    value="{{ old('idnumber') }}" data-parsley-type="digits"
                                                    data-parsley-length="[1,6]" data-parsley-trigger="keyup"
                                                    data-parsley-required="true">

                                            </div>



                                        </div>
                                        <div class="col-md-6">
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

                                            <div class="form-group">
                                                <label for="">Select State of Origin <b style="color:red">*</b> </label>

                                                <select name="state_id" class="form-control">

                                                    <option value="">--- Select State ---</option>

                                                    @foreach ($states as $state)

                                                    <option value="{{ $state->id }}">{{ $state->name }}</option>

                                                    @endforeach

                                                </select>
                                            </div>
                                            <div class="form-group">

                                                <label for="">Select LGA <b style="color:red">*</b> </label>

                                                <select name="lga_id" class="form-control">

                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                        <label for="">Select Image <b style="color:red">*</b> </label>
                                        <input type="file" name="userimage" data-parsley-required="true">
                                    </div>
                                    <input type="hidden" name="profileupdated" value="{{'1'}}">
                                    <p></p>
                                    <button type="submit" class="btn btn-success text-center">
                                        Update Profile</button>
                                </form>
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
