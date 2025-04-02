@extends('layouts.app')

@section('content')
<div class="py-12">
  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
      <div class="p-6">
        <div class="flex justify-between items-center mb-6">
          <div>
            <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100">Books on "{{ $kindle->name }}"</h2>
            <p class="text-sm text-gray-600 dark:text-gray-400">{{ $kindle->type }} • {{ $kindle->email }}</p>
          </div>
          <a href="{{ route('kindles.index') }}" class="px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition-colors">
            Back to Kindles
          </a>
        </div>

        @if($books->isEmpty())
        <div class="text-center py-12">
          <p class="text-gray-600 dark:text-gray-400">No books found on this Kindle.</p>
          <div class="mt-4">
            <a href="{{ route('books.index') }}" class="inline-block px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
              Browse Books
            </a>
          </div>
        </div>
        @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
          @foreach($books as $book)
          <div class="relative">
            <!-- Book Container -->
            <div class="relative w-64 h-96 mx-auto">

              <!-- Book Spine -->
              <div class="absolute left-0 top-0 h-full w-6 bg-gray-700 dark:bg-gray-900 shadow-lg rounded-l-sm z-10"></div>

              <!-- Book Cover -->
              <div class="absolute left-6 top-0 right-0 bottom-0 bg-gradient-to-r from-gray-500 to-gray-400 dark:from-gray-700 dark:to-gray-600 rounded-r-sm shadow-xl overflow-hidden z-20">
                <!-- Book Content -->
                <div class="absolute inset-0 flex flex-col items-center p-6 text-white z-30">
                  <!-- Title -->
                  <div class="text-center mb-4">
                    <h3 class="text-xl font-bold mb-2">{{ $book->title }}</h3>
                  </div>

                  <!-- Book Details -->
                  <div class="w-full flex-grow flex flex-col justify-center">
                    <div class="space-y-1 text-sm">
                      <p><span class="font-semibold">ISBN:</span> {{ $book->ISBN }}</p>

                      @if($book->genre)
                      <p><span class="font-semibold">Genre:</span> {{ $book->genre }}</p>
                      @endif

                      @if($book->publication_date)
                      <p><span class="font-semibold">Published:</span> {{ date('M d, Y', strtotime($book->publication_date)) }}</p>
                      @endif

                      @if($book->publisher)
                      <p><span class="font-semibold">Publisher:</span> {{ $book->publisher->name }}</p>
                      @endif
                    </div>

                  </div>
                  <!-- Buttons -->
                  <div class="mt-4 text-center">
                    <div class="grid grid-cols-2 gap-2">
                      <a href="{{ route('books.read', $book) }}" class="px-3 py-2 bg-blue-600 text-white text-xs rounded-lg hover:bg-blue-700 transition-colors">
                        Read
                      </a>

                      <form action="{{ route('kindles.detachBook', [$kindle, $book]) }}" method="POST" onsubmit="return confirm('Remove this book from this Kindle?');">
                        @csrf
                        @method('POST')
                        <button type="submit" class="px-3 py-2 bg-red-600 text-white text-xs rounded-lg hover:bg-red-700 transition-colors">
                          Remove
                        </button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
        @endif
      </div>
    </div>
  </div>
</div>
@endsection