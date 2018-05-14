<?php

namespace App\Http\Controllers\News\Front;

use App\Http\Controllers\Controller;
use App\News;
use Cache;
use Carbon\Carbon;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $this->setBreadcrumb([
            [
                'title' => 'یادداشت و مصاحبه',
                'link' => route('news.index'),
            ]
        ]);

        $this->seo()->setTitle('یادداشت و مصاحبه');
        $this->seo()->setDescription('یادداشت و مصاحبه');

        $page = $request->has('page') ? $request->query('page') : 1;
        $news = Cache::remember("_front_news_index_{$page}", 1, function () {

            $now = Carbon::now();
            return News::latest()
                ->where('status', 'publish')
                ->where('publish_at', '<=', Carbon::now())
                ->where(function ($news) use ($now) {
                    $news->whereNull('expire_at')
                        ->orWhere('expire_at', '>=', $now);
                })
//                ->where('expire_at', '>=', Carbon::now())
                ->paginate(9, ["id", "title", /*"summary", */"image", "created_at"]);
        });

        return view('news.front.index', compact('news'));
    }

    public function show($id)
    {
        $now = Carbon::now();

        $news = News::with('tags', 'categories', 'galleries', 'files')
            ->where('status', 'publish')
            ->where('publish_at', '<=', $now)
            ->where(function ($news) use ($now) {
                $news->whereNull('expire_at')
                    ->orWhere('expire_at', '>=', $now);
            })
//            ->where('expire_at', '>=', Carbon::now())
            ->findOrFail($id);

        $latest_news = News::latest()
            ->where('status', 'publish')
            ->where('publish_at', '<=', Carbon::now())
            ->where('expire_at', '>=', Carbon::now())
            ->where('id', '<>', $news->id)
            ->take(5)->get();

        $this->seo()->setTitle($news->title);
        $this->seo()->setDescription($news->description);

        $this->setBreadcrumb([
            [
                'title' => 'یادداشت و مصاحبه',
                'link' => route('news.index'),
            ],
            [
                'title' => $news->title,
                'link' => '#',
            ],
        ]);

        return view('news.front.show', compact('news', 'latest_news'));
    }
}
