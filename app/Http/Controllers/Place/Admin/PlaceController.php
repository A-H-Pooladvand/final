<?php

namespace App\Http\Controllers\Place\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Place;
use App\Province;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlaceController extends Controller
{
    public function index()
    {
        return view('place.admin.index');
    }

    public function items(Request $request)
    {
        $places = Place::with('province', 'province_city')
            ->select('id', 'title', 'gender', 'first_address', 'first_phone', 'province_id', 'province_city_id', 'created_at', 'updated_at');

        $places = $this->getGrid($request)->items($places);
        $places['rows'] = $places['rows']->each(function ($item) {
            $item->gender_farsi = $item->gender_fa;
        });


        return $places;
    }

    public function create()
    {
        $form = ['action' => route('admin.place.store')];

        $provinces = Province::get(['id', 'title']);

        $categories = Category::where('category_type', Place::class)->get(['id', 'title']);

        return view('place.admin.form', compact('form', 'categories', 'provinces'));
    }

    public function store(Request $request)
    {
        $this->validate($request, $this->validator());

        Place::create($this->fields($request));

        return ['message' => 'مکان جدید با موفقیت ثبت شد.'];
    }

    public function show($id)
    {
        $place = Place::with('province', 'province_city', 'author')->findOrFail($id);

        return view('place.admin.show', compact('place'));
    }

    public function edit($id)
    {
        $place = Place::with('province', 'province_city')->findOrFail($id);

        $provinces = Province::get(['id', 'title']);

        $categories = Category::where('category_type', Place::class)->get(['id', 'title']);

        $form = [
            'action' => route('admin.place.update', $place['id']),
            'method' => 'put'
        ];

        return view('place.admin.form', compact('place', 'form', 'categories', 'provinces'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, $this->validator());

        $place = Place::findOrFail($id);
        $place->update($this->fields($request, $place));

        $tags = $request['tags'];

        $this->tags($tags)->sync($place);

        return ['message' => 'مکان با موفقیت ویرایش شد.'];
    }

    public function destroy($id)
    {
        $ids = explode(',', $id);

        DB::transaction(function () use ($ids) {

            $places = Place::whereIn('id', $ids)
                ->with([
                    'events' => function($q){
                        $q->select('id', 'place_id');
                    }
                ])
                ->select('id')
                ->get();

            foreach ($places as $place)
            {
                if($events = $place->events)
                {
                    foreach ($events as $event)
                    {
                        $event->place_id = null;
                        $event->save();
                    }
                }
                $place->delete();
            }

            #Course::whereIn('id', $ids)->delete();
        });
        #Place::whereIn('id', $ids)->delete();

    }

    // Methods

    private function validator()
    {
        $rules = [
            'title' => 'required|max:100',
            'province' => 'required',
            'province_city' => 'required',
            'first_address' => 'required|max:700',
            'gender' => 'required',
            'image' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
        ];

        if (request()->method() === 'PUT')
            $rules['image'] = 'nullable';

        return $rules;
    }


    private function fields(Request $request, $place = null)
    {
        return [
            'user_id' => Auth::id(),
            'title' => $request['title'],
            'province_id' => $request->province,
            'province_city_id' => $request->province_city,
            'first_address' => $request->first_address,
            'second_address' => $request->second_address,
            'map_lat' => $request->latitude,
            'map_lng' => $request->longitude,
            'image' => empty($request['image']) ? $place['image'] : $request['image'],
            'gender' => $request->gender,
            'first_phone' => $request->first_phone,
            'second_phone' => $request->second_phone,
        ];
    }
}