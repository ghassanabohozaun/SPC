@extends('layouts.admin')
@section('title') @endsection
@section('content')

    <form class="form" action="{{route('admin.report.update')}}" method="POST" id="form_report_update"
          enctype="multipart/form-data">
        @csrf
        <!--begin::Subheader-->
        <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
            <div
                class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Info-->
                <div class="d-flex align-items-center flex-wrap mr-2">

                    <!--begin::Actions-->
                    <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>


                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.report.index')}}" class="text-muted">
                                {{__('menu.reports')}}
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="" class="text-muted">
                                {{__('reports.update')}}
                            </a>
                        </li>
                    </ul>

                    <!--end::Actions-->
                </div>
                <!--end::Info-->

                <!--begin::Toolbar-->
                <div class="d-flex align-items-center">

                    <button type="submit"
                            class="btn btn-primary btn-sm font-weight-bold font-size-base  mr-1">
                        <i class="fa fa-save"></i>
                        {{__('general.save')}}
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

                                <div class="tab-content mt-5">
                                    <div class="row justify-content-center py-8 px-8 py-lg-15 px-lg-10">
                                        <div class="col-xl-12 col-xxl-10">

                                            <div class="row justify-content-center">
                                                <div class="col-xl-9" style="height: 550px">

                                                    <!--begin::body-->
                                                    <div class="my-5">

                                                        <!--begin::Group-->
                                                        <div class=" form-group row d-none">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                                ID
                                                            </label>
                                                            <div class="col-lg-9 col-xl-9">
                                                                <input value="{{$report->id}}"
                                                                       class="form-control form-control-solid form-control-lg"
                                                                       name="id" id="id" type="hidden"
                                                                       autocomplete="off"/>
                                                                <input type="hidden" name="hidden_file"
                                                                       value="hidden_file">
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->

                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                                {{__('reports.type')}}
                                                            </label>
                                                            <div class="col-lg-9 col-xl-9">

                                                                <select
                                                                    class="form-control  form-control-lg"
                                                                    name="type" id="type" type="text">
                                                                    <option
                                                                        value="">{{__('general.select_from_list')}}
                                                                    </option>
                                                                    <option
                                                                        value="Financial" {{$report->type=='Financial' ? 'selected' : '' }}>
                                                                        {{__('reports.financial')}}
                                                                    </option>

                                                                    <option
                                                                        value="Administrative" {{$report->type=='Administrative'? 'selected' : '' }}>
                                                                        {{__('reports.administrative')}}
                                                                    </option>

                                                                </select>
                                                                <span class="form-text text-danger"
                                                                      id="gender_error"></span>
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->

                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                                {{__('reports.year')}}
                                                            </label>
                                                            <div class="col-lg-9 col-xl-9">
                                                                {{-- {{ $planMaster->end_fin_year == $year ? 'selected' : '' }} --}}
                                                                <select
                                                                    class="form-control  form-control-lg"
                                                                    name="year" id="year" type="text">
                                                                    <?php
                                                                    $firstYear = (int)date('Y') - 2;
                                                                    $lastYear = $firstYear + 6;
                                                                    ?>
                                                                    <option value="">{{__('general.select_from_list')}}
                                                                    </option>

                                                                    @for ($year= $firstYear; $year<= $lastYear; $year++)
                                                                        <option
                                                                            value="{{$year}}" {{ $report->year == $year ? 'selected' : '' }} >{{ $year }}</option>
                                                                    @endfor
                                                                </select>
                                                                <span class="form-text text-danger"
                                                                      id="gender_error"></span>
                                                            </div>

                                                        </div>
                                                        <!--end::Group-->

                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                                {{__('reports.file')}}
                                                            </label>
                                                            <div class="col-lg-9 col-xl-9">

                                                                <div class="custom-file">
                                                                    <input type="file" class="custom-file-input"
                                                                           id="file" name="file">
                                                                    <label class="custom-file-label" choose="" file="">
                                                                    </label>
                                                                </div>
                                                                <span class="form-text text-muted">
                                                                {{__('general.file_format_allow')}}
                                                                </span>
                                                                <span class="form-text text-danger"
                                                                      id="file_error">
                                                                </span>
                                                                <a class="font-weight-bold"
                                                                   href="{{asset('adminBoard/uploadedFiles/reports/'. $report->file)}}"
                                                                   target="_blank">{!! __('general.download') !!}</a>
                                                            </div>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
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
                <!--end::Row-->
            </div>
        </div>
    </form>

@endsection
@push('js')

    <script type="text/javascript">


        $('#form_report_update').on('submit', function (e) {
            e.preventDefault();
            ////////////////////////////////////////////////////////////////////
            $('#type_error').text('');
            $('#year_error').text('');
            $('#file_error').text('');

            $('#type').css('border-color', '');
            $('#year').css('border-color', '');
            $('#file').css('border-color', '');
            $('.custom-file-label').css('border', '')
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
                beforeSend: function () {
                    KTApp.blockPage({
                        overlayColor: '#000000',
                        state: 'danger',
                        message: "{{__('general.please_wait')}}",
                    });
                },
                success: function (data) {
                    KTApp.unblockPage();
                    console.log(data);
                    if (data.status == true) {
                        Swal.fire({
                            title: data.msg,
                            text: "",
                            icon: "success",
                            allowOutsideClick: false,
                            customClass: {confirmButton: 'update_report_button'}
                        });
                        $('.update_report_button').click(function () {
                            window.location.href = "{{route('admin.report.index')}}";
                        });
                    }

                },//end success
                error: function (reject) {
                    KTApp.unblockPage();
                    $('html, body').animate({scrollTop: 20}, 300);
                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function (key, value) {
                        $('#' + key + '_error').text(value[0])
                        $('#' + key).css('border-color', '#F64E60 ')
                        $('.custom-file-label').css('border', '1px solid #F64E60 ')
                    });
                    ArticlePrintErrors(response.errors)
                },//end error
                complete: function () {
                    KTApp.unblockPage();
                },//end complete
            });//end ajax

        });//end submit
        ////////////////////////////////////
        ////// Print Errors Function
        function ArticlePrintErrors(msg) {

            $('.alert_errors').find('ul').empty();
            $('.alert_errors').removeClass('d-none');
            $('.alert_success').addClass('d-none');
            $('.loading_save_continue').addClass('d-none');
            $.each(msg, function (key, value) {
                $('.alert_errors').find('ul').append("<li>" + value + "</li>");
            });
        }

    </script>
@endpush
