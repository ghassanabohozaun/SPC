@foreach($questions as $question)
    <div class="questions-box-name">
        <span class="test_question_id"></span>
        <label id="questions_number_span"></label>
        <p>{!! $question->test_question !!} </p>
    </div>
    <div class="questions-box-answers">

        @foreach(App\Models\Tests\TestAnswer::orderBy('id','asc')->where('test_question_id',$question->id)->get() as $answer)
            <div class="answers-box">
                <input type="radio" name="questions" id="questions" class="radio-answers"
                       value="{!! $answer->answer_value !!}">
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

    <ul class="pagination next_btn_ul">
        <li class="page-item {{($questions->currentPage() == $questions->lastPage()) ? 'd-none' : '' }} next-button">
            <a class="btn btn-primary text-white"
               href="{{ $questions->nextPageUrl() }}">
                {!! trans('site.next_question') !!}
            </a>
        </li>
    </ul>
    {{--$questions->render( "pagination::bootstrap-4")--}}


    @if(($questions->currentPage() == $questions->lastPage()))
        <button  type="button" href="#" id="end_test_btn" class="btn btn-danger last-btn text-white last_btn_ul">
            {!! trans('site.finish_test') !!}
        </button>
    @endif

</div>


