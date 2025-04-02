@extends('layouts.app')

@section('content')
<div class="py-12">
  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
      <div class="p-6">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-6">Update Kindle</h2>

        <form action="{{ route('kindles.update', $kindle) }}" method="POST" class="space-y-6">
          @csrf
          @method('PUT')

          <div>
            <x-input-label for="name" value="Kindle Name" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" value="{{ old('name', $kindle->name) }}" required />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
          </div>

          <div>
            <x-input-label for="type" value="Kindle Type" />
            <x-text-input id="type" name="type" type="text" class="mt-1 block w-full" value="{{ old('type', $kindle->type) }}" required />
            <x-input-error :messages="$errors->get('type')" class="mt-2" />
          </div>

          <div>
            <x-input-label for="email" value="Email" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" value="{{ old('email', $kindle->email) }}" required />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
          </div>

          <div class="flex items-center justify-end mt-4">
            <a href="{{ route('kindles.index') }}" class="text-gray-500 hover:text-gray-700 mr-4">
              Cancel
            </a>

            <x-primary-button>
              Update Kindle
            </x-primary-button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection