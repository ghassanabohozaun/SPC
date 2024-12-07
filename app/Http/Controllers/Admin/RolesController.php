<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use App\Models\Admin;
use App\Models\Role;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;

class RolesController extends Controller
{

    use GeneralTrait;

    // index
    public function index()
    {
        $title = __('menu.permissions');
        $roles = Role::orderByDesc('created_at')->paginate();
        return view('admin.roles.index', compact('title', 'roles'));
    }


    // create
    public function create()
    {
        $title = __('menu.add_new_permission');
        return view('admin.roles.create', compact('title'));
    }


    // Store
    public function store(RoleRequest $request)
    {
        $permissions = json_encode($request->permissions);
        Role::create([
            'role_name_ar' => $request->role_name_ar,
            'role_name_en' => $request->role_name_en,
            'permissions' => $permissions,
        ]);
        return $this->returnSuccessMessage(__('general.add_success_message'));
    }


    // edit
    public function edit($id = null)
    {
        $title = __('roles.update_permission');
        if (!$id) {
            return redirect()->route('admin.not.found');
        }

        $role = Role::find($id);
        if (!$role) {
            return redirect()->route('admin.not.found');
        }
        return view('admin.roles.update', compact('title', 'role'));
    }


    // update
    public function update(RoleRequest $request)
    {

        $role = Role::find($request->id);
        if (!$role) {
            return redirect()->route('admin.not.found');
        }
        $permissions = json_encode($request->permissions);
        $role->update([
            'role_name_ar' => $request->role_name_ar,
            'role_name_en' => $request->role_name_en,
            'permissions' => $permissions,
        ]);
        return $this->returnSuccessMessage(__('general.update_success_message'));
    }


    // destroy roles
    public function destroy(Request $request)
    {
        if ($request->ajax()) {
            $role = Role::find($request->id);
            if (!$role) {
                return redirect()->route('admin.not.found');
            }

            $admins = Admin::where('role_id', $request->id)->get();
            if ($admins->isEmpty()) {
                $role->delete();
                return $this->returnSuccessMessage(__('general.delete_success_message'));
            } else {
                return $this->returnError(__('roles.delete_error_message'), 500);
            }
        }
    }
}
