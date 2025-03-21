@extends('layouts.admin')
@section('title')
@endsection
@section('content')
    <form class="form" action="{{ route('admin.about.site.update') }}" method="POST" id="about_site_update_from"
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
                            <a href="{{ route('admin.about.site') }}" class="text-muted">
                                {{ __('menu.about_site') }}
                            </a>
                        </li>
                        {{-- <li class="breadcrumb-item">
                            <a href="" class="text-muted">
                                {{ __('menu.add_new_about_spc') }}
                            </a>
                        </li> --}}
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

                                <ul class="nav nav-tabs" id="myTab2" role="tablist">

                                    <li class="nav-item">
                                        <a class="nav-link active" id="counters_tab" data-toggle="tab" href="#counters">
                                            <span class="nav-icon"><i class="flaticon2-layers-2"></i></span>
                                            <span class="nav-text">{{ __('aboutSite.counters_tab') }}</span>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" id="about_doctor_tab" data-toggle="tab" href="#about_doctor">
                                            <span class="nav-icon"><i class="flaticon2-layers-2"></i></span>
                                            <span class="nav-text">{{ __('aboutSite.about_doctor_tab') }}</span>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" id="whom_tab" data-toggle="tab" href="#whom">
                                            <span class="nav-icon"><i class="flaticon2-layers-2"></i></span>
                                            <span class="nav-text">{{ __('aboutSite.whom_tab') }}</span>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" id="who_are_you_tab" data-toggle="tab" href="#who_are_you">
                                            <span class="nav-icon"><i class="flaticon2-layers-2"></i></span>
                                            <span class="nav-text">{{ __('aboutSite.who_are_you_tab') }}</span>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link " id="why_chose_us_tab" data-toggle="tab" href="#why_chose_us">
                                            <span class="nav-icon"><i class="flaticon2-layers-2"></i></span>
                                            <span class="nav-text">{{ __('aboutSite.why_chose_us_tab') }}</span>
                                        </a>
                                    </li>

                                </ul>

                                <div class="tab-content mt-5">
                                    @include('admin.about.aboutSite.tabs.counters')
                                    @include('admin.about.aboutSite.tabs.about_doctor')
                                    @include('admin.about.aboutSite.tabs.whom')
                                    @include('admin.about.aboutSite.tabs.who_are_you')
                                    @include('admin.about.aboutSite.tabs.why_chose_us')
                                </div>
                            </div>

                        </div>
                        <!--end::Card-->
                    </div>
                </div>
                <!--end::Row-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::content-->

    </form>
@endsection
@push('js')
    <script type="text/javascript">
        $('#about_site_update_from').on('submit', function(e) {
            e.preventDefault();
            ////////////////////////////////////////////////////////////////////
            $('#whom_brochure_error').text('');
            $('#whom_brochure').css('border-color', '');
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
                                confirmButton: 'add_about_spc_button'
                            }
                        });
                        $('.add_about_spc_button').click(function() {
                            window.location.href = "{{ route('admin.about.site') }}";
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
                    AboutSpcPrintErrors(response.errors)
                }, //end error
                complete: function() {
                    KTApp.unblockPage();
                }, //end complete
            }); //end ajax

        }); //end submit
        ////////////////////////////////////
        ////// Print Errors Function
        function AboutSpcPrintErrors(msg) {
            $('.alert_errors').find('ul').empty();
            $('.alert_errors').removeClass('d-none');
            $('.alert_success').addClass('d-none');
            $.each(msg, function(key, value) {
                $('.alert_errors').find('ul').append("<li>" + value + "</li>");
            });
        }
    </script>
@endpush
