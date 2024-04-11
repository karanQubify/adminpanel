<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{
    public function dashboard(){
        $user = Auth::user();
        return view('admin.pages.dashboard', compact('user'));
    }
}
