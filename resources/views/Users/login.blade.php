<!DOCTYPE html>
<html lang="en"> 
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>
  <script src="/js/tailwindcss.js"></script>
  <script src="/js/tailwind.config.js"></script>
</head>
<body class="bg-gradient-to-br from-blue-50 via-white to-indigo-100 dark:from-gray-900 dark:via-gray-800 dark:to-indigo-950 min-h-screen flex items-center justify-center px-4">

  <div class="bg-white dark:bg-gray-800 shadow-lg rounded-xl max-w-md w-full p-8 space-y-6">
    <!-- Dark Mode Toggle Button (Icon Only) -->
    <div class="flex justify-end">
      <button onclick="toggleDarkMode()" class="p-2 rounded-full text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none">
        <span id="darkModeIcon">
          <!-- Default to Moon Icon in Light Mode -->
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path>
          </svg>
        </span>
      </button>
    </div>

    <h2 class="text-2xl font-bold text-gray-800 dark:text-white text-center">Welcome Back</h2>
    <p class="text-sm text-gray-500 dark:text-gray-400 text-center">Sign in to your account</p>

    @if(session()->has('success'))
    <div class="bg-green-200 border border-green-500 p-2 rounded-md">
      <p class="text-green-500">{{session('success')}}</p>
    </div>
    @endif
    @if(session()->has('error'))
    <div class="bg-pink-200 border border-pink-500 p-2 rounded-md">
      <p class="text-pink-500">{{session('error')}}</p>
    </div>
    @endif

    <form class="space-y-5" method="POST" action="/signIn">
      @csrf
      <!-- Email -->
      <div>
        <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Email</label>
        <input type="email" id="email" name="email" required
          class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white rounded-lg focus:outline-none focus:ring-0 focus:border-indigo-500 ">
      </div>

      <!-- Password -->
      <div>
        <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Password</label>
        <input type="password" id="password" name="password" required minlength="6"
          class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white rounded-lg focus:outline-none focus:ring-0 focus:border-indigo-500 ">
      </div>

      <!-- Remember Me & Forgot Password -->
      <div class="flex items-center justify-between">
        <label class="flex items-center text-sm text-gray-600 dark:text-gray-400">
          <input type="checkbox" class="rounded text-indigo-600 dark:text-indigo-400 focus:ring-0 dark:bg-gray-600">
          <span class="ml-2">Remember me</span>
        </label>
        <a href="#" class="text-sm text-indigo-600 dark:text-indigo-400 hover:text-indigo-800 dark:hover:text-indigo-300">Forgot password?</a>
      </div>

      <!-- Submit Button -->
      <button type="submit"
        class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2 px-4 rounded-lg transition-none">
        Sign In
      </button>
    </form>

    <!-- Footer -->
    <p class="text-xs text-gray-500 dark:text-gray-400 text-center mt-4">
      Don't have an account? <a href="/register" class="text-indigo-600 dark:text-indigo-400 hover:underline">Sign up</a>
      <a href="/" class="text-indigo-600 dark:text-indigo-400 hover:underline flex items-center justify-center mt-2">
        <svg width="16" height="16" fill="currentColor" class="bi bi-house-door-fill dark:text-white me-1" viewBox="0 0 16 16">
          <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5"/>
        </svg>
        Home Page
      </a>
    </p>
  </div>

  <script>
    if(localStorage.getItem("darkMode") == "true")
      toggleDarkMode();
    // Toggle dark mode and switch icon
    function toggleDarkMode() {
      const isDark = document.documentElement.classList.toggle('dark');
      const icon = document.getElementById('darkModeIcon');
      isDark ? localStorage.setItem("darkMode","true") : localStorage.setItem("darkMode","false");

      icon.innerHTML = isDark
        ? `<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>` // Sun Icon
        : `<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path></svg>`; // Moon Icon
    }

    // Optional: Update icon on load based on current mode
    window.addEventListener('DOMContentLoaded', () => {
      const icon = document.getElementById('darkModeIcon');
      const isDark = document.documentElement.classList.contains('dark');

      icon.innerHTML = isDark
        ? `<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>`
        : `<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path></svg>`;
    });

  </script>
</body>
</html>

