<?php

namespace App\Http\Controllers\web\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function index(){
        return view('admin.index');
    }
}
