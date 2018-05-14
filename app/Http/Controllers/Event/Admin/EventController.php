<?php

namespace App\Http\Controllers\Event\Admin;

use App\Category;
use App\Event;
use App\Http\Controllers\Controller;
use App\Http\Helpers\Category\JEasyUi;
use App\Http\Helpers\DateConverter\DateConverter;
use App\Province;
use Auth;
use DB;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        return view('event.admin.index');
    }

    public function items(Request $request)
    {
        $events = Event::with('province', 'province_city', 'place')->select([
            'id',
            'province_id',
            'province_city_id',
            'place_id',
            'title',
            'summary',
            'releases_at',
            'created_at',
            'updated_at'
        ]);

        $events = $this->getGrid($request)->items($events);
        $events['rows'] = $events['rows']->each(function ($item) {
            $item->releases_at_farsi = $item->releases_at_fa;
        });
        return $events;
    }

    public function create()
    {
        $form = ['action' => route('admin.event.store')];

        $provinces = Province::get(['id', 'title']);

        $categories = Category::with('children')->where([
            'category_type' => Event::class,
            'parent_id' => null,
        ])->get()->toArray();

        $categories = JEasyUi::jsonFormat($categories);

        return view('event.admin.form', compact('form', 'categories', 'provinces'));
    }

    public function store(Request $request)
    {
        $this->convertDates($request);

        $this->validate($request, $this->validator());

        DB::transaction(function () use ($request) {

            $event = Event::create($this->fields($request));

            $this->tags($request->tags)->attach($event);

            $event->categories()->attach($request->categories);

        });

        return ['message' => 'رویداد جدید با موفقیت ثبت شد.'];
    }

    public function show($id)
    {
        $event = Event::with(
            'tags:id,title,slug',
            'province:id,title',
            'province_city:id,province_id,title',
            'place:id,title',
            'categories'
        )->findOrFail($id);

        return view('event.admin.show', compact('event', 'form', 'categories'));
    }

    public function edit($id)
    {
        $event = Event::with('tags')->findOrFail($id);

        $form = [
            'action' => route('admin.event.update', $event),
            'method' => 'PUT'
        ];

        $provinces = Province::get(['id', 'title']);

        $categories = Category::with('children')->where([
            'category_type' => Event::class,
            'parent_id' => null,
        ])->get()->toArray();

        $categories = JEasyUi::jsonFormat($categories);

        $category_ids = implode(',', $event->categories->pluck('id')->toArray());

        return view('event.admin.form', compact('form', 'categories', 'provinces', 'event', 'category_ids'));
    }

    public function update(Request $request, $id)
    {
        $this->convertDates($request);

        $this->validate($request, $this->validator());

        DB::transaction(function () use ($request, $id) {

            $event = Event::findOrFail($id);

            $event->update($this->fields($request, $event));

            $this->tags($request->tags)->sync($event);

            $event->categories()->sync($request->categories);

        });

        return ['message' => 'رویداد با موفقیت ویرایش شد.'];
    }

    public function destroy($id)
    {
        $ids = explode(',', $id);

        Event::whereIn('id', $ids)->delete();
    }

    // Methods

    private function validator()
    {
        $rules = [
            'title' => 'required|max:100',
            'image' => 'required',
            'summary' => 'required|max:500',
            'content' => 'required',
            'releases_at' => 'required',
            'starts_at' => 'required',
            'categories' => 'required',
        ];

        if (request()->method() === 'PUT')
            $rules['image'] = 'nullable';

        return $rules;
    }

    private function fields(Request $request, $event = null)
    {
        return [
            'user_id' => Auth::id(),
            'province_id' => $request->province,
            'province_city_id' => $request->province_city,
            'place_id' => $request->place,
            'title' => $request->title,
            'image' => empty($request->image) ? $event->image : $request->image,
            'summary' => $request->summary,
            'content' => $request['content'],
            'releases_at' => $request->releases_at,
            'starts_at' => $request->starts_at,
        ];
    }

    private function convertDates(Request $request)
    {
        DateConverter::toGregorianAndMerge($request, [
            'releases_at' => $request->releases_at,
            'starts_at' => $request->starts_at
        ]);
    }
}
