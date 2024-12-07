@extends('layouts.admin')
@section('title')
@endsection
@section('content')
    <form class="form" action="{{ route('admin.faqs.update') }}" method="POST" id="form_faq_update"
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
                            <a href="{{ route('admin.faqs') }}" class="text-muted">
                                {{ __('menu.faqs') }}
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="" class="text-muted">
                                {{ __('faqs.update') }}
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
                        <div class="card card-custom" id="card_languages">
                            <div class="card-body">

                                <div class="row justify-content-center ">
                                    <div class="col-xl-12">
                                        <!--begin::body-->
                                        <div class="my-5">
                                            <div class="alert alert-danger alert_errors d-none" style="padding-top: 20px">
                                                <ul></ul>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <ul class="nav  nav-tabs" id="myTab2" role="tablist">

                                    <li class="nav-item">
                                        <a class="nav-link active" id="" data-toggle="tab" href="#faq_details_en"
                                            aria-controls="profile">
                                            <span class="nav-icon"><i class="flaticon2-layers-1"></i></span>
                                            <span class="nav-text">{{ __('faqs.details_en_tab') }}</span>
                                        </a>
                                    </li>
                                    @if (setting()->site_lang_ar == 'on')
                                        <li class="nav-item">
                                            <a class="nav-link" id="faq_details_ar_tab" data-toggle="tab"
                                                href="#faq_details_ar" aria-controls="profile">
                                                <span class="nav-icon"><i class="flaticon2-layers-1"></i></span>
                                                <span class="nav-text">{{ __('faqs.details_ar_tab') }}</span>
                                            </a>
                                        </li>
                                    @endif
                                </ul>

                                <div class="tab-content mt-5">
                                    @include('admin.faq.update_tabs.details_ar')
                                    @if (setting()->site_lang_ar == 'on')
                                        @include('admin.faq.update_tabs.details_en')
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!--end::Card-->

                    </div>

                </div>
                <!--end::Row-->


            </div>
            <!--end::Container-->

            <!--begin::Form-->


        </div>

        <!--end::content-->

    </form>
@endsection
@push('js')
    <script type="text/javascript">
        $(document).ready(function() {
            //$('.note-frame').css('border-color', 'red');
            //$('#answer_en_div .note-frame').attr('border', '1px solid #973c10');
            // $('#answer_en_div.note-editor.note-frame').attr('border-color', 'red');
        });

        $('#form_faq_update').on('submit', function(e) {
            e.preventDefault();

            ////////////////////////////////////////////////////////////////////

            $('#question_en_error').text('');
            $('#question_ar_error').text('');
            $('#answer_en_error').text('');
            $('#answer_ar_error').text('');

            $('#question_en').css('border-color', '');
            $('#question_ar').css('border-color', '');

            $('#answer_en').css('border-color', '');
            $('#answer_ar').css('border-color', '');
            ///////////////////////////////////////////////////////////////////

            var data = new FormData(this);
            var type = $(this).attr('method');
            var url = $(this).attr('action');

            $.ajax({
                url: url,
                type: type,
                dataType: 'json',
                data: data,
                contentType: false,
                processData: false,
                cache: false,
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
                                confirmButton: 'update_faq_button'
                            }
                        });

                        $('.update_faq_button').click(function() {
                            window.location.href = "{{ route('admin.faqs') }}";
                        });
                    }

                }, //end success
                error: function(reject) {
                    KTApp.unblockPage();
                    $('html, body').animate({
                        scrollTop: 20
                    }, 300);
                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function(key, value) {
                        $('#' + key + '_error').text(value[0])
                        $('#' + key).css('border-color', '#F64E60 ')
                    });


                    FaqPrintErrors(response.errors);

                }, //end error
                complete: function() {
                    KTApp.unblockPage();
                }, //end complete
            }); //end ajax

        }); //end submit

        ////////////////////////////////////
        ////// Print Errors Function
        function FaqPrintErrors(msg) {

            $('.alert_errors').find('ul').empty();
            $('.alert_errors').removeClass('d-none');
            // $('.alert_success').addClass('d-none');
            //$('.loading_save_continue').addClass('d-none');
            $.each(msg, function(key, value) {
                $('.alert_errors').find('ul').append("<li>" + value + "</li>");
            });
        }
    </script>
@endpush
