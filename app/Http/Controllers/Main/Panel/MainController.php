<?php

namespace App\Http\Controllers\Main\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
    public function index()
    {
        return view('main.panel.index');
    }
}
