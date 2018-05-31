@extends('layouts.app')
@section('page-title')
    {{ __('general.edit') }} {{ __('item.nav.item') }}
@endsection
@section('content')
    <hr />

    {{ Form::model($item, $arrRoute) }}
        {{ Form::label('company_id', 'Company') }}:
        {{ Form::select('company_id', $companies, $company->id, ['class' => 'form-control select', 'required'=>'true']) }}
        <br />
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', $item->name, ['class' => 'form-control', 'required'=>'true']) }}

        <br />
        {{ Form::label('description', 'Description') }}
        {{ Form::text('description', $item->description, ['class' => 'form-control', 'required'=>'true']) }}
        <div class="form-group box">
            @foreach($item_value as $key => $value)
                @if($key > 0)
        </div>
        <div  class="form-group box">
                @endif
        {{ Form::label('quantity'.$key, 'Quantity') }}
        {{ Form::number('quantity'.$key, $value->quantity, ['class' => 'form-control', 'required'=>'true']) }}
        <br />
        {{ Form::label('buy_price'.$key, 'Buy Price') }}
        {{ Form::text('buy_price'.$key, number_format($value->buy_price, 2, '.', ''), ['class' => 'form-control', 'required'=>'true']) }}
        <br />
        {{ Form::label('sell_price'.$key, 'Sell Price') }}
        {{ Form::text('sell_price'.$key, number_format($value->sell_price, 2, '.', ''), ['class' => 'form-control', 'required'=>'true']) }}
            @endforeach


        </div>
        <br />
        {{ Form::submit('Save', ['class' => 'form-control btn btn-primary']) }}
    {{Form::close()}}
@endsection