<?php

namespace App\Http\Controllers\Term\Admin;

use App\Category;
use App\Course;
use App\Term;
use App\Http\Controllers\Controller;
use App\Http\Helpers\Category\JEasyUi;
use App\Http\Helpers\DateConverter\DateConverter;
use App\Place;
use Auth;
use Illuminate\Http\Request;

class TermController extends Controller
{
    public function index()
    {
        return view('term.admin.index');
    }

    public function items(Request $request)
    {
        $term = Term::select(['id', 'title', 'start_at', 'end_at', 'created_at']);

        $term = $this->getGrid($request)->items($term);
        $term['rows'] = $term['rows']->each(function ($item) {
            $item->start_at_farsi = $item->start_at_fa;
            $item->end_at_farsi = $item->end_at_fa;
        });
        return $term;
    }

    public function create()
    {
        $form = ['action' => route('admin.term.store')];

        $courses = Course::orderBy('title')->get(['id', 'title']);

        $places = Place::orderBy('title')->get(['id', 'title']);

        $categories = Category::with('children')->where([
            'category_type' => Term::class,
            'parent_id' => null,
        ])->get()->toArray();

        $categories = JEasyUi::jsonFormat($categories);

        return view('term.admin.form', compact('form', 'categories', 'courses', 'places'));
    }

    public function store(Request $request): array
    {
        $this->convertDates($request);

        $this->validate($request, $this->validator());

        $term = Term::create($this->fields($request));

        $term->categories()->attach($request['categories']);

        $term->courses()->attach($request['courses']);

        $this->tags($request->tags)->attach($term);

        return ['message' => 'دوره جدید با موفقیت ثبت شد.'];
    }

    public function show($id)
    {
        $term = Term::with('categories', 'courses', 'author')->findOrFail($id);

        return view('term.admin.show', compact('term'));
    }

    public function edit($id)
    {
        $term = Term::with([
            'categories',
            'tags'
        ])->findOrFail($id);

        $form = [
            'action' => route('admin.term.update', $term['id']),
            'method' => 'put'
        ];

        $courses = Course::orderBy('title')->get(['id', 'title']);

        $term_courses = $term->courses->pluck('id')->toArray();

        $places = Place::orderBy('title')->get(['id', 'title']);

        $categories = Category::with('children')->where([
            'category_type' => Term::class,
            'parent_id' => null,
        ])->get()->toArray();

        $categories = JEasyUi::jsonFormat($categories);

        $category_ids = implode(',', $term->categories->pluck('id')->toArray());

        return view('term.admin.form', compact('term', 'form', 'categories', 'courses', 'places', 'category_ids', 'term_courses'));
    }

    public function update(Request $request, $id): array
    {
        $this->convertDates($request);

        $this->validate($request, $this->validator());

        $term = Term::findOrFail($id);

        $term->update($this->fields($request, $term));

        $term->categories()->sync($request['categories']);

        $term->courses()->sync($request['courses']);

        $this->tags($request->tags)->sync($term);

        return ['message' => 'دوره جدید با موفقیت ویرایش شد.'];
    }

    public function destroy($id)
    {
        $ids = explode(',', $id);

        try {
            Term::whereIn('id', $ids)->delete();
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
            'start_at' => 'nullable',
            'end_at' => 'nullable',
            'courses' => 'nullable',
            'place' => 'required',
            'categories' => 'required',
        ];


        if (request()->method() === 'PUT')
            $rules['image'] = 'nullable';

        return $rules;
    }

    private function fields(Request $request, $term = null): array
    {
        return [
            'user_id' => Auth::id(),
            'title' => $request['title'],
            'place_id' => $request['place'],
            'image' => empty($request['image']) ? $term['image'] : $request['image'],
            'summary' => $request['summary'],
            'description' => $request['description'],
            'start_at' => $request['start_at'],
            'end_at' => $request['end_at'],
        ];
    }


    private function convertDates(Request $request)
    {

        $dates = [];

        if(!empty($request->start_at))
            $dates['start_at'] = $request->start_at;

        if(!empty($request->end_at))
            $dates['end_at'] = $request->end_at;

        if(count($dates))
        {
            DateConverter::toGregorianAndMerge($request, $dates);
        }

    }
}
