<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TrainingRequest;
use App\Models\Training;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use File;

class TrainingController extends Controller
{

    use GeneralTrait;

    // index
    public function index()
    {
        $title = __('menu.trainings');
        $trainings = Training::withoutTrashed()->orderBy('created_at', 'desc')->paginate(15);
        return view('admin.trainings.index', compact('title', 'trainings'));
    }

    // create
    public function create()
    {
        $title = __('menu.add_new_training');
        return view('admin.trainings.create', compact('title'));
    }

    // store
    public function store(TrainingRequest $request)
    {
        $site_lang_ar = setting()->site_lang_ar;

        if ($request->hasFile('photo')) {
            $photo_file  = $request->file('photo');
            $path_destination = public_path('/adminBoard/uploadedImages/trainings//');
            $photo = $this->saveResizeImage($photo_file, $path_destination, 800, 600);
        } else {
            $photo = '';
        }

        $training =  Training::create(
            [
                'title_en' => $request->title_en,
                'title_ar' => $site_lang_ar == 'on' ? $request->title_ar : '',
                'status' => 'on',
                'photo' => $photo,
                'started_date' => $request->started_date,
                'language' =>   $site_lang_ar == 'on' ? 'ar_en'  : 'en',
            ]
        );

        if ($training) {
            return $this->returnSuccessMessage(__('general.add_success_message'));
        }
    }

    // edit
    public function edit($id)
    {
        $title = __('trainings.update_training');
        $training = Training::find($id);
        if (!$training) {
            return redirect()->route('admin.not.found');
        }
        return view('admin.trainings.update', compact('title', 'training'));
    }

    // update
    public function update(TrainingRequest $request)
    {
        $training = Training::find($request->id);
        if (!$training) {
            return redirect()->route('admin.not.found');
        }

        if ($request->hasFile('photo')) {
            if (!empty($training->photo)) {

                //delete old photo
                $public_path = public_path('/adminBoard/uploadedImages/trainings//') . $training->photo;
                if (File::exists($public_path)) {
                    File::delete($public_path);
                }

                // upload new photo
                $photo_file = $request->file('photo');
                $photo_destination = public_path('/adminBoard/uploadedImages/trainings//');
                $photo = $this->saveResizeImage($photo_file, $photo_destination, 800, 600);
            } else {

                $photo_file = $request->file('photo');
                $photo_destination = public_path('/adminBoard/uploadedImages/trainings//');
                $photo  = $this->saveResizeImage($photo_file, $photo_destination, 800, 600);
            }
        } else {
            if (!empty($training->photo)) {
                $photo = $training->photo;
            } else {
                $photo = '';
            }
        }


        $site_lang_ar = setting()->site_lang_ar;

        $training->update([
            'title_ar' => $site_lang_ar == 'on' ?  $request->title_ar : '',
            'title_en' => $request->title_en,
            'started_date' => $request->started_date,
            'language' => $site_lang_ar == 'on' ? 'ar_en' : 'en',
            'photo' => $photo,
            'language' =>   $site_lang_ar == 'on' ? 'ar_en'  : 'en',
        ]);

        return $this->returnSuccessMessage(__('general.update_success_message'));
    }

    // destroy
    public function destroy(Request $request)
    {
        if ($request->ajax()) {
            $training = Training::find($request->id);
            if (!$training) {
                return redirect()->route('admin.not.found');
            }

            if ($training->delete()) {
                return $this->returnSuccessMessage(__('general.move_to_trash'));
            } else {
                return $this->returnError(__('general.delete_error_message'), 400);
            }
        }
    }

    // get trashed
    public function getTrashed()
    {
        $title = __("general.trashed");
        $trainings   = Training::onlyTrashed()->orderByDesc('deleted_at')->paginate(15);
        return view('admin.trainings.trashed', compact('title', 'trainings'));
    }

    // restore
    public function restore(Request $request)
    {
        if ($request->ajax()) {
            $training = Training::onlyTrashed()->find($request->id);
            if (!$training) {
                return redirect()->route('admin.not.found');
            }
            $training->restore();
            //return response()->json($training, 200);
            //return $this->returnData()
            return $this->returnSuccessMessage(__('general.restore_success_message'));
        }
    }

    // force delete
    public function forceDelete(Request $request)
    {
        if ($request->ajax()) {
            $training = Training::onlyTrashed()->find($request->id);

            if (!$training) {
                return redirect()->route('admin.not.found');
            }

            if (!empty($training->photo)) {
                $public_path = public_path('/adminBoard/uploadedImages/trainings//') . $training->photo;
                if (File::exists($public_path)) {
                    File::delete($public_path);
                }
            }

            $training->forceDelete();
            return $this->returnSuccessMessage(__('general.delete_success_message'));
        }
    }

    // change status
    public function changeStatus(Request $request)
    {
        if ($request->ajax()) {
            $training  = Training::find($request->id);
            if (!$training) {
                return redirect()->route('admin.not.found');
            }

            //return response()->json($request->id, 200);

            if ($request->switchStatus == 'true') {
                $training->status = 'on';
                $training->save();
            } else {
                $training->status = '';
                $training->save();
            }

            return $this->returnSuccessMessage(__('general.change_status_success_message'));
        }
    }
}
