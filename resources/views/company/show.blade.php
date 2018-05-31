@extends('layouts.app')

@section('content')
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>{{ __('item.name') }}</th>
                <th>{{ __('item.quantity') }}</th>
                <th>{{ __('item.buy_price') }}</th>
                <th>{{ __('item.sell_price') }}</th>
                <th>{{ __('item.updated_at') }}</th>
                <th>{{ __('general.action') }}</th>
            </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                    <tr>
                        <td>{{ $item['id'] }}</td>
                        <td>{{ $item['name'] }}</td>
                        <td>{{ $item['quantity'] }}</td>
                        <td>{{ number_format($item['buy_price'], 2) }}</td>
                        <td>{{ number_format($item['sell_price'], 2) }}</td>
                        <td>{{ date('d/m/Y H:i', strtotime($item['updated_at'])) }}</td>
                        <td>
                            <a href="{{url('item/'. $item['id'] . '/edit')}}"  class="btn btn-primary">
                                {{ __('general.edit') }}
                            </a>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
@endsection