@extends('admin.layout.app')

@section('title')
Team Members
@endsection

@section('content')
{{-- @include('admin.layout.statboard') --}}
@include('admin.layout.statboardcontainer')
<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
            <span class="fa fa-plus"></span> Add Team Member
        </button>
        <br><br>

        <div class="row">
            <div class="col-md-12">

                {{-- for messages --}}
                @include('admin.messages.success')

                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-responsive table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Surname</th>
                                    <th>Middlename</th>
                                    <th>First Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Details</th>
                                    <th>Status</th>

                                    <th>Action</th>


                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($team_members as $teams)


                                <tr>
                                    <td>
                                        <img src="{{url('team_images',$teams->image)}}" width="30" height="30"
                                            class="img-circle">
                                    </td>

                                    <td>{{$teams->lastname}}</td>
                                    <td>{{$teams->middlename}}</td>
                                    <td>{{$teams->firstname}}</td>
                                    <td>{{$teams->email}}</td>
                                    <td>{{$teams->phone}}</td>
                                    <td><a href="{{ route('teams.show',$teams->slug) }}"><span
                                                class="fa fa-eye fa-2x text-primary"></span></a></td>
                                    <td>
                                        @if ($teams->isactive==1)
                                        <span class="fa fa-check-circle fa-2x text-success"></span>
                                        @else
                                        <span class="fa fa-close fa-2x text-danger"></span>
                                        @endif

                                    </td>

                                    <td>

                                        <div class="dropdown"> <button type="button"
                                                class="btn btn-primary btn-sm dropdown-toggle" id="dropdownMenu1"
                                                data-toggle="dropdown"> Action &nbsp;&nbsp;<span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">

                                                

                                                <li role="presentation"> <a role="menuitem" tabindex="-1"
                                                        href="{{ route('teams.edit',$teams->id) }}"><span
                                                            class="fa fa-pencil-square"></span> Edit</a> </li>

                                                <form id="remove-{{$teams->id}}" style="display: none"
                                                    action="{{ route('teams.destroy',$teams->id) }}" method="post">
                                                    {{ csrf_field() }}
                                                    {{method_field('DELETE')}}
                                                </form>

                                                <li role="presentation">
                                                    <a role="menuitem" tabindex="-1" href="" onclick="
                                                                if (confirm('Delete this?')) {
                                                                    event.preventDefault();
                                                                document.getElementById('remove-{{$teams->id}}').submit();
                                                                } else {
                                                                    event.preventDefault();
                                                                }
                                                            "><span class="fa fa-trash-o"></span>
                                                        Delete
                                                    </a>
                                                </li>

                                            </ul>
                                        </div>



                                    </td>


                                    {{-- <td>
                                        @if ($teams->isactive==1)

                                        <form id="delete-form-{{$teams->id}}" style="display: none"
                                            action="{{ route('teams.deactivate',$teams->id) }}" method="post">
                                            {{ csrf_field() }}

                                        </form>
                                        <a href="" onclick="
                                                                if (confirm('Are you sure you want to Deactivate this?')) {
                                                                    event.preventDefault();
                                                                document.getElementById('delete-form-{{$teams->id}}').submit();
                                                                } else {
                                                                    event.preventDefault();
                                                                }
                                                            " class="btn btn-danger btn-sm btn-block">Deactivate
                                        </a>
                                        @else

                                        <form id="delete-form-{{$teams->id}}" style="display: none"
                                            action="{{ route('teams.activate',$teams->id) }}" method="post">
                                            {{ csrf_field() }}

                                        </form>
                                        <a href="" onclick="
                                                                if (confirm('Are you sure you want to Activate this?')) {
                                                                    event.preventDefault();
                                                                document.getElementById('delete-form-{{$teams->id}}').submit();
                                                                } else {
                                                                    event.preventDefault();
                                                                }
                                                            " class="btn btn-success btn-sm btn-block"> Activate
                                        </a>

                                        @endif
                                    </td> --}}

                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Image</th>
                                    <th>Surname</th>
                                    <th>Middlename</th>
                                    <th>First Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Details</th>
                                    <th>Status</th>
                                   
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>


        {{-- Data input modal area --}}
        <div class="modal fade" id="modal-default">
            <div class="modal-dialog modal-lg">

                <form action="{{ route('teams.store') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="modal-content modal-lg">
                        <div class="modal-header modal-lg">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title modal-lg"><span class="fa fa-empire"></span> Add Team Member</h4>
                        </div>
                        <div class="modal-body modal-lg">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Last Name <i style="color: red">*</i></label>
                                        <input id="lastname" type="text"
                                            class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}"
                                            name="lastname" value="{{ old('lastname') }}" required autofocus
                                            placeholder="Last Name">

                                        @if ($errors->has('lastname'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('lastname') }}</strong>
                                        </span>
                                        @endif

                                    </div>
                                    <div class="form-group">
                                        <label for="">Middle Name </label>
                                        <input id="middlename" type="text" class="form-control" name="middlename"
                                            value="{{ old('middlename') }}" autofocus placeholder="Middle Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="">First Name <i style="color: red">*</i></label>
                                        <input id="firstname" type="text"
                                            class="form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}"
                                            name="firstname" value="{{ old('firstname') }}" required autofocus
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
                                            name="email" value="{{ old('email') }}" required autofocus
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
                                            name="phone" value="{{ old('phone') }}" required placeholder="Phone"
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
                                            <option value="Software Architect">Software Architect</option>
                                        </select>

                                    </div>
                                    <div class="form-group">
                                        <label for="">Citation <i style="color: red">*</i></label>
                                        <textarea name="citation" id="" cols="30" rows="5"
                                            class="form-control"></textarea>
                                    </div>
                                    <div>
                                        <label for="">Select Member Image </label>
                                        <input type="file" name="image">
                                    </div>
                                </div>
                            </div>

                            {{-- hidden field --}}

                            <input type="hidden" name="isactive" value="{{'1'}}">


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
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