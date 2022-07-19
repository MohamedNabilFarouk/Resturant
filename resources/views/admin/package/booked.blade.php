@extends('admin.layouts.app')


@section('toolbar')
<div class="toolbar" id="kt_toolbar">
    <!--begin::Container-->
    <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
        <!--begin::Page title-->
        <div class="d-flex align-items-center me-3">
            <!--begin::Title-->
            <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">@lang('site.package')
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
            <span class="card-label fw-bolder fs-3 mb-1">@lang('site.All') @lang('site.Booked Packages')</span>
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
                        <th class="ps-4 min-w-325px rounded-start">@lang('site.name')</th>
                        <th class="ps-4 min-w-325px rounded-start">@lang('site.User Data')</th>
                        <!-- <th class="min-w-125px">Details Ar</th> -->
                        <th class="min-w-125px">@lang('site.Price')</th>
                        <th class="min-w-125px">@lang('site.Date')</th>
                        <th class="min-w-125px">@lang('site.Type')</th>
                        <th class="min-w-125px">@lang('site.Extra')</th>
                        <th class="min-w-125px">@lang('site.is_paid')</th>
                        <th class="min-w-125px rounded-end">@lang('site.actions')</th>
                    </tr>
                </thead>
                <!--end::Table head-->
                <!--begin::Table body-->
                <tbody>
                @foreach($packages as $c)
                    <tr class="text-center border-3 m-auto">
                         <td class="px-3">
                            <div class="d-flex align-items-center">
                                <div class="symbol symbol-50px me-5">
                                    <img src="{{ $c->package-> image }}" class="" alt="No image" />
                                </div>
                                <div class="d-flex flex-column">
                                    <a href="{{ route('package.edit', $c->package->id) }}" class="text-dark fw-bolder text-hover-primary mb-1 fs-6">{{$c->package->name_en}}</a>
                                    <span class="text-muted fw-bold text-muted d-block fs-7">{{$c->package->name_ar}}</span>
                                    <span class="text-muted fw-bold text-muted d-block fs-7">{{$c->package->des_ar ?? $c->package->des_en }}</span>

                                </div>
                            </div>
                        </td>

                         <td class="px-3">
                            <div class="d-flex align-items-center">
                                <div class="symbol symbol-50px me-5">
                                <a href="#" class="text-dark fw-bolder text-hover-primary mb-1 fs-6">{{ $c->name ?? $c->user->name}}</a>

                                </div>
                                <div class="d-flex flex-column">
                                    <span class="text-muted fw-bold text-muted d-block fs-6">{{ $c->phone ?? $c->user->phone}}</span>
                                    <span class="text-muted fw-bold text-muted d-block fs-6">{{$c->address }}</span>

                                </div>
                            </div>
                        </td>
                        <!--  <td class="px-3">{!!$c->package->des_ar!!}</td> -->
                         <td class="px-3">{{$c->total}}  @lang('site.LE')</td>
                         <td class="px-3">{{$c->date}}</td>

                         <td class="px-3">{{$c->type}}</td>
                         <td class="px-3">{{$c->note}}</td>



                         <td class="px-3">
                        @if($c->is_paid == 1)
                            <span class="badge badge-light-primary fs-7 fw-bold">@lang('site.Paid')</span>
                            @else
                            <span class="badge badge-light-primary fs-7 fw-bold">@lang('site.Not paid')</span>
                            @endif

                        </td>

                         <td class="px-3">

                            <a href="{{ route('booked.package.details', $c -> id) }}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1 bg-primary">
                                <!--begin::Svg Icon | path: icons/stockholm/Communication/Write.svg-->
                                <span class="svg-icon svg-icon-3 ">
                                    <i class="fa fa-eye text-white"></i>
                                </span>
                                <!--end::Svg Icon-->
                            </a>

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
@endsection



	<!--begin::Tables Widget 11-->
