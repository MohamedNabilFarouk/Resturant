@extends('admin.layouts.app')


@section('toolbar')
<div class="toolbar" id="kt_toolbar">
    <!--begin::Container-->
    <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
        <!--begin::Page title-->
        <div class="d-flex align-items-center me-3">
            <!--begin::Title-->
            <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">@lang('site.table_reservations')
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
@include('admin.layouts.inc-messages')

<div class="card rounded mb-5 mb-xl-8 shadow-lg">
    <!--begin::Header-->
    <div class="card-header rounded border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bolder fs-3 mb-1">@lang('site.table_reservations')</span>
        </h3>
        
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body py-3">
        <!--begin::Table container-->
        <div class="table-responsive rounded">
            <!--begin::Table-->
            <table class="table table-hover align-middle gs-0 gy-4">
                <!--begin::Table head-->
                <thead>
                    <tr class="text-center border-3 fw-bolder text-muted bg-light">
                    <th class="min-w-125px">@lang('site.Order No')</th>
                        <th class="min-w-125px">@lang('site.name')</th>
                        <th class="min-w-125px"> @lang('site.phone')</th>
                        <th class="ps-4 min-w-325px rounded-start"> @lang('site.user_data')</th>
                        <th class="min-w-125px">@lang('site.no_of_persons')</th>
                        <th class="min-w-125px">@lang('site.date')</th>
                        <th class="min-w-125px">@lang('site.Extra')</th>
                        <th class="min-w-125px">@lang('site.status')</th>

                        <th class="min-w-125px rounded-end">@lang('site.actions')</th>
                    </tr>
                </thead>
                <!--end::Table head-->
                <!--begin::Table body-->
                <tbody>
                @foreach($reservation as $index=>$c)
                    <tr class="text-center border-3 m-auto">
                    <td class="px-3">{!!$c->id + 1!!}</td>
                         <td class="px-3">{!!$c->name ?? ''!!}</td>
                         <td class="px-3">{!!$c->phone!!}</td>
                         <td class="px-3">
                            <div class="d-flex align-items-center">
                                <div class="symbol symbol-50px me-5">
                                <a href="#" class="text-dark fw-bolder text-hover-primary mb-1 fs-6">{{$c->user->name ?? ''}}</a>
                                </div>
                                <br>
                                <div class="d-flex flex-column">
                                    <span class="text-muted fw-bold text-muted d-block fs-6">{{$c->user->email ?? ' '}}</span>
                                    <span class="text-muted fw-bold text-muted d-block fs-6">{{$c->user->address ?? '' }}</span>
                                </div>
                            </div>
                        </td>
                         <td class="px-3">{!!$c->no_of_persons!!}</td>
                         <td class="px-3">{!!$c->time!!}</td>
                         <td class="px-3">{!!$c->note!!}</td>

                          <form action="{{ route('booking.confirmation')}}" method='post' id='status_form{{$index}}'>
                        <input type='hidden' id='order_id' value='{{$c->id}}' name='id'>
                        @csrf
                        @method('put')
                         <td class="px-3">
                        <!-- <span class="badge badge-light-primary fs-7 fw-bold">{{$c->status}}</span> -->
                        <select class="form-control"  name='status' id='sel_status{{$index}}'>
                                <!-- <option>Update Status</option> -->
                            <option value='0' @if($c->status == '0') selected @endif >@lang('site.Pending')</option>
                            <option value='1' @if($c->status == '1') selected @endif >@lang('site.Confirmed')</option>
                            <option value='2' @if($c->status == '2') selected @endif >@lang('site.Rejected')</option>
                           
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

                         <td class="px-3">

                           
                            <form action="{{ route('TableReservations.destroy', $c->id) }}" method="post" id='delform' style="display: inline-block">
                                @csrf
                                @method('delete')


                                <button type="submit" class="btn btn-defult btn-xs delete" style='width:20px'><i class="fa fa-trash"></i></button>
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
{!! $reservation->render() !!}

@endsection



	<!--begin::Tables Widget 11-->
