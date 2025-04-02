@extends('layouts.app')

@section('content')
<div class="py-12">
  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
      <div class="p-6">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-6">Download Book</h2>
        <form action="{{ route('books.attachKindle', $book) }}" method="POST" class="space-y-6">
          @csrf

          <div>
            <x-input-label for="kindle_id" value="Kindle" />
            <select id="kindle_id" name="kindle_id" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
              <option value="">Select Kindle</option>
              @foreach($kindles as $kindle)
              <option value="{{ $kindle->id }}" {{ old('kindle_id') == $kindle->id ? 'selected' : '' }}>
                {{ $kindle->name }}
              </option>
              @endforeach
            </select>
            <x-input-error :messages="$errors->get('kindle_id')" class="mt-2" />
          </div>

          <div class="flex items-center justify-end mt-4">
            <a href="{{ route('books.index') }}" class="text-gray-500 hover:text-gray-700 mr-4">
              Cancel
            </a>

            <x-primary-button>
              Download Book
            </x-primary-button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection