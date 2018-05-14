<?php

namespace App\Http\Controllers\Meeting\Front;

use App\Meeting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class MeetingController extends Controller
{
    public function index()
    {
        $meetings = Meeting::with('place')
            ->latest()
            ->paginate(12);

        $this->seo()->setTitle('لیست نشست ها');
        $this->seo()->setDescription('لیست نشست ها');

        $this->setBreadcrumb([
            [
                'title' => 'نشست های علمی',
                'link' => route('meeting.index'),
            ],
        ]);

        return view('meeting._front.index', compact('meetings'));
    }

    public function show($id)
    {

        $meeting = Meeting::with('place', 'categories', 'tags')
            ->latest()
            ->findOrFail($id);

        $this->seo()->setTitle($meeting->title);
        $this->seo()->setDescription($meeting->description);

        $this->setBreadcrumb([
            [
                'title' => 'نشست های علمی',
                'link' => route('meeting.index'),
            ],
            [
                'title' => $meeting->title,
                'link' => '#',
            ],
        ]);

        return view('meeting._front.show', compact('meeting'));
    }
}
