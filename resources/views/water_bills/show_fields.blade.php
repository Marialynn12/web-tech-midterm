<!-- House Number Field -->
<div class="col-sm-12">
    {!! Form::label('house_number', 'House Number:') !!}
    <p>{{ $waterBill->house_number }}</p>
</div>

<!-- Month Field -->
<div class="col-sm-12">
    {!! Form::label('month', 'Month:') !!}
    <p>{{ $waterBill->month }}</p>
</div>

<!-- Payment Field -->
<div class="col-sm-12">
    {!! Form::label('payment', 'Payment:') !!}
    <p>{{ $waterBill->payment }}</p>
</div>

<!-- Balance Field -->
<div class="col-sm-12">
    {!! Form::label('balance', 'Balance:') !!}
    <p>{{ $waterBill->balance }}</p>
</div>

