<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\VideosRequest;
use App\Models\Video;
use App\Traits\GeneralTrait;
use File;
use Illuminate\Http\Request;

class VideosController extends Controller
{
    use GeneralTrait;

    // index
    public function index()
    {
        $title = __('menu.videos');
        $videos = Video::withoutTrashed()->orderByDesc('created_at')->paginate(15);
        return view('admin.videos.index', compact('title', 'videos'));
    }

    // create
    public function create()
    {
        $title = __('menu.add_new_video');
        return view('admin.videos.create', compact('title'));
    }

    // store
    public function store(VideosRequest $request)
    {

        if ($request->has('link')) {
            if (preg_match('@^(?:https://(?:www\\.)?youtube.com/)(watch\\?v=|v/)([a-zA-Z0-9_]*)@', $request->link, $match)) {
                $VideoLink = $this->getVideoLink($request->link);
            } else {
                return $this->returnError(__('videos.url_invalid'), '500');
            }
        }


        // save image
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $destinationPath = public_path('/adminBoard/uploadedImages/videos//');
            $photo_path = $this->saveResizeImage($image, $destinationPath, 500, 500);
        } else {
            $photo_path = '';
        }


        $site_lang_ar = setting()->site_lang_ar;

        Video::create([
            'title_en' => $request->title_en,
            'title_ar' => $site_lang_ar == 'on' ? $request->title_ar : null,
            'link' => $VideoLink,
            'duration' => $request->duration,
            'added_date' => $request->added_date,
            'status' => 'on',
            'photo' => $photo_path,
            'language' => $site_lang_ar == 'on' ? 'ar_en' : 'en',
        ]);

        return $this->returnSuccessMessage(__('general.add_success_message'));
    }


    /// user define get Video Link function
    protected function getVideoLink($link)
    {
        //// Get YouTube Video Key
        if (strlen($link) > 11) {
            if (preg_match(
                '%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i',
                $link,
                $match
            )) {
                return $match[1];
            } else
                return '0';
        }
    }


    // edit
    public function edit($id = null)
    {
        $title = __('videos.video_update');
        $video = Video::find($id);
        if (!$video) {
            return redirect()->route('admin.not.found');
        }
        return view('admin.videos.update', compact('title', 'video'));
    }


    // update
    public function update(VideosRequest $request)
    {

        $video = Video::find($request->id);

        if (!$video) {
            return redirect()->route('admin.not.found');
        }

        if ($request->has('link')) {
            if (preg_match('@^(?:https://(?:www\\.)?youtube.com/)(watch\\?v=|v/)([a-zA-Z0-9_]*)@', $request->link, $match)) {
                $VideoLink = $this->getVideoLink($request->link);
            } else {
                return $this->returnError(__('videos.url_invalid'), '500');
            }
        }

        if ($request->hasFile('photo')) {

            if (!empty($video->photo)) {
                $image_path = public_path('/adminBoard/uploadedImages/videos//') . $video->photo;
                if (File::exists($image_path)) {
                    File::delete($image_path);
                }
                $image = $request->file('photo');
                $destinationPath = public_path('/adminBoard/uploadedImages/videos//');
                $photo_path = $this->saveResizeImage($image, $destinationPath, 1920, 908);
            } else {
                $image = $request->file('photo');
                $destinationPath = public_path('/adminBoard/uploadedImages/videos//');
                $photo_path = $this->saveResizeImage($image, $destinationPath, 1920, 908);
            }
        } else {
            if (!empty($video->photo)) {
                $photo_path = $video->photo;
            } else {
                $photo_path = '';
            }
        }


        $site_lang_ar = setting()->site_lang_ar;

        $video->update([
            'title_en' => $request->title_en,
            'title_ar' => $site_lang_ar == 'on' ? $request->title_ar : null,
            'link' => $VideoLink,
            'duration' => $request->duration,
            'added_date' => $request->added_date,
            'photo' => $photo_path,
            'language' => $site_lang_ar == 'on' ? 'ar_en' : 'en',
        ]);


        return $this->returnSuccessMessage(__('general.update_success_message'));
    }


    // trashed
    public function trashed()
    {
        $title = __('general.trashed');
        $videos = Video::onlyTrashed()->orderByDesc('deleted_at')->paginate(15);
        return view('admin.videos.trashed', compact('title', 'videos'));
    }

    // destroy
    public function destroy(Request $request)
    {
        if ($request->ajax()) {
            $video = Video::find($request->id);
            if (!$video) {
                return redirect()->route('admin.not.found');
            }
            if ($video->delete()) {
                return $this->returnSuccessMessage(__('general.move_to_trash'));
            } else {
                return $this->returnError(__('general.delete_error_message'), 400);
            }
        }
    }

    public function restore(Request $request)
    {
        if ($request->ajax()) {

            $video = Video::onlyTrashed()->find($request->id);
            if (!$video) {
                return redirect()->route('admin.not.found');
            }

            if ($video->restore()) {
                return $this->returnSuccessMessage(__('general.restore_success_message'));
            } else {
                return $this->returnError(__('general.restore_error_message'), 400);
            }
        }
    }

    // force delete
    public function forceDelete(Request $request)
    {
        if ($request->ajax()) {
            $video = Video::onlyTrashed()->find($request->id);
            if (!$video) {
                return redirect()->route('admin.not.found');
            }

            //delete photo
            $public_path  = public_path('/adminBoard/uploadedImages/videos//') . $video->photo;
            if (File::exists($public_path)) {
                File::delete($public_path);
            }

            if ($video->forceDelete()) {
                return $this->returnSuccessMessage(__('general.delete_success_message'));
            } else {
                return $this->returnError(__('general.delete_error_message'), 400);
            }
        }
    }

    // view video
    public function viewVideo(Request $request)
    {
        if ($request->ajax()) {
            $video = Video::find($request->id);
            return response()->json($video);
        }
    }

    /// change  status
    public function changeStatus(Request $request)
    {
        $video = Video::find($request->id);
        if ($request->switchStatus == 'false') {
            $video->status = null;
            $video->save();
        } else {
            $video->status = 'on';
            $video->save();
        }
        return $this->returnSuccessMessage(__('general.change_status_success_message'));
    }
}
