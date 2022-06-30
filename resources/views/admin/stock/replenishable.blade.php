@extends('admin.layout.app')

@section('title')
Replenishable Stocks
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
                Add Stock
            </a>


            {{-- printing available stock  --}}
            {{-- <a target="_blank" href="{{ route('print.stock') }}" class="btn btn-primary btn-sm btnprnt"
            style="float: right"><span class="fa fa-print"></span>
            Print Stock</a> --}}
        </p>


        <div class="row">
            <div class="col-md-12">
                @include('admin.messages.success')
                @include('admin.messages.deleted')
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">

                       @if ($replenishablestocks->count())
                       <table id="example1" class="table table-responsive table-bordered table-striped">
                           <thead>
                               <tr>
                                   <th>Code #</th>
                                   <th>Name</th>
                                   <th>Unit Price (&#8358;)</th>
                                   <th>Qty.</th>
                                   <th>Found In</th>
                                   <th>Reorder?</th>
                                   <th>Action</th>
                               </tr>
                           </thead>
                           <tbody>
                               @foreach ($replenishablestocks as $stock)

                               <tr>
                                   <td><strong>{{$stock->code}}</strong></td>
                                   <td>{{$stock->name}}</td>
                                   <td>{{ number_format($stock->unitprice,2) }}</td>
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
                                       <a data-toggle="modal" data-target="#modal-default-{{ $stock->id }}" href=""
                                           class="btn btn-success btn-sm btn-block"><span class="fa fa-tag"></span>
                                           Replenish</a>
                                   </td>

                               </tr>

                               {{-- Replenish stock quantity input modal area --}}
                               <div class="modal fade" id="modal-default-{{ $stock->id }}">
                                   <div class="modal-dialog">
                                       <form action="{{ route('replenishstock',$stock->id) }}" method="post">
                                           @csrf
                                           <div class="modal-content">
                                               <div class="modal-header">
                                                   <button type="button" class="close" data-dismiss="modal"
                                                       aria-label="Close">
                                                       <span aria-hidden="true">&times;</span></button>
                                                   <h4 class="modal-title"><span class="fa fa-tag"></span> Replenish
                                                       Stock</h4>
                                               </div>
                                               <div class="modal-body">
                                                   <h4>
                                                       {{ $stock->name }}
                                                   </h4>
                                                   <div class="form-group">
                                                       <label for="">Quantity <strong style="color:red;">* [only
                                                               numeric digits]</strong></label>
                                                       <input type="text" class="form-control" name="quantity"
                                                           value="{{ old('quantity') }}" required
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



                               @endforeach
                           </tbody>

                       </table>
                           
                       @else
                        <span class="badge badge-pill badge-primary" style="background-color: red; color:whitesmoke">No stock to be replenished!</span>
                       @endif




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