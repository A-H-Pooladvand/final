<?php

namespace App\Http\Controllers\Main\Front;

use App\Audible;
use App\Book;
use App\Event;
use App\Http\Controllers\Controller;
use App\Meeting;
use App\News;
use App\Slider;
use App\Term;
use Cache;
use Illuminate\Http\Request;
use Carbon\Carbon;

class MainController extends Controller
{
    public function show(Request $request)
    {

        $this->seo()->setTitle('صفحه اصلی');
        $this->seo()->setDescription('استاد دانشگاه تهران');

        $sliders = Cache::remember('_front_sliders', 1, function () {
            return Slider::latest()->take(5)->get(['title', 'image', 'description', 'link']);
        });

        $books = Cache::remember('_front_books', 1, function () {
            return Book::latest()->take(4)->get(['id', 'title', 'description', 'image']);
        });

        $terms = Cache::remember('_front_terms', 1, function () {
            return Term::whereHas('courses')
                ->with(['place:id,title'])->latest()
                ->take(3)
                ->get(["id", "place_id", "title", "image", "summary", "start_at", "end_at"]);
        });

        $now = Carbon::now();
        $news = Cache::remember('_front_news', 1, function () use ($now) {
            return News::with('categories:id,title')
                ->latest()
                ->where('status', 'publish')
                ->where('publish_at', '<=', $now)
                ->where(function ($news) use ($now) {
                    $news->whereNull('expire_at')
                        ->orWhere('expire_at', '>=', $now);
                })
                ->take(4)
                ->get(['id', 'title', 'summary', 'image', 'created_at']);
        });


        $events = Cache::remember('_front_events', 1, function () use ($now){
            return Event::with('place:id,title')
                ->where('releases_at', '<=', $now)
                ->latest()
                ->take(4)
                ->get(['id', 'title', 'summary', 'image', 'created_at', 'place_id']);
        });

        $meetings = Cache::remember('_front_meetings', 1, function () use ($now){
            return Meeting::with('place:id,title')
                ->latest()
                ->take(6)
                ->get(['id', 'title', 'image', 'created_at', 'place_id']);
        });

        $audibles = Cache::remember('_front_audibles', 1, function () {
            return Audible::latest()->take(3)->get(['id', 'title', 'image', 'sound', 'sound_link']);
        });

        return view('main.front.index', compact('sliders', 'books', 'terms', 'news', 'meetings', 'events', 'audibles'));
    }
}
