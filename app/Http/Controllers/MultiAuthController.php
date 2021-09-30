<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MultiAuthController extends Controller
{
    //
    public function site()
    {
        return view('usersite');
    }
    public function admin()
    {
        return view('admindashboard');
    }
    public function adminLogin()
    {
        return view('auth.adminlogin');
    }
    public function adminLogged(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {

            return redirect()->intended('/admin');
        }
        return back()->withInput($request->only('email'));
    }
}
