<?php

namespace App\Http\Controllers\Province\Admin;

use App\Http\Controllers\Controller;
use App\ProvinceCity;

class ProvinceAjaxController extends Controller
{
    public function provinceCity($id)
    {
        return ProvinceCity::where('province_id', $id)->get(['id', 'province_id', 'title']);
    }
}
