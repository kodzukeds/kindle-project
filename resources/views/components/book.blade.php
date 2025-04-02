@props(['book'])

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
          <div class="grid grid-cols-3 gap-2">
            <form action="{{ route('books.download', $book) }}" method="GET" class="inline" ">
              @csrf
              <button type=" submit" class="px-3 py-2 bg-gray-600 text-white text-xs rounded-lg hover:bg-gray-700 transition-colors fa fa-download"></button>
            </form>

            <a href="{{ route('books.edit', $book) }}" class="px-3 py-2 bg-blue-600 text-white text-xs rounded-lg hover:bg-blue-700 transition-colors">
              Edit
            </a>

            <form action="{{ route('books.destroy', $book) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this book?');">
              @csrf
              @method('DELETE')
              <button type="submit" class="w-full px-3 py-2 bg-red-600 text-white text-xs rounded-lg hover:bg-red-700 transition-colors">
                Delete
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>