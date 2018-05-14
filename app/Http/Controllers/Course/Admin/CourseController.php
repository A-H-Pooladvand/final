<?php

namespace App\Http\Controllers\Course\Admin;

use App\Category;
use App\Course;
use App\Http\Controllers\Controller;
use App\Http\Helpers\Category\JEasyUi;
use App\Http\Helpers\Handlers\ImageUpload;
use App\Term;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    public function index()
    {
        return view('course.admin.index');
    }

    public function items(Request $request)
    {
        $courses = Course::select(['id', 'title', 'created_at', 'updated_at']);

        return $this->getGrid($request)->items($courses);
    }

    public function create()
    {
        $form = ['action' => route('admin.course.store')];

        $categories = Category::with('children')->where([
            'category_type' => Course::class,
            'parent_id' => null,
        ])->get()->toArray();

        $categories = JEasyUi::jsonFormat($categories);

        $courses = Course::orderBy('title')->get(['id', 'title']);

        $terms = Term::orderBy('title')->get(['id', 'title']);

        return view('course.admin.form', compact('form', 'categories', 'courses', 'terms'));
    }

    public function store(Request $request): array
    {
        $this->validate($request, $this->validator());

        $course = Course::create($this->fields($request));

        $this->tags($request->tags)->attach($course);

        $course->categories()->attach($request->categories);

//        if($request->categories)
        $course->terms()->sync($request->terms);

        return ['message' => 'درس جدید با موفقیت ثبت شد.'];
    }

    public function show($id)
    {
        $course = Course::with('categories', 'author', 'tags', 'terms')->findOrFail($id);

        return view('course.admin.show', compact('course'));
    }

    public function edit($id)
    {
        $course = Course::findOrFail($id);

        $form = [
            'action' => route('admin.course.update', $course['id']),
            'method' => 'put'
        ];

        $categories = Category::with('children')->where([
            'category_type' => Course::class,
            'parent_id' => null,
        ])->get()->toArray();

        $categories = JEasyUi::jsonFormat($categories);

        $category_ids = implode(',', $course->categories->pluck('id')->toArray());

        $courses = Course::orderBy('title')->where('id', '!=', $id)->get(['id', 'title']);

        $course_terms = $course->terms->pluck('id')->toArray();

        $terms = Term::orderBy('title')->get(['id', 'title']);

        return view('course.admin.form', compact('course', 'form', 'categories', 'category_ids', 'courses', 'course_terms', 'terms'));
    }

    public function update(Request $request, $id): array
    {
        $this->validate($request, $this->validator());

        $course = Course::findOrFail($id);

        $course->update($this->fields($request, $course));

        $course->categories()->sync($request->categories);

        $course->terms()->sync($request->terms);

        $this->tags($request->tags)->sync($course);

        return ['message' => 'درس جدید با موفقیت ویرایش شد.'];
    }

    public function destroy($id): void
    {
        $ids = explode(',', $id);

        DB::transaction(function () use ($ids) {

            $courses = Course::whereIn('id', $ids)
                ->select('id')
                ->get();

            foreach ($courses as $course)
            {
                if ($course->tags()->count())
                {
                    $course->tags()->detach();
                }

                if ($course->terms()->count())
                {
                    $course->terms()->detach();
                }

                if ($course->categories()->count())
                {
                    $course->categories()->detach();
                }
                $course->delete();
            }

            #Course::whereIn('id', $ids)->delete();
        });
    }

    // Methods
    private function validator(): array
    {
        $rules = [
            'title' => 'required|max:100',
            'summary' => 'required|max:500',
            'content' => 'required',
            'next_id' => 'nullable|exists:courses,id',
            'previous_id' => 'nullable|exists:courses,id',
//            'image' => 'required',
            'image' => 'required_without:terms',
            #'categories' => 'required_without:terms'
            'categories' => 'nullable'
        ];
        if (request()->method() === 'PUT') {
            $rules['image'] = 'nullable';
        }

        return $rules;
    }

    private function fields(Request $request, Course $course = null): array
    {
        return [
            'user_id' => Auth::id(),
            'title' => $request->title,
            'next_id' => $request->next_id,
            'previous_id' => $request->previous_id,
            'summary' => $request->summary,
            'content' => $request['content'],
            'image' => !empty($request->image) ? $request->image : ($course ? $course->image : ''),
            'file' => ImageUpload::nullableImage($request, $course, 'file'),
            'sound' => $request->sound,
            'sound_link' => $request->sound_link ?: '',
            'video' => $request->video,
        ];
    }
}
