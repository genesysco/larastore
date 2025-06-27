<!DOCTYPE html>
<html lang="en" class="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield('metaTag')
    <title>@yield('title' , "International E-Commerce")</title>
    <!-- Tailwind CSS -->
    <script src="/js/tailwindcss.js"></script>
    <!-- Bootstrap CSS for slider -->
    <link rel="stylesheet" type="text/css" href="/css/bootstrap-icons.min.css">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles -->
    <link href="/css/style.css" rel="stylesheet">
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: {
                            light: '#4f46e5',
                            dark: '#6366f1',
                        },
                        dark: {
                            800: '#1e293b',
                            900: '#0f172a',
                        }
                    },
                    animation: {
                        'flip-y': 'flip-y 6s infinite ease-in-out',
                        'flip-x': 'flip-x 6s infinite ease-in-out',
                    },
                    keyframes: {
                        'flip-y': {
                            '0%, 100%': { transform: 'rotateY(0deg)' },
                            '50%': { transform: 'rotateY(180deg)' },
                        },
                        'flip-x': {
                            '0%, 100%': { transform: 'rotateX(0deg)' },
                            '50%': { transform: 'rotateX(180deg)' },
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-50 text-gray-800 dark:bg-dark-900 dark:text-gray-200 transition-colors duration-300">
    <!-- Navigation -->
    <nav class="hidden lg:block bg-white dark:!bg-dark-800 shadow-md py-4 sticky top-0 z-50">
        <div class="container mx-auto px-4 flex justify-between items-center">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="/" class="text-2xl font-bold text-primary-light dark:text-primary-dark">
                    <div class="flex items-center">
                        <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                        <span class="ml-2 text-xl font-bold text-gray-800 dark:text-white">LaraStore</span>
                    </div>
                </a>
            </div>
            
            <!-- Main Menu -->
            <div class="hidden md:flex space-x-8">
                <a href="/" class="hover:text-primary-light dark:hover:text-primary-dark transition">Home</a>
                <a href="/#shop" class="hover:text-primary-light dark:hover:text-primary-dark transition">Shop</a>



                <!-- Categories -->
                <div class="relative grid justify-start">
	                <button class="hover:text-primary-light dark:hover:text-primary-dark transition" onclick="showCategories()">
		            	Categories
		            	<i class="fa fa-chevron-down ms-2"></i>
	                </button>
	                <ul class="bg-white dark:!bg-sky-900 rounded-md py-3 ps-2 absolute top-8 left-0 space-y-3 w-40 shadow hidden" id="categories">
                        @foreach($categories as $c)
                          @if($c->parent_id == null)
    	                	<li class="relative group">
    	                		<span class="hover:text-primary-light dark:hover:text-primary-dark transition block cursor-pointer">
    		                		{{$c->name}}
    		                	</span>
    		                	<ul class="absolute bg-white dark:!bg-sky-900 rounded-md py-1.5 px-3 absolute top-0 left-36 space-y-2 w-44 shadow hidden group-hover:block">
                                    @foreach($categories as $s)
                                      @if($s->parent_id == $c->id)
        		                		<li>
        		                			<a href="/categorizedProducts/{{$s->id}}" class="hover:text-primary-light dark:hover:text-primary-dark transition block">{{$s->name}}</a>
        		                		</li>
                                      @endif
                                    @endforeach
                                    <li>
                                        <a href="/categorizedProducts/{{$c->id}}" class="hover:text-primary-light dark:hover:text-primary-dark transition block">All of this Category</a>
                                    </li>
    		                	</ul>
    		                </li>
                          @endif
                        @endforeach
	                </ul>
                </div>
                <!-- /Categories -->
                <a href="/allProducts" class="hover:text-primary-light dark:hover:text-primary-dark transition">All Products</a>
                <a href="#" class="hover:text-primary-light dark:hover:text-primary-dark transition">About</a>
                <a href="#" class="hover:text-primary-light dark:hover:text-primary-dark transition">Contact</a>
            </div>
            
            <!-- Right Icons -->
            <div class="flex items-center space-x-6">
                <button id="theme-toggle" class="p-2 rounded-full hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                    <i class="fas fa-moon dark:hidden"></i>
                    <i class="fas fa-sun hidden dark:block"></i>
                </button>
                <a href="/allProducts" class="hover:text-primary-light dark:hover:text-primary-dark transition">
                    <i class="fas fa-search"></i>
                </a>
                <a href="/login" class="hover:text-primary-light dark:hover:text-primary-dark transition">
                    <i class="fas fa-user"></i>
                </a>
                @if(auth()->check())
                    <a href="/cart" class="hover:text-primary-light dark:hover:text-primary-dark transition relative">
                        <i class="fas fa-shopping-cart"></i>
                        @if($cart->items->isNotEmpty())
                            <span class="absolute -top-2 -right-2 bg-primary-light dark:bg-primary-dark text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">
                                {{$cart->items->count()}}
                            </span>
                        @endif
                    </a>
                @endif
            </div>
        </div>
    </nav>



    <!-- ---------------------------------------------- Mobile Nav -->
    <nav class="lg:hidden navbar bg-body-tertiary dark:!bg-dark-800 shadow-md py-4 sticky top-0 z-50">
      <div class="container-fluid">

        <div class="flex items-center">
            <a href="#" class="text-2xl font-bold text-primary-light dark:text-primary-dark">
                <div class="flex items-center">
                    <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                    <span class="ml-2 text-xl font-bold text-gray-800 dark:text-white">LaraStore</span>
                </div>
            </a>
        </div>

        <button class="navbar-toggler dark:bg-gray-400" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end dark:bg-dark-800" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title dark:text-gray-400" id="offcanvasNavbarLabel">Menu</h5>
            <button type="button" class="btn-close dark:bg-gray-400" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
              <li class="nav-item">
                <a class="nav-link dark:!text-gray-300 active" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link dark:!text-gray-300" href="/#shop">Shop</a>
              </li>


              <li class="text-gray-300 dark:text-sky-700 mt-2">
                  Categories
              </li>
              <!-- MCategories -->
              @foreach($categories as $c)
                @if($c->parent_id == null)
                  <li class="ms-3 nav-item dropdown">
                    <a class="nav-link dropdown-toggle dark:!text-gray-300" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      {{$c->name}}
                    </a>
                    <ul class="dropdown-menu dark:bg-sky-900">
                    @foreach($categories as $s)
                      @if($s->parent_id == $c->id)
                          <li>
                            <a class="dropdown-item dark:!text-gray-300" href="/categorizedProducts/{{$s->id}}">
                            {{$s->name}}  
                            </a>
                          </li>
                      @endif
                    @endforeach
                      <li>
                        <a class="dropdown-item dark:!text-gray-300" href="/categorizedProducts/{{$c->id}}">
                        All of this category  
                        </a>
                      </li>
                    </ul>
                  </li>
                @endif
              @endforeach
              <!-- /MCategories -->
              

              <li class="nav-item mt-2">
                <a class="nav-link dark:!text-gray-300" href="/allProducts">All Products</a>
              </li>
              <li class="nav-item">
                <a class="nav-link dark:!text-gray-300" href="#">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link dark:!text-gray-300" href="#">Contact</a>
              </li>
            </ul>
            <!-- Icons  -->
            <div class="flex items-center space-x-6 mt-3 justify-center dark:!text-gray-300">
                <button onclick="enableDarkMode()" class="p-2 rounded-full hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                    <i class="fas fa-moon dark:hidden"></i>
                    <i class="fas fa-sun hidden dark:block"></i>
                </button>
                <a href="/login" class="hover:text-primary-light dark:hover:text-primary-dark transition">
                    <i class="fas fa-user"></i>
                </a>
                <a href="/allProducts" class="hover:text-primary-light dark:hover:text-primary-dark transition">
                    <i class="fas fa-search"></i>
                </a>
                @if(auth()->check())
                    <a href="/cart" class="hover:text-primary-light dark:hover:text-primary-dark transition relative">
                        <i class="fas fa-shopping-cart"></i>
                        @if($cart->items->isNotEmpty())
                            <span class="absolute -top-2 -right-2 bg-primary-light dark:bg-primary-dark text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">
                                {{$cart->items->count()}}
                            </span>
                        @endif
                    </a>
                @endif
            </div>
            <!-- /Icons  -->
          </div>
        </div>
      </div>
    </nav>
    <!-- ---------------------------------------------- /Mobile Nav -->

