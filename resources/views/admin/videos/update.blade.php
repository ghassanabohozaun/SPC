@extends('layouts.admin')
@section('title')
@endsection
@section('content')
    <form class="form" action="{{ route('admin.videos.update') }}" method="POST" id="form_videos_update">
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
                            <a href="{{ route('admin.videos') }}" class="text-muted">
                                {{ __('menu.videos') }}
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.videos.edit', $video->id) }}" class="text-muted">
                                {{ __('videos.video_update') }}
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
                                                    <div class="form-group row d-none">
                                                        <label class="col-xl-3 col-lg-3 col-form-label"></label>
                                                        <div class="col-lg-9 col-xl-9">

                                                            <input name="id" id="id" type="text"
                                                                value="{{ $video->id }}" />

                                                            <input type="text" id='site_lang_ar' name="site_lang_ar"
                                                                value="{!! setting()->site_lang_ar !!}">

                                                            <input type="text" name="hidden_photo" value="hidden_photo">

                                                        </div>
                                                    </div>
                                                    <!--end::Group-->

                                                    <!--begin::Group-->
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            {{ __('videos.photo') }}
                                                        </label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <div class="image-input image-input-outline"
                                                                id="kt_video_photo_album">
                                                                <div class="image-input-wrapper"
                                                                    style="background-image: url({{ asset('adminBoard/uploadedImages/videos/' . $video->photo) }})">
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
                                                            {{ __('videos.title_en') }}
                                                        </label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <input class="form-control form-control-solid form-control-lg"
                                                                name="title_en" id="title_en" rows="3"
                                                                placeholder=" {{ __('videos.enter_title_en') }}"
                                                                autocomplete="off" value="{{ $video->title_en }} " />
                                                            <span class="form-text text-danger" id="title_en_error"></span>

                                                        </div>
                                                    </div>
                                                    <!--end::Group-->


                                                    <!--begin::Group-->
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            {{ __('videos.title_ar') }}
                                                        </label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <input class="form-control form-control-solid form-control-lg"
                                                                name="title_ar" id="title_ar"
                                                                placeholder=" {{ __('videos.enter_title_ar') }}"
                                                                autocomplete="off" value="{{ $video->title_ar }}" />

                                                            <span class="form-text text-danger" id="title_ar_error"></span>

                                                        </div>
                                                    </div>
                                                    <!--end::Group-->

                                                    <!--begin::Group-->
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            {{ __('videos.duration') }}
                                                        </label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <input class="form-control form-control-solid form-control-lg"
                                                                name="duration" id="duration" type="text"
                                                                placeholder=" {{ __('videos.enter_duration') }}"
                                                                autocomplete="off" value="{{ $video->duration }} " />
                                                            <span class="form-text text-danger"
                                                                id="duration_error"></span>
                                                        </div>

                                                    </div>
                                                    <!--end::Group-->

                                                    <!--begin::Group-->
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            {{ __('videos.added_date') }}
                                                        </label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <div class="input-group date">
                                                                <input type="text" class="form-control"
                                                                    id="added_date" name="added_date" readonly
                                                                    value="{{ $video->added_date }} "
                                                                    placeholder="{{ __('videos.enter_added_date') }}" />
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text">
                                                                        <i class="la la-calendar-check-o"></i>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->
                                                    </div>
                                                    <!--end::Group-->

                                                    <!--begin::Group-->
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            {{ __('videos.link') }}
                                                        </label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <input class="form-control form-control-solid form-control-lg"
                                                                name="link" id="link" type="text"
                                                                value="https://www.youtube.com/watch?v={{ $video->link }}"
                                                                placeholder=" {{ __('videos.enter_link') }}"
                                                                autocomplete="off" />

                                                            <span class="form-text text-muted">
                                                                {{ __('general.example') }} :
                                                                https://www.youtube.com/watch?v=DzwIRzD7da4
                                                            </span>
                                                            <span class="form-text text-danger" id="link_error"></span>
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
        var video_photo_album = new KTImageInput('kt_video_photo_album');

        ////////////////////////////////////////////////
        ///////// Datepicker
        $('#added_date').datepicker({
            format: "yyyy-mm-dd",
            todayBtn: true,
            clearBtn: false,
            orientation: "bottom auto",
            language: "{{ LaravelLocalization::getCurrentLocale() }}",
            autoclose: true,
            todayHighlight: true,
        });

        $('#form_videos_update').on('submit', function(e) {
            e.preventDefault();
            //////////////////////////////////////////////////////////////
            $('#title_ar').css('border-color', '');
            $('#title_en').css('border-color', '');
            $('#link').css('border-color', '');
            $('#photo').css('border-color', '');

            $('#title_ar_error').text('');
            $('#title_en_error').text('');
            $('#link_error').text('');
            $('#photo_error').text('');
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
                                confirmButton: 'update_video_button'
                            }
                        });
                        $('.update_video_button').click(function() {
                            window.location.href = "{{ route('admin.videos') }}";
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
