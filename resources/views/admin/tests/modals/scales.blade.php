<div class="modal fade" id="test_scales_modal" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdrop" aria-hidden="true">

    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title test_scale_header" id="exampleModalLabel">{!! __('tests.scales') !!}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>


            <div class="modal-body">

                <!--begin: form-->
                <div class="row">
                    <div class="col-12">
                        <div class="row justify-content-center mb-10">
                            <div class="col-xl-12 col-xxl-12">

                                <form class="form inline-form" id="test_scales_form" name="test_scales_form"
                                    action="{!! route('admin.scales.store') !!}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="row g-3 d-none">
                                        <!--begin::Group-->
                                        <div class="col">
                                            <input type="text" class="form-control" name='scale_test_id_hidden'
                                                id="scale_test_id_hidden" readonly>

                                            <input type="text" class="form-control" name='scale_id_hidden'
                                                id="scale_id_hidden" readonly>

                                        </div>
                                        <!--end::Group-->
                                    </div>

                                    <div class="row g-3">

                                        <!--begin::Group-->
                                        <div class="col-12" style="text-align: center">
                                            <div>
                                                <div class="image-input image-input-outline" id="kt_scale_photo">

                                                    <!--  style="background-image: url({{-- asset(Storage::url(setting()->site_icon)) --}})"-->
                                                    <div class="image-input-wrapper" id=scale_wrapper></div>
                                                    <label
                                                        class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                        data-action="change" data-toggle="tooltip" title=""
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
                                    </div>
                                    <div class="row g-3">

                                        <!--begin::Group-->
                                        <div class="col-8">
                                            <label class="">
                                                {{ __('tests.statement') }}
                                            </label>
                                            <input type="text"class="form-control form-control-solid form-control-lg"
                                                name="statement" id="statement"
                                                placeholder=" {{ __('tests.enter_statement') }}" autocomplete="off" />
                                            <span class="form-text text-danger" id="statement_error"></span>

                                        </div>
                                        <!--end::Group-->

                                        <!--begin::Group-->
                                        <div class="col-2">
                                            <label class="">
                                                {{ __('tests.minimum') }}
                                            </label>
                                            <input type="text"class="form-control form-control-solid form-control-lg"
                                                name="minimum" id="minimum"
                                                placeholder=" {{ __('tests.enter_minimum') }}" autocomplete="off" />
                                            <span class="form-text text-danger" id="minimum_error"></span>

                                        </div>
                                        <!--end::Group-->


                                        <!--begin::Group-->
                                        <div class="col-2">
                                            <label class="">
                                                {{ __('tests.maximum') }}
                                            </label>
                                            <input type="text"class="form-control form-control-solid form-control-lg"
                                                name="maximum" id="maximum"
                                                placeholder=" {{ __('tests.enter_maximum') }}" autocomplete="off" />
                                            <span class="form-text text-danger" id="maximum_error"></span>

                                        </div>
                                        <!--end::Group-->


                                    </div>

                                    <div class="row g-3">
                                        <!--begin::Group-->
                                        <div class="col-10">
                                            <label class="">
                                                {{ __('tests.evaluation') }}
                                            </label>
                                            <input type="text"class="form-control form-control-solid form-control-lg"
                                                name="evaluation" id="evaluation"
                                                placeholder=" {{ __('tests.enter_evaluation') }}"
                                                autocomplete="off" />
                                            <span class="form-text text-danger" id="evaluation_error"></span>

                                        </div>
                                        <!--end::Group-->
                                        <div class="col-2 mt-8">
                                            <button type="submit" id="save_test_scale_btn"
                                                class="btn btn-primary font-weight-bold">
                                                {{ trans('general.save') }}
                                            </button>
                                        </div>


                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>

                </div>
                <!--end: form -->

                <!--begin::table-->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive table-wrapper">
                            <table class="table  table-hover test_scales_table" id="test_scales_table">
                                <thead>
                                    <tr>
                                        <th scope="col" class="col-1">{{ __('general.flag') }}</th>
                                        <th scope="col" class="col-1">{{ __('tests.photo') }}</th>
                                        <th scope="col" class="col-1">{{ __('tests.scale_id') }}</th>
                                        <th scope="col" class="col-2">{{ __('tests.statement') }}</th>
                                        <th scope="col" class="col-4">{{ __('tests.evaluation') }}</th>
                                        <th scope="col" class="col-1">{{ __('tests.minimum') }}</th>
                                        <th scope="col" class="col-1">{{ __('tests.maximum') }}</th>
                                        <th scope="col" class="col-2 text-center">
                                            {{ __('general.actions') }}
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id='test_scales_tbody'></tbody>

                            </table>
                        </div>
                    </div>
                    <!--end: form-->
                </div>
                <!--end::table-->
            </div>


            <div class="modal-footer">
                <button type="button" id="cancel_test_scale_btn" class="btn btn-light-dark font-weight-bold">
                    {{ trans('general.cancel') }}
                </button>
            </div>

        </div>
    </div>
</div>
@push('js')
    <script type="text/javascript">
        var photo = new KTImageInput('kt_scale_photo');


        // reset test scale form function
        function resetTestScaleForm() {
            $('#test_scales_form')[0].reset();
            $('#statement_error').text('');
            $('#evaluation_error').text('');
            $('#minimum_error').text('');
            $('#maximum_error').text('');
            $('#photo_error').text('');

            $('#statement').css('border-color', '');
            $('#evaluation').css('border-color', '');
            $('#minimum').css('border-color', '');
            $('#maximum').css('border-color', '');
        }

        // draw test scales table
        function drawTestScalesTable(data) {

            flag = 'stored'

            trHTML = "";
            if (!$.trim(data)) {
                $("#test_scales_tbody").empty();
                trHTML += '<tr class="notfound" id="notfound">' +
                    '<td colspan="10">' + '{{ __('general.no_record_found') }}' + '</td>' +
                    '</tr>';
            } else {
                $("#test_scales_tbody").empty();
                $.each(data, function(i, item) {

                    var photo = item.photo;
                    if (!$.trim(photo)) {
                        var url = '{{ asset('adminBoard/images/no_image.jpg') }}';
                    } else {
                        var url = '{{ asset('adminBoard/uploadedImages/tests/scales/') }}/' + photo;

                    }

                    trHTML += '<tr id="row_' + item.id +
                        '"><td class="col-1"><span class="label label-info label-inline mr-2">' + flag +
                        '</span></td>' +
                        '<td class="col-1">' + item.id + '</td>' +
                        '<td class="col-1"><img width="50" height ="50" src="' + url + '"></td>' +
                        '<td class="col-2">' + item.statement + '</td>' +
                        '<td class="col-4">' + item.evaluation + '</td>' +
                        '<td class="col-1">' + item.minimum + '</td>' +
                        '<td class="col-1">' + item.maximum + '</td>' +
                        '<td class="col-2"> <a href = "#" id="edit_test_scale_btn" class="btn btn-hover-info btn-icon btn-pill edit_test_scale_btn" data-id="' +
                        item.id +
                        '" data-statement="' + item.statement +
                        '" data-evaluation="' + item.evaluation +
                        '" data-minimum="' + item.minimum +
                        '" data-maximum="' + item.maximum +
                        '""><i class="fa fa-edit fa-1x"></i></a> <a href = "#" id="delete_test_scale_btn"  class="btn btn-hover-danger btn-icon btn-pill delete_test_scale_btn"  data-id="' +
                        item.id +
                        '"><i class="fa fa-trash fa-1x"></i></a></td>' +
                        '</tr>';
                });
            }

            $('#test_scales_tbody').append(trHTML);
        };

        // show scales modal
        $('body').on('click', '.add_test_scales_btn', function(e) {
            e.preventDefault();
            var test_id = $(this).attr('data-id');
            var test_name = $(this).attr('data-name');

            $.get("{{ route('admin.get.scales.by.test.id') }}", {
                test_id,
                test_id
            }, function(data) {
                $('#scale_test_id_hidden').val(test_id);
                $('.test_scale_header').text(test_name);
                drawTestScalesTable(data);
                $('#test_scales_modal').modal('show');
            });
        });

        // cancel test scale btn
        $('body').on('click', '#cancel_test_scale_btn', function(e) {
            resetTestScaleForm();
            $('#test_scales_modal').modal('hide');
        });

        // hide scale modal
        $('#test_scales_modal').on('hidden.bs.modal', function(e) {
            resetTestScaleForm();
            $('#test_scales_modal').modal('hide');
        });

        // submit
        $('#test_scales_form').on('submit', function(e) {
            e.preventDefault();

            var data = new FormData(this);
            var type = $(this).attr('method');
            var dataType = 'json';
            var url = $(this).attr('action');

            var flag = 'added';
            label = 'label-success';
            var scale_id_hidden = $('#scale_id_hidden').val();

            $.ajax({
                url: url,
                type: type,
                dataType: dataType,
                data: data,
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
                                confirmButton: 'add_test_scale_button'
                            }
                        });

                        $('.add_test_scale_button').click(function() {

                            var trHTML = '';
                            if (!$.trim(data.data)) {
                                $("#test_scales_tbody").empty();
                                trHTML += '<tr class="notfound" id="notfound">' +
                                    '<td colspan="2">' +
                                    '{{ __('general.not_found') }}' +
                                    '</td>' +
                                    '</tr>';
                                $('#test_scales_tbody').append(trHTML);
                            } else {

                                $("#notfound").empty();

                                // update
                                if (scale_id_hidden) {
                                    $('#row_' + scale_id_hidden).remove();
                                    flag = 'updated';
                                    label = 'label-warning';
                                }

                                var photo = data.data.photo;
                                if (!$.trim(photo)) {
                                    var url = '{{ asset('adminBoard/images/no_image.jpg') }}';
                                } else {
                                    var url =
                                        '{{ asset('adminBoard/uploadedImages/tests/scales/') }}/' +
                                        photo;
                                }

                                var trHTML = '';
                                trHTML += '<tr id="row_' + data.data.id +
                                    '"><td class="col-1"><span class="label ' + label +
                                    '  label-inline mr-2">' +
                                    flag + '</span></td>' +
                                    '<td class="col-1">' + data.data.id + '</td>' +
                                    '<td class="col-1"><img width="50" height ="50" src="' +
                                    url + '"></td>' +
                                    '<td class="col-2">' + data.data.statement + '</td>' +
                                    '<td class="col-4">' + data.data.evaluation + '</td>' +
                                    '<td class="col-1">' + data.data.minimum + '</td>' +
                                    '<td class="col-1">' + data.data.maximum + '</td>' +
                                    '<td class="col-2"> <a href = "#" id="edit_test_scale_btn" class="btn btn-hover-primary btn-icon btn-pill edit_test_scale_btn" data-id="' +
                                    data.data.id +
                                    '" data-statement="' + data.data.statement +
                                    '" data-evaluation="' + data.data.evaluation +
                                    '" data-minimum="' + data.data.minimum +
                                    '" data-maximum="' + data.data.maximum +
                                    '"><i class="fa fa-edit fa-1x"></i></a> <a href = "#" id="delete_test_scale_btn"  class="btn btn-hover-danger btn-icon btn-pill delete_test_scale_btn"  data-id="' +
                                    data.data.id +
                                    '"><i class="fa fa-trash fa-1x"></i></a></td>' +
                                    '</tr>';

                                $('#statement_error').text('');
                                $('#evaluation_error').text('');
                                $('#minimum_error').text('');
                                $('#maximum_error').text('');
                                $('#photo_error').text('');
                                $('#statement').css('border-color', '');
                                $('#evaluation').css('border-color', '');
                                $('#minimum').css('border-color', '');
                                $('#maximum').css('border-color', '');

                                $('#statement').val('');
                                $('#evaluation').val('');
                                $('#minimum').val('');
                                $('#maximum').val('');
                                $('#scale_id_hidden').val('');

                                var url = '{{ asset('adminBoard/images/no_image.jpg') }}';
                                console.log(url);

                                $('#scale_wrapper').css("background-image", "none");
                                $('#photo').val('');



                                $('#test_scales_tbody').prepend(trHTML);
                            }
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
                },
                complete: function(data) {
                    KTApp.unblockPage();
                },

            });

        });

        //  delete test scale
        $('body').on('click', '.delete_test_scale_btn', function(e) {
            e.preventDefault();

            var scale_id = $(this).data('id');

            $.ajax({
                url: "{!! route('admin.scales.delete') !!}",
                type: 'POST',
                dataType: 'json',
                data: {
                    scale_id,
                    scale_id
                },

                beforeSend: function() {

                },
                success: function(data) {
                    KTApp.unblockPage();

                    Swal.fire({
                        title: data.msg,
                        text: "",
                        icon: "success",
                        allowOutsideClick: false,
                        customClass: {
                            confirmButton: 'delete_scale_button'
                        }
                    });
                    $('.delete_scale_button').click(function() {
                        $('#row_' + scale_id).remove();
                        $('#scale_id_hidden').val('');
                        $('#statement').val('');
                        $('#evaluation').val('');
                        $('#minimum').val('');
                        $('#maximum').val('');
                    });


                },

            });
        });


        // edit test scale
        $('body').on('click', '.edit_test_scale_btn', function(e) {
            e.preventDefault();
            var scale_id = $(this).attr('data-id');
            var scale_statement = $(this).attr('data-statement');
            var scale_evaluation = $(this).attr('data-evaluation');
            var scale_minimum = $(this).attr('data-minimum');
            var scale_maximum = $(this).attr('data-maximum');

            $('#scale_id_hidden').val(scale_id);
            $('#statement').val(scale_statement);
            $('#evaluation').val(scale_evaluation);
            $('#minimum').val(scale_minimum);
            $('#maximum').val(scale_maximum);
        });
    </script>
@endpush
@push('css')
    <style>
        .table-wrapper {
            max-height: 350px;
            overflow: auto;
            display: inline-block;
        }

        .table th,
        .table td {
            padding: 0.75rem;
            vertical-align: middle;
            border-top: 1px solid #EBEDF3;
        }

        .notfound {
            text-align: center;
            font-size: 12px;
            font-weight: bolder;
        }
    </style>
@endpush
