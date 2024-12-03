<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PublicationsRequest;
use App\Models\Projects;
use App\Models\Publications;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PublicationsController extends Controller
{
    use GeneralTrait;

    //index
    public function index()
    {
        $publications = Publications::withoutTrashed()->orderByDesc('created_at')->paginate(15);
        $title = __('menu.publications');
        return view('admin.publications.index', compact('publications', 'title'));
    }

    // create
    public function create()
    {
        $title = __('menu.add_new_publication');
        $projects = Projects::all();
        return view('admin.publications.create', compact('title', 'projects'));
    }

    // store
    public function store(PublicationsRequest $request)
    {

        // save image
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $destinationPath = public_path('adminBoard/uploadedImages/publications');
            $photo_path = $this->saveResizeImage($image, $destinationPath, 530, 300);
        } else {
            $photo_path = '';
        }

        // save File
        if ($request->hasFile('file')) {
            $file = $this->saveFile($request->file('file'), 'adminBoard/uploadedFiles/publications');
        } else {
            $file = '';
        }


        $lang_en = setting()->site_lang_en;
        Publications::create([
            'photo' => $photo_path,
            'language' => $lang_en == 'on' ? 'ar_en' : 'ar',
            'details_ar' => $request->details_ar,
            'details_en' => $lang_en == 'on' ? $request->details_en : null,
            'title_ar' => $request->title_ar,
            'title_en' => $lang_en == 'on' ? $request->title_en : null,
            'file' => $file,
            'date' => $request->date,
            'writer' => '',
            'type' => $request->type,
            'projects_id' => $request->project_id,
            'status' => 'on',
        ]);

        return $this->returnSuccessMessage(__('general.add_success_message'));
    }

    // edit
    public function edit($id)
    {
        $publication = Publications::findOrFail($id);
        $projects = Projects::all();
        return view('admin.publications.update', compact('publication', 'projects'));
    }

    // update
    public function update(PublicationsRequest $request)
    {
        // return $request->all();
        $publication = Publications::findORFail($request->id);

        // save image
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $destinationPath = public_path('adminBoard/uploadedImages/publications');
            $photo_path = $this->saveResizeImage($image, $destinationPath, 530, 300);

            $image_path = public_path("/adminBoard/uploadedImages/publications//") . $publication->photo;
            if (File::exists($image_path)) {
                File::delete($image_path);
            }

        } else {
            $photo_path = $publication->photo;
        }

        // save File

        if ($request->hasFile('file')) {

            $file = $this->saveFile($request->file('file'), 'adminBoard/uploadedFiles/publications');

            $file_path = public_path("/adminBoard/uploadedFiles/publications//") . $publication->file;

            if (File::exists($file_path)) {
                File::delete($file_path);
            }
        } else {
            $file = $publication->file;
        }

        $lang_en = setting()->site_lang_en;
        $publication->update([
            'photo' => $photo_path,
            'language' => $lang_en == 'on' ? 'ar_en' : 'ar',
            'details_ar' => $request->details_ar,
            'details_en' => $lang_en == 'on' ? $request->details_en : null,
            'title_ar' => $request->title_ar,
            'title_en' => $lang_en == 'on' ? $request->title_en : null,
            'file' => $file,
            'date' => $request->date,
            'writer' => '',
            'type' => $request->type,
            'projects_id' => $request->project_id,
        ]);

        return $this->returnSuccessMessage(__('general.update_success_message'));
    }

    // trashed
    public function trashed()
    {
        $title = __('menu.trashed_articles');
        $publications = Publications::onlyTrashed()->orderByDesc('created_at')->paginate(15);
        return view('admin.publications.trashed', compact('title', 'publications'));
    }


    // destroy
    public function destroy(Request $request)
    {
        try {
            if ($request->ajax()) {
                $publication = Publications::find($request->id);
                if (!$publication) {
                    return redirect()->route('admin.not.found');
                }
                $publication->delete();
                return $this->returnSuccessMessage(__('general.move_to_trash'));
            }
        } catch (\Exception $exception) {
            return $this->returnError(__('general.try_catch_error_message'), 500);
        }//end catch
    }

    //  restore
    public function restore(Request $request)
    {
        try {
            if ($request->ajax()) {
                $publication = Publications::onlyTrashed()->find($request->id);
                if (!$publication) {
                    return redirect()->route('admin.not.found');
                }
                $publication->restore();
                return $this->returnSuccessMessage(__('general.restore_success_message'));
            }
        } catch (\Exception $exception) {
            return $this->returnError(__('general.try_catch_error_message'), 500);
        }//end catch
    }

    //  force delete
    public function forceDelete(Request $request)
    {
        try {
            if ($request->ajax()) {

                $publication = Publications::onlyTrashed()->find($request->id);

                if (!$publication) {
                    return redirect()->route('admin.not.found');
                }

                if (!empty($publication->photo)) {
                    $image_path = public_path("/adminBoard/uploadedImages/publications//") . $publication->photo;
                    if (File::exists($image_path)) {
                        File::delete($image_path);
                    }
                }

                if (!empty($publication->file)) {
                    $image_path = public_path("/adminBoard/uploadedImages/publications//") . $publication->photo;
                    if (File::exists($image_path)) {
                        File::delete($image_path);
                    }
                }


                $publication->forceDelete();

                return $this->returnSuccessMessage(__('general.delete_success_message'));
            }
        } catch (\Exception $exception) {
            return $this->returnError(__('general.try_catch_error_message'), 500);
        }//end catch

    }


    // change status
    public function changeStatus(Request $request)
    {

        $publication = Publications::find($request->id);

        if ($request->switchStatus == 'false') {
            $publication->status = null;
            $publication->save();
        } else {
            $publication->status = 'on';
            $publication->save();
        }

        return $this->returnSuccessMessage(__('general.change_status_success_message'));
    }
}
