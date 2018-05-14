<?php

namespace App\Http\Controllers\Book\Front;

use App\Book;
use App\Http\Controllers\Controller;
use App\News;
use App\Visit;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
//        Book::getCategories();
        $books = Book::latest()->paginate(12);

        $this->seo()->setTitle('لیست  کتاب ها');
        $this->seo()->setDescription($books[0]->description);

        return view('book.front.index',compact('books'));
    }

    public function show(Request $request, $id)
    {
        $book = Book::with('categories', 'tags')->findOrFail($id);

        $this->seo()->setTitle($book->title);
        $this->seo()->setDescription($book->description);

        $this->visit()->create($request, $book, Book::class);

        return view('book.front.show',compact('book'));
    }
}
