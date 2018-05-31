@extends('layouts.app')
@section('page-title')
    @if (is_null($brand->id)) {{ __('general.nav.new') }} @else {{ __('general.edit') }} @endif
    {{ __('brand.title') }}
@endsection
@section('content')
    <hr />

    {{ Form::model($brand, $arrRoute) }}
        {{ Form::label('name', __('brand.title')) }}
        {{ Form::text('name', $brand->name, ['class' => 'form-control', 'required']) }}
        {{ Form::label('image', __('general.logo')) }}
        @if($brand->id)
            <br />
            <img src="{{asset($brand->img_logo)}}" />
            {{ Form::hidden('img_logo_hidden', $brand->img_logo) }}
        @endif
        {{ Form::file('image') }}
        <br />
        {{ Form::submit(__('general.save'), ['class' => 'form-control btn btn-primary']) }}
    {{Form::close()}}
@endsection