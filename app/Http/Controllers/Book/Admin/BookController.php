<?php

namespace App\Http\Controllers\Book\Admin;

use App\Book;
use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Helpers\Category\JEasyUi;
use App\Http\Helpers\Handlers\ImageUpload;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function index()
    {
        return view('book.admin.index');
    }

    public function items(Request $request)
    {
        $books = Book::select(['id', 'title', 'created_at', 'updated_at']);

        return $this->getGrid($request)->items($books);
    }

    public function create()
    {
        $form = ['action' => route('admin.book.store')];

        $categories = Category::with('children')->where([
            'category_type' => Book::class,
            'parent_id' => null,
        ])->get()->toArray();

        $categories = JEasyUi::jsonFormat($categories);

        return view('book.admin.form', compact('form', 'categories'));
    }

    public function store(Request $request): array
    {
        $this->validate($request, $this->validator());

        DB::transaction(function () use ($request) {

            $book = Book::create($this->fields($request));

            $this->tags($request->tags)->attach($book);

            $book->categories()->attach($request->categories);

        });


        return ['message' => 'کتاب جدید با موفقیت ثبت شد.'];
    }

    public function show($id)
    {
        $book = Book::with('author', 'categories', 'tags')->findOrFail($id);

        return view('book.admin.show', compact('book'));
    }

    public function edit($id)
    {
        $book = Book::findOrFail($id);

        $form = [
            'action' => route('admin.book.update', $book['id']),
            'method' => 'put'
        ];

        $categories = Category::with('children')->where([
            'category_type' => Book::class,
            'parent_id' => null,
        ])->get()->toArray();

        $categories = JEasyUi::jsonFormat($categories);

        $category_ids = implode(',', $book->categories->pluck('id')->toArray());

        return view('book.admin.form', compact('book', 'form', 'categories', 'category_ids'));
    }

    public function update(Request $request, $id): array
    {
        $this->validate($request, $this->validator());


        DB::transaction(function () use ($request, $id) {

            $book = Book::findOrFail($id);

            $book->update($this->fields($request, $book));

            $this->tags($request->tags)->sync($book);

            $book->categories()->sync($request->categories);

        });


        return ['message' => 'کتاب جدید با موفقیت ویرایش شد.'];
    }

    public function destroy($id): void
    {
        $ids = explode(',', $id);

        Book::whereIn('id', $ids)->delete();
    }

    // Methods
    private function validator(): array
    {
        $rules = [
            'title' => 'required|max:100',
            'description' => 'required',
            'file' => 'required',
            'categories' => 'required',
        ];
        if (request()->method() === 'PUT') {
            $rules['file'] = 'nullable';
        }

        return $rules;
    }

    private function fields(Request $request, Book $book = null): array
    {
        return [
            'user_id' => Auth::id(),
            'title' => $request->title,
            'description' => $request->title,
            'image' => ImageUpload::nullableImage($request, $book, 'image'),
            'file' => ! empty($request->file) ? $request->file : $book->image,
        ];
    }
}
