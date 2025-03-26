@props(['kindle'])

<div class="relative bg-transparent overflow-hidden transform transition-all duration-300 hover:scale-105">
    <!-- Kindle Device Frame -->
    <div class="relative w-64 h-96 mx-auto">
        <!-- Device Border -->
        <div class="absolute inset-0 bg-gray-800 rounded-lg border-4 border-gray-700"></div>
        
        <!-- Screen -->
        <div class="absolute inset-5 bg-gray-200 rounded-lg overflow-hidden">
            <!-- Screen Content -->
            <div class="p-4 h-full flex flex-col">
                <!-- Kindle Logo -->
                <div class="text-center mb-4">
                    <svg class="w-12 h-12 mx-auto text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                </div>

                <!-- Device Info -->
                <div class="flex-1 flex flex-col justify-center space-y-4">
                    <div class="text-center">
                        <h3 class="text-lg font-semibold text-gray-600">{{ $kindle->name }}</h3>
                        <p class="text-sm text-gray-400">{{ $kindle->type }}</p>
                    </div>
                    
                    <div class="text-center">
                        <p class="text-xs text-gray-600">{{ $kindle->email }}</p>
                    </div>
                </div>
                
                <!-- Edit & Delete Button -->
                <div class="mt-4 text-center">
                    <div class="flex justify-center space-x-2">
                        <a href="{{ route('kindles.edit', $kindle) }}" class="px-4 py-2 bg-blue-600 text-white text-sm rounded-lg hover:bg-blue-700 transition-colors">
                            Edit Kindle
                        </a>
                        
                        <form action="{{ route('kindles.destroy', $kindle) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this Kindle?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-4 py-2 bg-red-600 text-white text-sm rounded-lg hover:bg-red-700 transition-colors">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
