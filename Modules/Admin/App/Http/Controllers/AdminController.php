<?php

namespace Modules\Admin\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\{Admin, AdminContactDetail, Contact, User};
use Auth;
use Hash;

use Validator;

class AdminController extends Controller
{
    /**
     * Display dashboard.
     */
    public function dashboard()
    {
        
        return view('admin::dashboard');
    }


    public function adminLogin(Request $request)
    {

        if ($request->isMethod('post')) {
            $credentials = $request->validate([
                'email'    => 'required|email',
                'password' => 'required',
            ]);

            $remember = $request->filled('remember');

            if (Auth::guard('admin')->attempt($credentials, $remember)) {
                return redirect()->intended('admin/dashboard');
            }

            return back()->with('error_message', 'Invalid Credentials!');
        }

        return view('admin::login');
    }

    /* --- change password --- */
    public function changePassword(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;

            if (Hash::check($data['current_pwd'], Auth::guard('admin')->user()->password)) {
                if ($data['confirm_pwd'] == $data['current_pwd']) {
                    return back()->with('error_message', 'Your New Password must be different from previously used Password');
                } else if ($data['new_pwd'] == $data['confirm_pwd']) {

                    Auth::guard('admin')->user()->update(['password' => Hash::make($data['new_pwd'])]);
                    return redirect()->back()->with('success_message', 'Password Updated Successfully!');
                } else {
                    return back()->with('error_message', 'New Password and Confirm Password does not match!');
                }
            } else {
                return back()->with('error_message', 'Old Password is Incorrect!');
            }
        }
        return view('admin::change_password');
    }

    /* --- check current password via ajax-- */
    public function CheckCurrentPassword(Request $request)
    {
        $data = $request->all();
        if (Hash::check($data['current_pwd'], Auth::guard('admin')->user()->password)) {
            return "true";
        } else {
            return "false";
        }
    }

    /* --- admin logout --- */
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('admin');
    }
}
