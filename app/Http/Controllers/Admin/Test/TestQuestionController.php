<?php

namespace App\Http\Controllers\Admin\Test;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tests\QuestionRequest;
use App\Models\TestQuestion;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;

class TestQuestionController extends Controller
{
    use GeneralTrait;

    // store
    public function store(QuestionRequest $request)
    {

        if (!$request->question_id_hidden) { // create
            $question = TestQuestion::create([
                'question' => $request->question,
                'test_id' => $request->question_test_id_hidden,
            ]);

            if($question){
                return $this->returnData(__('general.add_success_message'), $question);
            }else{
                return $this->returnError(__('general.add_error_message'), 404);
            }


        } else {  // update

            $question = TestQuestion::find($request->question_id_hidden);
            $question->update([
                'question' => $request->question,
                'test_id' => $request->question_test_id_hidden,
            ]);
            if($question){
                return $this->returnData(__('general.update_success_message'), $question);
            }else{
                return $this->returnError(__('general.update_error_message'), 404);
            }
        }

    }

    // get questions by test id
    public function getQuestionsByTestId(Request $request)
    {
        if ($request->ajax()) {
            $test_id = $request->test_id;
            $questions = TestQuestion::with('test')->where('test_id', $test_id)->orderByDesc('created_at')->get();
            return response()->json($questions, 200);
        }
    }

    // delete
    public function delete(Request $request)
    {
        if ($request->ajax()) {
            $question = TestQuestion::where('id', $request->question_id)->first();
            if (!$question) {
                return $this->returnError(__('general.no_record_found'), 400);
            }

            if ($question->forceDelete()) {
                return $this->returnSuccessMessage(__('general.delete_success_message'));
            } else {
                return $this->returnError(__('general.delete_error_message'), 400);
            }
        }
    }
}
