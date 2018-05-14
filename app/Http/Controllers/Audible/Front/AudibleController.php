<?php

namespace App\Http\Controllers\Audible\Front;

use App\Audible;
use App\Http\Controllers\Controller;
use Cache;
use Illuminate\Http\Request;

class AudibleController extends Controller
{
    public function index(Request $request)
    {
        $page = $request->has('page') ? $request->query('page') : 1;
        $audibles = Cache::remember("_front_audibles_index_{$page}", 1, function () {
            return Audible::latest()->paginate(12);
        });

        $this->seo()->setTitle('لیست کوتاه و شنیدهی ها');
        $this->seo()->setDescription('لیست کوتاه و شنیدهی ها');


        $this->setBreadcrumb([
            [
                'title' => 'کوتاه و شنیدهی',
                'link' => route('audible.index'),
            ],
        ]);

        return view('audible.front.index', compact('audibles'));
    }

    public function show($id)
    {

        #return
        $audible = Audible::findOrFail($id);

        $this->seo()->setTitle($audible->title);
        $this->seo()->setDescription($audible->description);


        $this->setBreadcrumb([
            [
                'title' => 'کوتاه و شنیدهی',
                'link' => route('audible.index'),
            ],
            [
                'title' => $audible->title,
                'link' => '#',
            ],
        ]);

        return view('audible.front.show', compact('audible'));

    }
}
