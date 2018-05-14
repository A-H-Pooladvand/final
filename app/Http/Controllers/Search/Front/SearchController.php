<?php

namespace App\Http\Controllers\Search\Front;

use App\Audible;
use App\Book;
use App\Event;
use App\Meeting;
use App\News;
use App\Term;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function search(Request $request, $params = null)
    {

        $take_count = 6;

        $bread_crumb =
            [
                [
                    'title' => 'جستجو',
                ]
            ];


        $statements = [];
        if ($params) {
            $params = explode('/', $params);
            foreach ($params as $param) {
                $temp = explode('-', $param);
                $statements[!empty($temp[1]) ? $temp[0] : 'title'] = explode(',', !empty($temp[1]) ? $temp[1] : $temp[0]);
            }
        }

        $now = Carbon::now();

        $q_news = News::
            latest()
            ->where('status', 'publish')
            ->where('publish_at', '<=', Carbon::now())
            ->where(function ($news) use ($now) {
                $news->whereNull('expire_at')
                    ->orWhere('expire_at', '>=', $now);
            })
            ->take(6);


        $q_audibles = Audible::latest();

        $q_terms = Term::with('place:id,title')->latest();

        $q_meetings = Meeting::with('place:id,title')->latest();

        $q_events = Event::
            with('place:id,title')
            ->where('releases_at', '<=', $now)
            ->latest();


        $q_books = Book::latest();

        foreach ($statements as $k => $v) {
            switch ($k) {
                case 'title':
                    $v = implode(' ', $v);
                    $bread_crumb[] = [
                        'title' => $v,
                        'link' => '#',
                    ];

                    $this->seo()->setTitle($v);
                    $this->seo()->setDescription($v);

                    $q_news->where(function ($query) use ($v) {
                        $query->where('title', 'LIKE', "%{$v}%")
                            ->orWhere('summary', 'LIKE', "%{$v}%");
                    });

                    $q_audibles->where(function ($query) use ($v) {
                        $query->where('title', 'LIKE', "%{$v}%")
                            ->orWhere('description', 'LIKE', "%{$v}%");
                    });

                    $q_terms->where(function ($query) use ($v) {
                        $query->where('title', 'LIKE', "%{$v}%")
                            ->orWhere('summary', 'LIKE', "%{$v}%");
                    });

                    $q_meetings->where(function ($query) use ($v) {
                        $query->where('title', 'LIKE', "%{$v}%")
                            ->orWhere('summary', 'LIKE', "%{$v}%");
                    });

                    $q_events->where(function ($query) use ($v) {
                        $query->where('title', 'LIKE', "%{$v}%")
                            ->orWhere('summary', 'LIKE', "%{$v}%");
                    });

                    $q_books->where(function ($query) use ($v) {
                        $query->where('title', 'LIKE', "%{$v}%")
                            ->orWhere('description', 'LIKE', "%{$v}%");
                    });

                    break;
                default:
                    break;
            }
        }


        $news = $q_news
            ->take($take_count)
            ->get(["id", "title", "summary", "image", "created_at"]);

        $audibles = $q_audibles
            ->take($take_count)
            ->get(["id", "title", 'description', "image", "created_at"]);

        $terms = $q_terms
            ->take($take_count)
            ->get(["id", "title", 'summary', "image", "created_at", "place_id"]);

        $meetings = $q_meetings
            ->take($take_count)
            ->get(["id", "title", 'summary', "image", "created_at", "place_id"]);

        $events = $q_events
            ->take($take_count)
            ->get(["id", "title", 'summary', "image", "created_at", "place_id"]);

        $books = $q_books
            ->take($take_count)
            ->get(["id", "title", 'description', "image", "created_at"]);

        $this->setBreadcrumb($bread_crumb);

        $statements = json_encode($statements);

        return view('tag.front.index', compact('news', 'audibles', 'terms', 'meetings', 'events', 'books', 'statements'));
    }
}
