<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PhotoAlbumsRequest;
use App\Models\PhotoAlbum;
use App\Traits\GeneralTrait;
use App\Upload_Files;
use File;
use Illuminate\Http\Request;

class PhotoAlbumsController extends Controller
{
    use GeneralTrait;

    // index
    public function index()
    {
        $title = __('menu.photo_albums');
        $photoAlbums = PhotoAlbum::orderByDesc('created_at')->paginate();
        return view('admin.photo-albums.index', compact('title', 'photoAlbums'));
    }

    // create
    public function create()
    {
        $title = __('menu.add_new_photo_album');
        return view('admin.photo-albums.create', compact('title'));
    }

    // store
    public function store(PhotoAlbumsRequest $request)
    {

        // save image
        if ($request->hasFile('main_photo')) {
            $image = $request->file('main_photo');
            $destinationPath = public_path('/adminBoard/uploadedImages/albums//');
            $photo_path = $this->saveResizeImage($image, $destinationPath, 500, 500);
        } else {
            $photo_path = '';
        }

        $lang_en = setting()->site_lang_en;
        PhotoAlbum::create([
            'main_photo' => $photo_path,
            'language' => $lang_en == 'on' ? 'ar_en' : 'ar',
            'title_ar' => $request->title_ar,
            'title_en' => $lang_en == 'on' ? $request->title_en : null,
            'year' => $request->year,
            'status' => 'on',
        ]);

        return $this->returnSuccessMessage(__('general.add_success_message'));

    }

    // edit
    public function edit($id = null)
    {
        $title = __('photoAlbums.photo_album_update');
        $photoAlbum = PhotoAlbum::find($id);
        if (!$photoAlbum) {
            return redirect()->route('admin.not.found');
        }
        return view('admin.photo-albums.update', compact('title', 'photoAlbum'));
    }

    // update
    public function update(PhotoAlbumsRequest $request)
    {

        $photoAlbum = PhotoAlbum::find($request->id);
        if (!$photoAlbum) {
            return redirect()->route('admin.not.found');
        }

        if ($request->hasFile('main_photo')) {
            if (!empty($photoAlbum->main_photo)) {

                $image_path = public_path('/adminBoard/uploadedImages/albums//') . $photoAlbum->main_photo;
                if (\Illuminate\Support\Facades\File::exists($image_path)) {
                    File::delete($image_path);
                }

                $image = $request->file('main_photo');
                $destinationPath = public_path('/adminBoard/uploadedImages/albums//');
                $photo_path = $this->saveResizeImage($image, $destinationPath, 500, 500);

            } else {
                $image_path = public_path('/adminBoard/uploadedImages/albums//') . $photoAlbum->main_photo;
                if (File::exists($image_path)) {
                    File::delete($image_path);
                }

                $image = $request->file('main_photo');
                $destinationPath = public_path('/adminBoard/uploadedImages/albums//');
                $photo_path = $this->saveResizeImage($image, $destinationPath, 500, 500);
            }
        } else {
            if (!empty($photoAlbum->main_photo)) {
                $photo_path = $photoAlbum->main_photo;
            } else {
                $photo_path = '';
            }
        }


        $lang_en = setting()->site_lang_en;
        $photoAlbum->update([
            'main_photo' => $photo_path,
            'language' => $lang_en == 'on' ? 'ar_en' : 'ar',
            'title_ar' => $request->title_ar,
            'title_en' => $lang_en == 'on' ? $request->title_en : null,
            'year' => $request->year,
        ]);

        return $this->returnSuccessMessage(__('general.update_success_message'));


    }


    // destroy
    public function destroy(Request $request)
    {

        if ($request->ajax()) {
            $photoAlbum = PhotoAlbum::find($request->id);
            if (!$photoAlbum) {
                return redirect()->route('admin.not.found');
            }
            ////////////////////  delete Main Album Photo
            if (!empty($photoAlbum->main_photo)) {
                $image_path = public_path('/adminBoard/uploadedImage/albums//') . $photoAlbum->main_photo;
                if (File::exists($image_path)) {
                    File::delete($image_path);
                }
            }
//            ////////////////////  delete other Album Photos
//            $files = File::where('relation_id', $request->id)->get();
//            foreach ($files as $file) {
//                Storage::delete($file->full_path_after_upload);
//                $file->delete();
//                Storage::deleteDirectory($file->file_path);
//            }

            $photoAlbum->delete();
            return $this->returnSuccessMessage(__('general.delete_success_message'));
        }

    }


    // add Other Album Photos
    public function addOtherAlbumPhotos($id = null)
    {
        $title = __('photoAlbums.add_other_album_photos');
        $photoAlbum = PhotoAlbum::find($id);
        if (!$photoAlbum) {
            return redirect()->route('admin.not.found');
        }
        return view('admin.photo-albums.other-album-photos', compact('title', 'photoAlbum'));
    }


    // upload Other Albums Photos function
    public function uploadOtherAlbumPhotos(Request $request, $paid)
    {
        if ($request->hasFile('file')) {

            $image = $request->file('file');
            $destinationPath = public_path('/adminBoard/uploadedImages/albums_photos//');
            $filePath = $this->saveResizeImage($image, $destinationPath, 1200, 750);

            $file = new Upload_Files();
            $file->file_name = $request->file('file')->getClientOriginalName();
            $file->file_size = $request->file('file')->getSize();
            $file->file_path = 'photo_albums/' . $paid;
            $file->file_after_upload = $request->file('file')->hashName();
            $file->full_path_after_upload = $filePath;
            $file->file_mimes_type = $request->file('file')->getMimeType();
            $file->file_type = 'photo_albums_photos';
            $file->relation_id = $paid;
            $file->save();
        }
        return response(['status' => true, 'id' => $file->id], 200);
    }


    // delete Other Album Photo function
    public function deleteOtherAlbumPhoto(Request $request)
    {
        if ($request->ajax()) {
            $file = Upload_Files::find($request->id);
            $image_path = public_path('/adminBoard/uploadedImages/albums_photos//') . $file->full_path_after_upload;
            if (File::exists($image_path)) {
                File::delete($image_path);
            }
            $file->delete();
            return response($file);
        }
    }


    // change Status
    public function changeStatus(Request $request)
    {
        $photoAlbum = PhotoAlbum::find($request->id);

        if ($request->switchStatus == 'false') {
            $photoAlbum->status = null;
            $photoAlbum->save();
        } else {
            $photoAlbum->status = 'on';
            $photoAlbum->save();
        }

        return $this->returnSuccessMessage(__('general.change_status_success_message'));
    }

}
