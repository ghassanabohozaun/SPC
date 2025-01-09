@extends('layouts.site')
@section('title') {!! trans('frontend.home') !!} @endsection
@section('metaTags')
    <meta name="description"
          content="{!! Lang()=='ar' ? setting()->site_description_ar : setting()->site_description_en !!}">
    <meta name="keywords"
          content="{!! Lang()=='ar' ? setting()->site_keywords_ar : setting()->site_keywords_en !!}">
@endsection
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Open Sans"/>

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

    <!-------------------------------------- Start Test ------------------------------------->
    <div class="why-chose-us module">

        <div class="container text-center my_test_question_section" id="test">

            @if($questions->isEmpty())
                <h2 class="text-capitalize text-warning text-center">{!! trans('site.no_questions') !!}</h2>
            @else

                <div id="questions" class="my_questions">
                @foreach($questions as $key=>$question)
                    <!----------------------------Question Section----------------------------------->
                        <article id="question1" class="display-none">

                            <!------------------- Question Head ------------------------------>
                            <span class="d-none" id="total_questions_number">
                            {!! App\Models\Tests\TestQuestion::where('test_id',$id)->count() !!}
                        </span>

                            <!------------------- Question Head ------------------------------>

                            <!------------------- Question and Answer ------------------------------>
                            <div class="questions-box text-center">
                                <div class="my-questions-box-head">
                                    <div><h2 class="text-center"> {!! $test->test_name !!}</h2>
                                    </div>
                                </div>

                                <form id="form1" action="#">
                                    <!-------------------  Question ------------------------------>
                                    <div class="questions-box-name">
                                        <span class="test_question_id"></span>
                                        <label id="questions_number_span"></label>
                                        <p>{!! $question->test_question !!}</p>
                                    </div>
                                    <!-------------------  Question ------------------------------>

                                    <!-------------------  Answer ------------------------------>
                                    <div class="my_questions_box_answer questions-box-answers">
                                        @foreach(App\Models\Tests\TestAnswer::orderBy('id','asc')->where('test_question_id',$question->id)->get() as $answer)
                                            <div class="answers-box">
                                                <input type="radio" name="answer" id="answer"
                                                       value="{!! $answer->answer_value !!}">
                                                <label>
                                                    <span class="answer_value_span"> </span>
                                                    {!! $answer->answer_value !!} -
                                                    &nbsp;
                                                    {!! $answer->answer_text !!}
                                                </label>
                                            </div>
                                        @endforeach
                                        <button id="button1" type="submit"
                                                class="button primary btn_submit">{!! trans('site.submit_answer') !!}
                                        </button>
                                    </div>
                                    <!-------------------  Answer ------------------------------>
                                </form>
                            </div>
                            <!------------------- Question and Answer ------------------------------>

                        </article>
                        <!----------------------------Question Section----------------------------------->
                    @endforeach


                    <p class="display-none" id="resultsParagraph">
                        <button type="button" id="result" class="btn btn-success margin_13">
                            {!! trans('site.test_result') !!}
                        </button>
                    </p>
                    <p>
                        <button id="secondQuestion" class="btn btn-warning margin_13  display-none">
                            {!! trans('site.next') !!}
                        </button>
                    </p>

                </div>
            @endif
        </div>
        <!-- Grid Container /-->


        <!---------------------------------------- Result-------------------------------------->
        <div class="container-fluid text-center result_section">
            <div class="row text-center">
                <h1 class="display-none "></h1>
                <div id="arrOfResults" class="display-none">
                    <div id="test_metric_photo">
                    </div>
                    <h3 id="test_metric_evaluation">
                    </h3>
                    <br/>
                    <h5 id="test_metric_statement">
                    </h5>
                    <div class="go_to_tests_div">
                        <h3>
                            <a href="{!! route('tests') !!}">
                                {!! trans('site.go_to_tests') !!}
                            </a>
                        </h3>
                    </div>

                </div>


            </div>
        </div>
        <!---------------------------------------- Result-------------------------------------->


    </div>
    <!-------------------------------------- End Test  ------------------------------------->

    <!-------------------------------------- Start Call to Action ------------------------------>
    @include('site.include.call-to-action')
    <!-------------------------------------- End Call to Action -------------------------------->

@endsection
@push('js')
    <script type="text/javascript">
        var result = 0;
        var total_questions_number = $('#total_questions_number').text();

        $(document).ready(function () {

            $('#mainContainer').hide().promise().done(function () {
                $('#question1').show();
            });


            $('#form1').submit(function () {
                var radioValue = $("#form1 :radio:checked").val();
                if (radioValue == null) {
                    swal({
                        icon: "error",
                        text: "{!! trans('site.please_select_answer') !!}",
                        buttons: false,
                        timer: 3000,
                    });
                } else {
                    result += parseInt(radioValue);

                    $('#collecting_point').text(result);
                    $('#button1').toggle(); // submit button  <--
                    $('#secondQuestion').show();  //Next Button
                }
                return false;

            });

            var i = 0;

            ///////////////////////////////////////////////////////////
            // Next
            $('#secondQuestion').click(function () {
                var arr = $('#questions').children();

                var currentQuestion = arr.get(i);
                $(currentQuestion).hide();
                var nextQuestion = arr.get(i + 1);
                $(nextQuestion).show(); //show next question
                $('#secondQuestion').hide();//hide Next Button
                $('.btn_submit').removeClass('display-none'); // submit button in each question
                var currentForm = $(nextQuestion).children().get(1);
                console.log(currentForm)
                $(currentForm).submit(function () {
                    var radioValue1 = $(this).find('input[name="answer"]:checked').val();

                    if (radioValue1 == null) {
                        swal({
                            icon: "error",
                            text: "{!! trans('site.please_select_answer') !!}",
                            buttons: false,
                            timer: 3000,
                        });
                    } else {
                        result += parseInt(radioValue1);
                        if (i != parseInt(total_questions_number) - 1) {
                            $('.btn_submit').addClass('display-none');
                            $('#secondQuestion').show();
                        } else {
                            $('#resultsParagraph').removeClass('display-none');
                            $('.btn_submit').addClass('display-none');
                            //result();
                        }
                    }
                    return false;
                });
                i++;
            });


            $('#result').click(function () {
                $('#test').hide();
                $('#result').hide();
                $('h1').removeClass('display-none');

                var url = '{{url("get-test-metric/".$id)}}' + '/' + result;

                $.ajax({
                    url: url,
                    type: 'get',
                    dataType: 'json',
                    success: function (data) {
                        console.log(data)
                        if (data.evaluation == null) {
                            $('#arrOfResults').removeClass('display-none');
                            $('#test_metric_photo').empty();
                            $('#test_metric_evaluation').empty();
                            $('#test_metric_evaluation').html('{!! trans('site.no_scale') !!}');
                            $('#test_metric_statement').empty();
                            $('#test_metric_statement').html('');
                        } else {
                            $('#arrOfResults').removeClass('display-none');
                            var photo = data.photo;
                            var url = '{{Storage::url('')}}' + photo;
                            $('#kt_scale_photo_update').css("background-image", "url(" + url + ")");
                            $('#test_metric_photo').html('<img src="' + url + '" alt="" class="img-fluid" width="250">');
                            $('#test_metric_evaluation').empty();
                            $('#test_metric_evaluation').html(data.evaluation);
                            $('#test_metric_statement').empty();
                            $('#test_metric_statement').html(data.statement);
                            //$('.go_to_tests_div').html(result)
                            $('html, body').animate({scrollTop: 520}, 300);

                        }
                    },
                });

            });

            function results() {
                $('#test').hide();
                $('#result').hide();
                $('h1').removeClass('display-none');

                var url = '{{url("get-test-metric/".$id)}}' + '/' + result;

                $.ajax({
                    url: url,
                    type: 'get',
                    dataType: 'json',
                    success: function (data) {
                        console.log(data)
                        if (data.evaluation == null) {
                            $('#arrOfResults').removeClass('display-none');
                            $('#test_metric_photo').empty();
                            $('#test_metric_evaluation').empty();
                            $('#test_metric_evaluation').html('{!! trans('site.no_scale') !!}');
                            $('#test_metric_statement').empty();
                            $('#test_metric_statement').html('');
                        } else {
                            $('#arrOfResults').removeClass('display-none');
                            var photo = data.photo;
                            var url = '{{Storage::url('')}}' + photo;
                            $('#kt_scale_photo_update').css("background-image", "url(" + url + ")");
                            $('#test_metric_photo').html('<img src="' + url + '" alt="" class="img-fluid" width="250">');
                            $('#test_metric_evaluation').empty();
                            $('#test_metric_evaluation').html(data.evaluation);
                            $('#test_metric_statement').empty();
                            $('#test_metric_statement').html(data.statement);
                            //$('.go_to_tests_div').html(result)
                            $('html, body').animate({scrollTop: 520}, 300);

                        }
                    },
                });
            }

        });
    </script>
@endpush
