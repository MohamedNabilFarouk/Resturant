@extends('admin.layouts.app')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


@section('toolbar')
<div class="toolbar" id="kt_toolbar">
    <!--begin::Container-->
    <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
        <!--begin::Page title-->
        <div class="d-flex align-items-center me-3">
            <!--begin::Title-->
            <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">@lang('site.orders')
            <!--begin::Separator-->
            <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
            <!--end::Separator-->
            <!--begin::Description-->
            <small class="text-muted fs-7 fw-bold my-1 ms-1"></small>
            <!--end::Description--></h1>
            <!--end::Title-->
        </div>
        <!--end::Page title-->

    </div>
    <!--end::Container-->
</div>
@endsection

@section('content')

<div class="card rounded mb-5 mb-xl-8 shadow-lg">
    <!--begin::Header-->
    <div class="card-header rounded border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bolder fs-3 mb-1">@lang('site.All') @lang('site.orders')</span>
        </h3>
      
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body py-3">

        @include('admin.includes.messages')

        <!--begin::Table container-->
        <div class="table-responsive rounded">
            <!--begin::Table-->
            <table class="table table-hover align-middle gs-0 gy-4">
                <!--begin::Table head-->
                <thead>
                    <tr class="text-center border-3 fw-bolder text-muted bg-light">
                        <th class="min-w-125px">@lang('site.Order No')</th>
                        <th class="min-w-125px">@lang('site.date')</th>
                        <th class="min-w-125px">@lang('site.branch')</th>
                        <th class="min-w-125px">@lang('site.Customer Name')</th>
                        <th class="min-w-125px">@lang('site.Customer phone')</th>
                        <th class="min-w-125px">@lang('site.Type')</th>
                        <th class="min-w-125px">@lang('site.address')</th>
                        <th class="min-w-125px">@lang('site.Total')</th>

                        <th class="min-w-150px">@lang('site.status')</th>
                        <th class="min-w-150px">@lang('site.Assign To')</th>
                        <th class="min-w-200px text-start rounded-end">@lang('site.actions')</th>
                    </tr>
                </thead>
                <!--end::Table head-->
                <!--begin::Table body-->
                <tbody>
                @foreach($orders as $index => $c)
                    <tr class="text-center border-3 m-auto">
                         <td class="px-3">


                       <span class="text-dark fw-bolder text-hover-primary mb-1 fs-6">{{$c->id}}</span>


                        </td>
                         <td class="px-3">
                        <span class="text-muted fw-bold text-muted d-block fs-7">{{$c->created_at}}</span>
                        </td>
                         <td class="px-3">

                        <span class="text-dark fw-bolder text-hover-primary mb-1 fs-6">{{$c->branch->name_en}}</span>

                        </td>

                         <td class="px-3">

                       <span class="text-dark fw-bolder text-hover-primary mb-1 fs-6">{{$c->user->name ?? ''}}</span>

                       </td>


                        <td class="px-3">

                       <span class="text-dark fw-bolder text-hover-primary mb-1 fs-6">{{$c->user->phone ?? ''}}</span>

                       </td>

                        <td class="px-3">

                       <span class="text-dark fw-bolder text-hover-primary mb-1 fs-6">{{$c->type}}</span>

                       </td>

                        <td class="px-3">

                       <span class="text-dark fw-bolder text-hover-primary mb-1 fs-6">{{$c->address}}</span>

                       </td>

                        <td class="px-3">

                       <span class="text-dark fw-bolder text-hover-primary mb-1 fs-6">{{$c->total}} LE</span>

                       </td>
                        <form action="{{ route('order.update', $c->id) }}" method='post' id='status_form{{$index}}'>
                        <input type='hidden' id='order_id' value='{{$c->id}}' name='id'>
                        @csrf
                        @method('put')
                         <td class="px-3">
                        <!-- <span class="badge badge-light-primary fs-7 fw-bold">{{$c->status}}</span> -->
                        <select class="form-control"  name='status' id='sel_status{{$index}}'>
                                <!-- <option>Update Status</option> -->
                            <option value='Pending' @if($c->status == 'Pending') selected @endif >@lang('site.Pending')</option>
                            <option value='Confirmed' @if($c->status == 'Confirmed') selected @endif >@lang('site.Confirmed')</option>
                            <option value='On Delivery' @if($c->status == 'On Delivery') selected @endif >@lang('site.On Delivery')</option>
                            <option value='Delivered' @if($c->status == 'Delivered') selected @endif >@lang('site.Delivered')</option>

                        </select>

                        </td>
                        </form>


                            <script>
                                $(document).ready(function(){
                                    $('#sel_status{{$index}}').change(function(){
                                        // var id = $('#order_id').val();

                                        $("#status_form{{$index}}").submit();
                                    });
                                });
                            </script>
                        <form action="{{ route('order.assign', $c->id) }}" method='post' id='delivery_form{{$index}}'>
                         <input type='hidden' id='order_id' value='{{$c->id}}' name='id'>
                         @csrf
                        @method('put')
                         <td class="px-3">

                            @if($c->status == 'Pending')

                                <select class="form-control"  name='delivery_id' id='sel_delivery{{$index}}'>
                                        <option value="">@lang('site.Assign Order To Delivery Boy')</option>
{{--                                        <option value="0">@lang('site.choose DB randomly')</option>--}}
                                        @foreach($delivery as $d)
                                            <option value='{{$d->id}}' {{ $d -> id = $c -> delivery_id ? 'selected' : '' }}>{{ $d -> user -> name }}</option>
                                        @endforeach

                                </select>
                            @else
                               <span class="text-dark fw-bolder text-hover-primary mb-1 fs-6">{{$c->delivery->user->name ?? ''}}</span>
                            @endif

                            <script>
                                        $(document).ready(function(){
                                            $('#sel_delivery{{$index}}').change(function(){
                                                // var id = $('#order_id').val();

                                                $("#delivery_form{{$index}}").submit();
                                        });
                                    });
                            </script>

                        </td>
                        </form>
                        <td class="text-start">

                            <a href="{{ route('order.print', $c->id) }}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                            <i class="fa fa-print"></i>
                            </a>
                            <form action="{{ route('order.destroy', $c->id) }}" method="post" id='delform' style="display: inline-block">
                                @csrf
                                @method('delete')


                                <button type="submit" class="btn btn-defult btn-xs delete" style='width:20px'><i class="fa fa-trash"></i> </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
                <!--end::Table body-->
            </table>
            <!--end::Table-->
        </div>
        <!--end::Table container-->
    </div>
    <!--begin::Body-->
</div>
<!--end::Tables Widget 11-->
{!! $orders->render() !!}

@endsection
