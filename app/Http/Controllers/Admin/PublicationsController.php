<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Http\Requests\PublicationRequest;
use App\Models\Article;
use App\Models\Publication;
use App\Models\Publications;
use App\Traits\GeneralTrait;
use File;
use Illuminate\Http\Request;

class PublicationsController extends Controller
{
    use GeneralTrait;

    // index
    public function index()
    {
        $title = __('menu.publications');
        $publications = Publication::withoutTrashed()->orderByDesc('created_at')->paginate(15);
        return view('admin.publications.index', compact('title', 'publications'));
    }

    // create
    public function create()
    {
        $title = __('menu.add_new_publication');
        return view('admin.publications.create', compact('title'));
    }

    // store
    public function store(PublicationRequest $request)
    {

        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $destinationPath = public_path('adminBoard/uploadedImages/publications');
            $photo_path = $this->saveResizeImage($image, $destinationPath, 500, 500);
        } else {
            $photo_path = '';
        }


        $site_lang_ar = setting()->site_lang_ar;

        Publication::create([
            'section_id' => '1',
            'title_en_slug' => slug($request->title_en),
            'title_ar_slug' => $site_lang_ar == 'on' ? slug($request->title_ar) : null,
            'title_en' => $request->title_en,
            'title_ar' => $site_lang_ar == 'on' ? $request->title_ar : null,
            'details_en' => $request->details_en,
            'details_ar' => $site_lang_ar == 'on' ? $request->details_ar : null,
            'added_date' => $request->added_date,
            'status' => 'on',
            'photo' => $photo_path,
            'language' => 'ar_en',
        ]);

        return $this->returnSuccessMessage(__('general.add_success_message'));
    }

    // edit
    public function edit($id = null)
    {
        if (!$id) {
            return redirect()->route('admin.not.found');
        }
        $title = __('publications.update_publication');
        $publication = Publication::find($id);

        if (!$publication) {
            return redirect()->route('admin.not.found');
        }
        return view('admin.publications.update', compact('title', 'publication'));
    }

    // update
    public function update(PublicationRequest $request)
    {

        $publication = Publication::find($request->id);

        if (!$publication) {
            return redirect()->route('admin.not.found');
        }

        if ($request->hasFile('photo')) {

            $image_path = public_path("/adminBoard/uploadedImages/publications//") . $publication->photo;
            if (File::exists($image_path)) {
                File::delete($image_path);
            }

            if (!empty($publication->photo)) {
                $image = $request->file('photo');
                $destinationPath = public_path('/adminBoard/uploadedImages/publications//');
                $photo_path = $this->saveResizeImage($image, $destinationPath, 500, 500);
            } else {
                $image = $request->file('photo');
                $destinationPath = public_path('/adminBoard/uploadedImages/publications//');
                $photo_path = $this->saveResizeImage($image, $destinationPath, 500, 500);
            }
        } else {
            if (!empty($publication->photo)) {
                $photo_path = $publication->photo;
            } else {
                $photo_path = '';
            }
        }


        $site_lang_ar = setting()->site_lang_ar;
        $publication->update([
            'section_id' => '1',
            'title_en_slug' => slug($request->title_en),
            'title_ar_slug' => $site_lang_ar == 'on' ? slug($request->title_ar) : null,
            'title_en' => $request->title_en,
            'title_ar' => $site_lang_ar == 'on' ? $request->title_ar : null,
            'details_en' => $request->details_en,
            'details_ar' => $site_lang_ar == 'on' ? $request->details_ar : null,
            'added_date' => $request->added_date,
            'status' => 'on',
            'photo' => $photo_path,
            'language' => 'ar_en',
        ]);

        return $this->returnSuccessMessage(__('general.update_success_message'));
    }

    // destroy
    public function destroy(Request $request)
    {
        try {
            if ($request->ajax()) {
                $publication = Publication::find($request->id);
                if (!$publication) {
                    return redirect()->route('admin.not.found');
                }

                if ($publication->delete()) {
                    return $this->returnSuccessMessage(__('general.move_to_trash'));
                } else {
                    return $this->returnError(__('general.delete_error_message'), 404);
                }
            }
        } catch (\Exception $exception) {
            return $this->returnError(__('general.try_catch_error_message'), 500);
        } //end catch
    }

    //  trashed
    public function trashed()
    {
        $title = __('menu.trashed_publications');
        $trashedPublications = Publication::onlyTrashed()->orderByDesc('created_at')->paginate(15);
        return view('admin.publications.trashed', compact('title', 'trashedPublications'));
    }


    //  restore
    public function restore(Request $request)
    {
        try {
            if ($request->ajax()) {
                $publication = Publication::onlyTrashed()->find($request->id);
                if (!$publication) {
                    return redirect()->route('admin.not.found');
                }
                if ($publication->restore()) {
                    return $this->returnSuccessMessage(__('general.restore_success_message'));
                } else {
                    return $this->returnError(__('general.restore_error_message'), 404);
                }
            }
        } catch (\Exception $exception) {
            return $this->returnError(__('general.try_catch_error_message'), 500);
        } //end catch
    }

    //  force delete
    public function forceDelete(Request $request)
    {
        try {
            if ($request->ajax()) {

                $publication = Publication::onlyTrashed()->find($request->id);

                if (!$publication) {
                    return redirect()->route('admin.not.found');
                }

                if (!empty($publication->photo)) {
                    $image_path = public_path("/adminBoard/uploadedImages/publications//") . $publication->photo;
                    if (File::exists($image_path)) {
                        File::delete($image_path);
                    }
                }

                //  delete articles
                if ($publication->forceDelete()) {
                    return $this->returnSuccessMessage(__('general.delete_success_message'));
                } else {
                    return $this->returnError(__('general.delete_error_message'), 404);
                }
            }
        } catch (\Exception $exception) {
            return $this->returnError(__('general.try_catch_error_message'), 500);
        } //end catch

    }


    // change Status
    public function changeStatus(Request $request)
    {
        $publication = Publication::find($request->id);

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
