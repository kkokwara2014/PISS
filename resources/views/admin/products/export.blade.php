<table class="table table-light table-striped table-responsive">
    <thead>
        <tr>
            <th>Code #</th>
            <th>Name[Brand]</th>
            <th>Unit Price (&#8358;)</th>
            <th>Selling Price (&#8358;)</th>
            <th>Qty.</th>
            <th>Found In (Branch)</th>
            <th>Reorder?</th>
            <th>Date (Y-m-d h:m:s)</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $stock)
        <tr>
            <td><strong>{{$stock->code}}</strong></td>
            <td>{{$stock->name.' ['.$stock->brand->name.']'}}</td>
            <td>{{ number_format($stock->unitprice,2) }}</td>
            <td>{{ number_format($stock->sellingprice,2) }}</td>
            <td>{{$stock->quantity}}</td>
            <td>{{ $stock->branch->address }}</td>

            <td>
                @if ($stock->quantity>$stock->reorderlevel)
                <span class="badge badge-success badge-pill" style="background-color: green; color:seashell"> No</span>
                @elseif($stock->quantity>5)
                <span class="badge badge-success badge-pill" style="background-color: green; color:seashell"> No</span>
                @else
                <span class="badge badge-danger badge-pill" style="background-color: red; color:seashell">
                    Reorder</span>
                @endif
            </td>
            <td>
                {{ $stock->created_at }}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>