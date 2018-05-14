<?php

namespace App\Http\Controllers\Book\Front;

use App\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LibraryController extends Controller
{
    public function index(Request $request)
    {
        $books = Book::latest()->paginate(12);

        $this->seo()->setTitle('کتابخانه');
        $this->seo()->setDescription('کتابخانه');

        $this->setBreadcrumb([
            [
                'title' => 'کتابخانه',
                'link' => route('book.index'),
            ],
        ]);

        return view('book.front.index',compact('books'));
    }

    public function show(Request $request, $id)
    {
        $book = Book::with('categories', 'tags')->findOrFail($id);

        $this->seo()->setTitle($book->title);
        $this->seo()->setDescription($book->description);

        $this->setBreadcrumb([
            [
                'title' => 'کتابخانه',
                'link' => route('book.index'),
            ],
            [
                'title' => $book->title,
                'link' => '#',
            ],
        ]);

        $this->visit()->create($request, $book, Book::class);

        return view('book.front.show',compact('book'));
    }
}
