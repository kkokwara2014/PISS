@extends('admin.layout.app')

@section('title')
Contact Developer
@endsection

@section('content')
{{-- @include('admin.layout.statboard') --}}
@include('admin.layout.statboardcontainer')
<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">

        <div class="row">
            <div class="col-md-11">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="text-center">
                            <h1 style="color: red">Contact Developer</h1>
                            <h3>
                                The testing phase has expired! Call the Developer on <strong style="color: green">08038883919</strong>.
                            </h3>
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