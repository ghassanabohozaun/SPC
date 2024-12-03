<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectsRequest;
use App\Models\Projects;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProjectsController extends Controller
{
    use GeneralTrait;

    public function index()
    {
        $projects = Projects::withoutTrashed()->orderByDesc('created_at')->paginate(15);
        $title = __('menu.projects');
        return view('admin.projects.index', compact('projects', 'title'));
    }

    public function create()
    {
        $title = __('menu.add_new_project');
        return view('admin.projects.create' , compact('title'));
    }

    public function store(ProjectsRequest $request)
    {
        // save image
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $destinationPath = public_path('adminBoard/uploadedImages/projects//');
            $photo_path = $this->saveResizeImage($image, $destinationPath, 530, 300);
        } else {
            $photo_path = '';
        }

        // save File
        if ($request->hasFile('file')) {
            $file = $this->saveFile($request->file('file'), 'adminBoard/uploadedFiles/project');
        } else {
            $file = '';
        }

        // save word
        if ($request->hasFile('word')) {
            $word = $this->saveFile($request->file('word'), 'adminBoard/uploadedFiles/project');
        } else {
            $word = '';
        }


        $lang_en = setting()->site_lang_en;
        Projects::create([
            'photo' => $photo_path,
            'language' =>  $lang_en == 'on' ? 'ar_en' :'ar',
            'details_ar' => $request->details_ar,
            'details_en' => $lang_en == 'on' ? $request->details_en : null,
            'title_ar' => $request->title_ar,
            'title_en' => $lang_en == 'on' ? $request->title_en : null,
            'file' => $file,
            'word' =>$word,
            'date' => $request->date,
            'writer' => $request->writer,
            'type' => $request->type,
            'status' =>'on',
        ]);

        return $this->returnSuccessMessage(__('general.add_success_message'));
    }

    public function edit($id)
    {
        $project = Projects::findOrFail($id);
        return view('admin.projects.update', compact('project'));
    }

    public function update(ProjectsRequest $request)
    {
        // return $request->all();
        $project = Projects::findORFail($request->id);

        // save image
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $destinationPath = public_path('adminBoard/uploadedImages/projects//');
            $photo_path = $this->saveResizeImage($image, $destinationPath, 530, 300);
            $image_path = public_path("/adminBoard/uploadedImages/projects//") . $project->photo;
            if (File::exists($image_path))
            {
              File::delete($image_path);
            }
        } else {
            $photo_path = $project->photo;
        }

        // save File

        if ($request->hasFile('file')) {

            $file = $this->saveFile($request->file('file'), 'adminBoard/uploadedFiles/project');

            $file_path = public_path("/adminBoard/uploadedFiles/project//") . $project->file;

            if (File::exists($file_path))
            {
              File::delete($file_path);

            }
        } else {
            $file = $project->file;
        }

        if ($request->hasFile('word')) {
            $word = $this->saveFile($request->file('word'), 'adminBoard/uploadedFiles/project');
            $file_path = public_path("/adminBoard/uploadedFiles/project//") . $project->word;
            if (File::exists($file_path))
            {
              File::delete($file_path);
            }
        } else {
            $word = $project->word;
        }

        $lang_en = setting()->site_lang_en;
        $project->update([
            'photo' => $photo_path,
            'language' =>  $lang_en == 'on' ? 'ar_en' :'ar',
            'details_ar' => $request->details_ar,
            'details_en' => $lang_en == 'on' ? $request->details_en : null,
            'title_ar' => $request->title_ar,
            'title_en' => $lang_en == 'on' ? $request->title_en : null,
            'file' => $file,
            'word' => $word,
            'date' => $request->date,
            'writer' => $request->writer,
            'type' => $request->type,
        ]);

        return $this->returnSuccessMessage(__('general.update_success_message'));
    }

    public function trashed()
    {
        $title = __('menu.trashed_articles');
        $projects = Projects::onlyTrashed()->orderByDesc('created_at')->paginate(15);
        return view('admin.projects.trashed-project', compact('title', 'projects'));
    }


    ///////////////////////////////////////////////
    /// destroy
    public function destroy(Request $request)
    {
        try {
            if ($request->ajax()) {
                $project = Projects::find($request->id);
                if (!$project) {
                    return redirect()->route('admin.not.found');
                }
                $project->delete();
                return $this->returnSuccessMessage(__('general.move_to_trash'));
            }
        } catch (\Exception $exception) {
            return $this->returnError(__('general.try_catch_error_message'), 500);
        }//end catch
    }

    /////////////////////////////////////////
    ///  restore
    public function restore(Request $request)
    {
        try {
            if ($request->ajax()) {
                $project = Projects::onlyTrashed()->find($request->id);
                if (!$project) {
                    return redirect()->route('admin.not.found');
                }
                $project->restore();
                return $this->returnSuccessMessage(__('general.restore_success_message'));
            }
        } catch (\Exception $exception) {
            return $this->returnError(__('general.try_catch_error_message'), 500);
        }//end catch
    }

    /////////////////////////////////////////
    ///  force delete
    public function forceDelete(Request $request)
    {
        try {
            if ($request->ajax()) {

                $project = Projects::onlyTrashed()->find($request->id);

                if (!$project) {
                    return redirect()->route('admin.not.found');
                }

                if (!empty($project->photo)) {
                    $image_path = public_path("/adminBoard/uploadedImages/projects//") . $project->photo;
                    if (File::exists($image_path)) {
                        File::delete($image_path);
                    }
                }

                if (!empty($project->file)) {
                    $file_path = public_path("/adminBoard/uploadedFiles/project//") . $project->file;

                    if (File::exists($file_path)) {
                        File::delete($file_path);
                    }
                }

                if (!empty($project->word)) {
                    $file_path = public_path("/adminBoard/uploadedFiles/project//") . $project->word;
                    if (File::exists($file_path)) {
                        File::delete($file_path);
                    }
                }

                $project->forceDelete();

                return $this->returnSuccessMessage(__('general.delete_success_message'));
            }
        } catch (\Exception $exception) {
            return $this->returnError(__('general.try_catch_error_message'), 500);
        }//end catch

    }


    public function changeStatus(Request $request)
    {

        $project = Projects::find($request->id);

        if ($request->switchStatus == 'false') {
            $project->status = null;
            $project->save();
        } else {
            $project->status = 'on';
            $project->save();
        }

        return $this->returnSuccessMessage(__('general.change_status_success_message'));
    }
}
