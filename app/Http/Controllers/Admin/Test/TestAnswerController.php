<?php

namespace App\Http\Controllers\Admin\Test;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tests\AnswerRequest;
use App\Models\TestAnswer;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;

class TestAnswerController extends Controller
{
    use GeneralTrait;

    // store
    public function store(AnswerRequest $request)
    {
        if (!$request->answer_id_hidden) {
            // create
            $answer = TestAnswer::create([
                'answer_text' => $request->answer_text,
                'answer_value' => $request->answer_value,
                'test_id' => $request->answer_test_id_hidden,
            ]);

            if ($answer) {
                return $this->returnData(__('general.add_success_message'), $answer);
            } else {
                return $this->returnError(__('general.add_error_message'), 404);
            }
        } else {
            // update

            $answer = TestAnswer::find($request->answer_id_hidden);
            $answer->update([
                'answer_text' => $request->answer_text,
                'answer_value' => $request->answer_value,
                'test_id' => $request->answer_test_id_hidden,
            ]);
            if ($answer) {
                return $this->returnData(__('general.update_success_message'), $answer);
            } else {
                return $this->returnError(__('general.update_error_message'), 404);
            }
        }
    }

    // get answers by test id
    public function getAnswersByTestId(Request $request)
    {
        if ($request->ajax()) {
            $test_id = $request->test_id;
            $questions = TestAnswer::with('test')->where('test_id', $test_id)->orderByDesc('created_at')->get();
            return response()->json($questions, 200);
        }
    }

    // delete
    public function delete(Request $request)
    {
        if ($request->ajax()) {
            $answer = TestAnswer::where('id', $request->answer_id)->first();
            if (!$answer) {
                return $this->returnError(__('general.no_record_found'), 400);
            }

            if ($answer->forceDelete()) {
                return $this->returnSuccessMessage(__('general.delete_success_message'));
            } else {
                return $this->returnError(__('general.delete_error_message'), 400);
            }
        }
    }
}
