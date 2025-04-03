<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Models\Kindle;
use App\Models\Publisher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
  public function index()
  {
    $books = Book::all();
    $kindles = Kindle::all();
    return view('books.index', compact('books', 'kindles'));
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
      'isbn' => 'required|string|max:50|unique:books,ISBN',
      'title' => 'required|string|max:100',
      'genre' => 'nullable|string|max:50',
      'publication_date' => 'required|date',
      'publisher_id' => 'nullable|exists:publishers,id',
      'pdf' => 'required|file|mimes:pdf|max:10240',
    ]);

    $book = Book::create([
      'ISBN' => $request->isbn,
      'title' => $request->title,
      'genre' => $request->genre,
      'publication_date' => $request->publication_date,
      'publisher_id' => $request->publisher_id,
    ]);

    if ($request->has('authors')) {
      $book->authors()->attach($request->authors);
    }

    if ($request->has('kindles')) {
      $book->kindles()->attach($request->kindles);
    }

    if ($request->hasFile('pdf')) {
      $path = $request->file('pdf')->store('pdfs', 'public');
      $book->pdf_path = $path;
      $book->save();
    }

    return redirect()->route('books.index')->with('success', 'Book created successfully!');
  }

  public function downloadFile($bookId)
  {
    $book = Book::findOrFail($bookId);

    if (Storage::exists('public/' . $book->pdf_path)) {
      return Storage::download('public/' . $book->pdf_path);
    }

    return back()->with('error', 'File not found');
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

  public function download(Book $book)
  {
    $kindles = Kindle::all();
    return view('books.download', compact('book', 'kindles'));
  }

  public function read(Book $book)
  {
    return view('books.read', compact('book'));
  }

  public function attachKindle(Request $request, Book $book)
  {
    $validated = $request->validate([
      'kindle_id' => 'required|exists:kindles,id',
    ]);
    $book->kindles()->attach($validated['kindle_id']);
    return redirect()->route('books.index', $book)->with('success', 'Kindle attached to book.');
  }

  public function detachKindle(Book $book, Kindle $kindle)
  {
    $book->kindles()->detach($kindle);
    return redirect()->route('books.index', $book);
  }

  public function attachAuthor(Book $book, Author $author)
  {
    $book->authors()->attach($author);
    return redirect()->route('books.index', $book);
  }

  public function detachAuthor(Book $book, Author $author)
  {
    $book->authors()->detach($author);
    return redirect()->route('books.index', $book);
  }
}
