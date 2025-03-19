<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewRequest;
use App\Models\MyNew;
use App\Traits\GeneralTrait;
use File;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    use GeneralTrait;

    // index
    public function index()
    {
        $title = __('menu.news');
        $news = MyNew::withoutTrashed()->orderByDesc('created_at')->paginate(15);
        return view('admin.news.index', compact('title', 'news'));
    }

    // create
    public function create()
    {
        $title = __('menu.add_new_new');
        return view('admin.news.create', compact('title'));
    }

    // store
    public function store(NewRequest $request)
    {

        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $destinationPath = public_path('adminBoard/uploadedImages/news');
            $photo_path = $this->saveResizeImage($image, $destinationPath, 800, 600);
        } else {
            $photo_path = '';
        }


        $site_lang_ar = setting()->site_lang_ar;

        MyNew::create([
            'title_en_slug' => slug($request->title_en),
            'title_ar_slug' => $site_lang_ar == 'on' ? slug($request->title_ar) : null,
            'title_en' => $request->title_en,
            'title_ar' => $site_lang_ar == 'on' ? $request->title_ar : null,
            'details_en' => $request->details_en,
            'details_ar' => $site_lang_ar == 'on' ? $request->details_ar : null,
            'added_date' => $request->added_date,
            'status' => 'on',
            'photo' => $photo_path,
            'language' => $site_lang_ar == 'on' ? 'ar_en' : 'en',
        ]);

        return $this->returnSuccessMessage(__('general.add_success_message'));
    }

    // edit
    public function edit($id = null)
    {
        $title = __('news.update_new');

        if (!$id) {
            return redirect()->route('admin.not.found');
        }

        $new = MyNew::find($id);
        if (!$new) {
            return redirect()->route('admin.not.found');
        }

        return view('admin.news.update', compact('title', 'new'));
    }

    // update
    public function update(NewRequest $request)
    {

        $new = MyNew::find($request->id);
        if (!$new) {
            return redirect()->route('admin.not.found');
        }

        if ($request->hasFile('photo')) {

            $image_path = public_path("/adminBoard/uploadedImages/news//") . $new->photo;
            if (File::exists($image_path)) {
                File::delete($image_path);
            }

            if (!empty($new->photo)) {
                $image = $request->file('photo');
                $destinationPath = public_path('/adminBoard/uploadedImages/news//');
                $photo_path = $this->saveResizeImage($image, $destinationPath, 800, 600);
            } else {
                $image = $request->file('photo');
                $destinationPath = public_path('/adminBoard/uploadedImages/news//');
                $photo_path = $this->saveResizeImage($image, $destinationPath, 800, 600);
            }
        } else {
            if (!empty($new->photo)) {
                $photo_path = $new->photo;
            } else {
                $photo_path = '';
            }
        }


        $site_lang_ar = setting()->site_lang_ar;
        $new->update([
            'title_en_slug' => slug($request->title_en),
            'title_ar_slug' => $site_lang_ar == 'on' ? slug($request->title_ar) : null,
            'title_en' => $request->title_en,
            'title_ar' => $site_lang_ar == 'on' ? $request->title_ar : null,
            'details_en' => $request->details_en,
            'details_ar' => $site_lang_ar == 'on' ? $request->details_ar : null,
            'added_date' => $request->added_date,
            'status' => 'on',
            'photo' => $photo_path,
            'language' => $site_lang_ar == 'on' ? 'ar_en' : 'en',
        ]);

        return $this->returnSuccessMessage(__('general.update_success_message'));
    }

    // destroy
    public function destroy(Request $request)
    {
        try {
            if ($request->ajax()) {
                $new = MyNew::find($request->id);
                if (!$new) {
                    return redirect()->route('admin.not.found');
                }

                if ($new->delete()) {
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
        $title = __('menu.trashed_news');
        $trashedNews = MyNew::onlyTrashed()->orderByDesc('created_at')->paginate(15);
        return view('admin.news.trashed', compact('title', 'trashedNews'));
    }


    //  restore
    public function restore(Request $request)
    {
        try {
            if ($request->ajax()) {
                $new = MyNew::onlyTrashed()->find($request->id);
                if (!$new) {
                    return redirect()->route('admin.not.found');
                }
                if ($new->restore()) {
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

                $new = MyNew::onlyTrashed()->find($request->id);

                if (!$new) {
                    return redirect()->route('admin.not.found');
                }

                if (!empty($new->photo)) {
                    $image_path = public_path("/adminBoard/uploadedImages/news//") . $new->photo;
                    if (File::exists($image_path)) {
                        File::delete($image_path);
                    }
                }

                //  delete new
                if ($new->forceDelete()) {
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
        $new = MyNew::find($request->id);

        if ($request->switchStatus == 'false') {
            $new->status = null;
            $new->save();
        } else {
            $new->status = 'on';
            $new->save();
        }

        return $this->returnSuccessMessage(__('general.change_status_success_message'));
    }
}
