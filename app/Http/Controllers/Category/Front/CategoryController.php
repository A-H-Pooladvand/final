<?php

namespace App\Http\Controllers\Category\Front;

use App\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index($id)
    {

        $category = Category::where('id', $id)->firstOrFail();

        $this->seo()->setTitle($category->title);
        $this->seo()->setDescription($category->title);

        $this->setBreadcrumb([
            [
                'title' => 'دسته بندی',
            ],
            [
                'title' => $category->title,
            ],
        ]);

        $now = Carbon::now();


        $news = $category->news()
            ->where('status', 'publish')
            ->where('publish_at', '<=', $now)
            ->where(function ($news) use ($now) {
                $news->whereNull('expire_at')
                    ->orWhere('expire_at', '>=', $now);
            })->get(["id", "title", "summary", "image", "created_at"]);

        $audibles = $category->audibles()
            ->latest()
            ->get(["id", "title", 'description', "image", "created_at"]);

        $terms = $category->terms()
            #->whereHas('courses')
            ->with('place:id,title')
            ->latest()
            ->take(6)
            ->get(["id", "title", 'summary', "image", "created_at", "place_id"]);

        $meetings = $category->meetings()
            #->whereHas('courses')
            ->with('place:id,title')
            ->latest()
            ->take(6)
            ->get(["id", "title", 'summary', "image", "created_at", "place_id"]);

        $events = $category->events()
            ->with('place:id,title')
            ->where('releases_at', '<=', Carbon::now())
            ->latest()
            ->get(["id", "title", 'summary', "image", "created_at", "place_id"]);


        $books = $category->books()
            ->latest()
            ->get(["id", "title", 'description', "image", "created_at"]);

        return view('tag.front.index', compact('tag', 'news', 'terms', 'audibles', 'events', 'books', 'meetings'));

    }
}
