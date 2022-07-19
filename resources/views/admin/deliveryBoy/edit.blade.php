@extends('admin.layouts.app')


@section('toolbar')
    <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div class="d-flex align-items-center me-3">
                <!--begin::Title-->
                <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">@lang('site.Delivery Boy')
                    <!--begin::Separator-->
                    <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
                    <!--end::Separator-->
                    <!--begin::Description-->
                    <small class="text-muted fs-7 fw-bold my-1 ms-1">@lang('site.Edit')</small>
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

    <div class="container-fluid page__container p-2">

        <div class="card rounded card-form__body card-body shadow-lg">

            @include('admin.includes.messages')

            <form method="post" action="{{ route('deliveryBoy.update', $deliveryBoy->id) }}"
                enctype="multipart/form-data">
                @csrf
                @method('put')

                <div class="form-group mb-10">
                    <label for="exampleFormControlInput1" class="required form-label">@lang('site.Delivery')</label>
                    <input type='text' name="name" class="form-control"
                        value="{{ $deliveryBoy->user->name ?? '' }} &nbsp; 	&nbsp;  email:{{ $deliveryBoy->user->email ?? '' }} "
                        readonly />
                </div>
                <!-- <div class="form-group mb-10">
                            <label for="exampleFormControlInput1" class="required form-label">Email </label>
                            <input  type='email' name="email" class="form-control" value="{{ $deliveryBoy->email }}" />
                        </div>
                        <div class="form-group mb-10">
                            <label for="exampleFormControlInput1" class="required form-label">Phone </label>
                            <input  type='text' name="phone" class="form-control" value="{{ $deliveryBoy->phone }}" />
                        </div>

                        <div class="form-group mb-10">
                            <label for="exampleFormControlInput1" class="required form-label">Password </label>
                            <input  type='password' name="password" class="form-control" value="" />
                        </div> -->

                <div class="form-group mb-10">
                    <label for="exampleFormControlInput1" class="required form-label">@lang('site.Vehicle No.')</label>
                    <input type='text' name="vehicle_no" class="form-control" value="{{ $deliveryBoy->vehicle_no }}" />
                </div>

                <div class="form-group mb-10">
                    <label for="exampleFormControlInput1" class="required form-label">@lang('site.Driving License')</label>
                    <input type='text' name="driving_License_no" class="form-control"
                        value="{{ $deliveryBoy->driving_License_no }}" />
                </div>

                <div class="form-group mb-10">
                    <label for="exampleFormControlInput1" class="required form-label">@lang('site.ID Proof')</label>
                    <input type='text' name="id_proof_no" class="form-control" value="{{ $deliveryBoy->id_proof_no }}" />
                </div>

                <div class="form-group mb-10">
                    <div class="form-group">
                        <label for="exampleFormControlInput1" class="required form-label">@lang('site.Delivery Boy is from
                            Restaurant Staff')</label>
                        <input type="checkbox" class="custom-control-input" id="is_staff" name="is_staff"
                            {{ $deliveryBoy->is_staff == 1 ? 'checked' : '' }}>
                    </div>
                </div>

                <hr>

                <div class="form-group mb-10">
                    <div class="form-group">
                        <label for="exampleFormControlInput1" class="required form-label">@lang('site.Criminal Records
                            Certificate Photo')</label>
                        <input class="" type="file" name="criminal_records_certificate" value="">
                    </div>
                </div>

                <div class="form-group mb-10">
                    <div class="form-group">
                        <label for="exampleFormControlInput1" class="required form-label">@lang('site.Drug
                            Analysis')</label>
                        <input class="" type="file" name="drugs_analysis" value="">
                    </div>
                </div>

                <div class="form-group mb-10">
                    <div class="form-group">
                        <label for="exampleFormControlInput1" class="required form-label">@lang('site.Car License
                            Front')</label>
                        <input class="" type="file" name="car_License_front" value="">
                    </div>
                </div>

                <div class="form-group mb-10">
                    <div class="form-group">
                        <label for="exampleFormControlInput1" class="required form-label">@lang('site.Car License
                            Back')</label>
                        <input class="" type="file" name="car_License_back" value="">
                    </div>
                </div>

                <div class="form-group mb-10">
                    <div class="form-group">
                        <label for="exampleFormControlInput1" class="required form-label">@lang('site.License
                            Front')</label>
                        <input class="" type="file" name="License_front" value="">
                    </div>
                </div>

                <div class="form-group mb-10">
                    <div class="form-group">
                        <label for="exampleFormControlInput1" class="required form-label">@lang('site.License Back')</label>
                        <input class="" type="file" name="License_back" value="">
                    </div>
                </div>



                <div class="form-group mb-10">
                    <div class="form-group">
                        <label for="exampleFormControlInput1" class="required form-label">@lang('site.Proof Back')</label>
                        <input class="" type="file" name="proof_front" value="">
                    </div>
                </div>
                <div class="form-group mb-10">
                    <div class="form-group">
                        <label for="exampleFormControlInput1" class="required form-label">@lang('site.Proof Back')</label>
                        <input class="" type="file" name="proof_back" value="">
                    </div>
                </div>


                <div class="text-right mb-5">
                    <input type="submit" class="btn btn-success" value="@lang('site.Update')">
                </div>
            </form>
        </div>
    </div>
    <!-- // END drawer-layout__content -->
    </div>
    <script>
        var loadFile = function(event) {
            var image = document.getElementById('output_drugs_analysis');
            image.src = URL.createObjectURL(event.target.files[0]);

        };
    </script>

@stop
