@extends('admin.layout.app')

@section('title')
 All Suppliers
@endsection

@section('content')
{{-- @include('admin.layout.statboard') --}}
@include('admin.layout.statboardcontainer')
<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">
        <p>
            <a href="{{ route('stocks.create') }}" class="btn btn-primary btn-sm">
                <span class="fa fa-tag"></span> Add Stock
                </a>
        </p>
       
        <div class="row">
            
            <div class="col-md-1"></div>
            <div class="col-md-10">
             @include('admin.messages.success')
                @include('admin.messages.deleted')

                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        
                        <form action="{{ route('suppliers.store') }}" method="post">
                           @csrf
                           <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                              <label for="name">Name <strong style="color:red;">*</strong></label>
                              <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder="Supplier Name e.g Jones Co." required>
                                    @error('name')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @enderror
                          </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                              <label for="phone">Phone <strong style="color:red;">*</strong></label>
                              <input type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" placeholder="Supplier Phone e.g 08038883919" maxlength="11" pattern="[0-9]+" required>
                                @error('phone')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                                @enderror
                          </div>
                        
                        </div>
                        </div>
                        {{-- <div class="form-group">
                              <label for="phone">Address <strong style="color:red;">*</strong></label>                         
                            <textarea name="address" class="form-control" rows="3" placeholder="Write Address here..." required>{{ old('address') }}</textarea>
                                                        
                          </div> --}}
                    
                          <button type="submit" class="btn btn-primary btn-sm">Save</button>

                        </form>
                        
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <div class="col-md-1"></div>

        </div>
        <div class="row">
            <div class="col-md-12">

                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-responsive table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Supplier ID.</th>
                                    <th>Code</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    {{-- <th>Address</th> --}}
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($suppliers as $supplier)

                                <tr>
                                    {{--  <td><strong>{{$supplier->code}}</strong></td>  --}}
                                    <td><strong>{{$supplier->id}}</strong></td>
                                    <td><strong>{{$supplier->code}}</strong></td>
                                    <td>{{$supplier->name}}</td>
                                    <td>{{$supplier->phone}}</td>
                                    {{-- <td>{{$supplier->address}}</td> --}}
                                   
                                     <td>
                                          <div class="dropdown"> <button type="button"
                                                class="btn btn-primary btn-sm dropdown-toggle" id="dropdownMenu1"
                                                data-toggle="dropdown"> Action &nbsp;&nbsp;<span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">

                                                <li role="presentation"> <a role="menuitem" tabindex="-1"
                                                        href="{{ route('suppliers.edit',$supplier) }}"><span
                                                            class="fa fa-pencil-square"></span> Edit</a> </li>

                                                <form id="remove-{{$supplier->id}}" style="display: none"
                                                    action="{{ route('suppliers.destroy',$supplier) }}" method="post">
                                                    @csrf
                                                   @method('delete')
                                                </form>

                                                <li role="presentation">
                                                    <a role="menuitem" tabindex="-1" href="" onclick="
                                                                if (confirm('Delete this?')) {
                                                                    event.preventDefault();
                                                                document.getElementById('remove-{{$supplier->id}}').submit();
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
