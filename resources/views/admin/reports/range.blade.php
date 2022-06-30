@extends('admin.layout.app')

@section('title')
 Fetch Report in Range
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
                        <form action="{{ route('fetchrecordinrange') }}" method="post">
                           @csrf
                            <div class="row">
                                <div class="col-md-4">                                        
                                    <div class="form-group">
                                      {{--  <label for="numofvalue">Number <strong style="color:red;">*</strong></label>  --}}
                                        <input id="datepicker" type="text" class="form-control{{ $errors->has('fromdate') ? ' is-invalid' : '' }}" name="fromdate" value="{{ old('fromdate') }}" required placeholder="Starting date">
                                            @error('fromdate')
                                                <span class="invalid-feedback text-danger" role="alert">
                                                    <strong>{{ $errors->first('fromdate') }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <label>To</label>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        {{--  <label for="numofvalue">Number <strong style="color:red;">*</strong></label>  --}}
                                        <input id="datepicker1" type="text" class="form-control{{ $errors->has('todate') ? ' is-invalid' : '' }}" name="todate" value="{{ old('todate') }}" required placeholder="Ending date">
                                              @error('todate')
                                              <span class="invalid-feedback text-danger" role="alert">
                                                  <strong>{{ $errors->first('todate') }}</strong>
                                              </span>
                                              @enderror
                                    </div>                               
                                </div>
                                
                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-primary btn-block">Fetch Record</button>
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

                @if ($rangereports->count()>0)
                         
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
                                @foreach ($rangereports as $transaction)
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
                <span class="badge badge-default" style="background-color:red;color:seashell">{{ $info .' between '. $starting .' to '.$ending }}</span>
                   
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
