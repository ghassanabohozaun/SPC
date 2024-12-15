@extends('layouts.admin')
@section('title')
@endsection

@section('content')
    <form class="form" action="{{ route('admin.comments.store') }}" method="POST" id="form_comment_add">
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
                            <a href="{{ route('admin.comments', $id) }}" class="text-muted">
                                {{ __('menu.comments') }}
                            </a>
                        </li>

                        <li class="breadcrumb-item">
                            <a href="" class="text-muted">
                                {{ __('menu.add_new_comment') }}
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
                                                        <input type="hidden" id="id" name="id"
                                                            value="{!! $id !!}">
                                                    </div>
                                                    <!--begin::Group-->
                                                    <!--end::Group-->

                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            {{ __('articles.person_photo') }}
                                                        </label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <div class="image-input image-input-outline"
                                                                id="kt_person_photo">

                                                                <div class="image-input-wrapper"></div>
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
                                                            {{ __('articles.person_name') }}
                                                        </label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <input class="form-control form-control-solid form-control-lg"
                                                                name="person_name" id="person_name" type="text"
                                                                placeholder=" {{ __('articles.enter_person_name') }}"
                                                                autocomplete="off" />

                                                            <span class="form-text text-danger"
                                                                id="person_name_error"></span>

                                                        </div>
                                                    </div>
                                                    <!--end::Group-->


                                                    <!--begin::Group-->
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            {{ __('articles.person_email') }}
                                                        </label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <input class="form-control form-control-solid form-control-lg"
                                                                name="person_email" id="person_email" type="text"
                                                                placeholder=" {{ __('articles.enter_person_email') }}"
                                                                autocomplete="off" />

                                                            <span class="form-text text-danger"
                                                                id="person_email_error"></span>

                                                        </div>
                                                    </div>
                                                    <!--end::Group-->


                                                    <!--begin::Group-->
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            {{ __('articles.commentary') }}
                                                        </label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <textarea rows="6" class="form-control form-control-solid form-control-lg" name="commentary" id="commentary"
                                                                type="text" placeholder=" {{ __('articles.enter_commentary') }}" autocomplete="off"></textarea>
                                                            <span class="form-text text-danger"
                                                                id="commentary_error"></span>
                                                        </div>
                                                    </div>
                                                    <!--end::Group-->




                                                    <!--begin::Group-->
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            {{ __('articles.gender') }}
                                                        </label>
                                                        <div class="col-lg-9 col-xl-9">

                                                            <select class="form-control  form-control-lg" name="gender"
                                                                id="gender" type="text">
                                                                <option value="">
                                                                    {{ __('general.select_from_list') }}
                                                                </option>

                                                                <option value="male">
                                                                    {{ __('general.male') }}
                                                                </option>

                                                                <option value="female">
                                                                    {{ __('general.female') }}
                                                                </option>

                                                                <option value="others">
                                                                    {{ __('general.others') }}
                                                                </option>

                                                            </select>

                                                            <span class="form-text text-danger" id="gender_error"></span>
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
        var kt_person_photo = new KTImageInput('kt_person_photo');

        $('#form_comment_add').on('submit', function(e) {
            e.preventDefault();
            //////////////////////////////////////////////////////////////
            $('#person_name').css('border-color', '');
            $('#person_email').css('border-color', '');
            $('#commentary').css('border-color', '');
            $('#gender').css('border-color', '');

            $('#person_name_error').text('');
            $('#person_email_error').text('');
            $('#commentary_error').text('');
            $('#gender_error').text('');
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
                                confirmButton: 'add_comment_button'
                            }
                        });
                        $('.add_comment_button').click(function() {
                            window.location.href = "{{ route('admin.comments', $id) }}";
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
