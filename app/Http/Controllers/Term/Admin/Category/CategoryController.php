<?php

namespace App\Http\Controllers\Term\Admin\Category;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Helpers\Category\JEasyUi;
use App\Term;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('term.admin.category.index');
    }

    public function items(Request $request)
    {
        $categories = Category::with('children')->where([
            'category_type' => Term::class,
            'parent_id' => null,
        ])->select('id', 'slug', 'title', 'created_at', 'updated_at');

        return $this->getGrid($request)->items($categories);
    }

    public function create()
    {
        $form = ['action' => route('admin.term.category.store')];

        $categories = Category::with('children')->where([
            'category_type' => Term::class,
            'parent_id' => null,
        ])->get()->toArray();

        $categories = JEasyUi::jsonFormat($categories);

        return view('term.admin.category.form', compact('form', 'categories'));
    }

    public function store(Request $request)
    {
        $this->validator($request);

        Category::create($this->fields($request));

        return ['message' => 'دسته بندی جدید با موفقیت ثبت شد.'];
    }

    public function show($id)
    {
        $category = Category::with('parent')->where('category_type', Term::class)->findOrFail($id);

        return view('term.admin.category.show', compact('category', 'categories'));
    }

    public function edit($id)
    {
        $category = Category::with('parent')->where('category_type', Term::class)->findOrFail($id);

        $form = [
            'action' => route('admin.term.category.update', $category['id']),
            'method' => 'put'
        ];

        $categories = Category::with('children')->where([
            'category_type' => Term::class,
            'parent_id' => null,
        ])->get()->toArray();

        $categories = JEasyUi::jsonFormat($categories);

        return view('term.admin.category.form', compact('category', 'form', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::where('category_type', Term::class)->findOrFail($id);

        $this->validator($request, $category);

        $category->update($this->fields($request));

        return ['message' => 'دسته بندی با موفقیت ویرایش شد.'];
    }

    public function destroy($id)
    {
        $ids = explode(',', $id);

        $categories = Category::with('children')->where('category_type', Term::class);

        $cats = $categories->findMany($ids);

        foreach ($cats as $i => $category) {

            if ( ! $category->children->isEmpty()) {
                $errors['delete_errors'][] = "دسته {$category->title} دارای فرزند بود و پاک نشد.<br>";
                continue;
            }

            if($category->terms->count())
            {
                $errors['delete_errors'][] = "دسته {$category->title} به ماژول دوره متصل است و حذف نشد.<br>";
                continue;
            }

            $category->delete();
        }

        return ! empty($errors) ? $errors : 'رکورد به درستی حذف گردید.';
    }

    // Methods

    /**
     * @param Request $request
     * @param Category $category
     */
    private function validator(Request $request, Category $category = null)
    {
        $rules = [
            'slug' => 'required|max:70|unique:categories,slug,null,id,category_type,' . Term::class . '|regex:/(^[A-Za-z-_ ]+$)+/',
            'title' => 'required|max:70',
        ];

        if ($request->method() === 'PUT')
            $rules['slug'] = 'required|regex:/(^[A-Za-z-_ ]+$)+/|unique:categories,slug,' . $category->id . ',id,category_type,' . Term::class;

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
            'parent_id' => $request->parent,
            'category_type' => Term::class,
        ];
    }

}
