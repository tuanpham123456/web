<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminLoginController extends Controller
{
    public function getLoginAdmin(){
        return view ('admin.auth.login');
    }
    public function postLoginAdmin(Request $request){
        
    }
}
