<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AboutsRequest;
use App\Models\About;
use App\Models\AboutType;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AboutController extends Controller
{
    use GeneralTrait;

    public function index()
    {
        $abouts = About::orderByDesc('id')->get();
        $title = __('menu.abouts');
        return view('admin.abouts.index', compact('abouts', 'title'));
    }

    public function create()
    {
        $about_types = AboutType::get();
        $title = __('menu.add_new_about');
        return view('admin.abouts.create', compact('about_types' ,'title'));
    }

    public function store(AboutsRequest $request)
    {
        $about = About::where('about_type_id' ,$request->type_id )->first();
        if( $about){
           return  $this->returnError('يوجد بالفعل بيانات خاصة في هذا النواع ', 500);
        }

        // save image
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $destinationPath = public_path('adminBoard/uploadedImages/abouts');
            $photo_path = $this->saveResizeImage($image, $destinationPath, 530, 300);
        } else {
            $photo_path = '';
        }


          // save File
          if ($request->hasFile('file')) {
            $file = $this->saveFile($request->file('file'), 'adminBoard/uploadedFiles/abouts');
        } else {
            $file = '';
        }

        $lang_en = setting()->site_lang_en;
        About::create([
            'photo' => $photo_path,
            'details_ar' => $request->details_ar,
            'details_en' => $lang_en == 'on' ? $request->details_en : null,
            'title_ar' => $request->title_ar,
            'title_en' => $lang_en == 'on' ? $request->title_en : null,
            'about_type_id' => $request->type_id,
            'file' => $file,
            'status' =>'on',
        ]);

        return $this->returnSuccessMessage(__('general.add_success_message'));
    }

    public function edit($id)
    {
        $about = About::findOrFail($id);
        $about_types = AboutType::get();
        return view('admin.abouts.update', compact('about' , 'about_types'));
    }

    public function update(AboutsRequest $request)
    {
        // return $request->all();
        $about = About::findORFail($request->id);

        // save image
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $destinationPath = public_path('adminBoard/uploadedImages/abouts');
            $photo_path = $this->saveResizeImage($image, $destinationPath, 530, 300);

            $image_path = public_path("/adminBoard/uploadedImages\abouts\\") . $about->photo;

            if (File::exists($image_path))
            {
              File::delete($image_path);
            }
        } else {
            $photo_path = $about->photo;
        }

           // save File

           if ($request->hasFile('file')) {

                $file = $this->saveFile($request->file('file'), 'adminBoard/uploadedFiles/abouts');

                $file_path = public_path("\adminBoard\uploadedFiles\\abouts\\") . $about->file;

                if (File::exists($file_path))
                {
                    File::delete($file_path);
                }
            } else {
                $file = $about->file;
            }


        $lang_en = setting()->site_lang_en;
        $about->update([
            'photo' => $photo_path,
            'details_ar' => $request->details_ar,
            'details_en' => $lang_en == 'on' ? $request->details_en : null,
            'title_ar' => $request->title_ar,
            'title_en' => $lang_en == 'on' ? $request->title_en : null,
            'file'   => $file ,
            'about_type_id' => $request->type_id,
        ]);
        return $this->returnSuccessMessage(__('general.update_success_message'));
    }

    public function trashed()
    {
        $title = __('menu.trashed_articles');
        $abouts = About::onlyTrashed()->orderByDesc('created_at')->paginate(15);
        return view('admin.abouts.trashed', compact('title', 'abouts'));
    }


    ///////////////////////////////////////////////
    /// destroy
    public function destroy(Request $request)
    {
        try {
            if ($request->ajax()) {
                $about = About::find($request->id);
                if (!$about) {
                    return redirect()->route('admin.not.found');
                }
                $about->delete();
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
                $about = About::onlyTrashed()->find($request->id);
                if (!$about) {
                    return redirect()->route('admin.not.found');
                }
                $about->restore();
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

                $about = About::onlyTrashed()->find($request->id);

                if (!$about) {
                    return redirect()->route('admin.not.found');
                }

                if (!empty($about->photo)) {
                    $image_path = public_path("\adminBoard\uploadedImages\abouts\\") . $about->photo;
                    if (File::exists($image_path)) {
                        File::delete($image_path);
                    }
                }

                if(!empty($about->file)){
                    $file_path = public_path("\adminBoard\uploadedFiles\\abouts\\") . $about->file;

                    if (File::exists($file_path))
                    {
                    File::delete($file_path);
                    }
                }

                $about->forceDelete();

                return $this->returnSuccessMessage(__('general.delete_success_message'));
            }
        } catch (\Exception $exception) {
            return $this->returnError(__('general.try_catch_error_message'), 500);
        }//end catch

    }


    public function changeStatus(Request $request)
    {

        $about = About::find($request->id);

        if ($request->switchStatus == 'false') {
            $about->status = null;
            $about->save();
        } else {
            $about->status = 'on';
            $about->save();
        }

        return $this->returnSuccessMessage(__('general.change_status_success_message'));
    }
}
