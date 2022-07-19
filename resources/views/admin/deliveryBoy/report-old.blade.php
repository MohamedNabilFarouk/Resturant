
@extends('admin.layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <div class="well col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <address>
                        <strong>{{ $delivery_boy -> name }}</strong>
                        <br>
                        <strong> @lang('site.to'): </strong>   {{ $delivery_boy -> user -> name  }}
                    </address>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                    <p>
                        <em>@lang('site.At'): {{Carbon\Carbon::now()->format('Y-m-d H:i:s')}}</em>
                    </p>
                    <p>
                        <em>@lang('site.Delivery ID'): {{$delivery_boy -> id }}</em>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="text-center">
                    <h1>@lang('site.Delivery Report')</h1>
                </div>
                <table class="table table-hover table-hover" style="width: 100%;">
                    <thead>
                        <tr class="text-center border-3 m-auto w-100">
                            <th class="w-25">{{ trans('site.Date') }}</th>
                            <th>@lang('site.Order Count')</th>
                            <th>@lang('site.Total')</th>
                        </tr>
                    </thead>
                    <tbody class="border-3">
                        @foreach($daily_orders as $index => $order)
                        <tr class="text-center border-3 m-auto">
                            <td>{{ $index }}</td>
                            <td class="col-md-9"><em>{{ $order -> count() }}</em></td>
                            <td class="col-md-9"><em>{{ $order -> count() * $fees }}</em></td>
                        </tr>
                        @endforeach

                        <tr class="text-center border-3 m-auto">
                            <td>{{ trans('site.Last Week') }}</td>
                            <td class="col-md-9"><em>{{--{{ $delivery_boy -> orders -> where('status', 'Delivered') -> count() }}--}} {{ $weekly_orders -> count() }}</em></td>
                            <td class="col-md-9"><em>{{ $weekly_orders -> count() * $fees }}</em></td>
                        </tr>

                    </tbody>
                </table>

                <button type="button" class="btn btn-info col-4 m-auto">
                    <a href="" class="text-white">@lang('site.Update')</a>  
                    <span class="glyphicon glyphicon-chevron-right"></span>
                </button>

                <button type="button" class="btn btn-success col-4 m-auto" onclick="window.print()">
                    @lang('site.Print')   <span class="glyphicon glyphicon-chevron-right"></span>
                </button>

                <!-- <button onclick="window.print()">Print this page</button> -->
            </div>
        </div>
    </div>


@endsection
