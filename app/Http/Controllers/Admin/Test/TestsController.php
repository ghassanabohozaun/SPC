<?php

namespace App\Http\Controllers\Admin\Test;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tests\TestRequest;
use App\Models\Test;
use App\Models\TestAnswer;
use App\Models\TestQuestion;
use App\Models\TestScale;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use File;

class TestsController extends Controller
{
    use GeneralTrait;

    // index
    public function index()
    {
        $title = __('menu.tests');
        $tests = Test::withoutTrashed()->orderBy('created_at', 'desc')->paginate(15);
        return view('admin.tests.index', compact('title', 'tests'));
    }

    // create
    public function create()
    {
        $title = __('menu.add_new_test');
        return view('admin.tests.create', compact('title'));
    }

    // store
    public function store(TestRequest $request)
    {
        // test photo
        if ($request->hasFile('test_photo')) {
            $photo_name = $request->file('test_photo');
            $photo_path_destination = public_path('/adminBoard/uploadedImages/tests//');
            $photo = $this->saveResizeImage($photo_name, $photo_path_destination, 500, 500);
        } else {
            $photo = '';
        }

        // test file
        if ($request->hasFile('file')) {
            $file_name = $request->file('file');
            $file_public_path = public_path('/adminBoard/uploadedFiles/tests//');
            $file = $this->saveFile($file_name, $file_public_path);
        } else {
            $file = '';
        }

        $test = Test::create([
            'test_name_slug' => slug($request->test_name),
            'test_name' => $request->test_name,
            'test_details' => $request->test_details,
            'added_date' => $request->added_date,
            'question_count' => 0,
            'metrics_count' => 0,
            'number_times_of_use' => 0,
            'status' => 'on',
            'test_photo' => $photo,
            'file' => $file,
            'language' => $site_lang_ar == 'on' ? 'ar_en' : 'en',
        ]);

        if ($test) {
            return $this->returnSuccessMessage(__('general.add_success_message'));
        }
    }

    // edit
    public function edit($id)
    {
        $title = __('tests.update_test');
        $test = Test::find($id);
        if (!$test) {
            return redirect()->route('admin.not.found');
        }
        return view('admin.tests.update', compact('title', 'test'));
    }

    // update
    public function update(TestRequest $request)
    {
        $test = Test::find($request->id);
        if (!$test) {
            return redirect()->route('admin.not.found');
        }

        // photo upload
        if ($request->hasFile('test_photo')) {
            if (!empty($test->test_photo)) {
                //delete old photo
                $photo_public_path = public_path('/adminBoard/uploadedImages/tests//') . $test->test_photo;
                if (File::exists($photo_public_path)) {
                    File::delete($photo_public_path);
                }

                // upload new photo
                $photo_name = $request->file('test_photo');
                $photo_destination = public_path('/adminBoard/uploadedImages/tests//');
                $photo = $this->saveResizeImage($photo_name, $photo_destination, 200, 200);
            } else {
                $photo_name = $request->file('photo');
                $photo_destination = public_path('/adminBoard/uploadedImages/tests//');
                $photo = $this->saveResizeImage($photo_name, $photo_destination, 200, 200);
            }
        } else {
            if (!empty($test->test_photo)) {
                $photo = $test->test_photo;
            } else {
                $photo = '';
            }
        }

        // file upload
        if ($request->hasFile('file')) {
            if (!empty($test->file)) {
                //delete old file
                $file_public_path = public_path('/adminBoard/uploadedFiles/tests//') . $test->file;
                if (File::exists($file_public_path)) {
                    File::delete($file_public_path);
                }

                // upload new file
                $file_name = $request->file('file');
                $file_destination = public_path('/adminBoard/uploadedFiles/tests//');
                $file = $this->saveFile($file_name, $file_destination);
            } else {
                $file_name = $request->file('file');
                $file_destination = public_path('/adminBoard/uploadedFiles/tests//');
                $file = $this->saveFile($file_name, $file_destination);
            }
        } else {
            if (!empty($test->file)) {
                $file = $test->file;
            } else {
                $file = '';
            }
        }

        $site_lang = setting()->site_lang_ar;

        $test->update([
            'test_name_slug' => slug($request->test_name),
            'test_name' => $request->test_name,
            'test_details' => $request->test_details,
            'added_date' => $request->added_date,
            'question_count' => 0,
            'metrics_count' => 0,
            'number_times_of_use' => 0,
            'status' => 'on',
            'test_photo' => $photo,
            'file' => $file,
            'language' => $site_lang_ar == 'on' ? 'ar_en' : 'en',
        ]);

        return $this->returnSuccessMessage(__('general.update_success_message'));
    }

    // destroy
    public function destroy(Request $request)
    {
        if ($request->ajax()) {
            $test = Test::find($request->id);
            if (!$test) {
                return redirect()->route('admin.not.found');
            }

            if ($test->delete()) {
                return $this->returnSuccessMessage(__('general.move_to_trash'));
            } else {
                return $this->returnError(__('general.delete_error_message'), 400);
            }
        }
    }

    // trashed
    public function trashed()
    {
        $title = __('general.trashed');
        $trashedTests = Test::onlyTrashed()->orderByDesc('deleted_at')->paginate(15);
        return view('admin.tests.trashed', compact('title', 'trashedTests'));
    }

    // restore
    public function restore(Request $request)
    {
        if ($request->ajax()) {
            $test = Test::onlyTrashed()->find($request->id);
            if (!$test) {
                return redirect()->route('admin.not.found');
            }
            if ($test->restore()) {
                return $this->returnSuccessMessage(__('general.restore_success_message'));
            } else {
                return $this->returnError(__('general.restore_error_message'), 404);
            }
        }
    }

    // force delete
    public function forceDelete(Request $request)
    {
        if ($request->ajax()) {
            $test = Test::onlyTrashed()->find($request->id);

            if (!$test) {
                return redirect()->route('admin.not.found');
            }

            if (!empty($test->test_photo)) {
                $photo_public_path = public_path('/adminBoard/uploadedImages/tests//') . $test->test_photo;
                if (File::exists($photo_public_path)) {
                    File::delete($photo_public_path);
                }
            }

            if (!empty($test->file)) {
                $file_public_path = public_path('/adminBoard/uploadedFiles/tests//') . $test->file;
                if (File::exists($file_public_path)) {
                    File::delete($file_public_path);
                }
            }

            if ($test->forceDelete()) {
                // delete test questions
                TestQuestion::where('test_id', $request->id)->forceDelete();
                TestAnswer::where('test_id', $request->id)->forceDelete();

                //  delete test scales and photos
                $testScales =  TestScale::where('test_id', $request->id)->get();
                foreach ($testScales as $testScale) {
                    if (!empty($testScale->photo)) {
                        $image_path = public_path("/adminBoard/uploadedImages/tests/scales//") . $testScale->photo;
                        if (File::exists($image_path)) {
                            File::delete($image_path);
                        }
                    }
                    $testScale->forceDelete();
                }


                return $this->returnSuccessMessage(__('general.delete_success_message'));
            } else {
                return $this->returnError(__('general.delete_error_message'), 404);
            }
        }
    }

    // change status
    public function changeStatus(Request $request)
    {
        if ($request->ajax()) {
            $test = Test::find($request->id);
            if (!$test) {
                return redirect()->route('admin.not.found');
            }

            if ($request->statusSwitch == 'true') {
                $test->status = 'on';
                $test->save();
            } else {
                $test->status = '';
                $test->save();
            }

            return $this->returnSuccessMessage(__('general.change_status_success_message'));
        }
    }
}
