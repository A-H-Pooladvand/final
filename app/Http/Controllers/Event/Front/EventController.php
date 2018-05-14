<?php

namespace App\Http\Controllers\Event\Front;

use App\Event;
use App\Http\Controllers\Controller;
use Cache;
use Carbon\Carbon;

class EventController extends Controller
{
    public function index()
    {
        $events = Cache::remember('_front_events_index', 1, function () {
            return Event::with('place')
                ->where('releases_at', '<=', Carbon::now())
                ->latest()
                ->paginate(12);
        });

        $this->seo()->setTitle('برنامه های آتی');
        $this->seo()->setDescription('برنامه های آتی');


        $this->setBreadcrumb([
            [
                'title' => 'برنامه های آتی',
                'link' => route('event.index'),
            ],
        ]);

        return view('event.front.index', compact('events'));
    }

    public function show($id)
    {
        $event = Event::with('tags', 'categories', 'place')
            ->where('releases_at', '<=', Carbon::now())
            ->findOrFail($id);

        $this->seo()->setTitle($event->title);
        $this->seo()->setDescription($event->summary);


        $this->setBreadcrumb([
            [
                'title' => 'برنامه های آتی',
                'link' => route('event.index'),
            ],
            [
                'title' => $event->title,
                'link' => '#',
            ],
        ]);


        return view('event.front.show', compact('event'));
    }
}
