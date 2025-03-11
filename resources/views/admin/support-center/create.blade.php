@extends('layouts.admin')
@section('title')
@endsection
@section('content')
    <form class="form" action="{!! route('admin.support.center.send') !!}" method="POST" id="form_message_send">
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
                            <a href="{{ route('admin.support.center') }}" class="text-muted">
                                {{ __('menu.support_center') }}
                            </a>
                        </li>

                        <li class="breadcrumb-item">
                            <a href="" class="text-muted">
                                {{ __('supportCenter.send_message') }}
                            </a>
                        </li>
                    </ul>

                    <!--end::Actions-->
                </div>
                <!--end::Info-->

                <!--begin::Toolbar-->
                <div class="d-flex align-items-center">
                    <button type="submit" class="btn btn-primary btn-sm font-weight-bold font-size-base  mr-1">
                        @if (Lang() == 'ar')
                            <i class="fa fa-angle-double-left"></i>
                        @else
                            <i class="fa fa-angle-double-right"></i>
                        @endif
                        {{ __('general.submit') }}
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
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            {{ __('supportCenter.name') }}
                                                        </label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <input class="form-control form-control-solid form-control-lg"
                                                                name="name" id="name" type="text"
                                                                placeholder=" {{ __('supportCenter.enter_name') }}"
                                                                autocomplete="off" />
                                                            <span class="form-text text-danger" id="name_error"></span>
                                                        </div>
                                                    </div>
                                                    <!--end::Group-->

                                                    <!--begin::Group-->
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            {{ __('supportCenter.mobile') }}
                                                        </label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <input class="form-control form-control-solid form-control-lg"
                                                                name="mobile" id="mobile" type="mobile"
                                                                placeholder=" {{ __('supportCenter.enter_mobile') }}"
                                                                autocomplete="off" />
                                                            <span class="form-text text-danger" id="mobile_error"></span>
                                                        </div>
                                                    </div>
                                                    <!--end::Group-->



                                                    <!--begin::Group-->
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            {{ __('supportCenter.email') }}
                                                        </label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <input class="form-control form-control-solid form-control-lg"
                                                                name="email" id="email" type="email"
                                                                placeholder=" {{ __('supportCenter.enter_email') }}"
                                                                autocomplete="off" />
                                                            <span class="form-text text-danger" id="email_error"></span>
                                                        </div>
                                                    </div>
                                                    <!--end::Group-->


                                                    <!--begin::Group-->
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            {{ __('supportCenter.title') }}
                                                        </label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <input class="form-control form-control-solid form-control-lg"
                                                                name="title" id="title" type="text"
                                                                placeholder=" {{ __('supportCenter.enter_title') }}"
                                                                autocomplete="off" />
                                                            <span class="form-text text-danger" id="title_error"></span>
                                                        </div>
                                                    </div>
                                                    <!--end::Group-->


                                                    <!--begin::Group-->
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            {{ __('supportCenter.message') }}
                                                        </label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <textarea rows="7" class="form-control form-control-solid form-control-lg" name="message" id="message"
                                                                type="text" placeholder=" {{ __('supportCenter.enter_message') }}" autocomplete="off"></textarea>
                                                            <span class="form-text text-danger" id="message_error"></span>

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
        $('#form_message_send').on('submit', function(e) {
            e.preventDefault();
            //////////////////////////////////////////////////////////////
            $('#name').css('border-color', '');
            $('#mobile').css('border-color', '');
            $('#email').css('border-color', '');
            $('#title').css('border-color', '');
            $('#message').css('border-color', '');

            $('#name_error').text('');
            $('#mobile_error').text('');
            $('#email_error').text('');
            $('#title_error').text('');
            $('#message_error').text('');
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
                        message: "{{ __('general.please_wait') }}",
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
                                confirmButton: 'send_message_button'
                            }
                        });
                        $('.send_message_button').click(function() {
                            window.location.href = "{{ route('admin.support.center') }}";
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
