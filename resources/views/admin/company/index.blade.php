@extends('admin.layout.app')

@section('title')
 Pharmacy
@endsection

@section('content')
{{-- @include('admin.layout.statboard') --}}
@include('admin.layout.statboardcontainer')
<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">
        {{-- <p>
            <a href="{{ route('pharmacy.create') }}" class="btn btn-primary btn-sm">
                <span class="fa fa-plus"></span> Add Pharmacy
            </a>
        </p> --}}
        
        <div class="row">
            <div class="col-md-12">
               @include('admin.messages.success')
               @include('admin.messages.deleted')
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-responsive table-bordered table-striped">
                            <thead>
                                <tr>
                                    
                                    <th>Logo</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>VAT(%)</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pharmacy as $pharm)

                                <tr>
                                    <td>
                                        <img src="{{url('pharmacy_logo',$pharm->logo)}}" alt=""
                                    class="img-responsive img-rounded"
                                    style="width: 40px;">
                                    </td>
                                    <td>{{$pharm->name}}</td>
                                    <td>{{$pharm->email}}</td>
                                    <td>{{$pharm->phone}}</td>
                                    <td>{{$pharm->vat}}</td>
                                    <td>
                                        <a href="{{ route('pharmacy.edit',$pharm->slug) }}"><span
                                                class="fa fa-pencil-square"></span> Edit</a>
                                    </td>
                                  
                                </tr>
                                @endforeach
                            </tbody>
                           
                        </table>
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
