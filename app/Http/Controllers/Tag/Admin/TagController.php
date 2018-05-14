<?php

namespace App\Http\Controllers\Tag\Admin;

use App\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    public function index()
    {
        return view('tag.admin.index');
    }

    public function items(Request $request)
    {
        $tags = Tag::select(['id', 'slug', 'title', 'created_at', 'updated_at']);

        return $this->getGrid($request)->items($tags);
    }

    public function create()
    {
        $form = ['action' => route('admin.tag.store')];

        return view('tag.admin.form', compact('form'));
    }

    public function store(Request $request)
    {
        $this->validator($request);

        Tag::create($this->fields($request));

        return ['message' => 'کلمه کلیدی جدید با موفقیت ثبت شد.'];
    }

    public function show($id)
    {
        $tag = Tag::findOrFail($id);

        return view('tag.admin.show', compact('tag'));
    }

    public function edit($id)
    {
        $tag = Tag::findOrFail($id);

        $form = [
            'action' => route('admin.tag.update', $tag['id']),
            'method' => 'put'
        ];

        return view('tag.admin.form', compact('tag', 'form'));
    }

    public function update(Request $request, $id)
    {
        $tag = Tag::findOrFail($id);
        $this->validator($request, $tag);

        $tag->update($this->fields($request));

        return ['message' => 'مطلب جدید با موفقیت ثبت شد.'];
    }

    public function destroy($id)
    {
        $ids = explode(',', $id);

        try {
            Tag::whereIn('id', $ids)->delete();
        } catch (\Exception $e) {
            dd($e->getMessage());
        }

        return 'رکوردها به درستی حذف گردیدند.';
    }

    // Methods

    /**
     * @param Request $request
     * @param Tag $tag
     */
    private function validator(Request $request, Tag $tag = null)
    {
        $rules = ['title' => 'required|max:70|unique:tags'];

        if ($request->method() === 'PUT')
            $rules['title'] = 'required|max:70|unique:tags,title,' . $tag->id;

        $this->validate($request, $rules);
    }

    /**
     * @param Request $request
     * @return array
     */
    private function fields(Request $request)
    {
        return ['title' => $request['title']];
    }
}
