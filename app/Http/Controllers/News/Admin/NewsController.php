<?php

namespace App\Http\Controllers\News\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Helpers\Category\JEasyUi;
use App\Http\Helpers\DateConverter\DateConverter;
use App\Http\Helpers\Multimedia\Multimedia;
use App\News;
use Auth;
use DB;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        return view('news.admin.index');
    }

    public function items(Request $request)
    {
        $news = News::select(['id', 'status', 'title', 'summary', 'created_at', 'updated_at']);

        $news = $this->getGrid($request)->items($news);
        $news['rows'] = $news['rows']->each(function ($item) {
            $item->status_farsi = $item->status_fa;
        });
        return $news;
    }

    public function create()
    {
        $form = ['action' => route('admin.news.store')];

        $categories = Category::with('children')->where([
            'category_type' => News::class,
            'parent_id' => null,
        ])->get()->toArray();

        $categories = JEasyUi::jsonFormat($categories);

        return view('news.admin.form', compact('form', 'categories'));
    }

    public function store(Request $request)
    {
        $this->convertDates($request);

        $this->validate($request, $this->validator());

        DB::transaction(function () use ($request) {

            $news = News::create($this->fields($request));

            Multimedia::createOrUpdate($request, $news->galleries(), 0);

            Multimedia::createOrUpdate($request, $news->files(), 0, 'multimedia');

            $news->categories()->attach($request->categories);

            $this->tags($request->tags)->attach($news);

        });

        return ['message' => 'مطلب جدید با موفقیت ثبت شد.'];
    }

    public function show($id)
    {
        $news = News::with('tags', 'user', 'author')->findOrFail($id);

        return view('news.admin.show', compact('news'));
    }

    public function edit($id)
    {
        $news = News::with([
            'tags',
            'galleries',
            'categories',
            'files'
        ])->findOrFail($id);

        $form = [
            'action' => route('admin.news.update', $news['id']),
            'method' => 'put'
        ];

        $categories = Category::with('children')->where([
            'category_type' => News::class,
            'parent_id' => null,
        ])->get()->toArray();

        $categories = JEasyUi::jsonFormat($categories);

        $category_ids = implode(',', $news->categories->pluck('id')->toArray());

        return view('news.admin.form', compact('news', 'form', 'categories', 'category_ids'));
    }

    public function update(Request $request, $id)
    {
        $this->convertDates($request);

        $this->validate($request, $this->validator());

        DB::transaction(function () use ($request, $id) {

            $news = News::find($id);

            $news->update($this->fields($request, $news));

            Multimedia::createOrUpdate($request, $news->galleries(), 0);

            Multimedia::createOrUpdate($request, $news->files(), 0, 'multimedia');

            $this->tags($request->tags)->sync($news);

            $news->categories()->sync($request->categories);

        });

        return ['message' => 'مطلب جدید با موفقیت ثبت شد.'];
    }

    public function destroy($id)
    {
        $ids = explode(',', $id);

        News::whereIn('id', $ids)->delete();
    }

    // Methods

    private function validator()
    {
        $rules = [
            'title' => 'required|max:100',
            'image' => 'required',
            'summary' => 'required|max:250',
            'content' => 'required',
            'publish_at' => 'required',
            'categories' => 'required',
        ];


        if (request()->method() === 'PUT')
            $rules['image'] = 'nullable';

        return $rules;
    }

    private function fields(Request $request, $news = null)
    {
        return [
            'user_id' => Auth::id(),
            'title' => $request['title'],
            'summary' => $request['summary'],
            'content' => $request['content'],
            'image' => empty($request['image']) ? $news['image'] : $request['image'],
            'publish_at' => $request['publish_at'],
            'expire_at' => $request['expire_at'],
            'status' => $request['status'],
        ];
    }

    private function convertDates(Request $request)
    {
        if(!empty($request->expire_at))
            $request->merge(['expire_at' => DateConverter::toGregorian($request['expire_at'])]);

        if(!empty($request->publish_at))
            $request->merge(['publish_at' => DateConverter::toGregorian($request['publish_at'])]);

//        if ( ! empty($request->expire_at))
//            $request->merge(['expire_at' => DateConverter::toGregorian($request['expire_at'])]);
//
//        $request->merge(['publish_at' => DateConverter::toGregorian($request['publish_at'])]);
    }

}