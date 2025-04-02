@extends('layouts.app')

@section('content')
<div class="py-12">
  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
      <div class="p-6">
        <div class="flex justify-between mb-10">
          <div>
            <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100">Library Books</h2>
          </div>
          <div class="flex justify-end items-center space-x-4">
          <a href="{{ route('kindles.index') }}" class="px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition-colors">
            Back to Kindles
          </a>
          <a href="{{ route('books.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
            Add New Book
          </a>
          </div>
        </div>

        @if($books->isEmpty())
        <div class="text-center py-12">
          <p class="text-gray-600 dark:text-gray-400">No books found in the library.</p>
        </div>
        @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
          @foreach($books as $book)
          <x-book :book="$book" />
          @endforeach
        </div>
        @endif
      </div>
    </div>
  </div>
</div>
@endsection