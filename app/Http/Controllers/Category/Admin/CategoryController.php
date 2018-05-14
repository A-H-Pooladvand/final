<?php

namespace App\Http\Controllers\Category\Admin;

use App\Blog;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        return view('category.admin.index');
    }

    public function items(Request $request)
    {
        $categories = Category::select(['id', 'slug', 'title', 'category_type', 'created_at', 'updated_at']);

        $categories = $this->getGrid($request)->items($categories);
        $categories['rows'] = $categories['rows']->each(function ($item) {
            $item->category_type_farsi = $item->category_type_fa;
        });
        return $categories;
    }

    public function create()
    {
        $form = ['action' => route('admin.category.store')];

        $category = new Category();

        return view('category.admin.form', compact('form', 'category'));
    }

    public function store(Request $request)
    {
        $this->validator($request);

        if ( ! $this->categories()->check($request['type']))
            return 'لطفا با پشتیبانی تماس بگیرید.';

        Category::create($this->fields($request));

        return ['message' => 'مطلب جدید با موفقیت ثبت شد.'];
    }

    public function show($id)
    {
        $category = Category::findOrFail($id);

        return view('category.admin.show', compact('category'));
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);

        $form = [
            'action' => route('admin.category.update', $category['id']),
            'method' => 'put'
        ];

        return view('category.admin.form', compact('category', 'form'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $this->validator($request, $category);

        if ( ! $this->categories()->check($request['type']))
            return 'لطفا با پشتیبانی تماس بگیرید.';

        $category->update($this->fields($request));

        return ['message' => 'مطلب جدید با موفقیت ثبت شد.'];
    }

    public function destroy($id)
    {
        $ids = explode(',', $id);

        try {
            Category::whereIn('id', $ids)->delete();
        } catch (\Exception $e) {
            dd($e->getMessage());
        }

        return 'رکوردها به درستی حذف گردیدند.';
    }

    // Methods

    /**
     * @param Request $request
     * @param Category $category
     */
    private function validator(Request $request, Category $category = null)
    {
        $rules = [
            'slug' => 'required|max:70|unique:categories,slug,null,id,category_type,' . Blog::class . '|regex:/(^[A-Za-z-_ ]+$)+/',
            'title' => 'required|max:70',
            'type' => 'required|max:50',
        ];

        if ($request->method() === 'PUT')
            $rules['slug'] = 'required|regex:/(^[A-Za-z-_ ]+$)+/|unique:categories,slug,' . $category->id;

        $this->validate($request, $rules);
    }

    /**
     * @param Request $request
     * @return array
     */
    private function fields(Request $request)
    {
        return [
            'slug' => $request['slug'],
            'title' => $request['title'],
            'category_type' => $request['type'],
        ];
    }

}
