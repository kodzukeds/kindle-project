<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Kindles</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen bg-gradient-to-br from-slate-900 via-blue-950 to-slate-900">
  <div class="relative overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxwYXRoIGQ9Ik0wIDBoNjB2NjBIMHoiLz48Y2lyY2xlIGZpbGw9IiM2NjY2NjYiIGN4PSI0MiIgY3k9IjQyIiByPSIxIi8+PC9nPjwvc3ZnPg==')] opacity-5"></div>

    <!-- Main Content -->
    <div class="relative z-10 min-h-screen flex flex-col items-center justify-center px-4">
      <div class="text-center space-y-8">
        <!-- Icon -->
        <div class="mb-8">
          <div class="relative">
            <svg class="w-24 h-24 text-blue-400 mx-auto book-shadow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
            </svg>
            <div class="absolute -inset-4 bg-blue-500/10 rounded-full blur-xl"></div>
          </div>
        </div>

        <!-- Main Text -->
        <div class="space-y-4">
          <h1 class="text-6xl font-bold text-white mb-4 tracking-tight font-serif">
            Your Kindles Library
          </h1>
          <p class="text-xl text-blue-100 max-w-2xl mx-auto font-serif">
            Access your favorite books anytime, anywhere. Start your reading journey today.
          </p>
        </div>

        <!-- Button -->
        <div class="pt-4">
          @auth
          <a href="{{ route('kindles.index') }}"
            class="px-8 py-4 bg-blue-600 text-white rounded-full hover:bg-blue-700 transition-all duration-300 hover:shadow-lg hover:shadow-blue-500/30 backdrop-blur-sm font-serif">
            Your Kindles
          </a>
          @else
          <a href="{{ route('login') }}"
            class="px-8 py-4 bg-blue-600 text-white rounded-full hover:bg-blue-700 transition-all duration-300 hover:shadow-lg hover:shadow-blue-500/30 backdrop-blur-sm font-serif">
            Sign In to View Kindles
          </a>
          @endauth
        </div>
      </div>
    </div>
  </div>
</body>

</html>