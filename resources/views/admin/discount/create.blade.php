@extends('admin.layouts.app')


@section('toolbar')
    <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div class="d-flex align-items-center me-3">
                <!--begin::Title-->
                <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">@lang('site.Discount')
                    <!--begin::Separator-->
                    <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
                    <!--end::Separator-->
                    <!--begin::Description-->
                    <small class="text-muted fs-7 fw-bold my-1 ms-1">@lang('site.create')</small>
                    <!--end::Description-->
                </h1>
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
            <form method="post" action="{{ route('discount.store') }}" enctype="multipart/form-data">
                @csrf
                <div class='row'>
                    <div class="col-md-4">
                        <label for="exampleFormControlInput1" class="required form-label">@lang('site.category')</label>
                        <select class="form-select" name='product_id' aria-label="Select example" id='sel_cat'>
                            @foreach ($category as $c)
                            <option value="{{ $c->id }}">{{ $c->cat_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>


                <div class=" col-md-4">
                    <label for="exampleFormControlInput1" class="required form-label">@lang('site.product')</label>
                    <select class="form-select" name='product_id' aria-label="Select example" id='sel_product'>

                    </select>
                </div>

                <div class="form-group mb-10">
                    <label for="exampleFormControlInput1" class="required form-label">@lang('site.discount')</label>
                    <input type='number' name="discount" class="form-control" />
                </div>


                <div class="form-group mb-10">
                    <label for="exampleFormControlInput1" class="required form-label">@lang('site.Discount Type')</label>
                    <select class="form-select" name='discount_type' aria-label="Select example">
                        <option value="Flat">@lang('site.Flat')</option>
                        <option value="Percentage">@lang('site.percentage')</option>
                    </select>
                </div>



                <div class="form-group mb-10">
                    <label for="exampleFormControlInput1" class="required form-label">@lang('site.from')</label>
                    <input type='date' name="from" class="form-control" value="{{ old('opening_time') }}" />
                </div>

                <div class="form-group mb-10">
                    <label for="exampleFormControlInput1" class="required form-label">@lang('site.to')</label>
                    <input type='date' name="to" class="form-control" value="{{ old('closing_time') }}" />
                </div>

                <div class="form-group mb-10">
                    <div class="form-check form-switch form-check-custom form-check-solid">
                        <input class="form-check-input" type="checkbox" value="1" name='published' id="status" />
                        <label class="form-check-label" for="flexSwitchDefault">
                            @lang('site.published')
                        </label>
                    </div>
                </div>



                <div class="text-right mb-5">
                    <input type="submit" name="add" class="btn btn-success" value="@lang('site.add')">
                </div>
            </form>
        </div>
    </div>
    <!-- // END drawer-layout__content -->
@stop
