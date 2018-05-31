@extends('layouts.app')
@section('page-title')
    {{ __('general.nav.new') }} Inventory
@endsection
@section('content')
<br />
{{ Form::label('quantity', 'Quantity') }}
{{ Form::number('quantity', 0, ['class' => 'form-control', 'required'=>'true']) }}
<br />
{{ Form::label('buy_price', 'Buy Price') }}
{{ Form::text('buy_price', number_format(0, 2, '.', ''), ['class' => 'form-control', 'required'=>'true']) }}
<br />
{{ Form::label('sell_price', 'Sell Price') }}
{{ Form::text('sell_price', number_format(0, 2, '.', ''), ['class' => 'form-control', 'required'=>'true']) }}
<br />
@endsection