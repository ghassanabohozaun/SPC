@extends('layouts.site')
@section('title')
    {!! $test->test_name !!}
@endsection
@section('metaTags')
    <meta name="description" content="{!! setting()->{'site_description_' . Lang()} !!}">
    <meta name="keywords" content="{!! setting()->{'site_keywords_' . Lang()} !!}">
    <meta name="application-name" content="{!! setting()->{'site_name_' . Lang()} !!}" />
    <meta name="author" content="{!! setting()->{'site_name_' . Lang()} !!}" />
@endsection

@section('content')
    <!-------------------------------------- Start Top Title Section  ------------------------------------->
    <div class="clearfix"></div>
    <div class="bradcam_area tests_bg">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text text-center">
                        <h1>{!! $test->test_name !!}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-------------------------------------- End Top Title Section  ------------------------------------->

    <!-------------------------------------- Start testimonials  ------------------------------------->
    <div class="testimonials testimonial-page ">
        <div class="test-questions-wrapper  my_test_question grey-bg my_test_question_section"
            id="my_test_question_section">
            <div class="container">
                @if ($test->questions->isEmpty())
                    <div class="test-questions-inner">
                        <div class="questions-box text-warning font-weight-bolder">
                            <h2 class="text-center text-warning text-capitalize">{!! trans('site.no_questions') !!}</h2>
                        </div>
                    </div>
                @else
                    <form>
                        <div class="test-questions-inner">
                            <div class="questions-box">
                                <div class="questions-box-head">
                                    <span class="questions-number">
                                        <span class="questions-number" id="questions_number_span">1</span>
                                        /
                                        <span id="total_questions_number">{!! $test->questions->count() !!}</span>
                                    </span>
                                    <span class="questions-scale"> {!! $test->test_name !!}</span>
                                    <span class="questions-point">
                                        <label class="mb-0">{!! trans('site.collecting_point') !!}
                                            : <span id="collecting_point">0</span>
                                        </label>
                                    </span>
                                </div>

                                <div id="question_list">
                                    @include('site.tests.test-paging')
                                </div>
                            </div>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </div>

    <!-- endTest modal  data-backdrop="static" data-keyboard="false"-->
    <div class="modal fade endTest" id="endTest" data-backdrop="static" data-keyboard="false" tabindex="-1"
        role="dialog" aria-labelledby="staticBackdrop">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="end-test-wrapper">
                        <div id="test_metric_photo">
                        </div>
                        <h5 id="test_metric_evaluation">
                        </h5>
                        <p id="test_metric_statement">
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script type="text/javascript">
        var total_questions_number = $('#total_questions_number').text();
        var progress_value = 1;
        $(".questions-bar").find('span').css('height', 0 + '%');
        var val = 0;

        ///////////////////////////////////////////////////////////////////////////////
        ///  article Paging
        $(document).on('click', '.pagination a', function(e) {
            e.preventDefault();

            if ($('input[name=questions]:checked').length <= 0) {
                swal({
                    icon: "error",
                    text: "{!! trans('site.please_select_answer') !!}",
                    buttons: false,
                    timer: 3000,
                });
            } else {
                var checkboxes = document.getElementsByName('questions');
                var selected = []
                for (var i = 0; i < checkboxes.length; i++) {
                    if (checkboxes[i].checked) {
                        selected.push(checkboxes[i].value);
                    }
                }
                ////////////////////////////////////////////////////
                // sum answer value
                var old_value = parseInt(selected);
                val += old_value;
                $('#collecting_point').text(val);

                var page = $(this).attr('href').split('page=')[1];
                //////////////////////////////////////////////////////////////////////////////
                // Progress Bar
                var total_questions_number = $('#total_questions_number').text();
                var progress_value = (page * 100) / parseInt(total_questions_number);
                $(".questions-bar").find('span').css('height', progress_value + '%');
                $('#questions_number_span').html(page);
                readPage(page);
            }

        });


        ///////////////////////////////////////////////////////////////////////////////
        ///  read Page
        function readPage(page) {
            $.ajax({
                url: '/get-test-paging/' + '{!! $id !!}' + '?page=' + page
            }).done(function(data) {
                $('#question_list').html(data);
            });

        } // end readPage

        ///////////////////////////////////////////////////////////////////////////////
        $('body').on('click', '#end_test_btn', function(e) {
            e.preventDefault();
            if ($('input[name=questions]:checked').length <= 0) {
                swal({
                    icon: "error",
                    text: "{!! trans('site.please_select_answer') !!}",
                    buttons: false,
                    timer: 3000,
                });
            } else {
                var checkboxes = document.getElementsByName('questions');
                var selected = []
                for (var i = 0; i < checkboxes.length; i++) {
                    if (checkboxes[i].checked) {
                        selected.push(checkboxes[i].value);
                    }
                }
                var old_value = parseInt(selected);
                val += old_value;
                $('#collecting_point').text(val);

                var url = '{{ url('get-test-metric/' . $id) }}' + '/' + val;
                $.ajax({
                    url: url,
                    type: 'get',
                    dataType: 'json',
                    success: function(data) {
                        console.log(data)
                        if (data.evaluation == null) {
                            $('#test_metric_photo').empty();
                            $('#test_metric_evaluation').empty();
                            $('#test_metric_evaluation').html('{!! trans('site.no_scale') !!}');
                            $('#test_metric_statement').empty();
                            $('#test_metric_statement').html('');
                        } else {
                            var photo = data.photo;
                            var url = '{{ asset('adminBoard/uploadedImages/tests/scales/') }}/' + photo;
                            $('#kt_scale_photo_update').css("background-image", "url(" + url + ")");
                            $('#test_metric_photo').html('<img class="img-thumbnail rounded" src="' +
                                url +
                                '" alt="" class="img-fluid">');
                            $('#test_metric_evaluation').empty();
                            $('#test_metric_evaluation').html(data.evaluation);
                            $('#test_metric_statement').empty();
                            $('#test_metric_statement').html(data.statement);
                        }
                        $('#endTest').modal('show');

                        $('.next-button').addClass('d-none');
                        //$('.last-btn').addClass('d-none');
                        /* setTimeout(function () {
                             window.location.href = "{!! route('tests') !!}";
                        }, 4000);*/
                    },
                })
            }
        })


        $('#endTest').on('hidden.bs.modal', function(e) {
            setTimeout(function() {
                window.location.href = "{!! route('tests') !!}";
            }, 500);
        });
    </script>
@endpush
