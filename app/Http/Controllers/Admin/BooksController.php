<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PosterRequest;
use App\Models\Poster;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use File;

class BooksController extends Controller
{

    use GeneralTrait;

    // index
    public function index()
    {
        $title = __('menu.posters');
        $posters = Poster::withoutTrashed()->orderBy('created_at', 'desc')->paginate(15);
        return view('admin.posters.index', compact('title', 'posters'));
    }

    // create
    public function create()
    {
        $title = __('menu.add_new_poster');
        return view('admin.posters.create', compact('title'));
    }

    // store
    public function store(PosterRequest $request)
    {


        // poster photo
        if ($request->hasFile('photo')) {
            $photo_name  = $request->file('photo');
            $photo_path_destination = public_path('/adminBoard/uploadedImages/posters//');
            $photo = $this->saveResizeImage($photo_name, $photo_path_destination, 500, 500);
        } else {
            $photo = '';
        }


        // poster file
        if ($request->hasFile('file')) {
            $file_name = $request->file('file');
            $file_public_path =  public_path('/adminBoard/uploadedFiles/posters//');
            $file = $this->saveFile($file_name, $file_public_path);
        } else {
            $file = '';
        }

        $site_lang = setting()->site_lang_ar;
        $poster =  Poster::create(
            [
                'title_en' => $request->title_en,
                'title_ar' => $site_lang == 'on' ? $request->title_ar : '',
                'added_date' => $request->added_date,
                'publisher_name' => $request->publisher_name,
                'status' => 'on',
                'photo' => $photo,
                'file' => $file,
                'language' =>  'ar_en',
            ]
        );

        if ($poster) {
            return $this->returnSuccessMessage(__('general.add_success_message'));
        }
    }

    // edit
    public function edit($id)
    {
        $title = __('posters.update_poster');
        $poster = Poster::find($id);
        if (!$poster) {
            return redirect()->route('admin.not.found');
        }
        return view('admin.posters.update', compact('title', 'poster'));
    }

    // update
    public function update(PosterRequest $request)
    {
        $poster = Poster::find($request->id);
        if (!$poster) {
            return redirect()->route('admin.not.found');
        }

        // photo upload
        if ($request->hasFile('photo')) {
            if (!empty($poster->photo)) {

                //delete old photo
                $photo_public_path = public_path('/adminBoard/uploadedImages/posters//') . $poster->photo;
                if (File::exists($photo_public_path)) {
                    File::delete($photo_public_path);
                }

                // upload new photo
                $photo_name = $request->file('photo');
                $photo_destination = public_path('/adminBoard/uploadedImages/posters//');
                $photo = $this->saveResizeImage($photo_name, $photo_destination, 200, 200);
            } else {

                $photo_name = $request->file('photo');
                $photo_destination = public_path('/adminBoard/uploadedImages/posters//');
                $photo  = $this->saveResizeImage($photo_name, $photo_destination, 200, 200);
            }
        } else {
            if (!empty($poster->photo)) {
                $photo = $poster->photo;
            } else {
                $photo = '';
            }
        }



        // file upload
        if ($request->hasFile('file')) {
            if (!empty($poster->file)) {

                //delete old file
                $file_public_path = public_path('/adminBoard/uploadedFiles/posters//') . $poster->file;
                if (File::exists($file_public_path)) {
                    File::delete($file_public_path);
                }

                // upload new file
                $file_name = $request->file('file');
                $file_destination = public_path('/adminBoard/uploadedFiles/posters//');
                $file = $this->saveFile($file_name, $file_destination);
            } else {
                $file_name = $request->file('file');
                $file_destination = public_path('/adminBoard/uploadedFiles/posters//');
                $file  = $this->saveFile($file_name, $file_destination);
            }
        } else {
            if (!empty($poster->file)) {
                $file = $poster->file;
            } else {
                $file = '';
            }
        }



        $site_lang = setting()->site_lang_ar;

        $poster->update([
            'title_ar' => $site_lang == 'on' ?  $request->title_ar : '',
            'title_en' => $request->title_en,
            'added_date' => $request->added_date,
            'publisher_name' => $request->publisher_name,
            'photo' => $photo,
            'file' => $file,
            'language' => $site_lang == 'on' ? 'ar_en' : 'en',
        ]);

        return $this->returnSuccessMessage(__('general.update_success_message'));
    }

    // destroy
    public function destroy(Request $request)
    {
        if ($request->ajax()) {
            $poster = Poster::find($request->id);
            if (!$poster) {
                return redirect()->route('admin.not.found');
            }

            if ($poster->delete()) {
                return $this->returnSuccessMessage(__('general.move_to_trash'));
            } else {
                return $this->returnError(__('general.delete_error_message'), 400);
            }
        }
    }

    // trashed
    public function trashed()
    {
        $title = __("general.trashed");
        $trashedPosters   = Poster::onlyTrashed()->orderByDesc('deleted_at')->paginate(15);
        return view('admin.posters.trashed', compact('title', 'trashedPosters'));
    }

    // restore
    public function restore(Request $request)
    {
        if ($request->ajax()) {
            $poster = Poster::onlyTrashed()->find($request->id);
            if (!$poster) {
                return redirect()->route('admin.not.found');
            }
            $poster->restore();
            //return response()->json($poster, 200);
            //return $this->returnData()
            return $this->returnSuccessMessage(__('general.restore_success_message'));
        }
    }

    // force delete
    public function forceDelete(Request $request)
    {
        if ($request->ajax()) {
            $poster = Poster::onlyTrashed()->find($request->id);

            if (!$poster) {
                return redirect()->route('admin.not.found');
            }

            if (!empty($poster->photo)) {
                $photo_public_path = public_path('/adminBoard/uploadedImages/posters//') . $poster->photo;
                if (File::exists($photo_public_path)) {
                    File::delete($photo_public_path);
                }
            }

            if (!empty($poster->file)) {
                $file_public_path = public_path('/adminBoard/uploadedFiles/posters//') . $poster->file;
                if (File::exists($file_public_path)) {
                    File::delete($file_public_path);
                }
            }

            $poster->forceDelete();
            return $this->returnSuccessMessage(__('general.delete_success_message'));
        }
    }

    // change status
    public function changeStatus(Request $request)
    {
        if ($request->ajax()) {
            $poster  = Poster::find($request->id);
            if (!$poster) {
                return redirect()->route('admin.not.found');
            }

            if ($request->statusSwitch == 'true') {
                $poster->status = 'on';
                $poster->save();
            } else {
                $poster->status = '';
                $poster->save();
            }

            return $this->returnSuccessMessage(__('general.change_status_success_message'));
        }
    }
}
