<?php

namespace App\Http\Controllers\Term\Front\Meeting;

use App\Term;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MeetingController extends Controller
{
    public function index()
    {
        $meetings = Term::with('place')->whereDoesntHave('courses')
            ->latest()
            ->where('start_at', '<=', Carbon::now())
            ->where('end_at', '>=', Carbon::now())
            ->paginate(12);

        $this->seo()->setTitle('لیست نشست ها');
        $this->seo()->setDescription($meetings['0']->summary);

        return view('term.front.meeting.index', compact('meetings'));
    }

    public function show($id)
    {
        $meeting = Term::with('place', 'categories', 'tags')->whereDoesntHave('courses')
            ->latest()
            ->where('start_at', '<=', Carbon::now())
            ->where('end_at', '>=', Carbon::now())
            ->findOrFail($id);

        $this->seo()->setTitle($meeting->title);
        $this->seo()->setDescription($meeting->description);

        return view('term.front.meeting.show', compact('meeting'));
    }
}
