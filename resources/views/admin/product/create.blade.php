@extends('admin.layouts.app')


@section('toolbar')
    <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div class="d-flex align-items-center me-3">
                <!--begin::Title-->
                <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">@lang('site.product')
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
            <form method="post" action="{{ route('product.store') }}" enctype="multipart/form-data">
                @csrf


                <div class="form-group mb-10">
                    <label for="exampleFormControlInput1" class="required form-label">@lang('site.name') @lang('site.English')</label>
                    <input type='text' name="name_en" class="form-control" value="{{ old('name_en') }}" />
                </div>
                <div class="form-group mb-10">
                    <label for="exampleFormControlInput1" class="required form-label">@lang('site.name') @lang('site.Arabic')</label>
                    <input type='text' name="name_ar" class="form-control" value="{{ old('name_ar') }}" />
                </div>

                <div class="form-group mb-10">
                    <label for="exampleFormControlInput1" class="required form-label">@lang('site.Description')
                        @lang('site.in English')</label>
                    <input type='text' name="des_en" class="form-control" value="{{ old('des_en') }}" />
                </div>
                <div class="form-group mb-10">
                    <label for="exampleFormControlInput1" class="required form-label">@lang('site.Description')
                        @lang('site.in Arabic')</label>
                    <input type='text' name="des_ar" class="form-control" value="{{ old('des_ar') }}" />
                </div>


                <div class="form-group mb-10">
                    <label for="exampleFormControlInput1" class="required form-label">@lang('site.category')</label>
                    <select class="form-select" name='category_id' aria-label="Select example">
                        @foreach ($categories as $c)
                        <option value="{{ $c->id }}">{{ $c->name }}</option>
                        @endforeach
                    </select>
                </div>

                <select class="form-select" id='price_type' aria-label="Select example">
                    <option value="">Select Price Type</option>
                    <option value="single">Single Price</option>
                    <option value="multi">Multi Prices</option>

                </select>

                <div class="form-group mb-10" id='price'>
                    <label for="exampleFormControlInput1" class="required form-label">@lang('site.Price')</label>
                    <input type='number' name="price" class="form-control" value="{{ old('price') }}" />
                </div>
                <br>
                <input type="button" class="btn btn-dark float-md-right bt-sm" id='more' onclick="add_more_field();" value="add more prices +" width="10px">
                <br>
                 <div id="price_field">

                </div>
<br>
                <!-- <div class="form-group mb-10">
                    <label for="exampleFormControlInput1" class="required form-label">@lang('site.calories')</label>
                    <input type='number' name="cal" class="form-control" value="{{ old('cal') }}" />
                </div>

                <div class="form-group mb-10">
                    <div class="form-check form-check-custom form-check-solid">
                        <input class="form-check-input" type="checkbox" value="1" name='veg' id="veg" />
                        <label class="form-check-label" for="flexCheckDefault">
                            @lang('site.Vegetarian')
                        </label>
                    </div>
                </div>
                <div class="form-group mb-10">
                    <div class="form-check form-check-custom form-check-solid">
                        <input class="form-check-input" type="checkbox" value="1" name='promotional' id="promotional" />
                        <label class="form-check-label" for="flexCheckDefault">
                            @lang('site.promotional')
                        </label>
                    </div>
                </div> -->
                <!-- <div class="form-check form-check-custom form-check-solid">
                            <input class="form-check-input" type="checkbox" value="1" name='status'  id="status"/>
                            <label class="form-check-label" for="flexCheckDefault">
                                Status
                            </label>
                        </div> -->

                <div class="form-group mb-10">
                    <div class="form-check form-switch form-check-custom form-check-solid">
                        <input class="form-check-input" type="checkbox" value="1" name='status' id="status" />
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
 <!-- This will be dynamic -->




<script>
    var counter=0

    function add_more_field(){

             $('#price').hide();
        counter+=1;
        html='<div class="row" id="row'+counter+'">\
                <div class="col-3">\
                    <label>Size</label>\
                    <input type="text" class="form-control"  name="arr['+counter+'][size]" placeholder="Size">\
                </div>\
                <div class="col-3">\
                    <label>Price</label>\
                    <input type="text" class="form-control" name="arr['+counter+'][extra_price]" placeholder="L.E.">\
                </div>\
    </div>'
        $('#price_field').append(html);

    }
</script>

<br>


                <div class="text-right mb-5">
                    <input type="submit" name="add" class="btn btn-success" value="@lang('site.add')">
                </div>
            </form>
        </div>
    </div>
    <!-- // END drawer-layout__content -->
    </div>

    <script>

$('#more,#price').hide();
   $('#price_type').change(function(){
    var type = $('#price_type').val();

        if(type == 'single'){
            $('#price').show(); // for sapce
            $('#more').hide();  //for hotel room
        }else{
            $('#price').hide(); // for sapce
            $('#more').show(); //for hotel room
        }
   });

    </script>
@stop
