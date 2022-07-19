@extends('admin.layouts.app')


@section('toolbar')
<div class="toolbar" id="kt_toolbar">
    <!--begin::Container-->
    <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
    <!--begin::Page title-->
        <div class="d-flex align-items-center me-3">
            <!--begin::Title-->
            <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">@lang('site.category')
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
                <form method="post" action="{{ route('category.update', $category->id) }}" enctype="multipart/form-data">
                    @csrf

                @method('put')
                    <div class="form-group mb-10">
                        <label for="exampleFormControlInput1" class="required form-label">@lang('site.name') @lang('site.in English') </label>
                        <input type='text' name="name_en" class="form-control" value="{{$category->name_en}}" />
                    </div>
                    <div class="form-group mb-10">
                        <label for="exampleFormControlInput1" class="required form-label">@lang('site.name') @lang('site.in Arabic') </label>
                        <input  type='text' name="name_ar" class="form-control" value="{{$category->name_ar}}" />
                    </div>



                    <div class="form-group mb-10">
                    <div class="form-check form-switch form-check-custom form-check-solid">
                        <input class="form-check-input" type="checkbox" value="1" name='status' id="status" @if($category->status == 1)  checked @endif/>
                        <label class="form-check-label" for="flexSwitchDefault">
                        @lang('site.status')
                        </label>
                    </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1" class="required form-label">@lang('site.Image') </label>

                        <input type="file" name="image" value="" accept="image/*" onchange="loadFile(event)" class="image_name">
                        <img id="output" width="150px"/>
                        <script>
                            var loadFile = function(event) {
                                var output = document.getElementById('output');
                                output.src = URL.createObjectURL(event.target.files[0]);
                                output.onload = function() {
                                    URL.revokeObjectURL(output.src) // free memory
                                }
                            };
                        </script>

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
