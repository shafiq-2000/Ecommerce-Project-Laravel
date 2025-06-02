<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('backend.index');
    }
    public function login()
    {
        return view('backend.pages.admin-login');
    }


    public function authenticate(Request $request)
    {

        $email = $request->email;
        $password = md5($request->password);
        $result = Admin::where('admin_email', $email)->where('admin_password', $password)->first();

        if ($result) {

            session([
                'admin_id' => $result->admin_id,
                'admin_name' => $result->admin_name,
                'admin_phone' => $result->admin_phone,
                'admin_email' => $result->admin_email,
                'role' => 'admin',
            ]);

            return redirect()->route('admin.dashboard');
        } else {

            return redirect()->route('admin.login')->with('show', 'Login credential not match!');
        }
    }

    public function logout()
    {
        session()->flush();
        return redirect()->route('admin.login')->with('show', 'You have already logout');
    }
}
