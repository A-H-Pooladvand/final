<?php

namespace App\Http\Controllers\Course\Front;

use App\Course;
use App\Term;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cache;

class CourseController extends Controller
{

    public function show($id, $id1)
    {
        $term = Term::select('id', 'title')->findOrFail($id);

        $course = Course::with([
            'terms' => function($q){
                $q->select('id', 'title')->with('categories:id,title');
            }, 'tags'
        ])->findOrFail($id1);

        $categories = [];
        foreach ($course->terms as $term)
        {
            foreach ($term->categories as $category)
            {
                $categories[] = [
                    'id' => $category->id,
                    'title' => $category->title,
                ];
            }
        }

        $this->seo()->setTitle($course->title);
        $this->seo()->setDescription($course->summary);


        $this->setBreadcrumb([
            [
                'title' => 'درس گفتار',
                'link' => route('term.index'),
            ],
            [
                'title' => $term->title,
                'link' => route('term.show', [$term->id, str_slug_fa($term->title)]),
            ],
            [
                'title' => 'درس',
            ],
            [
                'title' => $course->title,
            ],
        ]);


        return view('course.front.show', compact('course', 'categories'));
    }
}
