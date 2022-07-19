@extends('admin.layouts.app')


@section('toolbar')
<div class="toolbar" id="kt_toolbar">
    <!--begin::Container-->
    <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
        <!--begin::Page title-->
        <div class="d-flex align-items-center me-3">
            <!--begin::Title-->
            <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">@lang('site.branch')
            <!--begin::Separator-->
            <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
            <!--end::Separator-->
            <!--begin::Description-->
            <small class="text-muted fs-7 fw-bold my-1 ms-1">@lang('site.Edit')</small>
            <!--end::Description--></h1>
            <!--end::Title-->
        </div>
        <!--end::Page title-->

    </div>
    <!--end::Container-->
</div>
@endsection

@section('content')

@include('admin.includes.messages')

        <div class="container-fluid page__container p-2">

            <div class="card rounded card-form__body card-body shadow-lg">
                <form method="post" action="{{ route('branch.update',$branch->id) }}" enctype="multipart/form-data">
                    @csrf
                   @method('put')

                    <div class="form-group mb-10">
                        <label for="exampleFormControlInput1" class="required form-label">@lang('site.name') @lang('site.in English')  </label>
                        <input type='text' name="name_en" class="form-control" value="{{$branch->name_en}}" />
                    </div>
                    <div class="form-group mb-10">
                        <label for="exampleFormControlInput1" class="required form-label">@lang('site.name') @lang('site.in Arabic') </label>
                        <input  type='text' name="name_ar" class="form-control" value="{{$branch->name_ar}}" />
                    </div>



                    <div class="form-group mb-10">
                        <label for="exampleFormControlInput1" class="required form-label">@lang('site.address') @lang('site.in English')  </label>
                        <input type='text' name="address_en" class="form-control" value="{{$branch->address_en}}" />
                    </div>
                    <div class="form-group mb-10">
                        <label for="exampleFormControlInput1" class="required form-label">@lang('site.address') @lang('site.in Arabic') </label>
                        <input  type='text' name="address_ar" class="form-control" value="{{$branch->address_ar}}" />
                    </div>

                    <div class="form-group mb-10">
                        <label for="exampleFormControlInput1" class="required form-label">@lang('site.area') @lang('site.in English')  </label>
                        <input type='text' name="area_en" class="form-control" value="{{$branch->area_en}}" />
                    </div>
                    <div class="form-group mb-10">
                        <label for="exampleFormControlInput1" class="required form-label">@lang('site.area') @lang('site.in Arabic') </label>
                        <input  type='text' name="area_ar" class="form-control" value="{{$branch->area_ar}}" />
                    </div>

                    <div class="form-group mb-10">
                        <label for="exampleFormControlInput1" class="required form-label">@lang('site.phone')</label>
                        <input  type='text' name="phone" class="form-control" value="{{$branch->phone}}" />
                    </div>

                    <div class="form-group mb-10">
                        <label for="exampleFormControlInput1" class="required form-label">@lang('site.Opening Time')</label>
                        <input  type='time' name="opening_time" class="form-control" value="{{$branch->opening_time}}" />
                    </div>

                    <div class="form-group mb-10">
                        <label for="exampleFormControlInput1" class="required form-label">@lang('site.Closing Time')</label>
                        <input  type='time' name="closing_time" class="form-control" value="{{$branch->closing_time}}" />
                    </div>

                    <div class="form-group mb-10">
                        <label for="package_per_day" class="required form-label">@lang('site.Number of Allowed Packages Per Day')</label>
                        <input  type='number' name="package_per_day" class="form-control" value="{{$branch->package_per_day}}" />
                    </div>


                    <div class="form-group mb-10">
                    <div class="form-check form-switch form-check-custom form-check-solid">
                        <input class="form-check-input" type="checkbox" value="1" name='status' id="status" @if($branch->status == 1)  checked @endif/>
                        <label class="form-check-label" for="flexSwitchDefault">
                        @lang('site.status')
                        </label>
                    </div>
                    </div>



                    <div class="text-right mb-5">
                        <input type="submit" name="add" class="btn btn-success" value="@lang('site.Update')">
                    </div>
                </form>
            </div>
        </div>
        <!-- // END drawer-layout__content -->
    </div>
@stop
