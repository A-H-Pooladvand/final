<?php

namespace App\Http\Controllers\Place\Front;

use App\Place;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PlaceController extends Controller
{
    public function show($id, string $title = null)
    {
//        return
        $place = Place::with('province', 'province_city')->findOrFail($id);

        return view('place.front.show', compact('place'));
    }
}
