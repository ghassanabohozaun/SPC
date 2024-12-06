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
        $videos = Video::orderByDesc('created_at')->paginate();
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


        $lang_en = setting()->site_lang_en;
        Video::create([
            'photo' => $photo_path,
            'language' => $lang_en == 'on' ? 'ar_en' : 'ar',
            'title_ar' => $request->title_ar,
            'title_en' => $lang_en == 'on' ? $request->title_en : null,
            'link' => $VideoLink,
            'duration' => $request->duration,
            'added_date' => $request->added_date,
            'status' => 'on',
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


        $lang_en = setting()->site_lang_en;
        $video->update([
            'photo' => $photo_path,
            'language' => $lang_en == 'on' ? 'ar_en' : 'ar',
            'title_ar' => $request->title_ar,
            'title_en' => $lang_en == 'on' ? $request->title_en : null,
            'link' => $VideoLink,
            'duration' => $request->duration,
            'added_date' => $request->added_date,
        ]);


        return $this->returnSuccessMessage(__('general.update_success_message'));
    }


    // destroy
    public function destroy(Request $request)
    {
        if ($request->ajax()) {
            $video = Video::find($request->id);
            if (!$video) {
                return redirect()->route('admin.not.found');
            }
            if (!empty($video->photo)) {
                $image_path = public_path('/adminBoard/uploadedImages/videos//') . $video->photo;
                if (File::exists($image_path)) {
                    File::delete($image_path);
                }
            }
            $video->delete();
            return $this->returnSuccessMessage(__('general.delete_success_message'));
        }
    }


    // view video
    public function viewVideo(Request $request)
    {
        if ($request->ajax()) {
            $video = Video::find($request->id);
            return response()->json(['data' => $video]);
        }
    }

    /////////////////////////////////////////
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
