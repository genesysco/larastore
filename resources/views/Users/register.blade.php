<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Register</title>
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

    <h2 class="text-2xl font-bold text-gray-800 dark:text-white text-center">Create an Account</h2>
    <p class="text-sm text-gray-500 dark:text-gray-400 text-center">Sign up to get started</p>

    @if(session()->has('error'))
    <div class="my-3 bg-pink-300 border-pink-500">
      <p class="text-pink-500">{{session('error')}}</p>
    </div>
    @endif

    <form id="registerForm" class="space-y-4" action="/insertUser" method="POST">
      @csrf
      <!-- Full Name -->
      <div>
        <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Full Name</label>
        <input type="text" id="name" name="name" required
          class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white rounded-lg focus:outline-none focus:ring-0 focus:border-indigo-500 @error('name') {{'!border-red-400'}} @enderror" value="{{old('name')}}">
          @error('name')
          <span class="text-red-400">{{$message}}</span>
          @enderror
      </div>

      <!-- Email -->
      <div>
        <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Email</label>
        <input type="email" id="email" name="email" required
          class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white rounded-lg focus:outline-none focus:ring-0 focus:border-indigo-500 @error('email') {{'!border-red-400'}} @enderror" value="{{old('email')}}">
          @error('email')
          <span class="text-red-400">{{$message}}</span>
          @enderror
          <span class="text-red-400 hidden" id="invalidEmail">Required , Invalid Email type !</span>
          <!-- -------------- Status Icons ---------------- -->
          <div role="status" class="mt-2">
            <svg id="eSpin" aria-hidden="true" class="inline w-5 h-5 text-gray-200 animate-spin dark:text-gray-600 fill-pink-600 dark:fill-green-300 hidden" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
            </svg>

            <svg id="eCheck" class="w-5 h-5 me-2 text-green-500 dark:text-green-400 shrink-0 hidden" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
            </svg>

            <div id="eEx" class="flex items-center hidden">
              <svg class="w-5 h-5 text-red-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v5a1 1 0 1 0 2 0V8Zm-1 7a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2H12Z" clip-rule="evenodd"/>
              </svg>
              <p class="ms-1 text-red-500">The Email has been taken !</p>
            </div>

          </div>
          <!-- -------------- Status Icons ---------------- -->
      </div>

      <!-- Username -->
      <div>
        <label for="username" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Username</label>
        <input type="text" id="username" name="username" required minlength="3"
          class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white rounded-lg focus:outline-none focus:ring-0 focus:border-indigo-500 @error('username') {{'!border-red-400'}} @enderror" value="{{old('username')}}">
          @error('username')
          <span class="text-red-400">{{$message}}</span>
          @enderror
          <span class="text-red-400 hidden" id="invalidUsername">Required , Invalid Email type !</span>
          <!-- -------------- Status Icons ---------------- -->
          <div role="status" class="mt-2">
            <svg id="uSpin" aria-hidden="true" class="inline w-5 h-5 text-gray-200 animate-spin dark:text-gray-600 fill-pink-600 dark:fill-green-300 hidden" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
            </svg>

            <svg id="uCheck" class="w-5 h-5 me-2 text-green-500 dark:text-green-400 shrink-0 hidden" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
            </svg>

            <div id="uEx" class="flex items-center hidden">
              <svg class="w-5 h-5 text-red-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v5a1 1 0 1 0 2 0V8Zm-1 7a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2H12Z" clip-rule="evenodd"/>
              </svg>
              <p class="ms-1 text-red-500">The Username has been taken !</p>
            </div>

          </div>
          <!-- -------------- Status Icons ---------------- -->
      </div>

      <!-- Password -->
      <div>
        <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Password</label>
        <input type="password" id="password" name="password" required minlength="6"
          class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white rounded-lg focus:outline-none focus:ring-0 focus:border-indigo-500 @error('password') {{'!border-red-400'}} @enderror">
          @error('password')
          <span class="text-red-400">{{$message}}</span>
          @enderror
      </div>

      <!-- Confirm Password -->
      <div>
        <label for="confirm-password" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Confirm Password</label>
        <input type="password" id="confirm-password" name="password_confirmation" required
          class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white rounded-lg focus:outline-none focus:ring-0 focus:border-indigo-500">
      </div>

      <!-- Submit Button -->
      <button type="submit"
        class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2 px-4 rounded-lg transition-none">
        Sign Up
      </button>
    </form>

    <!-- Footer -->
    <p class="text-xs text-gray-500 dark:text-gray-400 text-center mt-4">
      Already have an account? <a href="/login" class="text-indigo-600 dark:text-indigo-400 hover:underline">Sign in</a>
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

    // Optional: JS-based validation for confirm password
    const form = document.getElementById("registerForm");
    const passwordInput = document.getElementById("password");
    const confirmPasswordInput = document.getElementById("confirm-password");

    form.addEventListener("submit", function (e) {
      if (passwordInput.value !== confirmPasswordInput.value) {
        e.preventDefault();
        confirmPasswordInput.setCustomValidity("Passwords do not match.");
        confirmPasswordInput.reportValidity();
      } else {
        confirmPasswordInput.setCustomValidity("");
      }
    });
  </script>

  <script src="/js/jquery.js"></script>

  <script>
    $(document).ready(function(){
      $('#email').focusout(function() {
        checkEmail($(this))
      });

      $('#username').focusout(function() {
        checkUsername($(this))
      })
    });
 


    function checkEmail(thisMail){

      $('#eCheck').addClass('hidden');
      $('#eEx').addClass('hidden');
      $('#email').removeClass('!border-red-400');
      $('#invalidEmail').addClass('hidden');

      if(thisMail[0].checkValidity())
      {
        $('#eSpin').removeClass('hidden');

        let email = thisMail.val();
        let url = '/checkEmail/' + email ;
        $.get(url, {}, function(response){
          if(response)
          {
            $('#eSpin').addClass('hidden');
            $('#eCheck').removeClass('hidden');
          }
          else
          {
            $('#eEx').removeClass('hidden');
            $('#eSpin').addClass('hidden');
            $('#email').addClass('!border-red-400');
          }
        });
      }
      else
      {
        $('#email').addClass('!border-red-400');
        $('#invalidEmail').removeClass('hidden');
      }
    }



    function checkUsername(thisUsername){

      $('#uCheck').addClass('hidden');
      $('#uEx').addClass('hidden');
      $('#username').removeClass('!border-red-400');
      $('#invalidUsername').addClass('hidden');

      if(thisUsername[0].checkValidity())
      {
        $('#uSpin').removeClass('hidden');

        let username = thisUsername.val();
        let url = '/checkUsername/' + username ;
        $.get(url, {}, function(response){
          if(response)
          {
            $('#uSpin').addClass('hidden');
            $('#uCheck').removeClass('hidden');
          }
          else
          {
            $('#uEx').removeClass('hidden');
            $('#uSpin').addClass('hidden');
            $('#username').addClass('!border-red-400');
          }
        });
      }
      else
      {
        $('#username').addClass('!border-red-400');
        $('#invalidUsername').removeClass('hidden');
      }
    }

    
  </script>
</body>
</html>

