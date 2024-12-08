<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Http\Requests\AdminUpdateRequest;
use App\Models\Admin;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use File;

class AdminsController extends Controller
{
    use GeneralTrait;


    // index
    public function index()
    {
        $id = admin()->user()->id;
        $admin = Admin::find($id);
        $title = __('menu.admin');
        return view('admin.admin.index', compact('title', 'admin'));
    }

    // get Admin By Id
    public function getAdminById(Request $request)
    {
        $admin = Admin::find($request->id);
        if (!$admin) {
            return redirect()->route('admin.not.found');
        }
        return $this->returnData('OK', 'data', $admin);
    }

    // Admin Update
    public function adminUpdate(AdminRequest $request)
    {

        try {
            $admin = Admin::find($request->id);
            if (!$admin) {
                return redirect()->route('admin.not.found');
            }


            if ($request->hasFile('photo')) {
                if (!empty($admin->photo)) {
                    $image_path = public_path("/adminBoard/uploadedImages/admin//") . $admin->photo;
                    if (File::exists($image_path)) {
                        File::delete($image_path);
                    }
                    $image = $request->file('photo');
                    $destinationPath = public_path('/adminBoard/uploadedImages/admin//');
                    $photo_path = $this->saveResizeImage($image, $destinationPath, 250, 250);
                } else {
                    $image = $request->file('photo');
                    $destinationPath = public_path('/adminBoard/uploadedImages/admin//');
                    $photo_path = $this->saveResizeImage($image, $destinationPath, 250, 250);
                }
            } else {
                if (!empty($admin->photo)) {
                    $photo_path = $admin->photo;
                } else {
                    $photo_path = '';
                }
            }


            if (!empty($request->input('password'))) {
                $password = bcrypt($request->password);
            } else {
                $password = $admin->password;
            }


            $admin->update([
                'name' => $request->name,
                'photo' => $photo_path,
                'password' => $password,
            ]);

            return $this->returnSuccessMessage(__('general.update_success_message'));
        } catch (\Exception $exception) {
            return $this->returnError(__('general.try_catch_error_message'), '500');
        }
    }
}
