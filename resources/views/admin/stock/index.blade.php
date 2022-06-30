@extends('admin.layout.app')

@section('title')
All Stocks
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
            <a href="{{ route('suppliers.create') }}" class="btn btn-success btn-sm">
                <span class="fa fa-user"></span> Add Supplier
            </a>
            <a href="{{ route('importfilepage') }}" class="btn btn-success btn-sm">
                <span class="fa fa-arrow-circle-o-down"></span> Import from Excel
            </a>
            <a href="{{ route('export.products') }}" class="btn btn-warning btn-sm">
               <span class="fa fa-mail-forward"></span> Export to Excel
            </a>

            {{--  printing available stock  --}}
            <a target="_blank" href="{{ route('print.stock') }}" class="btn btn-primary btn-sm btnprnt" style="float: right"><span class="fa fa-print"></span>
                Print Stock</a>
        </p>
        
        
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
                                    <th>Code</th>
                                    <th>QRCode</th>
                                    <th>Name</th>
                                    <th>Unit Price (&#8358;)</th>
                                    <th>Selling Price (&#8358;)</th>
                                    <th>Qty.</th>
                                    <th>Found In</th>
                                    <th>Reorder?</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($stocks as $stock)

                                <tr>
                                    <td><strong>{{$stock->code}}</strong></td>
                                    <td>{!! QrCode::size(35)->generate($stock->code.' - '.$stock->name.' - '.$stock->sellingprice) !!}</td>
                                    <td>{{$stock->name .' ['.$stock->brand->name.']'}}</td>
                                    <td>{{ number_format($stock->unitprice,2) }}</td>
                                    <td>{{ number_format($stock->sellingprice,2) }}</td>
                                    <td>{{$stock->quantity}}</td>
                                    <td>{{ $stock->branch->address }}</td>
                                    
                                    <td>
                                        @if ($stock->quantity>$stock->reorderlevel)
                                        <span class="badge badge-success badge-pill"
                                        style="background-color: green; color:seashell"> No</span>
                                    @elseif($stock->quantity>5)
                                    <span class="badge badge-success badge-pill"
                                    style="background-color: green; color:seashell"> No</span>
                                    @else
                                        <span class="badge badge-danger badge-pill"
                                        style="background-color: red; color:seashell"> Reorder</span>
                                    @endif
                                    </td>

                                     <td>
                                          <div class="dropdown"> <button type="button"
                                                class="btn btn-primary btn-sm dropdown-toggle" id="dropdownMenu1"
                                                data-toggle="dropdown"> Action &nbsp;&nbsp;<span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                                                <li role="presentation"> <a data-toggle="modal" data-target="#modal-default-edit-price-{{ $stock->id }}" role="menuitem" tabindex="-1"
                                                    href=""><span class="fa fa-pencil-square"></span> Edit Price</a> 
                                                </li>
                                                <li role="presentation"> <a data-toggle="modal" data-target="#modal-default-edit-qty-{{ $stock->id }}" role="menuitem" tabindex="-1"
                                                    href=""><span class="fa fa-pencil-square"></span> Edit Quantity</a> 
                                                </li>

                                                <li role="presentation"> <a role="menuitem" tabindex="-1"
                                                        href="{{ route('stocks.show',$stock->id) }}"><span
                                                            class="fa fa-eye"></span> View</a> </li>
                                                <li role="presentation"> <a role="menuitem" tabindex="-1"
                                                        href="{{ route('stocks.edit',$stock->id) }}"><span
                                                            class="fa fa-pencil-square"></span> Edit Stock</a> </li>

                                                <form id="remove-{{$stock->id}}" style="display: none"
                                                    action="{{ route('stocks.destroy',$stock->id) }}" method="post">
                                                    {{ csrf_field() }}
                                                    {{method_field('DELETE')}}
                                                </form>

                                                <li role="presentation">
                                                    <a role="menuitem" tabindex="-1" href="" onclick="
                                                                if (confirm('Delete this?')) {
                                                                    event.preventDefault();
                                                                document.getElementById('remove-{{$stock->id}}').submit();
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

                                {{-- Edit stock quantity input modal area --}}
                               <div class="modal fade" id="modal-default-edit-qty-{{ $stock->id }}">
                                   <div class="modal-dialog">
                                       <form action="{{ route('products.editstockqty',$stock->id) }}" method="post">
                                           @csrf
                                           @method('put')
                                           <div class="modal-content">
                                               <div class="modal-header">
                                                   <button type="button" class="close" data-dismiss="modal"
                                                       aria-label="Close">
                                                       <span aria-hidden="true">&times;</span></button>
                                                   <h4 class="modal-title"><span class="fa fa-tag"></span> Edit Stock Quantity</h4>
                                               </div>
                                               <div class="modal-body">
                                                   <h4>
                                                       {{ $stock->name }}
                                                   </h4>
                                                   <div class="form-group">
                                                       <label for="">Quantity <strong style="color:red;">* [only
                                                               numeric digits]</strong></label>
                                                       <input type="text" class="form-control" name="quantity"
                                                           value="{{ $stock->quantity }}" required
                                                           placeholder="Quantity" pattern="[0-9]+" maxlength="5">
                                                   </div>

                                               </div>
                                               <div class="modal-footer">
                                                   <button type="button" class="btn btn-danger btn-sm"
                                                       data-dismiss="modal">Close</button>
                                                   <button type="submit" class="btn btn-primary btn-sm">Update</button>
                                               </div>
                                           </div>
                                           <!-- /.modal-content -->
                                       </form>
                                   </div>
                                   <!-- /.modal-dialog -->
                               </div>
                               <!-- /.modal -->


                                {{-- Edit stock price input modal area --}}
                               <div class="modal fade" id="modal-default-edit-price-{{ $stock->id }}">
                                   <div class="modal-dialog">
                                       <form action="{{ route('products.editstockprice',$stock->id) }}" method="post">
                                           @csrf
                                          @method('put')
                                           <div class="modal-content">
                                               <div class="modal-header">
                                                   <button type="button" class="close" data-dismiss="modal"
                                                       aria-label="Close">
                                                       <span aria-hidden="true">&times;</span></button>
                                                   <h4 class="modal-title"><span class="fa fa-tag"></span> Edit Stock Price</h4>
                                               </div>
                                               <div class="modal-body">
                                                   <h4>
                                                       {{ $stock->name }}
                                                   </h4>
                                                   <div class="form-group">
                                                       <label for="">Cost Price <strong style="color:red;">* [only
                                                               numeric digits]</strong></label>
                                                       <input type="text" class="form-control" name="unitprice"
                                                           value="{{ $stock->unitprice }}" required
                                                           placeholder="Cost Price" pattern="[0-9]+" maxlength="5">
                                                   </div>
                                                   <div class="form-group">
                                                       <label for="">Selling price <strong style="color:red;">* [only
                                                               numeric digits]</strong></label>
                                                       <input type="text" class="form-control" name="sellingprice"
                                                           value="{{ $stock->sellingprice }}" required
                                                           placeholder="Selling price" pattern="[0-9]+" maxlength="5">
                                                   </div>

                                               </div>
                                               <div class="modal-footer">
                                                   <button type="button" class="btn btn-danger btn-sm"
                                                       data-dismiss="modal">Close</button>
                                                   <button type="submit" class="btn btn-primary btn-sm">Update</button>
                                               </div>
                                           </div>
                                           <!-- /.modal-content -->
                                       </form>
                                   </div>
                                   <!-- /.modal-dialog -->
                               </div>
                               <!-- /.modal -->
                                @endforeach
                            </tbody>
                           
                        </table>

                                
                                
                            </div>
                            
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
    

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