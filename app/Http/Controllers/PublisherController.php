<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    public function index()
    {
        $publishers = Publisher::all();
        return view('publishers.index', compact('publishers'));
    }

    public function create()
    {
        return view('publishers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'country' => 'nullable|string|max:50',
        ]);

        Publisher::create($request->all());

        return redirect()->route('publishers.index');
    }

    public function show(Publisher $publisher)
    {
        return view('publishers.show', compact('publisher'));
    }

    public function edit(Publisher $publisher)
    {
        return view('publishers.edit', compact('publisher'));
    }

    public function update(Request $request, Publisher $publisher)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'country' => 'nullable|string|max:50',
        ]);

        $publisher->update($request->all());
        return redirect()->route('publishers.index');
    }

    public function destroy(Publisher $publisher)
    {
        $publisher->delete();
        return redirect()->route('publishers.index');
    }
}

