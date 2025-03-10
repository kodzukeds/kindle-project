<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use App\Models\Book;
use App\Models\Kindle;
use Illuminate\Http\Request;

class BookmarkController extends Controller
{
    public function index()
    {
        $bookmarks = Bookmark::all();
        return view('bookmarks.index', compact('bookmarks'));
    }

    public function create()
    {
        $books = Book::all();
        $kindles = Kindle::all();
        return view('bookmarks.create', compact('books', 'kindles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'page' => 'required|integer',
            'book_id' => 'required|exists:books,ISBN',
            'kindle_id' => 'required|exists:kindles,id',
        ]);

        Bookmark::create($request->all());

        return redirect()->route('bookmarks.index');
    }

    public function show(Bookmark $bookmark)
    {
        return view('bookmarks.show', compact('bookmark'));
    }

    public function edit(Bookmark $bookmark)
    {
        $books = Book::all();
        $kindles = Kindle::all();
        return view('bookmarks.edit', compact('bookmark', 'books', 'kindles'));
    }

    public function update(Request $request, Bookmark $bookmark)
    {
        $request->validate([
            'page' => 'required|integer',
            'book_id' => 'required|exists:books,ISBN',
            'kindle_id' => 'required|exists:kindles,id',
        ]);

        $bookmark->update($request->all());

        return redirect()->route('bookmarks.index');
    }

    public function destroy(Bookmark $bookmark)
    {
        $bookmark->delete();
        return redirect()->route('bookmarks.index');
    }
}
