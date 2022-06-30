@extends('admin.layout.app')

@section('title')
 All Reports
@endsection

@section('content')
{{-- @include('admin.layout.statboard') --}}
@include('admin.layout.statboardcontainer')
<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">
              
        <div class="row">
            <div class="col-md-12">
                <div>
                    <p>
                        <a href="{{ route('dailyreport') }}" class="btn btn-danger btn-sm">Daily Report</a>
                        <a href="{{ route('weeklyreport') }}" class="btn btn-primary btn-sm">Weekly Report</a>
                        <a href="{{ route('monthlyreport') }}" class="btn btn-info btn-sm">Monthly Report</a>
                        <a href="{{ route('yearlyreport') }}" class="btn btn-success btn-sm">Yearly Report</a>
                    </p>
                </div>

               
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">

                        @livewire('allreport')

                        
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
