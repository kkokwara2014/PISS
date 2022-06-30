@extends('admin.layout.app')

@section('title')
 Fetch Specific Report
@endsection

@section('content')
{{-- @include('admin.layout.statboard') --}}
@include('admin.layout.statboardcontainer')
<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">
              
        <div class="row">
            <div class="col-md-10">
                               
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="{{ route('specific.result') }}" method="post">
                           @csrf
                            <div class="row">
                                <div class="col-md-6">                                        
                                            <div class="form-group">
                                                {{--  <label for="numofvalue">Number <strong style="color:red;">*</strong></label>  --}}
                                                <input type="text" class="form-control{{ $errors->has('numofvalue') ? ' is-invalid' : '' }}" name="numofvalue" value="{{ old('numofvalue') }}" placeholder="Number" maxlength="3" pattern="[0-9]+">
                                                      @error('numofvalue')
                                                      <span class="invalid-feedback text-danger" role="alert">
                                                          <strong>{{ $errors->first('numofvalue') }}</strong>
                                                      </span>
                                                      @enderror
                                            </div>
                                        
                                   
                                </div>
                                <div class="col-md-4">
                                            <div class="form-group">
                                                {{--  <label>Criteria <strong style="color:red;">*</strong></label>  --}}
                                                <select name="criteria" class="form-control" required>
                                                    <option value="" selected="disabled">Select Criteria</option>
                                                    <option value="day">Day(s)</option>
                                                    <option value="week">Week(s)</option>
                                                    <option value="month">Month(s)</option>
                                                    <option value="year">Year(s)</option>
                                                </select>
                                            </div>                                   
                                </div>
                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-primary btn-block">Fetch Report</button>
                                </div>
                            </div>
                        </form>
                        
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </div>
        </div>

        <div class="row">
            <div class="col-md-12">

                @if ($specificreports->count()>0)
                         
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">

                           
                        <table id="example1" class="table table-bordered table-striped table-responsive">
                            <thead>
                                <tr>
                                    <th>Order #</th>
                                    <th>Product</th>
                                    {{-- <th>Customer</th> --}}
                                    <th>Sold at</th>
                                    <th>Qty.</th>
                                    <th>Total</th>
                                    <th>Sold By</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($specificreports as $transaction)
                                    @if (($transaction->user->id==auth()->user()->id) || Auth::user()->hasAnyRole(['Admin']) || Auth::user()->hasAnyRole(['Director']) || Auth::user()->hasAnyRole(['Manager']) || Auth::user()->hasAnyRole(['Accountant']))
                                            <tr>
                                                <td>{{$transaction->ordernumber}}</td>
                                                <td>
                                                    @foreach ($transaction->products as $product)
                                                    {{$product->name}}
                                                        
                                                    @endforeach
                                                </td>
                                                {{-- <td>{{$transaction->customer->name}}</td> --}}
                                                <td>&#8358;{{number_format($transaction->sellingprice,2)}}</td>
                                                <td>{{$transaction->quantity}}</td>                                                                  
                                                <td>&#8358;{{number_format($transaction->totalamount,2)}}</td>
                                                <td>{{$transaction->user->firstname.' '.$transaction->user->lastname}}</td>
                                                <td>{{ $transaction->created_at }}</td>
                                            </tr>
                                    @endif
                                @endforeach
                            </tbody>
                           
                        </table>
                      



                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
                           
                @else
                <span class="badge badge-default" style="background-color:red;color:seashell">{{ $info.' ('.$numofvalue.' '.$criteria.')'}}</span>
                   
               @endif

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
