<div class="modal fade" id="test_answers_modal" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdrop" aria-hidden="true">

    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title test_answer_header" id="exampleModalLabel">{!! __('tests.answers') !!}</h5>
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

                                <form class="form inline-form" id="test_answers_form" name="test_answers_form"
                                    action="{!! route('admin.answers.store') !!}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="row g-3 d-none">
                                        <!--begin::Group-->
                                        <div class="col">
                                            <input type="text" class="form-control" name='answer_test_id_hidden'
                                                id="answer_test_id_hidden" readonly>
                                            <input type="text" class="form-control" name='answer_id_hidden'
                                                id="answer_id_hidden" readonly>

                                        </div>
                                        <!--end::Group-->
                                    </div>

                                    <div class="row g-3">

                                        <!--begin::Group-->
                                        <div class="col-8">
                                            <label class="">
                                                {{ __('tests.answer_text') }}
                                            </label>
                                            <input type="text"class="form-control form-control-solid form-control-lg"
                                                name="answer_text" id="answer_text"
                                                placeholder=" {{ __('tests.enter_answer_text') }}" autocomplete="off" />
                                            <span class="form-text text-danger" id="answer_text_error"></span>

                                        </div>
                                        <!--end::Group-->

                                        <!--begin::Group-->
                                        <div class="col-2">
                                            <label class="">
                                                {{ __('tests.answer_value') }}
                                            </label>
                                            <input type="text"class="form-control form-control-solid form-control-lg"
                                                name="answer_value" id="answer_value"
                                                placeholder=" {{ __('tests.enter_answer_value') }}"
                                                autocomplete="off" />
                                            <span class="form-text text-danger" id="answer_value_error"></span>

                                        </div>
                                        <!--end::Group-->

                                        <div class="col-2 mt-8">
                                            <button type="submit" id="save_test_answer_btn"
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
                            <table class="table  table-hover test_answers_table" id="test_answers_table">
                                <thead>
                                    <tr>
                                        <th scope="col" class="col-1">{{ __('general.flag') }}</th>
                                        <th scope="col" class="col-1">{{ __('tests.answer_id') }}</th>
                                        <th scope="col" class="col-6">{{ __('tests.answer_text') }}</th>
                                        <th scope="col" class="col-2">{{ __('tests.answer_value') }}</th>
                                        <th scope="col" class="col-2 text-center">
                                            {{ __('general.actions') }}
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id='test_answers_tbody'></tbody>

                            </table>
                        </div>
                    </div>
                    <!--end: form-->
                </div>
                <!--end::table-->
            </div>


            <div class="modal-footer">
                <button type="button" id="cancel_test_answer_btn" class="btn btn-light-dark font-weight-bold">
                    {{ trans('general.cancel') }}
                </button>
            </div>

        </div>
    </div>
</div>
@push('js')
    <script type="text/javascript">
        // reset test answer form function
        function resetTestAnswerForm() {
            $('#test_answers_form')[0].reset();
            $('#answer_text_error').text('');
            $('#answer_value_error').text('');
            $('#answer_text').css('border-color', '');
            $('#answer_value').css('border-color', '');
        }

        // draw test answers table
        function drawTestAnswersTable(data) {

            flag = 'stored'

            trHTML = "";
            if (!$.trim(data)) {
                $("#test_answers_tbody").empty();
                trHTML += '<tr class="notfound" id="notfound">' +
                    '<td colspan="10">' + '{{ __('general.no_record_found') }}' + '</td>' +
                    '</tr>';
            } else {
                $("#test_answers_tbody").empty();
                $.each(data, function(i, item) {
                    trHTML += '<tr id="row_' + item.id +
                        '"><td class="col-1"><span class="label label-info label-inline mr-2">' + flag +
                        '</span></td>' +
                        '<td class="col-1">' + item.id + '</td>' +
                        '<td class="col-6">' + item.answer_text + '</td>' +
                        '<td class="col-2">' + item.answer_value + '</td>' +
                        '<td class="col-2"> <a href = "#" id="edit_test_answer_btn" class="btn btn-hover-info btn-icon btn-pill edit_test_answer_btn" data-id="' +
                        item.id +
                        '" data-text="' + item.answer_text +
                        '" data-value="' + item.answer_value +
                        '""><i class="fa fa-edit fa-1x"></i></a> <a href = "#" id="delete_test_answer_btn"  class="btn btn-hover-danger btn-icon btn-pill delete_test_answer_btn"  data-id="' +
                        item.id +
                        '"><i class="fa fa-trash fa-1x"></i></a></td>' +
                        '</tr>';
                });
            }

            $('#test_answers_tbody').append(trHTML);
        };


        // show answers modal
        $('body').on('click', '.add_test_answers_btn', function(e) {
            e.preventDefault();

            var test_id = $(this).attr('data-id');
            var test_name = $(this).attr('data-name');
            $.get("{{ route('admin.get.answers.by.test.id') }}", {
                test_id,
                test_id
            }, function(data) {
                $('.test_answer_header').text(test_name);
                $('#answer_test_id_hidden').val(test_id);
                drawTestAnswersTable(data);
                $('#test_answers_modal').modal('show');
            });
        });

        // cancel test answer btn
        $('body').on('click', '#cancel_test_answer_btn', function(e) {
            resetTestAnswerForm();
            $('#test_answers_modal').modal('hide');
        });

        // hide answers modal
        $('#test_answers_modal').on('hidden.bs.modal', function(e) {
            resetTestAnswerForm();
            $('#test_answers_modal').modal('hide');
        });

        // submit
        $('#test_answers_form').on('submit', function(e) {
            e.preventDefault();

            var data = new FormData(this);
            var type = $(this).attr('method');
            var dataType = 'json';
            var url = $(this).attr('action');

            var flag = 'added';
            label = 'label-success';
            var answer_id_hidden = $('#answer_id_hidden').val();

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
                                confirmButton: 'add_test_answer_button'
                            }
                        });

                        $('.add_test_answer_button').click(function() {

                            var trHTML = '';
                            if (!$.trim(data.data)) {
                                $("#test_answers_tbody").empty();
                                trHTML += '<tr class="notfound" id="notfound">' +
                                    '<td colspan="2">' +
                                    '{{ __('general.not_found') }}' +
                                    '</td>' +
                                    '</tr>';
                                $('#test_answers_tbody').append(trHTML);
                            } else {

                                $("#notfound").empty();

                                // update
                                if (answer_id_hidden) {
                                    $('#row_' + answer_id_hidden).remove();
                                    flag = 'updated';
                                    label = 'label-warning';
                                }

                                var trHTML = '';
                                trHTML += '<tr id="row_' + data.data.id +
                                    '"><td class="col-1"><span class="label ' + label +
                                    '  label-inline mr-2">' +
                                    flag + '</span></td>' +
                                    '<td class="col-1">' + data.data.id + '</td>' +
                                    '<td class="col-6">' + data.data.answer_text + '</td>' +
                                    '<td class="col-2">' + data.data.answer_value + '</td>' +
                                    '<td class="col-2"> <a href = "#" id="edit_test_answer_btn" class="btn btn-hover-primary btn-icon btn-pill edit_test_answer_btn" data-id="' +
                                    data.data.id +
                                    '" data-text="' + data.data.answer_text +
                                    '" data-value="' + data.data.answer_value +
                                    '"><i class="fa fa-edit fa-1x"></i></a> <a href = "#" id="delete_test_answer_btn"  class="btn btn-hover-danger btn-icon btn-pill delete_test_answer_btn"  data-id="' +
                                    data.data.id +
                                    '"><i class="fa fa-trash fa-1x"></i></a></td>' +
                                    '</tr>';

                                $('#test_answers_tbody').prepend(trHTML);

                                $('#answer_text_error').text('');
                                $('#answer_text').css('border-color', '');
                                $('#answer_value_error').text('');
                                $('#answer_value').css('border-color', '');

                                $('#answer_text').val('');
                                $('#answer_value').val('');
                                $('#answer_id_hidden').val('');

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

        //  delete test _answer
        $('body').on('click', '.delete_test_answer_btn', function(e) {
            e.preventDefault();

            var answer_id = $(this).data('id');

            $.ajax({
                url: "{!! route('admin.answers.delete') !!}",
                type: 'POST',
                dataType: 'json',
                data: {
                    answer_id,
                    answer_id
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
                            confirmButton: 'delete_answer_button'
                        }
                    });
                    $('.delete_answer_button').click(function() {
                        $('#row_' + answer_id).remove();
                        $('#answer_id_hidden').val('');
                        $('#answer_text').val('');
                        $('#answer_value').val('');
                    });


                },

            });
        });

        // edit test answer
        $('body').on('click', '.edit_test_answer_btn', function(e) {
            e.preventDefault();
            var answer_id = $(this).attr('data-id');
            var answer_text = $(this).attr('data-text');
            var answer_value = $(this).attr('data-value');
            $('#answer_id_hidden').val(answer_id);
            $('#answer_text').val(answer_text);
            $('#answer_value').val(answer_value);
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
