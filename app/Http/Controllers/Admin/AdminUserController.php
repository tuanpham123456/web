<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
class AdminUserController extends Controller
{
    public function index(){
        $users = User::paginate(10);
        $viewData = [
            'users' =>  $users,
        ];
        return view('admin.user.index',$viewData);

    }
    public function delete($id){
        $users = User::find($id);

        if ($users) $users->delete();
        return redirect()->back();
    }
}
