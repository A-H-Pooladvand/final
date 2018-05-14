<?php

namespace App\Http\Controllers\About\Admin;

use App\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    public function show()
    {
        $about = About::findOrFail(1);
        return view('about.admin.show', compact('about'));
    }

    public function edit()
    {
        $about = About::findOrFail(1);

        return view('about.admin.form', compact('about'));
    }

    public function update(Request $request)
    {
        $about = About::findOrFail(1);
        $about->title = $request->title;
        $about->image = $request->image;
        $about->content = $request['content'];
        $about->save();

        return ['message' => 'درباره ما با موفقیت ویرایش گردید.'];
    }
}
