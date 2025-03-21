<?php

namespace App\Http\Controllers\Admin\Test;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tests\ScaleRequest;
use App\Models\Test;
use App\Models\TestScale;
use App\Traits\GeneralTrait;
use File;
use Illuminate\Http\Request;

class TestScaleController extends Controller
{
    use GeneralTrait;

    // store
    public function store(ScaleRequest $request)
    {
        if (!$request->scale_id_hidden) {

            if ($request->hasFile('photo')) {
                $photo_name = $request->file('photo');
                $public_path = public_path('/adminBoard/uploadedImages/tests/scales//');
                $photo = $this->saveImage($photo_name, $public_path);
            } else {
                $photo = '';
            }

            // create
            $scale = TestScale::create([
                'statement' => $request->statement,
                'evaluation' => $request->evaluation,
                'minimum' => $request->minimum,
                'maximum' => $request->maximum,
                'test_id' => $request->scale_test_id_hidden,
                'photo' => $photo,
            ]);

            if ($scale) {
                $this->increaseTestScalesCount($scale->test_id);
                return $this->returnData(__('general.add_success_message'), $scale);
            } else {
                return $this->returnError(__('general.add_error_message'), 404);
            }
        } else {
            // update

            $scale = TestScale::find($request->scale_id_hidden);

            if ($request->hasFile('photo')) {
                if (!empty($scale->photo)) {
                    $photo_public_path = public_path('/adminBoard/uploadedImages/tests/scales//') . $scale->photo;
                    if (File::exists($photo_public_path)) {
                        File::delete($photo_public_path);
                    }
                    $photo_name = $request->file('photo');
                    $public_path = public_path('/adminBoard/uploadedImages/tests/scales//');
                    $photo = $this->saveImage($photo_name, $public_path);
                } else {
                    $photo_name = $request->file('photo');
                    $public_path = public_path('/adminBoard/uploadedImages/tests/scales//');
                    $photo = $this->saveImage($photo_name, $public_path);
                }
            } else {

                if (!empty($scale->photo)) {
                    $photo = $scale->photo;
                } else {
                    $photo = '';
                }
            }

            $scale->update([
                'statement' => $request->statement,
                'evaluation' => $request->evaluation,
                'minimum' => $request->minimum,
                'maximum' => $request->maximum,
                'test_id' => $request->scale_test_id_hidden,
                'photo' => $photo,
            ]);
            if ($scale) {
                return $this->returnData(__('general.update_success_message'), $scale);
            } else {
                return $this->returnError(__('general.update_error_message'), 404);
            }
        }
    }

    // get scales by test id
    public function getScalesByTestId(Request $request)
    {
        if ($request->ajax()) {
            $test_id = $request->test_id;
            $questions = TestScale::with('test')->where('test_id', $test_id)->orderByDesc('created_at')->get();
            return response()->json($questions, 200);
        }
    }

    // delete
    public function delete(Request $request)
    {
        if ($request->ajax()) {
            $scale = TestScale::where('id', $request->scale_id)->first();
            if (!$scale) {
                return $this->returnError(__('general.no_record_found'), 400);
            }

            if ($scale->forceDelete()) {
                if (!empty($scale->photo)) {
                    $image_path = public_path("/adminBoard/uploadedImages/tests/scales//") . $scale->photo;
                    if (File::exists($image_path)) {
                        File::delete($image_path);
                    }
                }

                $this->decreaseTestScalesCount($scale->test_id);
                return $this->returnSuccessMessage(__('general.delete_success_message'));
            } else {
                return $this->returnError(__('general.delete_error_message'), 400);
            }
        }
    }


    // increase scales count
    public function increaseTestScalesCount($id)
    {
        $test = Test::whereId($id)->first();
        $scalesCount = $test->scales_count;
        $testMetricsCount = $scalesCount + 1;
        $test->update(['scales_count' => $testMetricsCount]);
    }

    // decrease scales count
    public function decreaseTestScalesCount($id)
    {
        $test = Test::whereId($id)->first();
        $scalesCount = $test->scales_count;
        $testMetricsCount = $scalesCount - 1;
        $test->update(['scales_count' => $testMetricsCount]);
    }
}
