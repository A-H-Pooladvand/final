<?php

namespace App\Http\Controllers\Place\Admin\Ajax;

use App\Place;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AjaxController extends Controller
{
    public function getLocation($id)
    {
        return Place::where('province_city_id', $id)->get(['id', 'province_id', 'province_city_id', 'title']);
    }
}
