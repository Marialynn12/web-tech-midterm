<div class="table-responsive">
    <table class="table" id="waterBills-table">
        <thead>
            <tr>
                <th>House Number</th>
        <th>Month</th>
        <th>Payment</th>
        <th>Balance</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($waterBills as $waterBill)
            <tr>
                <td>{{ $waterBill->house_number }}</td>
            <td>{{ $waterBill->month }}</td>
            <td>{{ $waterBill->payment }}</td>
            <td>{{ $waterBill->balance }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['waterBills.destroy', $waterBill->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('waterBills.show', [$waterBill->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('waterBills.edit', [$waterBill->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
