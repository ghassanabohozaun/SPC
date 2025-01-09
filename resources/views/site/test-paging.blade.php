@foreach($questions as $question)
    <div class="questions-box-name">
        <span class="test_question_id"></span>
        <label id="questions_number_span">::</label>
        <p>{!! $question->test_question !!} </p>
    </div>
    <div class="questions-box-answers">

        @foreach(App\Models\Tests\TestAnswer::orderBy('id','asc')->where('test_question_id',$question->id)->get() as $answer)
            <div class="answers-box">
                <input type="radio" name="questions" id="questions" class="radio-answers" value="{!! $answer->answer_value !!}">
                <label>
                    <span class="answer_value_span"> </span>
                    {!! $answer->answer_value !!} -
                    &nbsp;
                    {!! $answer->answer_text !!}
                </label>
            </div>
        @endforeach
    </div>
@endforeach


<div class="questions-box-btn">

    <ul class="pagination">

        <li class="page-item {{($questions->currentPage() == $questions->lastPage()) ? 'disabled' : '' }} btn no-focus questions-btn end-test">
            <a class="page-link"
               href="{{ $questions->nextPageUrl() }}">
                {!! trans('frontend.next_question') !!}
            </a>
        </li>
    </ul>
    {{--$questions->render( "pagination::bootstrap-4")--}}


    @if(($questions->currentPage() == $questions->lastPage()))
        <button class="btn no-focus questions-btn end-test" type="button" id="end_test_btn">
            {!! trans('frontend.finish_test') !!}
        </button>
    @endif

</div>


