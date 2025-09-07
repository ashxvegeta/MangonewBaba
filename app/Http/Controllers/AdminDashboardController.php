<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminDashboardController extends Controller
{
    //

    public function AdminviewUsers(){
        $users = User::all();
        return view('admin.view_users',compact('users'));
    }
}
