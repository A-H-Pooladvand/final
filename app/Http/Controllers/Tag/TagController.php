<?php

namespace App\Http\Controllers\Tag;

use App\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    public function index($title)
    {
        $name = $title;

        $segments = explode('-', $title);
        if(count($segments) > 1)
            $name = implode(' ', $segments);

        $this->seo()->setTitle($name);
        $this->seo()->setDescription($name);

        $this->setBreadcrumb([
            [
                'title' => 'کلمات کلیدی',
            ],
            [
                'title' => $name,
            ],
        ]);

        $now = Carbon::now();

        $tag = Tag::where('title', $name)->firstOrFail();

        $news = $tag->news()
            ->where('status', 'publish')
            ->where('publish_at', '<=', Carbon::now())
            ->where(function ($news) use ($now) {
                $news->whereNull('expire_at')
                    ->orWhere('expire_at', '>=', $now);
            })->get(["id", "title", "summary", "image", "created_at"]);

        $audibles = $tag->audibles()
            ->latest()
            ->get(["id", "title", 'description', "image", "created_at"]);

        $terms = $tag->terms()
            #->whereHas('courses')
            ->with('place:id,title')
            ->latest()
            ->take(6)
                ->get(["id", "title", 'summary', "image", "created_at", "place_id"]);

        $meetings = $tag->meetings()
            #->whereHas('courses')
            ->with('place:id,title')
            ->latest()
            ->take(6)
                ->get(["id", "title", 'summary', "image", "created_at", "place_id"]);

        $events = $tag->events()
            ->with('place:id,title')
            ->where('releases_at', '<=', Carbon::now())
            ->latest()
                ->get(["id", "title", 'summary', "image", "created_at", "place_id"]);


        $books = $tag->books()
            ->latest()
            ->get(["id", "title", 'description', "image", "created_at"]);

        return view('tag.front.index', compact('tag', 'news', 'terms', 'audibles', 'events', 'books', 'meetings'));

    }
}
