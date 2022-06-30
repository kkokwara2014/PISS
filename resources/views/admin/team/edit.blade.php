@extends('admin.layout.app')

@section('title')
Eidt Team Member's Profile
@endsection

@section('content')
{{-- @include('admin.layout.statboard') --}}
@include('admin.layout.statboardcontainer')
<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">
        <a href="{{ route('teams.index') }}" class="btn btn-success">
            <span class="fa fa-eye"></span> All Team Members
        </a>
        <br><br>

        <div class="row">
            <div class="col-md-10">

                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="{{ route('teams.update',$team_member->id) }}" method="post"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{method_field('PUT')}}

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Last Name <i style="color: red">*</i></label>
                                        <input id="lastname" type="text"
                                            class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}"
                                            name="lastname" required autofocus
                                            placeholder="Last Name" value="{{$team_member->lastname}}">

                                        @if ($errors->has('lastname'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('lastname') }}</strong>
                                        </span>
                                        @endif

                                    </div>
                                    <div class="form-group">
                                        <label for="">Middle Name </label>
                                        <input id="middlename" type="text" class="form-control" name="middlename"
                                            value="{{ $team_member->middlename }}" required autofocus
                                            placeholder="Middle Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="">First Name <i style="color: red">*</i></label>
                                        <input id="firstname" type="text"
                                            class="form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}"
                                            name="firstname" value="{{ $team_member->firstname }}" required autofocus
                                            placeholder="First Name">

                                        @if ($errors->has('firstname'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('firstname') }}</strong>
                                        </span>
                                        @endif

                                    </div>

                                    <div class="form-group">
                                        <label for="">Email <i style="color: red">*</i></label>
                                        <input id="email" type="email"
                                            class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                            name="email" value="{{ $team_member->email }}" required autofocus
                                            placeholder="Email">

                                        @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label for="">Phone <i style="color: red">*</i></label>
                                        <input id="phone" type="tel"
                                            class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}"
                                            name="phone" value="{{ $team_member->phone }}" required placeholder="Phone"
                                            maxlength="11">

                                        @if ($errors->has('phone'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="">Position <i style="color: red">*</i></label>
                                        <select name="position" class="form-control">
                                            <option selected="disabled">Select Position</option>
                                            <option value="Founder">Founder</option>
                                            <option value="Co-Founder">Co-Founder</option>
                                            <option value="Software Developer">Software Developer</option>
                                            <option value="Software Tester">Software Tester</option>
                                            <option value="Software Engineer">Software Engineer</option>
                                            <option value="System Analyst">System Analyst</option>
                                            <option value="Graphics Designer">Graphics Designer</option>
                                        </select>

                                    </div>
                                    <div class="form-group">
                                        <label for="">Citation <i style="color: red">*</i></label>
                                        <textarea name="citation" id="" cols="30" rows="5"
                                            class="form-control">{{$team_member->citation}}</textarea>
                                    </div>
                                    <div>
                                        <label for="">Select Member Image <i style="color: red">*</i></label>
                                        <input type="file" name="image">
                                    </div>
                                </div>
                            </div>

                            {{-- hidden field --}}

                            <input type="hidden" name="isactive" value="{{'1'}}">

                            <br>
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('teams.index') }}" class="btn btn-default">Cancel</a>

                    </div>
                    </form>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
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
