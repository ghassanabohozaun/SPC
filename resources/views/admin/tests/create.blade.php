@extends('layouts.admin')
@section('title')
@endsection

@section('content')
    <form class="form" action="{{ route('admin.tests.store') }}" method="POST" id="add_test_form">
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
                            <a href="{{ route('admin.tests') }}" class="text-muted">
                                {{ __('menu.tests') }}
                            </a>
                        </li>

                        <li class="breadcrumb-item">
                            <a href="" class="text-muted">
                                {{ __('menu.add_new_test') }}
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

                                                    <div class="form-group row d-none">
                                                        <input type="hidden" class="form-control" id="site_lang_ar"
                                                            name="site_lang_ar" value="{!! setting()->site_lang_ar !!}">
                                                    </div>

                                                    <!--begin::Group-->
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            {{ __('tests.test_photo') }}
                                                        </label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <div class="image-input image-input-outline" id="kt_test_photo">

                                                                <div class="image-input-wrapper"></div>
                                                                <label
                                                                    class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                                    data-action="change" data-toggle="tooltip"
                                                                    title=""
                                                                    data-original-title="{{ __('general.change_image') }}">
                                                                    <i class="fa fa-pen icon-sm text-muted"></i>
                                                                    <input type="file" name="test_photo" id="test_photo"
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
                                                            <span class="form-text text-danger"
                                                                id="test_photo_error"></span>
                                                        </div>
                                                    </div>
                                                    <!--end::Group-->


                                                    <!--begin::Group-->
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            {{ __('tests.test_name') }}
                                                        </label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <input class="form-control form-control-solid form-control-lg"
                                                                name="test_name" id="test_name" type="test_name"
                                                                placeholder=" {{ __('tests.enter_test_name') }}"
                                                                autocomplete="off" />
                                                            <span class="form-text text-danger" id="test_name_error"></span>
                                                        </div>
                                                    </div>
                                                    <!--end::Group-->


                                                    <!--begin::Group-->
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            {{ __('tests.test_details') }}
                                                        </label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <textarea rows="7" class="form-control summernote" name="test_details" id="test_details"
                                                                placeholder=" {{ __('tests.enter_test_details') }}" autocomplete="off"></textarea>
                                                            <span class="form-text text-danger"
                                                                id="test_details_error"></span>
                                                        </div>
                                                    </div>
                                                    <!--end::Group-->

                                                    <!--begin::Group-->
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            {{ __('tests.language') }}
                                                        </label>
                                                        <div class="col-lg-9 col-xl-9">

                                                            <select class="form-control form-control-solid form-control-lg"
                                                                name="language" id="language" type="text">
                                                                <option value="">
                                                                    {{ __('general.select_from_list') }}
                                                                </option>
                                                                <option value="ar">
                                                                    {{ __('tests.arabic') }}
                                                                </option>
                                                                <option value="en">
                                                                    {{ __('tests.english') }}
                                                                </option>
                                                            </select>
                                                            <span class="form-text text-danger" id="language_error"></span>
                                                        </div>
                                                    </div>
                                                    <!--end::Group-->

                                                    <!--begin::Group-->
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            {{ __('tests.added_date') }}
                                                        </label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <div class="input-group date">
                                                                <input type="text"
                                                                    class="form-control form-control-solid form-control-lg"
                                                                    id="added_date" name="added_date" readonly
                                                                    placeholder="{{ __('tests.enter_added_date') }}" />
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text">
                                                                        <i class="la la-calendar-check-o"></i>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <span class="form-text text-danger"
                                                                id="added_date_error"></span>
                                                        </div>
                                                        <!--end::Group-->
                                                    </div>
                                                    <!--end::Group-->

                                                    <!--begin::Group-->
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            {{ __('tests.file') }}
                                                        </label>
                                                        <div class="col-lg-9 col-xl-9">

                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input"
                                                                    id="file" name="file">
                                                                <label class="custom-file-label" choose=""
                                                                    file="">
                                                                </label>
                                                            </div>
                                                            <span class="form-text text-muted">
                                                                {{ __('general.file_format_allow') }}
                                                            </span>
                                                            <span class="form-text text-danger" id="file_error"></span>

                                                        </div>
                                                    </div>
                                                    <!--end::Group-->
                                                </div>
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
        var test_photo = new KTImageInput('kt_test_photo');

        //Datepicker
        $('#added_date').datepicker({
            format: "yyyy-mm-dd",
            todayBtn: true,
            clearBtn: false,
            orientation: "bottom auto",
            language: "{{ LaravelLocalization::getCurrentLocale() }}",
            autoclose: true,
            todayHighlight: true,
        });

        //////////////////////////////////////////////////////////
        $('#add_test_form').on('submit', function(e) {
            e.preventDefault();
            //////////////////////////////////////////////////////////////
            $('#test_photo').css('border-color', '');
            $('#test_name').css('border-color', '');
            $('#test_details').css('border-color', '');
            $('#language').css('border-color', '');
            $('#added_date').css('border-color', '');
            $('#file').css('border-color', '');

            $('#test_photo_error').text('');
            $('#test_name_error').text('');
            $('#test_details_error').text('');
            $('#language_error').text('');
            $('#added_date_error').text('');
            $('#file_error').text('');
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
                                confirmButton: 'add_test_button'
                            }
                        });
                        $('.add_test_button').click(function() {
                            window.location.href = "{{ route('admin.tests') }}";
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
