<?php

namespace App\Http\Controllers\Meeting\Admin;

use App\Category;
use App\Course;
use App\Http\Helpers\Category\JEasyUi;
use App\Http\Helpers\DateConverter\DateConverter;
use App\Meeting;
use App\Place;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Helpers\Handlers\ImageUpload;

class MeetingController extends Controller
{
    public function index()
    {
        return view('meeting._admin.index');
    }

    public function items(Request $request)
    {
        $meeting = Meeting::select(['id', 'title', 'created_at']);

        $meeting = $this->getGrid($request)->items($meeting);
//        $meeting['rows'] = $meeting['rows']->each(function ($item) {
//            $item->start_at_farsi = $item->start_at_fa;
//            $item->end_at_farsi = $item->end_at_fa;
//        });
        return $meeting;
    }

    public function create()
    {
        $form = ['action' => route('admin.meeting.store')];

        $courses = Course::orderBy('title')->get(['id', 'title']);

        $places = Place::orderBy('title')->get(['id', 'title']);

        $categories = Category::with('children')->where([
            'category_type' => Meeting::class,
            'parent_id' => null,
        ])->get()->toArray();

        $categories = JEasyUi::jsonFormat($categories);

        return view('meeting._admin.form', compact('form', 'categories', 'courses', 'places'));
    }

    public function store(Request $request): array
    {
        #$this->convertDates($request);

        $this->validate($request, $this->validator());

        $meeting = Meeting::create($this->fields($request));

        $meeting->categories()->attach($request['categories']);

//        $meeting->courses()->attach($request['courses']);

        $this->tags($request->tags)->attach($meeting);

        return ['message' => 'دوره جدید با موفقیت ثبت شد.'];
    }

    public function show($id)
    {
        $meeting = Meeting::with('categories', 'course', 'author')->findOrFail($id);

        return view('meeting._admin.show', compact('meeting'));
    }

    public function edit($id)
    {
        $meeting = Meeting::with([
            'categories',
            'tags'
        ])->findOrFail($id);

        $form = [
            'action' => route('admin.meeting.update', $meeting['id']),
            'method' => 'put'
        ];

        $places = Place::orderBy('title')->get(['id', 'title']);

        $categories = Category::with('children')->where([
            'category_type' => Meeting::class,
            'parent_id' => null,
        ])->get()->toArray();

        $categories = JEasyUi::jsonFormat($categories);

        $category_ids = implode(',', $meeting->categories->pluck('id')->toArray());

        return view('meeting._admin.form', compact('meeting', 'form', 'categories', 'courses', 'places', 'category_ids', 'meeting_courses'));
    }

    public function update(Request $request, $id): array
    {

        $this->validate($request, $this->validator());

        $meeting = Meeting::findOrFail($id);

        $meeting->update($this->fields($request, $meeting));

        $meeting->categories()->sync($request['categories']);

        $this->tags($request->tags)->sync($meeting);

        return ['message' => 'دوره جدید با موفقیت ویرایش شد.'];
    }

    public function destroy($id)
    {
        $ids = explode(',', $id);

        try {
            Meeting::whereIn('id', $ids)->delete();
        } catch (\Exception $e) {
            /** @noinspection ForgottenDebugOutputInspection */
            dd($e->getMessage());
        }
    }

    // Methods

    private function validator(): array
    {
        $rules = [
            'title' => 'required|max:100',
            'image' => 'required',
            'summary' => 'required|max:250',
            'description' => 'required',
            'course' => 'nullable',
            'place' => 'required',
            'categories' => 'required',
        ];


        if (request()->method() === 'PUT')
            $rules['image'] = 'nullable';

        return $rules;
    }

    private function fields(Request $request, Meeting $meeting = null): array
    {
        return [
            'user_id' => Auth::id(),
            'title' => $request['title'],
            'place_id' => $request['place'],
//            'course_id' => null, #$request['course'],
            'image' => empty($request['image']) ? $meeting['image'] : $request['image'],
            'summary' => $request['summary'],
            'description' => $request['description'],
            #'file' => ImageUpload::nullableImage($request, $meeting, 'file'),
            'file' => $request->file,
            'sound' => $request->sound,
            'sound_link' => $request->sound_link ?: '',
            'video' => $request->video,
        ];
    }
}
