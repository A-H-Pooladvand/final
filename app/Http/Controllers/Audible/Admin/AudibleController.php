<?php

namespace App\Http\Controllers\Audible\Admin;

use App\Http\Helpers\Category\JEasyUi;
use DB;
use Auth;
use App\Audible;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Helpers\Handlers\ImageUpload;

class AudibleController extends Controller
{
    public function index()
    {
        return view('audible.admin.index');
    }

    public function items(Request $request)
    {
        $audibles = Audible::select(['id', 'title', 'created_at', 'updated_at']);

        return $this->getGrid($request)->items($audibles);
    }

    public function create()
    {
        $form = ['action' => route('admin.audible.store')];

        $categories = Category::with('children')->where([
            'category_type' => Audible::class,
            'parent_id' => null,
        ])->get()->toArray();

        $categories = JEasyUi::jsonFormat($categories);

        return view('audible.admin.form', compact('form', 'categories'));
    }

    public function store(Request $request): array
    {
        $this->validate($request, $this->validator());

        DB::transaction(function () use ($request) {

            $audible = Audible::create($this->fields($request));

            $this->tags($request->tags)->attach($audible);

            $audible->categories()->attach($request->categories);

        });

        return ['message' => 'کوتاه و شنیدنی جدید با موفقیت ثبت شد.'];
    }

    public function show($id)
    {
        $audible = Audible::with(
            'author',
            'categories',
            'tags',
            'files',
            'sounds',
            'videos'
        )->findOrFail($id);

        return view('audible.admin.show', compact('audible'));
    }

    public function edit($id)
    {
        $audible = Audible::findOrFail($id);

        $form = [
            'action' => route('admin.audible.update', $audible['id']),
            'method' => 'put'
        ];

        $categories = Category::with('children')->where([
            'category_type' => Audible::class,
            'parent_id' => null,
        ])->get()->toArray();

        $categories = JEasyUi::jsonFormat($categories);

        $category_ids = implode(',', $audible->categories->pluck('id')->toArray());

        return view('audible.admin.form', compact('audible', 'form', 'categories', 'category_ids'));
    }

    public function update(Request $request, $id): array
    {
        $this->validate($request, $this->validator());

        DB::transaction(function () use ($request, $id) {

            $audible = Audible::findOrFail($id);

            $audible->update($this->fields($request, $audible));

            $audible->categories()->sync($request->categories);

            $this->tags($request->tags)->sync($audible);

        });

        return ['message' => 'کوتاه و شنیدنی جدید با موفقیت ویرایش شد.'];
    }

    public function destroy($id): void
    {
        $ids = explode(',', $id);

        Audible::whereIn('id', $ids)->delete();
    }

    // Methods

    private function validator(): array
    {
        return [
            'title' => 'required|max:100',
            'description' => 'required',
            'categories' => 'required',
            'sound_link' => 'max:2000|required_without:sound',
        ];
    }

    private function fields(Request $request, Audible $audible = null): array
    {
        return [
            'user_id' => Auth::id(),
            'title' => $request->title,
            'description' => $request->title,
            'image' => ImageUpload::nullableImage($request, $audible, 'image'),
            'file' => $request->file,
            'sound' => $request->sound,
            'sound_link' => $request->sound_link ?: '',
            'video' => $request->video,
        ];
    }
}
