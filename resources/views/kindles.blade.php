@extends('layouts.app')

@section('content')
<div class="py-12">
  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
      <div class="p-6">
        <div class="flex justify-between items-center mb-6">
          <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100">Your Kindle Devices</h2>
          <div class="flex space-x-4">
            <a href="{{ route('kindles.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
              Add New Kindle
            </a>
          </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
          @foreach($kindles as $kindle)
          <x-kindle :kindle="$kindle" />
          @endforeach
        </div>

        @if($kindles->isEmpty())
        <div class="text-center py-12">
          <p class="text-gray-600 dark:text-gray-400">No Kindle devices found. Add your first Kindle to get started.</p>
          <a href="{{ route('kindles.create') }}" class="mt-4 inline-block px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
            Add New Kindle
          </a>
        </div>
        @endif
      </div>
    </div>
  </div>
</div>
@endsection