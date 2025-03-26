<?php

namespace App\Http\Controllers;

use App\Models\Kindle;
use App\Models\Book;
use App\Models\Author;
use Illuminate\Http\Request;

class KindleController extends Controller
{
    public function index()
    {
        $kindles = Kindle::all();
        return view('kindles', compact('kindles'));
    }

    public function create()
    {
        return view('kindles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'type' => 'required|string|max:100',
            'email' => 'required|email|max:100',
        ]);

        Kindle::create($request->all());

        return redirect()->route('kindles.index');
    }

    public function show(Kindle $kindle)
    {
        return view('kindles.show', compact('kindle'));
    }

    public function edit(Kindle $kindle)
    {
        return view('kindles.edit', compact('kindle'));
    }

    public function update(Request $request, Kindle $kindle)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'type' => 'required|string|max:100',
            'email' => 'required|email|max:100',
        ]);

        $kindle->update($request->all());
        return redirect()->route('kindles.index');
    }

    public function destroy(Kindle $kindle)
    {
        $kindle->delete();
        return redirect()->route('kindles.index');
    }

    public function attachBook(Kindle $kindle, Book $book)
    {
        $kindle->books()->attach($book);
        return redirect()->route('kindles.show', $kindle);
    }

    public function detachBook(Kindle $kindle, Book $book)
    {
        $kindle->books()->detach($book);
        return redirect()->route('kindles.show', $kindle);
    }
}
