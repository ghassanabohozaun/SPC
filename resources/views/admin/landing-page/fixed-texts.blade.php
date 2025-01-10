@extends('layouts.admin')
@section('title')
@endsection
@section('content')
    <form class="form" action="{!! route('admin.fixed.texts.update') !!}" method="POST" id="form_fixed_texts_store"
        enctype="multipart/form-data">
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
                            <a href="javascript:void(0);" class="text-muted">
                                {{ __('menu.landing_page') }}
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="" class="text-muted">
                                {{ __('menu.fixed_texts') }}
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
                        <div class="card card-custom card-shadowless rounded-top-0" id="card_settings_store">
                            <!--begin::Body-->
                            <div class="card-body p-0">
                                <div class="row justify-content-center py-8 px-8 py-lg-15 px-lg-10">
                                    <div class="col-xl-12 col-xxl-10">




                                        <!--begin::row-->
                                        <div class="row justify-content-center">
                                            <div class="col-xl-12">
                                                <h2>| {!! __('fixedTexts.about_spc') !!} | </h2>
                                                <br /> <br />
                                                <div class="my-5">


                                                    <!--begin::Group-->
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            {{ __('fixedTexts.about_spc_photo') }}
                                                        </label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <div class="image-input image-input-outline"
                                                                id="kt_about_spc_photo">

                                                                @if (fixedTexts()->about_spc_photo)
                                                                    <div class="image-input-wrapper"
                                                                        style="background-image: url({{ asset('adminBoard/uploadedImages/fixedTexts/' . fixedTexts()->about_spc_photo) }})">
                                                                    </div>
                                                                @else
                                                                    <div class="image-input-wrapper"></div>
                                                                @endif

                                                                <label
                                                                    class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                                    data-action="change" data-toggle="tooltip"
                                                                    title=""
                                                                    data-original-title="{{ __('general.change_image') }}">
                                                                    <i class="fa fa-pen icon-sm text-muted"></i>
                                                                    <input type="file" name="about_spc_photo"
                                                                        id="about_spc_photo" class="table-responsive-sm">
                                                                    <input type="hidden" name="photo_remove" />
                                                                </label>

                                                                <span
                                                                    class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                                    data-action="cancel" data-toggle="tooltip"
                                                                    title="Cancel avatar"><i
                                                                        class="ki ki-bold-close icon-xs text-muted"></i>
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
                                                    <div class="form-group">
                                                        <label>
                                                            {{ __('fixedTexts.about_spc_title_en') }}
                                                        </label>
                                                        <input type="text" class="form-control  form-control-lg"
                                                            name="about_spc_title_en" id="about_spc_title_en"
                                                            placeholder=" {{ __('fixedTexts.enter_about_spc_title_en') }}"
                                                            autocomplete="off" value="{!! fixedTexts()->about_spc_title_en ?? '' !!}">
                                                        <span class="form-text text-danger"
                                                            id="about_spc_title_en_error"></span>
                                                    </div>
                                                    <!--end::Group-->

                                                    <!--begin::Group-->
                                                    <div class="form-group">
                                                        <label>
                                                            {{ __('fixedTexts.about_spc_title_ar') }}
                                                        </label>
                                                        <input type="text" class="form-control  form-control-lg"
                                                            dir="rtl" name="about_spc_title_ar" id="about_spc_title_ar"
                                                            placeholder=" {{ __('fixedTexts.enter_about_spc_title_ar') }}"
                                                            autocomplete="off" value="{!! fixedTexts()->about_spc_title_ar ?? '' !!}">
                                                        <span class="form-text text-danger"
                                                            id="about_spc_title_ar_error"></span>
                                                    </div>
                                                    <!--end::Group-->

                                                    <!--begin::Group-->
                                                    <div class="form-group">
                                                        <label>
                                                            {{ __('fixedTexts.about_spc_goal_one_en') }}
                                                        </label>
                                                        <input type="text" class="form-control  form-control-lg"
                                                            name="about_spc_goal_one_en" id="about_spc_goal_one_en"
                                                            placeholder=" {{ __('fixedTexts.enter_about_spc_goal_one_en') }}"
                                                            autocomplete="off" value="{!! fixedTexts()->about_spc_goal_one_en ?? '' !!}">
                                                        <span class="form-text text-danger"
                                                            id="about_spc_goal_one_en_error"></span>
                                                    </div>
                                                    <!--end::Group-->


                                                    <!--begin::Group-->
                                                    <div class="form-group">
                                                        <label>
                                                            {{ __('fixedTexts.about_spc_goal_two_en') }}
                                                        </label>
                                                        <input type="text" class="form-control  form-control-lg"
                                                            name="about_spc_goal_two_en" id="about_spc_goal_two_en"
                                                            placeholder=" {{ __('fixedTexts.enter_about_spc_goal_two_en') }}"
                                                            autocomplete="off" value="{!! fixedTexts()->about_spc_goal_two_en ?? '' !!}">
                                                        <span class="form-text text-danger"
                                                            id="about_spc_goal_two_en_error"></span>
                                                    </div>
                                                    <!--end::Group-->



                                                    <!--begin::Group-->
                                                    <div class="form-group">
                                                        <label>
                                                            {{ __('fixedTexts.about_spc_goal_three_en') }}
                                                        </label>
                                                        <input type="text" class="form-control  form-control-lg"
                                                            name="about_spc_goal_three_en" id="about_spc_goal_three_en"
                                                            placeholder=" {{ __('fixedTexts.enter_about_spc_goal_three_en') }}"
                                                            autocomplete="off" value="{!! fixedTexts()->about_spc_goal_three_en ?? '' !!}">
                                                        <span class="form-text text-danger"
                                                            id="about_spc_goal_three_en_error"></span>
                                                    </div>
                                                    <!--end::Group-->

                                                    <!--begin::Group-->
                                                    <div class="form-group">
                                                        <label>
                                                            {{ __('fixedTexts.about_spc_goal_four_en') }}
                                                        </label>
                                                        <input type="text" class="form-control  form-control-lg"
                                                            name="about_spc_goal_four_en" id="about_spc_goal_four_en"
                                                            placeholder=" {{ __('fixedTexts.enter_about_spc_goal_four_en') }}"
                                                            autocomplete="off" value="{!! fixedTexts()->about_spc_goal_four_en ?? '' !!}">
                                                        <span class="form-text text-danger"
                                                            id="about_spc_goal_four_en_error"></span>
                                                    </div>
                                                    <!--end::Group-->



                                                    <!--begin::Group-->
                                                    <div class="form-group">
                                                        <label>
                                                            {{ __('fixedTexts.about_spc_goal_one_ar') }}
                                                        </label>
                                                        <input type="text" class="form-control  form-control-lg"
                                                            dir="rtl" name="about_spc_goal_one_ar"
                                                            id="about_spc_goal_one_ar"
                                                            placeholder=" {{ __('fixedTexts.enter_about_spc_goal_one_ar') }}"
                                                            autocomplete="off" value="{!! fixedTexts()->about_spc_goal_one_ar ?? '' !!}">
                                                        <span class="form-text text-danger"
                                                            id="about_spc_goal_one_ar_error"></span>
                                                    </div>
                                                    <!--end::Group-->

                                                    <!--begin::Group-->
                                                    <div class="form-group">
                                                        <label>
                                                            {{ __('fixedTexts.about_spc_goal_two_ar') }}
                                                        </label>
                                                        <input type="text" class="form-control  form-control-lg"
                                                            dir="rtl" name="about_spc_goal_two_ar"
                                                            id="about_spc_goal_two_ar"
                                                            placeholder=" {{ __('fixedTexts.enter_about_spc_goal_two_ar') }}"
                                                            autocomplete="off" value="{!! fixedTexts()->about_spc_goal_two_ar ?? '' !!}">
                                                        <span class="form-text text-danger"
                                                            id="about_spc_goal_two_ar_error"></span>
                                                    </div>
                                                    <!--end::Group-->


                                                    <!--begin::Group-->
                                                    <div class="form-group">
                                                        <label>
                                                            {{ __('fixedTexts.about_spc_goal_three_ar') }}
                                                        </label>
                                                        <input type="text" class="form-control  form-control-lg"
                                                            dir="rtl" name="about_spc_goal_three_ar"
                                                            id="about_spc_goal_three_ar"
                                                            placeholder=" {{ __('fixedTexts.enter_about_spc_goal_three_ar') }}"
                                                            autocomplete="off" value="{!! fixedTexts()->about_spc_goal_three_ar ?? '' !!}">
                                                        <span class="form-text text-danger"
                                                            id="about_spc_goal_three_ar_error"></span>
                                                    </div>
                                                    <!--end::Group-->


                                                    <!--begin::Group-->
                                                    <div class="form-group">
                                                        <label>
                                                            {{ __('fixedTexts.about_spc_goal_four_ar') }}
                                                        </label>
                                                        <input type="text" class="form-control  form-control-lg"
                                                            dir="rtl" name="about_spc_goal_four_ar"
                                                            id="about_spc_goal_four_ar"
                                                            placeholder=" {{ __('fixedTexts.enter_about_spc_goal_four_ar') }}"
                                                            autocomplete="off" value="{!! fixedTexts()->about_spc_goal_four_ar ?? '' !!}">
                                                        <span class="form-text text-danger"
                                                            id="about_spc_goal_four_ar_error"></span>
                                                    </div>
                                                    <!--end::Group-->



                                                    <!--begin::Group-->
                                                    <div class="form-group">
                                                        <label>
                                                            {{ __('fixedTexts.about_spc_details_en') }}
                                                        </label>
                                                        <textarea rows="10" class="form-control form-control-lg" name="about_spc_details_en" id="about_spc_details_en"
                                                            placeholder=" {{ __('fixedTexts.enter_about_spc_details_en') }}" autocomplete="off">{!! fixedTexts()->about_spc_details_en ?? '' !!}</textarea>
                                                        <span class="form-text text-danger"
                                                            id="about_spc_details_en_error"></span>
                                                    </div>
                                                    <!--end::Group-->

                                                    <!--begin::Group-->
                                                    <div class="form-group">
                                                        <label>
                                                            {{ __('fixedTexts.about_spc_details_ar') }}
                                                        </label>
                                                        <textarea rows="15" dir="rtl" class="form-control form-control-lg" name="about_spc_details_ar"
                                                            id="about_spc_details_ar" placeholder=" {{ __('fixedTexts.enter_about_spc_details_ar') }}" autocomplete="off">{!! fixedTexts()->about_spc_details_ar ?? '' !!}</textarea>
                                                        <span class="form-text text-danger"
                                                            id="about_spc_details_ar_error"></span>
                                                    </div>
                                                    <!--end::Group-->


                                                </div>
                                            </div>
                                        </div>
                                        <!--end::row-->
                                        <hr>


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
        var about_spc_photo = new KTImageInput('kt_about_spc_photo');

        //////////////////////////////////////////////////////
        $('#form_fixed_texts_store').on('submit', function(e) {
            e.preventDefault();
            //////////////////////////////////////////////////////////////
            $('#about_spc_title_en').css('border-color', '');
            $('#about_spc_title_ar').css('border-color', '');
            $('#about_spc_details_en').css('border-color', '');
            $('#about_spc_details_ar').css('border-color', '');
            $('#about_spc_goal_one_en').css('border-color', '');
            $('#about_spc_goal_two_en').css('border-color', '');
            $('#about_spc_goal_three_en').css('border-color', '');
            $('#about_spc_goal_four_en').css('border-color', '');
            $('#about_spc_goal_one_ar').css('border-color', '');
            $('#about_spc_goal_two_ar').css('border-color', '');
            $('#about_spc_goal_three_ar').css('border-color', '');
            $('#about_spc_goal_four_ar').css('border-color', '');
            $('#about_spc_photo').css('border-color', '');

            $('#about_spc_title_en_error').text('');
            $('#about_spc_title_ar_error').text('');
            $('#about_spc_details_en_error').text('');
            $('#about_spc_details_ar_error').text('');
            $('#about_spc_goal_one_en_error').text('');
            $('#about_spc_goal_two_en_error').text('');
            $('#about_spc_goal_three_en_error').text('');
            $('#about_spc_goal_four_en_error').text('');
            $('#about_spc_goal_one_ar_error').text('');
            $('#about_spc_goal_two_ar_error').text('');
            $('#about_spc_goal_three_ar_error').text('');
            $('#about_spc_goal_four_ar_error').text('');
            $('#about_spc_photo_error').text('');

            /////////////////////////////////////////////////////////////

            var data = new FormData(this);
            var type = $(this).attr('method');
            var url = $(this).attr('action');

            $.ajax({
                url: url,
                type: type,
                data: data,
                dataType: false,
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                    KTApp.blockPage({
                        overlayColor: '#000000',
                        state: 'danger',
                        message: "{{ trans('general.please_wait') }}",
                    });
                },
                success: function(data) {
                    KTApp.unblockPage();
                    console.log(data);
                    if (data.status == true) {
                        Swal.fire({
                            title: data.msg,
                            text: "",
                            icon: "success",
                            allowOutsideClick: false,
                            customClass: {
                                confirmButton: 'update_fixed_texts_button'
                            }
                        });
                        $('.update_fixed_texts_button').click(function() {
                            $('html, body').animate({
                                scrollTop: 5
                            }, 300);
                        });
                    }
                },

                error: function(reject) {
                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function(key, value) {
                        $('#' + key + '_error').text(value[0]);
                        $('#' + key).css('border-color', 'red');
                        $('body,html').animate({
                            scrollTop: 20
                        }, 300);
                    });
                },
                complete: function() {
                    KTApp.unblockPage();
                },
            })

        }); //end submit
    </script>
@endpush
