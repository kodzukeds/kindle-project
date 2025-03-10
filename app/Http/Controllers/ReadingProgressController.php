<?php

namespace App\Http\Controllers;

use App\Models\ReadingProgress;
use Illuminate\Http\Request;

class ReadingProgressController extends Controller
{
    public function index()
    {
        $readingProgresses = ReadingProgress::all();
        return view('reading_progress.index', compact('readingProgresses'));
    }

    public function create()
    {
        return view('reading_progress.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'last_read_page' => 'required|integer|min:1',
            'book_percentage' => 'required|numeric|min:0|max:100',
            'start' => 'required|date',
            'is_finished' => 'required|boolean',
            'book_id' => 'required|exists:books,ISBN',
            'kindle_id' => 'required|exists:kindles,id',
        ]);

        ReadingProgress::create($request->all());

        return redirect()->route('reading_progress.index');
    }

    public function show(ReadingProgress $readingProgress)
    {
        return view('reading_progress.show', compact('readingProgress'));
    }

    public function edit(ReadingProgress $readingProgress)
    {
        return view('reading_progress.edit', compact('readingProgress'));
    }

    public function update(Request $request, ReadingProgress $readingProgress)
    {
        $request->validate([
            'last_read_page' => 'required|integer|min:1',
            'book_percentage' => 'required|numeric|min:0|max:100',
            'start' => 'required|date',
            'is_finished' => 'required|boolean',
            'book_id' => 'required|exists:books,ISBN',
            'kindle_id' => 'required|exists:kindles,id',
        ]);

        $readingProgress->update($request->all());
        return redirect()->route('reading_progress.index');
    }

    public function destroy(ReadingProgress $readingProgress)
    {
        $readingProgress->delete();
        return redirect()->route('reading_progress.index');
    }
}
