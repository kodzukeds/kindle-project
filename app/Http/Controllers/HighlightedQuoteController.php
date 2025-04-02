<?php

namespace App\Http\Controllers;

use App\Models\HighlightedQuote;
use Illuminate\Http\Request;

class HighlightedQuoteController extends Controller
{
  public function index()
  {
    $highlightedQuotes = HighlightedQuote::all();
    return view('highlightedQuotes.index', compact('highlightedQuotes'));
  }

  public function create()
  {
    return view('highlightedQuotes.create');
  }

  public function store(Request $request)
  {
    $request->validate([
      'quote_text' => 'required|string|max:500',
      'page' => 'required|integer',
    ]);

    HighlightedQuote::create($request->all());

    return redirect()->route('highlightedQuotes.index');
  }

  public function show(HighlightedQuote $highlightedQuote)
  {
    return view('highlightedQuotes.show', compact('highlightedQuote'));
  }

  public function edit(HighlightedQuote $highlightedQuote)
  {
    return view('highlightedQuotes.edit', compact('highlightedQuote'));
  }

  public function update(Request $request, HighlightedQuote $highlightedQuote)
  {
    $request->validate([
      'quote_text' => 'required|string|max:500',
      'page' => 'required|integer',
    ]);

    $highlightedQuote->update($request->all());
    return redirect()->route('highlightedQuotes.index');
  }

  public function destroy(HighlightedQuote $highlightedQuote)
  {
    $highlightedQuote->delete();
    return redirect()->route('highlightedQuotes.index');
  }
}
