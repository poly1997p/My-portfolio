<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminauthController extends Controller
{

    public function adminLogin(){
        return view('backend.admin-login');
    }
    public function adminLogout()
    {
        Auth::logout();

        return redirect('/admin/login');
        
    }

   
}
