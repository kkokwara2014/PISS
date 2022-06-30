@extends('admin.layout.app')

@section('title')
Make Sales
@endsection

@section('content')
{{-- @include('admin.layout.statboard') --}}
@include('admin.layout.statboardcontainer')
<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">

        <div class="row">
            <div class="col-md-8">
               @include('admin.messages.success')

                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">

                        <div>
                            <form action="{{ route('orders.store') }}" method="post">
                                @csrf

                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Selling Price (&#8358;)</th>
                                            <th>Qty.</th>
                                            <th>Total (&#8358;)</th>
                                            <th>
                                                <a href="#" class="btn btn-sm btn-success add_more">
                                                    <span class="fa fa-plus"></span>
                                                </a>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="addMoreProduct">

                                        <tr>
                                            <td>
                                                <select name="product_id[]" class="form-control product_id" required autofocus>
                                                    <option value="">Select Product</option>
                                                    @foreach ($products as $product)
                                                        @if ($user->branch_id==$product->branch_id)
                                                            <option data-price="{{ $product->sellingprice }}"
                                                                value="{{ $product->id }}">
                                                                {{ $product->name .' ['.$product->quantity.' in Stock]' }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" name="unitprice[]" id="unitprice"
                                                    class="form-control unitprice" pattern="[0-9]+" readonly>
                                            </td>

                                            <td>
                                                <input type="text" name="quantity[]" id="quantity"
                                                    class="form-control quantity" pattern="[0-9]+" required>
                                            </td>


                                            <td>
                                                <input type="text" name="totalamount[]" id="totalamount"
                                                    class="form-control totalamount" readonly>
                                            </td>
                                            <td>
                                                <a href="#" class="btn btn-danger btn-sm">
                                                    <span class="fa fa-times"></span>
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <div class="col-md-4">

                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <h3 class="panel-title"> Total : <strong> &#8358;<b class="total">0.00</b></strong>
                                </h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <button type="button" onclick="printReceipt('print')"
                                        class="btn btn-primary btn-sm"><span class="fa fa-print"></span> Print</button>
                                    </div>
                                    {{-- <div class="col-md-3">
                                        <button type="button" class="btn btn-danger btn-sm"><span
                                            class="fa fa-refresh"></span> History</button>
                                    </div> --}}
                                    <div class="col-md-3">
                                        
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-sm btn-success dropdown-toggle"
                                            id="dropdownMenu1" data-toggle="dropdown"><span
                                                class="fa fa-bar-chart"></span> Reports  <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu pull-right" role="menu"
                                            aria-labelledby="dropdownMenu1">
                                            <li role="presentation">
                                                <a role="menuitem" tabindex="-1" href="{{ route('daily') }}">Daily</a>
                                            </li>
                                            <li role="presentation">
                                                <a role="menuitem" tabindex="-1" href="{{ route('weekly') }}">Weekly</a> 
                                            </li>
                                            <li role="presentation"> 
                                                <a role="menuitem" tabindex="-1" href="{{ route('monthly') }}"> 
                                                    Monthly
                                                </a> 
                                            </li>
                                            <li role="presentation"> 
                                                <a role="menuitem" tabindex="-1" href="{{ route('yearly') }}"> 
                                                    Yearly
                                                </a> 
                                            </li>
                                        </ul>
                                    </div>
                                    </div>
                                </div>
                                    
                                                             
                                <br>
             
                                <div class="form-group">
                                    <label for="">Customer Name <strong style="color:red;">*</strong></label>
                                    <input type="text" name="name" class="form-control"
                                        placeholder="Customer Name">
                                </div>
                                <div class="form-group">
                                    <label for="">Customer Phone <strong style="color:red;">*</strong></label>
                                    <input type="text" name="phone" class="form-control"
                                        placeholder="Customer Phone" pattern="[0-9]+" maxlength="11">
                                </div>
                                <div class="form-group">
                                    <label for="">Payment Type <strong style="color:red;">*</strong></label><br>
                                    <input type="radio" name="paymenttype" value="Cash" required> Cash
                                    &nbsp;&nbsp;&nbsp;
                                    <input type="radio" name="paymenttype" value="Credit Card"> Credit Card
                                    &nbsp;&nbsp;&nbsp;
                                    <input type="radio" name="paymenttype" value="Bank Transfer"> Bank Transfer

                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-sm btn-primary btn-block">Sale</button>
                                    {{-- <a href="" class="btn btn-sm btn-danger btn-block">Call Calculator</a> --}}
                                </div>

                            </div>

                        </div>

                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            
            </form>


            {{-- printing area for receipt, history and report  --}}
            <div class="modal">
                <div id="print">
                    @include('admin.reports.receipt')
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