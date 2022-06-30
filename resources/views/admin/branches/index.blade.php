@extends('admin.layout.app')

@section('title')
 All Branches
@endsection

@section('content')
{{-- @include('admin.layout.statboard') --}}
@include('admin.layout.statboardcontainer')
<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">
        

        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                @include('admin.messages.success')
                @include('admin.messages.deleted')

                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="{{ route('branches.store') }}" method="post">
                           @csrf
                          <div class="form-group">
                              <label for="address">Address <strong style="color:red;">*</strong></label>
                              <input type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ old('address') }}" placeholder="Branch Address e.g 15 Okuzu Lane" required>
                                    @error('address')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                    @enderror
                          </div>
                          <div class="form-group">
                              <label for="town">Town <strong style="color:red;">*</strong></label>
                              <input type="text" class="form-control{{ $errors->has('town') ? ' is-invalid' : '' }}" name="town" value="{{ old('town') }}" placeholder="Town eg. Onitsha" required>
                                    @error('town')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $errors->first('town') }}</strong>
                                    </span>
                                    @enderror
                          </div>
                          <div class="form-group">
                              <label for="state">State <strong style="color:red;">*</strong></label>
                              <input type="text" class="form-control{{ $errors->has('state') ? ' is-invalid' : '' }}" name="state" value="{{ old('state') }}" placeholder="State eg. Anambra State" required>
                                    @error('state')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $errors->first('state') }}</strong>
                                    </span>
                                    @enderror
                          </div>
                            <button type="submit" class="btn btn-primary btn-sm">Save</button>
                        </form>
                        
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <div class="col-md-2"></div>
        </div>
        <div class="row">
           
            <div class="col-md-12">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped table-responsive">
                            <thead>
                                <tr>
                                    <th>Branch ID.</th>
                                    <th>Address</th>
                                    <th>Town</th>
                                    <th>State</th>
                                    <th>Staff</th>
                                    <th>Stock</th>
                                    <th>View Details</th>
                                    <th>Action</th>
                                  

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($branches as $branch)
                                <tr>
                                    <td><strong>{{$branch->id}}</strong></td>
                                    <td>{{$branch->address}}</td>
                                    <td>{{$branch->town}}</td>
                                    <td>{{$branch->state}}</td>
                                    <td>{{$branch->users->count()}} {{ Str::plural('staff',$branch->users->count()) }}</td>
                                    <td>{{$branch->products->count()}} {{ Str::plural('stock',$branch->products->count()) }}</td>
                                    <td>
                                        <a href="{{ route('branches.show',$branch->id) }}">
                                            <span class="fa fa-eye fa-2x"></span>
                                        </a>
                                    </td>
                                  
                                    <td>
                                        <div class="dropdown"> <button type="button"
                                              class="btn btn-primary btn-sm dropdown-toggle" id="dropdownMenu1"
                                              data-toggle="dropdown"> Action &nbsp;&nbsp;<span class="caret"></span>
                                          </button>
                                          <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">

                                              <li role="presentation"> <a role="menuitem" tabindex="-1"
                                                      href="{{ route('branches.edit',$branch->id) }}"><span
                                                          class="fa fa-pencil-square"></span> Edit</a> </li>

                                              <form id="remove-{{$branch->id}}" style="display: none"
                                                  action="{{ route('branches.destroy',$branch->id) }}" method="post">
                                                  @csrf
                                                 @method('delete')
                                              </form>

                                              <li role="presentation">
                                                  <a role="menuitem" tabindex="-1" href="" onclick="
                                                              if (confirm('Delete this?')) {
                                                                  event.preventDefault();
                                                              document.getElementById('remove-{{$branch->id}}').submit();
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
