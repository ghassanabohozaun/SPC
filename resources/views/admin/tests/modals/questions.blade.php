<div class="modal fade" id="test_questions_modal" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdrop" aria-hidden="true">

    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title test_question_header" id="exampleModalLabel">{!! __('tests.questions') !!}</h5>
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

                                <form class="form inline-form" id="test_questions_form" name="test_questions_form"
                                    action="{!! route('admin.questions.store') !!}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="row g-3 d-none">
                                        <!--begin::Group-->
                                        <div class="col">
                                            <input type="text" class="form-control" name='question_test_id_hidden'
                                                id="question_test_id_hidden" readonly>
                                            <input type="text" class="form-control" name='question_id_hidden'
                                                id="question_id_hidden" readonly>

                                        </div>
                                        <!--end::Group-->
                                    </div>

                                    <div class="row g-3">

                                        <!--begin::Group-->
                                        <div class="col-10">
                                            <label class="">
                                                {{ __('tests.question') }}
                                            </label>
                                            <input type="text"
                                                class="form-control form-control-solid form-control-lg" name="question"
                                                id="question" placeholder=" {{ __('tests.enter_question') }}"
                                                autocomplete="off" />
                                            <span class="form-text text-danger" id="question_error"></span>

                                        </div>
                                        <!--end::Group-->

                                        <div class="col-2 mt-8">
                                            <button type="submit" id="save_test_question_btn"
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
                            <table class="table  table-hover test_questions_table" id="test_questions_table">
                                <thead>
                                    <tr>
                                        <th scope="col" class="col-1">{{ __('general.flag') }}</th>
                                        <th scope="col" class="col-1">{{ __('tests.question_id') }}</th>
                                        <th scope="col" class="col-8">{{ __('tests.question') }}</th>
                                        <th scope="col" class="col-2 text-center">
                                            {{ __('general.actions') }}
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id='test_questions_tbody'></tbody>

                            </table>
                        </div>
                    </div>
                    <!--end: form-->
                </div>
                <!--end::table-->
            </div>


            <div class="modal-footer">
                <button type="button" id="cancel_test_question_btn" class="btn btn-light-dark font-weight-bold">
                    {{ trans('general.cancel') }}
                </button>
            </div>

        </div>
    </div>
</div>


@push('js')
    <script type="text/javascript">
        // reset test question form function
        function resetTestQuestionForm() {
            $('#test_questions_form')[0].reset();
            $('#question_error').text('');
            $('#question').css('border-color', '');
        }

        // draw test questions table
        function drawTestQuestionsTable(data) {

            flag = 'stored'

            trHTML = "";
            if (!$.trim(data)) {
                $("#test_questions_tbody").empty();
                trHTML += '<tr class="notfound" id="notfound">' +
                    '<td colspan="10">' + '{{ __('general.no_record_found') }}' + '</td>' +
                    '</tr>';
            } else {
                $("#test_questions_tbody").empty();
                $.each(data, function(i, item) {
                    trHTML += '<tr id="row_' + item.id +
                        '"><td class="col-1"><span class="label label-info label-inline mr-2">' + flag +
                        '</span></td>' +
                        '<td class="col-1">' + item.id + '</td>' +
                        '<td class="col-8">' + item.question + '</td>' +
                        '<td class="col-2"> <a href = "#" id="edit_test_question_btn" class="btn btn-hover-info btn-icon btn-pill edit_test_question_btn" data-id="' +
                        item.id +
                        '" data-value="' + item.question +
                        '"><i class="fa fa-edit fa-1x"></i></a> <a href = "#" id="delete_test_question_btn"  class="btn btn-hover-danger btn-icon btn-pill delete_test_question_btn"  data-id="' +
                        item.id +
                        '"><i class="fa fa-trash fa-1x"></i></a></td>' +
                        '</tr>';
                });
            }

            $('#test_questions_tbody').append(trHTML);
        };

        // show questions modal
        $('body').on('click', '.add_test_questions_btn', function(e) {
            e.preventDefault();

            var test_id = $(this).attr('data-id');
            var test_name = $(this).attr('data-name');

            $.get("{{ route('admin.get.questions.by.test.id') }}", {
                test_id,
                test_id
            }, function(data) {
                $('.test_question_header').text(test_name);
                drawTestQuestionsTable(data);
                $('#question_test_id_hidden').val(test_id)
                $('#test_questions_modal').modal('show');
            });
        });

        // cancel test question btn
        $('body').on('click', '#cancel_test_question_btn', function(e) {
            resetTestQuestionForm();
            $('#myTable').load(location.href + (' #myTable'));
            $('#test_questions_modal').modal('hide');
        });

        // hide questions modal
        $('#test_questions_modal').on('hidden.bs.modal', function(e) {
            resetTestQuestionForm();
            $('#myTable').load(location.href + (' #myTable'));
            $('#test_questions_modal').modal('hide');
        });


        // submit
        $('#test_questions_form').on('submit', function(e) {
            e.preventDefault();

            var data = new FormData(this);
            var type = $(this).attr('method');
            var dataType = 'json';
            var url = $(this).attr('action');

            var flag = 'added';
            label = 'label-success';
            var question_id_hidden = $('#question_id_hidden').val();

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
                                confirmButton: 'add_test_question_button'
                            }
                        });

                        $('.add_test_question_button').click(function() {

                            var trHTML = '';
                            if (!$.trim(data.data)) {
                                $("#test_questions_tbody").empty();
                                trHTML += '<tr class="notfound" id="notfound">' +
                                    '<td colspan="2">' +
                                    '{{ __('general.not_found') }}' +
                                    '</td>' +
                                    '</tr>';
                                $('#test_questions_tbody').append(trHTML);
                            } else {
                                $(".notfound").empty();

                                // update
                                if (question_id_hidden) {
                                    $('#row_' + question_id_hidden).remove();
                                    flag = 'updated';
                                    label = 'label-warning';
                                }

                                var trHTML = '';
                                trHTML += '<tr id="row_' + data.data.id +
                                    '"><td class="col-1"><span class="label ' + label +
                                    '  label-inline mr-2">' +
                                    flag + '</span></td>' +
                                    '<td class="col-1">' + data.data.id + '</td>' +
                                    '<td class="col-8">' + data.data.question + '</td>' +
                                    '<td class="col-2"> <a href = "#" id="edit_test_question_btn" class="btn btn-hover-primary btn-icon btn-pill edit_test_question_btn" data-id="' +
                                    data.data.id +
                                    '" data-value="' + data.data.question +
                                    '"><i class="fa fa-edit fa-1x"></i></a> <a href = "#" id="delete_test_question_btn"  class="btn btn-hover-danger btn-icon btn-pill delete_test_question_btn"  data-id="' +
                                    data.data.id +
                                    '"><i class="fa fa-trash fa-1x"></i></a></td>' +
                                    '</tr>';

                                $('#question_error').text('');
                                $('#question').css('border-color', '');
                                $('#question').val('');
                                $('#question_id_hidden').val('');
                                $('#test_questions_tbody').prepend(trHTML);
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


        //  delete test question
        $('body').on('click', '.delete_test_question_btn', function(e) {
            e.preventDefault();

            var question_id = $(this).data('id');

            $.ajax({
                url: "{!! route('admin.questions.delete') !!}",
                type: 'POST',
                dataType: 'json',
                data: {
                    question_id,
                    question_id
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
                            confirmButton: 'delete_question_button'
                        }
                    });
                    $('.delete_question_button').click(function() {
                        $('#row_' + question_id).remove();
                        $('#question_id_hidden').val('');
                        $('#question').val('');
                    });


                },

            });
        });


        // edit test question
        $('body').on('click', '.edit_test_question_btn', function(e) {
            e.preventDefault();
            var question_id = $(this).attr('data-id');
            var question_name = $(this).attr('data-value');
            $('#question_id_hidden').val(question_id);
            $('#question').val(question_name);
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
