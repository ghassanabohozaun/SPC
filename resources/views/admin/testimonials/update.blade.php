@extends('layouts.admin')
@section('title')
@endsection
@section('content')
    <form class="form" action="{{ route('admin.testimonial.update') }}" method="POST" id="form_opinions_update">
        @csrf
        <!--begin::Subheader-->
        <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
            <div class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Info-->
                <div class="d-flex align-items-center flex-wrap mr-2">


                    <!--begin::Actions-->
                    <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>

                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.testimonials') }}" class="text-muted">
                                {{ __('menu.testimonials') }}
                            </a>
                        </li>

                        <li class="breadcrumb-item">
                            <a href="" class="text-muted">
                                {{ __('testimonials.update_testimonial') }}
                            </a>
                        </li>
                    </ul>

                    <!--end::Actions-->
                </div>
                <!--end::Info-->

                <!--begin::Toolbar-->
                <div class="d-flex align-items-center">

                    <button type="submit" class="btn btn-primary btn-sm font-weight-bold font-size-base  mr-1">
                        <i class="fa fa-save"></i>
                        {{ __('general.save') }}
                    </button>

                </div>
                <!--end::Toolbar-->
            </div>
        </div>
        <!--end::Subheader-->


        <!--begin::content-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class=" container-fluid ">
                <!--begin::Row-->
                <div class="row">
                    <div class="col-lg-12">
                        <!--begin::Card-->
                        <!--begin::Card-->
                        <div class="card card-custom card-shadowless rounded-top-0" id="card_languages_add">
                            <!--begin::Body-->
                            <div class="card-body p-0">
                                <div class="row justify-content-center py-8 px-8 py-lg-15 px-lg-10">
                                    <div class="col-xl-12 col-xxl-10">

                                        <div class="row justify-content-center">
                                            <div class="col-xl-9">

                                                <!--begin::body-->
                                                <div class="my-5">

                                                    <!--begin::Group-->
                                                    <div class="d-none form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            ID
                                                        </label>
                                                        <div class="col-lg-9 col-xl-9">

                                                            <input class="form-control form-control-solid form-control-lg"
                                                                name="id" id="id" type="hidden"
                                                                value="{{ $testimonial->id }}" />

                                                            <input type="hidden" name="hidden_photo" value="hidden_photo">
                                                        </div>

                                                    </div>
                                                    <!--end::Group-->

                                                    <!--begin::Group-->
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            {{ __('testimonials.photo') }}
                                                        </label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <div class="image-input image-input-outline"
                                                                id="kt_testimonial_photo">

                                                                <div class="image-input-wrapper"
                                                                    style="background-image: url({{ asset('adminBoard/uploadedImages/testimonials/' . $testimonial->photo) }})">
                                                                </div>
                                                                <label
                                                                    class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                                    data-action="change" data-toggle="tooltip"
                                                                    title=""
                                                                    data-original-title="{{ __('general.change_image') }}">
                                                                    <i class="fa fa-pen icon-sm text-muted"></i>
                                                                    <input type="file" name="photo" id="photo"
                                                                        class="table-responsive-sm">
                                                                    <input type="hidden" name="photo_remove" />
                                                                </label>

                                                                <span
                                                                    class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                                    data-action="cancel" data-toggle="tooltip"
                                                                    title="Cancel avatar">
                                                                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                                </span>
                                                            </div>
                                                            <span
                                                                class="form-text text-muted">{{ __('general.image_format_allow') }}
                                                            </span>
                                                            <span class="form-text text-danger" id="photo_error"></span>
                                                        </div>
                                                    </div>
                                                    <!--end::Group-->

                                                    <!--begin::Group-->
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            {{ __('testimonials.name_ar') }}
                                                        </label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <input class="form-control form-control-solid form-control-lg"
                                                                name="name_ar" id="name_ar" type="text"
                                                                placeholder=" {{ __('testimonials.enter_name_ar') }}"
                                                                autocomplete="off" value="{{ $testimonial->name_ar }}" />
                                                            <span class="form-text text-danger" id="name_ar_error"></span>

                                                        </div>
                                                    </div>
                                                    <!--end::Group-->

                                                    <!--begin::Group-->
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            {{ __('testimonials.name_en') }}
                                                        </label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <input class="form-control form-control-solid form-control-lg"
                                                                name="name_en" id="name_en" type="text"
                                                                placeholder=" {{ __('testimonials.enter_name_en') }}"
                                                                autocomplete="off" value="{{ $testimonial->name_en }}" />

                                                            <span class="form-text text-danger" id="name_en_error"></span>

                                                        </div>
                                                    </div>
                                                    <!--end::Group-->

                                                    <!--begin::Group-->
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            {{ __('testimonials.age') }}
                                                        </label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <input class="form-control form-control-solid form-control-lg"
                                                                name="age" id="age" type="text"
                                                                value="{{ $testimonial->age }}"
                                                                placeholder=" {{ __('testimonials.enter_age') }}"
                                                                autocomplete="off" />

                                                            <span class="form-text text-danger" id="age_error"></span>

                                                        </div>
                                                    </div>
                                                    <!--end::Group-->

                                                    <!--begin::Group-->
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            {{ __('testimonials.gender') }}
                                                        </label>
                                                        <div class="col-lg-9 col-xl-9">

                                                            <select class="form-control form-control-solid form-control-lg"
                                                                name="gender" id="gender" type="text">
                                                                <option value="">
                                                                    {{ __('general.select_from_list') }}
                                                                </option>
                                                                <option value="male"
                                                                    {{ $testimonial->gender == 'male' ? 'selected' : '' }}>
                                                                    {{ __('testimonials.male') }}
                                                                </option>
                                                                <option value="female"
                                                                    {{ $testimonial->gender == 'female' ? 'selected' : '' }}>
                                                                    {{ __('testimonials.female') }}
                                                                </option>
                                                            </select>
                                                            <span class="form-text text-danger" id="gender_error"></span>
                                                        </div>
                                                    </div>
                                                    <!--end::Group-->

                                                    <!--begin::Group-->
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            {{ __('testimonials.country') }}
                                                        </label>
                                                        <div class="col-lg-9 col-xl-9">

                                                            <select class="form-control form-control-solid form-control-lg"
                                                                name="country" id="country" type="text">
                                                                <option value="">{!! __('general.select_from_list') !!}</option>
                                                                @foreach (\App\Models\Country::all() as $country)
                                                                    <option value="{{ $country->id }}"
                                                                        {{ $country->id == $testimonial->country ? 'selected' : '' }}>
                                                                        {!! $country->{'name_' . Lang()} !!}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            <span class="form-text text-danger" id="country_error"></span>
                                                        </div>
                                                    </div>
                                                    <!--end::Group-->

                                                    <!--begin::Group-->
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            {{ __('testimonials.job_title_ar') }}
                                                        </label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <input class="form-control form-control-solid form-control-lg"
                                                                name="job_title_ar" id="job_title_ar" type="text"
                                                                placeholder=" {{ __('testimonials.enter_job_title_ar') }}"
                                                                autocomplete="off"
                                                                value="{{ $testimonial->job_title_ar }}" />

                                                            <span class="form-text text-danger"
                                                                id="job_title_ar_error"></span>

                                                        </div>
                                                    </div>
                                                    <!--end::Group-->

                                                    <!--begin::Group-->
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            {{ __('testimonials.job_title_en') }}
                                                        </label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <input class="form-control form-control-solid form-control-lg"
                                                                name="job_title_en" id="job_title_en" type="text"
                                                                placeholder=" {{ __('testimonials.enter_job_title_en') }}"
                                                                autocomplete="off"
                                                                value="{{ $testimonial->job_title_en }}" />
                                                            <span class="form-text text-danger"
                                                                id="job_title_en_error"></span>
                                                        </div>
                                                    </div>
                                                    <!--end::Group-->

                                                    <!--begin::Group-->
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            {{ __('testimonials.rating') }}
                                                        </label>
                                                        <div class="col-lg-9 col-xl-9">

                                                            <select class="form-control form-control-solid form-control-lg"
                                                                name="rating" id="rating" type="text">

                                                                <option value="">
                                                                    {{ __('general.select_from_list') }}
                                                                </option>

                                                                <option value="1"
                                                                    {{ $testimonial->rating == '1' ? 'selected' : '' }}>
                                                                    {{ __('testimonials.one_star') }}
                                                                </option>

                                                                <option value="2"
                                                                    {{ $testimonial->rating == '2' ? 'selected' : '' }}>
                                                                    {{ __('testimonials.two_star') }}
                                                                </option>
                                                                <option value="3"
                                                                    {{ $testimonial->rating == '3' ? 'selected' : '' }}>
                                                                    {{ __('testimonials.three_star') }}
                                                                </option>
                                                                <option value="4"
                                                                    {{ $testimonial->rating == '4' ? 'selected' : '' }}>
                                                                    {{ __('testimonials.four_star') }}
                                                                </option>
                                                                <option value="5"
                                                                    {{ $testimonial->rating == '5' ? 'selected' : '' }}>
                                                                    {{ __('testimonials.five_star') }}
                                                                </option>


                                                            </select>
                                                            <span class="form-text text-danger" id="rating_error"></span>
                                                        </div>
                                                    </div>
                                                    <!--end::Group-->

                                                    <!--begin::Group-->
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            {{ __('testimonials.opinion_ar') }}
                                                        </label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <textarea rows="10" class="form-control form-control-solid form-control-lg" name="opinion_ar" id="opinion_ar"
                                                                type="text" placeholder=" {{ __('testimonials.enter_opinion_ar') }}" autocomplete="off">{{ $testimonial->opinion_ar }}</textarea>
                                                            <span class="form-text text-danger"
                                                                id="opinion_ar_error"></span>
                                                        </div>
                                                    </div>
                                                    <!--end::Group-->

                                                    <!--begin::Group-->
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            {{ __('testimonials.opinion_en') }}
                                                        </label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <textarea rows="10" class="form-control form-control-solid form-control-lg" name="opinion_en" id="opinion_en"
                                                                type="text" placeholder=" {{ __('testimonials.enter_opinion_en') }}" autocomplete="off">{{ $testimonial->opinion_en }}</textarea>
                                                            <span class="form-text text-danger"
                                                                id="opinion_en_error"></span>
                                                        </div>
                                                    </div>
                                                    <!--end::Group-->

                                                </div>
                                                <!--begin::body-->

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Card-->
                    </div>
                </div>

            </div>
        </div>
        <!--end::content-->

    </form>
@endsection

@push('js')
    <script type="text/javascript">
        ////////////////////////////////////////////////////
        var testimonial_photo = new KTImageInput('kt_testimonial_photo');

        $('#form_opinions_update').on('submit', function(e) {
            e.preventDefault();
            //////////////////////////////////////////////////////////////
            $('#title_ar').css('border-color', '');
            $('#photo').css('border-color', '');
            $('#language').css('border-color', '');
            $('#opinion_ar').css('border-color', '');
            $('#opinion_en').css('border-color', '');
            $('#name_ar').css('border-color', '');
            $('#name_en').css('border-color', '');
            $('#age').css('border-color', '');
            $('#gender').css('border-color', '');
            $('#job_title_ar').css('border-color', '');
            $('#job_title_en').css('border-color', '');
            $('#rating').css('border-color', '');


            $('#photo_error').text('');
            $('#language_error').text('');
            $('#opinion_ar_error').text('');
            $('#opinion_en_error').text('');
            $('#name_ar_error').text('');
            $('#name_en_error').text('');
            $('#age_error').text('');
            $('#gender_error').text('');
            $('#job_title_ar_error').text('');
            $('#job_title_en_error').text('');
            $('#rating_error').text('');
            /////////////////////////////////////////////////////////////
            var data = new FormData(this);
            var type = $(this).attr('method');
            var url = $(this).attr('action');

            $.ajax({
                url: url,
                data: data,
                type: type,
                dataType: 'json',
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                    KTApp.blockPage({
                        overlayColor: '#000000',
                        state: 'danger',
                        message: "{{ __('general.please_wait') }}",
                    });
                }, //end beforeSend
                success: function(data) {
                    KTApp.unblockPage();
                    if (data.status == true) {
                        Swal.fire({
                            title: data.msg,
                            text: "",
                            icon: "success",
                            allowOutsideClick: false,
                            customClass: {
                                confirmButton: 'update_testimonials_button'
                            }
                        });
                        $('.update_testimonials_button').click(function() {
                            window.location.href = "{{ route('admin.testimonials') }}";
                        });
                    }
                }, //end success

                error: function(reject) {
                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function(key, value) {
                        $('#' + key + '_error').text(value[0]);
                        $('#' + key).css('border-color', '#F64E60');
                        $('html, body').animate({
                            scrollTop: 20
                        }, 300);
                    });

                }, //end error

                complete: function() {
                    KTApp.unblockPage();
                }, //end complete

            });

        }); //end submit
    </script>
@endpush
