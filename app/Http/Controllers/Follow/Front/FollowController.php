<?php

namespace App\Http\Controllers\Follow\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    public function store(Request $request, $id)
    {
        if (ValidateFollowers::isFollowingHimself($request, $id))
            return back();

        if (ValidateFollowers::isAlreadyFollower($id))
            $request->user()->followings()->detach([$id]);
        else
            $request->user()->followings()->attach($id);

        return redirect()->back();
    }
}
