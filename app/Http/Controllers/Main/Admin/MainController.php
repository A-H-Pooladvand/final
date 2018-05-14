<?php

namespace App\Http\Controllers\Main\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
    public function show()
    {
        return view('main.admin.index');
    }
}
