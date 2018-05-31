@extends('layouts.app')

@section('content')
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>{{ __('item.nav.item') }}</th>
                <th>{{ __('brand.title') }}</th>
                <th>{{ __('general.updated_at') }}</th>
                <th>{{ __('general.action') }}</th>
            </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>
                            <img src="{{asset($item->img_logo)}}" title="{{ $item->name }}" class="img_logo" />
                            <div class="img_name">{{ $item->name }}</div>
                        </td>
                        <td>
                            <img src="{{asset($item->brand->img_logo)}}" title="{{ $item->brand->name }}" class="img_logo" />
                            <div class="img_name">{{ $item->brand->name }}</div>
                        </td>
                        <td>{{ date('d/m/y H:i', strtotime($item['updated_at'])) }}</td>
                        <td>
                            <a href="{{url('item/'. $item->id . '/edit')}}"  class="btn btn-primary">
                                {{ __('general.edit') }}
                            </a>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
@endsection

@section('js-files')
<script type="text/javascript" src="{{asset('js/item.js')}}"></script>
@endsection