@extends('admin.layouts.app')


@section('toolbar')
    <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div class="d-flex align-items-center me-3">
                <!--begin::Title-->
                <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">@lang('site.package') #{{ $booking -> id }}</h1>
                <!--end::Title-->
            </div>
            <!--end::Page title-->

        </div>
        <!--end::Container-->
    </div>
@endsection

@section('content')

    <div class="card rounded mb-5 mb-xl-8 shadow-lg">
        @include('admin.includes.messages')

    <!--begin::Header-->
        <div class="card-header rounded border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder fs-3 mb-1">@lang('site.package') @lang('site.for') {{ $booking -> user -> name }}</span>
            </h3>
            <h3 class="@if($booking -> status == 'Pending') text-info @elseif($booking -> status == 'Confirmed') text-primary @elseif($booking -> status == 'Completed') text-success @else text-danger @endif">{{ $booking -> status }}</h3>

        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body py-3">
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <address>
                        <strong>{{$booking -> branch->name_en}}</strong>
                        <br>
                        <strong> @lang('site.to'): </strong>   {{--{{$booking -> address}}--}} address
                        <br>
                        <abbr title="Phone">@lang('site.Customer phone'):</abbr> {{ $booking -> user -> phone}}
                    </address>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                    <p>
                        <em>@lang('site.day'): {{ $booking -> date }}</em>
                    </p>
                    <p>
                        <em>@lang('site.package name'): {{ $booking -> package['name_' . LaravelLocalization::getCurrentLocale() ] }}</em>
                    </p>
                </div>
            </div>
            <div class="row">

                <table class="table table-hover table-hover">
                    <thead>

                    <tr class="text-center border-3 m-auto">
                        <th>@lang('site.package name'): {{ $booking -> package['name_' . LaravelLocalization::getCurrentLocale() ] }}</th>
                        <th class="text-center">@lang('site.Price')</th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr class="text-center border-3 m-auto">
                        <td class="col-md-9"><h4><em>{{ $booking -> package['des_' . LaravelLocalization::getCurrentLocale() ] }}</em></h4></td>
                        <td class="col-md-1 text-center">&pound; {{ $booking -> total }}</td>
                    </tr>

                    </tbody>
                </table>

                <form action="{{ route('updateBookingStatus', $booking -> id ) }}" method='post' id='booking_status' class="row">
                    <input type='hidden' id='booking_id' value='{{ $booking -> id }}' name='id'>

                    @csrf
                    @method('put')

                    @if($booking -> status != 'Completed')

                        @if($booking -> status != 'Pending' && $booking -> status != 'Declined')
                        <button type="submit" class="col-2 m-auto btn btn-info btn-lg" name="status" value="Pending">
                            @lang('site.pending order')   <span class="glyphicon glyphicon-chevron-right"></span>
                        </button>
                        @endif

                        @if($booking -> status != 'Confirmed')
                        <button type="submit" class="col-2 m-auto btn btn-primary btn-lg" name="status" value="Confirmed">
                            @lang('site.confirm order')   <span class="glyphicon glyphicon-chevron-right"></span>
                        </button>
                        @endif

                        @if($booking -> status == 'Confirmed')
                        <button type="submit" class="col-3 m-auto btn btn-success btn-lg" name="status" value="Completed">
                            @lang('site.finish order')   <span class="glyphicon glyphicon-chevron-right"></span>
                        </button>
                        @endif

                        @if($booking -> status != 'Confirmed' && $booking -> status != 'Declined')
                            <button type="submit" class="col-2 m-auto btn btn-danger btn-lg" name="status" value="Declined">
                                @lang('site.decline order')   <span class="glyphicon glyphicon-chevron-right"></span>
                            </button>
                        @endif

                    @endif





                </form>

            </div>
        </div>
        <!--begin::Body-->
    </div>
    <!--end::Tables Widget 11-->
@endsection



<!--begin::Tables Widget 11-->
