@extends('layouts.app')

@section('content')
<div class="py-12">
  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
      <div class="p-6">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-6">Update Book</h2>

        <form action="{{ route('books.update', $book) }}" method="POST">
          @csrf
          @method('PUT')

          <div>
            <x-input-label for="title" value="Book Title" />
            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" value="{{ old('title') }}" required />
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
          </div>

          <div>
            <x-input-label for="genre" value="Genre" />
            <x-text-input id="genre" name="genre" type="text" class="mt-1 block w-full" value="{{ old('genre') }}" required />
            <x-input-error :messages="$errors->get('genre')" class="mt-2" />
          </div>

          <div>
            <x-input-label for="publication_date" value="Publication Date" />
            <x-text-input id="publication_date" name="publication_date" type="date" class="mt-1 block w-full" value="{{ old('publication_date') }}" required />
            <x-input-error :messages="$errors->get('publication_date')" class="mt-2" />
          </div>

          <div>
            <x-input-label for="publisher_id" value="Publisher" />
            <select id="publisher_id" name="publisher_id" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
              <option value="">Select Publisher</option>
              @foreach($publishers as $publisher)
              <option value="{{ $publisher->id }}" {{ old('publisher_id') == $publisher->id ? 'selected' : '' }}>
                {{ $publisher->name }}
              </option>
              @endforeach
            </select>
            <x-input-error :messages="$errors->get('publisher_id')" class="mt-2" />
          </div>

          <div class="flex items-center justify-end mt-4">
            <a href="{{ route('books.index') }}" class="text-gray-500 hover:text-gray-700 mr-4">
              Cancel
            </a>

            <x-primary-button>
              Update Book
            </x-primary-button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection