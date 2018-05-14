<?php

namespace App\Http\Controllers\Page\Admin;

use App\Http\Controllers\Controller;
use App\Http\Helpers\Multimedia\Multimedia;
use App\Page;
use Auth;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view('page.admin.index');
    }

    public function items(Request $request)
    {
        $pages = Page::select(['id', 'title', 'created_at', 'updated_at']);

        return $this->getGrid($request)->items($pages);
    }

    public function create()
    {
        $form = ['action' => route('admin.page.store')];

        return view('page.admin.form', compact('form'));
    }

    public function store(Request $request)
    {
        $this->validate($request, $this->validator());

        $page = Page::create($this->fields($request));

        Multimedia::createOrUpdate($request, $page->galleries(), 0);

        $tags = $request['tags'];

        $this->tags($tags)->attach($page);

        return ['message' => 'صفحه جدید با موفقیت ثبت شد.'];
    }

    public function show($id)
    {
        $page = Page::with('tags', 'user')->findOrFail($id);

        return view('page.admin.show', compact('page'));
    }

    public function edit($id)
    {
        $page = Page::with([
            'tags',
            'galleries'
        ])->findOrFail($id);

        $form = [
            'action' => route('admin.page.update', $page['id']),
            'method' => 'put'
        ];

        return view('page.admin.form', compact('page', 'form'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, $this->validator());

        $page = Page::findOrFail($id);

        $page->update($this->fields($request));

        Multimedia::createOrUpdate($request, $page->galleries(), 0);

        $tags = $request['tags'];

        $this->tags($tags)->sync($page);

        return ['message' => 'صفحه جدید با موفقیت ثبت شد.'];
    }

    public function destroy($id)
    {
        $ids = explode(',', $id);

        Page::whereIn('id', $ids)->delete();
    }

    // Methods

    private function validator()
    {
        return [
            'title' => 'required|max:100',
            'slug' => 'required|max:100',
            'content' => 'required',
            'gallery_type' => 'required',
        ];
    }

    private function fields(Request $request)
    {
        return [
            'user_id' => Auth::id(),
            'title' => $request['title'],
            'slug' => $request['slug'],
            'content' => $request['content'],
            'has_comment' => $request['has_comment'] === 'true' ? true : false,
            'gallery_type' => $request['gallery_type'],
        ];
    }

}
