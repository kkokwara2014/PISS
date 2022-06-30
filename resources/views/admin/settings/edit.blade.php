@extends('admin.layout.app')

@section('title')
 Edit Settings
@endsection

@section('content')
{{-- @include('admin.layout.statboard') --}}
@include('admin.layout.statboardcontainer')
<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">
        <a href="{{ route('setting.index') }}" class="btn btn-success">
           <span class="fa fa-eye"></span> All Settings
        </a>
        <br><br>

        <div class="row">
            <div class="col-md-8">

                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="{{ route('setting.update',$setting->id) }}" method="post">
                            {{ csrf_field() }}
                            {{method_field('PUT')}}

                            <div class="form-group">
                                <label for="">Election Date</label>
                                <input type="text" class="form-control" id="datepicker" name="electiondate"
                            value="{{$setting->electiondate}}">
                            </div>
                            <div class="form-group">
                                <label for="">Caption</label>
                                <input type="text" class="form-control" name="caption" value="{{$setting->caption}}">
                            </div>
                            <div class="form-group">
                                <label for="">Institution</label>
                                <input type="text" class="form-control" name="institution"
                                value="{{$setting->institution}}">
                            </div>
                            <div class="form-group">
                                <label for="">Voting Start Time</label>
                                <input type="text" class="form-control timepicker" name="starttime" value="{{$setting->starttime}}">
                            </div>
                            <div class="form-group">
                                <label for="">Voting Stop Time</label>
                                <input type="text" class="form-control timepicker1" name="endtime" value="{{$setting->endtime}}">
                            </div>

                            <br>
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('setting.index') }}" class="btn btn-default">Cancel</a>

                    </div>
                    </form>
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
