@extends('layouts.app')
@section('page-title')
    @if (is_null($company->id)) {{ __('general.nav.new') }} @else {{ __('general.edit') }} @endif
    {{ __('company.title') }}
@endsection
@section('content')
    <hr />

    {{ Form::model($company, $arrRoute) }}
        {{ Form::label('name', __('company.name')) }}
        {{ Form::text('name', $company->name, ['class' => 'form-control', 'required']) }}
        {{ Form::label('img_logo', __('company.img_logo')) }}
        {{ Form::file('image') }}
        <br />
        {{ Form::submit(__('general.save'), ['class' => 'form-control btn btn-primary']) }}
    {{Form::close()}}
@endsection