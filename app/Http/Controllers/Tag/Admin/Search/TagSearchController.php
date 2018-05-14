<?php

namespace App\Http\Controllers\Tag\Admin\Search;

use App\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagSearchController extends Controller
{
    public function index(Request $request)
    {
        $keywords = $request['keywords'];

        return Tag::where('title', 'LIKE', "%{$keywords}%")->get(['id', 'title']);
    }
}
