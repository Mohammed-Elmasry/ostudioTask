<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminsController extends Controller
{
    function dashboard(){
        return view('admin.dashboard');
    }

}
