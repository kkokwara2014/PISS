@extends('admin.layout.app')

@section('title')
Dashboard
@endsection

@section('content')

@include('admin.layout.statboard')
<!-- Main row -->
<div class="row">
  <!-- Left col -->
  <section class="col-lg-12 connectedSortable">

   
     


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