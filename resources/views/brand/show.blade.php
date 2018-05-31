@extends('layouts.app')

@section('content')
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>{{ __('brand.logo') }}</th>
                <th>{{ __('brand.title') }}</th>
                <th>{{ __('general.action') }}</th>
            </tr>
            </thead>
            <tbody>
                @foreach($brands as $brand)
                    <tr>
                        <td>{{ $brand['id'] }}</td>
                        <td><img src="{{asset($brand['img_logo'])}}"></td>
                        <td>{{ $brand['name'] }}</td>
                        <td>
                            <a href="{{url('brand/'. $brand['id'] . '/edit')}}"  class="btn btn-primary">
                                {{ __('general.edit') }}
                            </a>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
@endsection