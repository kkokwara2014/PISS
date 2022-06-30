@extends('admin.layout.app')

@section('title')
Edit Branch
@endsection

@section('content')
{{-- @include('admin.layout.statboard') --}}
@include('admin.layout.statboardcontainer')
<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">
        <a href="{{ route('branches.index') }}" class="btn btn-success btn-sm">
            <span class="fa fa-eye"></span> All Branches
        </a>
        <br><br>

        <div class="row">
            <div class="col-md-8">

                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">

                        <form action="{{ route('branches.update',$branch->id) }}" method="post">
                          @csrf
                          @method('put')
                          <div class="form-group">
                            <label for="address">Address <strong style="color:red;">*</strong></label>
                            <input type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ $branch->address }}" placeholder="Branch Address e.g 15 Okuzu Lane" required>
                                  @error('address')
                                  <span class="invalid-feedback text-danger" role="alert">
                                      <strong>{{ $errors->first('address') }}</strong>
                                  </span>
                                  @enderror
                        </div>
                        <div class="form-group">
                            <label for="town">Town <strong style="color:red;">*</strong></label>
                            <input type="text" class="form-control{{ $errors->has('town') ? ' is-invalid' : '' }}" name="town" value="{{ $branch->town }}" placeholder="Town eg. Onitsha" required>
                                  @error('town')
                                  <span class="invalid-feedback text-danger" role="alert">
                                      <strong>{{ $errors->first('town') }}</strong>
                                  </span>
                                  @enderror
                        </div>
                        <div class="form-group">
                            <label for="state">State <strong style="color:red;">*</strong></label>
                            <input type="text" class="form-control{{ $errors->has('state') ? ' is-invalid' : '' }}" name="state" value="{{ $branch->state }}" placeholder="State eg. Anambra State" required>
                                  @error('state')
                                  <span class="invalid-feedback text-danger" role="alert">
                                      <strong>{{ $errors->first('state') }}</strong>
                                  </span>
                                  @enderror
                        </div>                           
                           
                          <a href="{{ route('branches.index') }}" class="btn btn-danger btn-sm">Cancel</a>
                            <button type="submit" class="btn btn-primary btn-sm">Update</button>
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
