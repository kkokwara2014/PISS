@extends('admin.layout.app')

@section('title')
Purchase Summary
@endsection

@section('content')
{{-- @include('admin.layout.statboard') --}}
@include('admin.layout.statboardcontainer')
<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">
        <p>
        {{-- <a href="{{ route('stocks.create') }}" class="btn btn-primary btn-sm">
            <span class="fa fa-tag"></span> Add Stock
            </a> --}}
Purchase (Qty) :              <span class="badge badge-primary badge-pill" style="background-color: rgb(35, 112, 175); color: whitesmoke; font-size:16px">{{ $totalstocks }}</span>
            

            {{--  counting available stock  --}}
            <span style="float: right">
                Purchase (Amt) : <span class="badge badge-primary badge-pill" style="background-color: rgb(19, 133, 15); color: whitesmoke; font-size:16px">&#8358;{{ number_format($totalamountofstocks,2) }}</span>
            </span>
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
                                    <th>Code.</th>
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
                                    <td>{{$stock->name}}</td>
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

                                                <li role="presentation"> <a role="menuitem" tabindex="-1"
                                                        href="{{ route('stocks.show',$stock->id) }}"><span
                                                            class="fa fa-eye"></span> View</a> </li>
                                                <li role="presentation"> <a role="menuitem" tabindex="-1"
                                                        href="{{ route('stocks.edit',$stock->id) }}"><span
                                                            class="fa fa-pencil-square"></span> Edit</a> </li>

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