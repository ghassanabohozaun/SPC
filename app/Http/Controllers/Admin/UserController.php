<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\Admin;
use App\Models\Role;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use File;
class UserController extends Controller
{
    use GeneralTrait;

    // index
    public function index()
    {
        $title = __('menu.users');
        $users = Admin::with('role')->withoutTrashed()->orderByDesc('created_at')
            ->where('id', '!=', \auth('admin')->user()->id)->paginate(15);
        return view('admin.users.index', compact('title', 'users'));
    }

    // trashed users
    public function trashed()
    {
        $title = __('menu.trashed_users');
        $trashedUsers = Admin::onlyTrashed()->orderByDesc('created_at')->paginate(15);
        return view('admin.users.trashed-users', compact('title', 'trashedUsers'));
    }

    //  create
    public function create()
    {
        $title = __('menu.add_new_user');
        $roles = Role::get();
        return view('admin.users.create', compact('title', 'roles'));
    }

    //  store
    public function store(UserRequest $request)
    {

        // save image
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $destinationPath = public_path('/adminBoard/uploadedImages/admin//');
            $photo_path = $this->saveResizeImage($image, $destinationPath, 250, 250);
        } else {
            $photo_path = '';
        }

        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role_id' => $request->role_id,
            'photo' => $photo_path,
            'mobile' => $request->mobile,
            'gender' => $request->gender,
        ]);
        return $this->returnSuccessMessage(__('general.add_success_message'));

    }

    /////////////////////////////////////////
    ///  edit
    public function edit($id = null)
    {
        if (!$id) {
            return redirect()->route('admin.not.found');
        }

        $user = Admin::find($id);
        if (!$user) {
            return redirect()->route('admin.not.found');
        }
        $roles = Role::get();
        $title = __('users.update_users');

        return view('admin.users.update', compact('title', 'user', 'roles'));
    }

    /////////////////////////////////////////
    ///  Update
    public function update(UserUpdateRequest $request)
    {
        $user = Admin::find($request->id);

        if ($request->hasFile('photo')) {
            $image_path = public_path("/adminBoard/uploadedImages/admin//") . $user->photo;
            if (File::exists($image_path)) {
                File::delete($image_path);
            }

            if (!empty($user->photo)) {
                $image = $request->file('photo');
                $destinationPath = public_path('/adminBoard/uploadedImages/admin//');
                $photo_path = $this->saveResizeImage($image, $destinationPath, 250, 250);
            } else {
                $image = $request->file('photo');
                $destinationPath = public_path('/adminBoard/uploadedImages/admin//');
                $photo_path = $this->saveResizeImage($image, $destinationPath, 250, 250);
            }
        } else {
            if (!empty($user->photo)) {
                $photo_path = $user->photo;
            } else {
                $photo_path = '';
            }
        }

        if (!empty($request->input('password'))) {
            $password = bcrypt($request->password);
        } else {
            $password = $user->password;
        }

        $user->update([
            'name' => $request->name,
            'password' => $password,
            'role_id' => $request->role_id,
            'photo' => $photo_path,
            'mobile' => $request->mobile,
            'gender' => $request->gender,
        ]);

        return $this->returnSuccessMessage(__('general.update_success_message'));

    }
    /////////////////////////////////////////
    ///  restore
    public function restore(Request $request)
    {
        try {
            if ($request->ajax()) {
                $user = Admin::onlyTrashed()->find($request->id);
                if (!$user) {
                    return redirect()->route('admin.not.found');
                }
                $user->restore();
                return $this->returnSuccessMessage(__('general.restore_success_message'));
            }
        } catch (\Exception $exception) {
            return $this->returnError(__('general.try_catch_error_message'), 500);
        }//end catch
    }
    /////////////////////////////////////////
    ///  Destroy
    public function destroy(Request $request)
    {
        if ($request->ajax()) {
            $user = Admin::find($request->id);
            if (!$user) {
                return redirect()->route('admin.not.found');
            }
            $user->delete();
            return $this->returnSuccessMessage(__('general.move_to_trash'));
        }
    }

    /////////////////////////////////////////
    ///  force delete
    public function forceDelete(Request $request)
    {
        if ($request->ajax()) {
            $user = Admin::onlyTrashed()->find($request->id);
            if (!$user) {
                return redirect()->route('admin.not.found');
            }

            if (!empty($user->photo)) {
                $image_path = public_path("/adminBoard/uploadedImages/admin//") . $user->photo;
                if (File::exists($image_path)) {
                    File::delete($image_path);
                }
            }
            $user->forceDelete();

            return $this->returnSuccessMessage(__('general.delete_success_message'));
        }
    }
    /////////////////////////////////////////
    /// change  status
    public function changeStatus(Request $request)
    {
        $admin = Admin::find($request->id);
        if ($request->switchStatus == 'false') {
            $admin->status = null;
            $admin->save();
        } else {
            $admin->status = 'on';
            $admin->save();
        }
        return $this->returnSuccessMessage(__('general.change_status_success_message'));

    }

}
