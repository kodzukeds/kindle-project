<?php

namespace App\Http\Controllers;

use App\Models\Download;
use App\Models\Book;
use App\Models\Kindle;
use Illuminate\Http\Request;

class DownloadController extends Controller
{
    public function index()
    {
        $downloads = Download::all();
        return view('downloads.index', compact('downloads'));
    }

    public function create()
    {
        $books = Book::all();
        $kindles = Kindle::all();
        return view('downloads.create', compact('books', 'kindles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,ISBN',
            'kindle_id' => 'required|exists:kindles,id',
            'download_date' => 'required|date',
            'download_size' => 'required|numeric',
        ]);

        Download::create($request->all());

        return redirect()->route('downloads.index');
    }

    public function show(Download $download)
    {
        return view('downloads.show', compact('download'));
    }

    public function edit(Download $download)
    {
        $books = Book::all();
        $kindles = Kindle::all();
        return view('downloads.edit', compact('download', 'books', 'kindles'));
    }

    public function update(Request $request, Download $download)
    {
        $request->validate([
            'book_id' => 'required|exists:books,ISBN',
            'kindle_id' => 'required|exists:kindles,id',
            'download_date' => 'required|date',
            'download_size' => 'required|numeric',
        ]);

        $download->update($request->all());

        return redirect()->route('downloads.index');
    }

    public function destroy(Download $download)
    {
        $download->delete();
        return redirect()->route('downloads.index');
    }
}

