<?php

namespace App\Http\Controllers\Term\Front;

use App\Http\Controllers\Controller;
use App\Term;
use Cache;
use Illuminate\Http\Request;

class TermController extends Controller
{
    public function index(Request $request)
    {
        $page = $request->has('page') ? $request->query('page') : 1;
        $terms = Cache::remember("_front_terms_index_{$page}", 1, function () {

            return Term::whereHas('courses')->with('place')->latest()->paginate(12);

        });

        $this->seo()->setTitle('درس گفتار');
        $this->seo()->setDescription('درس گفتار');


        $this->setBreadcrumb([
            [
                'title' => 'درس گفتار',
                'link' => route('term.index'),
            ],
        ]);

        return view('term.front.index', compact('terms'));
    }

    public function show($id)
    {
        $term = Term::with(/*'categories', */'courses', 'tags', 'place')->findOrFail($id);

        $this->seo()->setTitle($term->title);
        $this->seo()->setDescription($term->summary);


        $this->setBreadcrumb([
            [
                'title' => 'درس گفتار',
                'link' => route('term.index'),
            ],
            [
                'title' => $term->title,
                'link' => '#',
            ],
        ]);


        return view('term.front.show', compact('term'));
    }
}
