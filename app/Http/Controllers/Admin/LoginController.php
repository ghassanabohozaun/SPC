<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\Admin;
use Carbon\Carbon;

class LoginController extends Controller
{

    /////////////////////////////////////
    /// get Login
    public function getLogin()
    {
        return view('admin.auth.login');
    }

    /////////////////////////////////////
    /// do Login
    public function doLogin(LoginRequest $request)
    {

        $admin = Admin::where('email', $request->email)->first();

        if (!$admin) {
            return redirect()->route('get.admin.login')
                ->with(['error' => __('login.account_unavailable')]);
        } else {
            if($admin->status == 'on'){

                $rememberMe = $request->has('rememberMe') ? true : false;

                if (auth()->guard('admin')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')], $rememberMe)) {
                    $admin->update([
                        'last_login_at' => Carbon::now()->toDateTimeString(),
                        'last_login_ip' => $request->getClientIp()
                    ]);
                    return redirect()->route('admin.dashboard');

                } else {
                    return redirect()->route('get.admin.login')->with(['error' => __('login.login_failed')]);
                }
            }else{
                return redirect()->route('get.admin.login')
                    ->with(['error' => __('login.account_disabled')]);
            }

        }

    }

    /////////////////////////////////////
    ///  Logout
    public function logout()
    {
        auth()->guard('admin')->logout();
        return redirect()->route('get.admin.login');
    }


}
