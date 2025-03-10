<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
  public function index()
  {
    $authors = Author::all();
    return view('authors.index', compact('authors'));
  }

  public function create()
  {
    return view('authors.create');
  }

  public function store(Request $request)
  {
    $request->validate([
      'name' => 'required|string|max:100',
      'birthday' => 'required|date',
      'country' => 'nullable|string|max:50',
      'contact' => 'nullable|string|max:100',
    ]);

    Author::create($request->all());

    return redirect()->route('authors.index');
  }

  public function show(Author $author)
  {
    return view('authors.show', compact('author'));
  }

  public function edit(Author $author)
  {
    return view('authors.edit', compact('author'));
  }

  public function update(Request $request, Author $author)
  {
    $request->validate([
      'name' => 'required|string|max:100',
      'birthday' => 'required|date',
      'country' => 'nullable|string|max:50',
      'contact' => 'nullable|string|max:100',
    ]);

    $author->update($request->all());
    return redirect()->route('authors.index');
  }

  public function destroy(Author $author)
  {
    $author->delete();
    return redirect()->route('authors.index');
  }

  public function attachBook(Author $author, Book $book)
  {
    $author->books()->attach($book);

    return redirect()->route('authors.show', $author);
  }

  public function detachBook(Author $author, Book $book)
  {
    $author->books()->detach($book);

    return redirect()->route('authors.show', $author);
  }
}
