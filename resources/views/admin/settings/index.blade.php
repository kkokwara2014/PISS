@extends('admin.layout.app')

@section('title')
 System Settings
@endsection

@section('content')
{{-- @include('admin.layout.statboard') --}}
@include('admin.layout.statboardcontainer')
<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
            <span class="fa fa-plus"></span> Add Setting
        </button>
        <br><br>

        <div class="row">
            <div class="col-md-12">

                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped table-responsive">
                            <thead>
                                <tr>
                                    <th>Election Date</th>
                                    <th>Caption</th>
                                    <th>Institution</th>
                                    <th>Start time</th>
                                    <th>Stop time</th>
                                    <th>Edit</th>
                                    <th>Delete</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($settings as $setting)
                                <tr>
                                    <td>{{$setting->electiondate}}</td>
                                    <td>{{$setting->caption}}</td>
                                    <td>{{$setting->institution}}</td>
                                    <td>{{$setting->starttime}}</td>
                                    <td>{{$setting->endtime}}</td>
                                    <td><a href="{{ route('setting.edit',$setting->id) }}"><span
                                                class="fa fa-edit fa-2x text-primary"></span></a></td>
                                    <td>
                                        <form id="delete-form-{{$setting->id}}" style="display: none"
                                            action="{{ route('setting.destroy',$setting->id) }}" method="post">
                                            {{ csrf_field() }}
                                            {{method_field('DELETE')}}
                                        </form>
                                        <a href="" onclick="
                                                            if (confirm('Are you sure you want to delete this?')) {
                                                                event.preventDefault();
                                                            document.getElementById('delete-form-{{$setting->id}}').submit();
                                                            } else {
                                                                event.preventDefault();
                                                            }
                                                        "><span class="fa fa-trash fa-2x text-danger"></span>
                                        </a>

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Election Date</th>
                                    <th>Caption</th>
                                    <th>Institution</th>
                                    <th>Start time</th>
                                    <th>Stop time</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
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
            <div class="modal-dialog">

                <form action="{{ route('setting.store') }}" method="post">
                    {{ csrf_field() }}
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title"><span class="fa fa-gear"></span> Add setting</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="">Election Date</label>
                                <input type="text" class="form-control" id="datepicker" name="electiondate"
                                    placeholder="Election Date">
                            </div>
                            <div class="form-group">
                                <label for="">Caption</label>
                                <input type="text" class="form-control" name="caption" placeholder="Election Caption">
                            </div>
                            <div class="form-group">
                                <label for="">Institution</label>
                                <input type="text" class="form-control" name="institution"
                                    placeholder="Institution Name e.g AIFPU">
                            </div>
                            <div class="form-group">
                                <label for="">Voting Start Time</label>
                                <input type="text" class="form-control timepicker" name="starttime">
                            </div>
                            <div class="form-group">
                                <label for="">Voting Stop Time</label>
                                <input type="text" class="form-control timepicker1" name="endtime">
                            </div>

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