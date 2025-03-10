<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Models\Kindle;
use App\Models\Publisher;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        $authors = Author::all();
        $publishers = Publisher::all();
        $kindles = Kindle::all();

        return view('books.create', compact('authors', 'publishers', 'kindles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:100',
            'genre' => 'nullable|string|max:50',
            'publication_date' => 'required|date',
            'publisher_id' => 'nullable|exists:publishers,id',
        ]);

        $book = Book::create($request->only('title', 'genre', 'publication_date', 'publisher_id'));

        if ($request->has('authors')) {
            $book->authors()->attach($request->authors);
        }

        if ($request->has('kindles')) {
            $book->kindles()->attach($request->kindles);
        }

        return redirect()->route('books.index');
    }

    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    public function edit(Book $book)
    {
        $authors = Author::all();
        $publishers = Publisher::all();
        $kindles = Kindle::all();

        return view('books.edit', compact('book', 'authors', 'publishers', 'kindles'));
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required|string|max:100',
            'genre' => 'nullable|string|max:50',
            'publication_date' => 'required|date',
            'publisher_id' => 'nullable|exists:publishers,id',
        ]);

        $book->update($request->only('title', 'genre', 'publication_date', 'publisher_id'));

        if ($request->has('authors')) {
            $book->authors()->sync($request->authors);
        }

        if ($request->has('kindles')) {
            $book->kindles()->sync($request->kindles);
        }

        return redirect()->route('books.index');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index');
    }

    public function attachKindle(Book $book, Kindle $kindle)
    {
        $book->kindles()->attach($kindle);
        return redirect()->route('books.show', $book);
    }

    public function detachKindle(Book $book, Kindle $kindle)
    {
        $book->kindles()->detach($kindle);
        return redirect()->route('books.show', $book);
    }

    public function attachAuthor(Book $book, Author $author)
    {
        $book->authors()->attach($author);
        return redirect()->route('books.show', $book);
    }

    public function detachAuthor(Book $book, Author $author)
    {
        $book->authors()->detach($author);
        return redirect()->route('books.show', $book);
    }
}
