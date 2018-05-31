@extends('layouts.app')
@section('page-title')
    {{ __('general.nav.new') }} {{ __('item.nav.item') }}
@endsection
@section('content')
    <hr />

    {{ Form::model($item, $arrRoute) }}
        {{ Form::label('brand_id', $arrLabel['brandLabel']) }}:
        {{ Form::select('brand_id', $brands, $item->brand_id, ['class' => 'form-control', 'required' => 'true']) }}
        <br />
        {{ Form::label('name', $arrLabel['nameLabel']) }}
        {{ Form::text('name', $item->name, ['class' => 'form-control', 'required'=>'true']) }}
        <br />
        {{ Form::label('description', $arrLabel['descLabel']) }}
        {{ Form::text('description', $item->description, ['class' => 'form-control', 'required'=>'true']) }}
        <br />
        {{ Form::label('image', $arrLabel['imageLabel']) }}
        @if($item->id)

            <img src="{{asset($item->img_logo)}}" />
            {{ Form::hidden('img_logo_hidden', $item->img_logo) }}
            <br />
        @endif
        {{ Form::file('image') }}
        <br />
        {{ Form::submit('Save', ['class' => 'form-control btn btn-primary']) }}
    {{Form::close()}}
@endsection