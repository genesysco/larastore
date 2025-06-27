 @extends('Users.base')


 @section('content')
 <!-- Hero Slider (Bootstrap) -->
    <div id="heroCarousel" class="carousel slide relative" data-bs-ride="carousel">
        <div class="carousel-indicators absolute bottom-4 left-0 right-0 flex justify-center space-x-2">
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active w-3 h-3 rounded-full bg-white dark:bg-gray-300" aria-current="true"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1" class="w-3 h-3 rounded-full bg-white dark:bg-gray-300"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2" class="w-3 h-3 rounded-full bg-white dark:bg-gray-300"></button>
        </div>
        <div class="carousel-inner relative w-full overflow-hidden">
            <!-- Slide 1 -->
            <div class="carousel-item active relative float-left w-full">
                <div class="hero-slide bg-cover bg-center h-96 md:h-[500px] flex items-center" style="background-image: url('/images/slider1.avif')">
                    <div class="container mx-auto px-4 text-center md:text-left">
                        <div class="max-w-lg bg-white/80 dark:bg-dark-800/80 backdrop-blur-sm p-8 rounded-lg inline-block">
                            <h1 class="text-3xl md:text-5xl font-bold mb-4 text-gray-800 dark:text-white">Summer Collection 2025</h1>
                            <p class="text-lg mb-6 text-gray-600 dark:text-gray-300">Discover our exclusive products with up to 50% discount</p>
                            <a href="#" class="bg-primary-light dark:bg-primary-dark text-white px-6 py-3 rounded-lg font-medium hover:bg-opacity-90 transition">Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Slide 2 -->
            <div class="carousel-item relative float-left w-full">
                <div class="hero-slide bg-cover bg-center h-96 md:h-[500px] flex items-center" style="background-image: url('/images/slider2.avif')">
                    <div class="container mx-auto px-4 text-center md:text-left">
                        <div class="max-w-lg bg-white/80 dark:bg-dark-800/80 backdrop-blur-sm p-8 rounded-lg inline-block">
                            <h1 class="text-3xl md:text-5xl font-bold mb-4 text-gray-800 dark:text-white">New Tech Gadgets</h1>
                            <p class="text-lg mb-6 text-gray-600 dark:text-gray-300">The latest technology at your fingertips</p>
                            <a href="#" class="bg-primary-light dark:bg-primary-dark text-white px-6 py-3 rounded-lg font-medium hover:bg-opacity-90 transition">Explore</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Slide 3 -->
            <div class="carousel-item relative float-left w-full">
                <div class="hero-slide bg-cover bg-center h-96 md:h-[500px] flex items-center" style="background-image: url('/images/slider3.avif')">
                    <div class="container mx-auto px-4 text-center md:text-left">
                        <div class="max-w-lg bg-white/80 dark:bg-dark-800/80 backdrop-blur-sm p-8 rounded-lg inline-block">
                            <h1 class="text-3xl md:text-5xl font-bold mb-4 text-gray-800 dark:text-white">Worldwide Shipping</h1>
                            <p class="text-lg mb-6 text-gray-600 dark:text-gray-300">Free shipping on orders over $100</p>
                            <a href="#" class="bg-primary-light dark:bg-primary-dark text-white px-6 py-3 rounded-lg font-medium hover:bg-opacity-90 transition">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev w-16 h-16 absolute top-1/2 left-4 -translate-y-1/2 p-2 rounded-full bg-white/30 dark:bg-dark-800/30 hover:bg-white/50 dark:hover:bg-dark-800/50 transition" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <i class="fas fa-chevron-left text-gray-800 dark:text-white"></i>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next w-16 h-16 absolute top-1/2 right-4 -translate-y-1/2 p-2 rounded-full bg-white/30 dark:bg-dark-800/30 hover:bg-white/50 dark:hover:bg-dark-800/50 transition" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <i class="fas fa-chevron-right text-gray-800 dark:text-white"></i>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- Categories Section -->
    <section class="py-16 bg-gray-100 dark:bg-dark-800" id="shop">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12">Shop by Categories</h2>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <!--============================================== Categories card-->
                @foreach($categories as $c)
                  @if($c->parent_id == null)
                    <div class="category-card bg-white dark:!bg-sky-900 rounded-xl p-6 shadow-md relative overflow-hidden group">
                        <div class="flex flex-col items-center text-center">
                            <div class="w-24 h-24 mb-4 flex items-center justify-center text-primary-light dark:text-primary-dark animate-flip-y">
                                <i class="fa fa-award text-4xl"></i>
                            </div>
                            <h3 class="text-xl font-semibold mb-2">{{$c->name}}</h3>
                            <p class="text-gray-600 dark:text-gray-400 mb-4">Latest Products</p>
                            <a href="#" class="text-primary-light dark:text-primary-dark font-medium hover:underline">View All</a>
                        </div>
                        
                        <div class="subcategory absolute inset-0 bg-white dark:!bg-sky-700 p-6 rounded-xl flex flex-col justify-center">
                            <h4 class="font-semibold mb-3">Subcategories</h4>
                            <ul class="space-y-2">
                                @foreach($categories as $s)
                                  @if($s->parent_id == $c->id)
                                    <li>
                                        <a href="/categorizedProducts/{{$s->id}}" class="hover:text-primary-light dark:hover:text-primary-dark transition">
                                            {{$s->name}}
                                        </a>
                                    </li>
                                  @endif
                                @endforeach
                                <li>
                                    <a href="/categorizedProducts/{{$c->id}}" class="hover:text-primary-light dark:hover:text-primary-dark transition">
                                        All of this category
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                  @endif
                @endforeach
                <!--============================================== /Categories card -->
            </div>
        </div>
    </section>

    <!-- Featured Products -->
    <section class="py-16">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-3xl font-bold">Featured Products</h2>
                <a href="#" class="text-primary-light dark:text-primary-dark font-medium hover:underline">View All</a>
            </div>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Product 1 -->
                <div class="bg-white dark:!bg-sky-900 rounded-lg overflow-hidden shadow-md hover:shadow-lg transition">
                    <div class="relative">
                        <img src="/images/fp1.avif" alt="Smartwatch" class="w-full h-48 object-cover">
                        <div class="absolute top-2 right-2 bg-red-500 text-white text-xs font-bold px-2 py-1 rounded">-20%</div>
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold text-lg mb-1">Premium Smartwatch</h3>
                        <div class="flex items-center mb-2">
                            <div class="flex text-yellow-400">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                            <span class="text-gray-600 dark:text-gray-400 text-sm ml-2">(48)</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <div>
                                <span class="text-gray-500 dark:text-gray-400 line-through text-sm">$199.99</span>
                                <span class="text-primary-light dark:text-primary-dark font-bold ml-2">$159.99</span>
                            </div>
                            <button class="text-gray-600 dark:text-gray-400 hover:text-primary-light dark:hover:text-primary-dark transition">
                                <i class="fas fa-shopping-cart"></i>
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Product 2 -->
                <div class="bg-white dark:!bg-sky-900 rounded-lg overflow-hidden shadow-md hover:shadow-lg transition">
                    <div class="relative">
                        <img src="/images/fp2.avif" alt="Laptop" class="w-full h-48 object-cover">
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold text-lg mb-1">Ultra Slim Laptop</h3>
                        <div class="flex items-center mb-2">
                            <div class="flex text-yellow-400">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                            <span class="text-gray-600 dark:text-gray-400 text-sm ml-2">(32)</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <div>
                                <span class="text-primary-light dark:text-primary-dark font-bold">$899.99</span>
                            </div>
                            <button class="text-gray-600 dark:text-gray-400 hover:text-primary-light dark:hover:text-primary-dark transition">
                                <i class="fas fa-shopping-cart"></i>
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Product 3 -->
                <div class="bg-white dark:!bg-sky-900 rounded-lg overflow-hidden shadow-md hover:shadow-lg transition">
                    <div class="relative">
                        <img src="/images/fp3.avif" alt="Camera" class="w-full h-48 object-cover">
                        <div class="absolute top-2 right-2 bg-red-500 text-white text-xs font-bold px-2 py-1 rounded">New</div>
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold text-lg mb-1">Professional Camera</h3>
                        <div class="flex items-center mb-2">
                            <div class="flex text-yellow-400">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <span class="text-gray-600 dark:text-gray-400 text-sm ml-2">(64)</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <div>
                                <span class="text-primary-light dark:text-primary-dark font-bold">$1,299.99</span>
                            </div>
                            <button class="text-gray-600 dark:text-gray-400 hover:text-primary-light dark:hover:text-primary-dark transition">
                                <i class="fas fa-shopping-cart"></i>
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Product 4 -->
                <div class="bg-white dark:!bg-sky-900 rounded-lg overflow-hidden shadow-md hover:shadow-lg transition">
                    <div class="relative">
                        <img src="/images/fp4.avif" alt="Perfume" class="w-full h-48 object-cover">
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold text-lg mb-1">Luxury Perfume</h3>
                        <div class="flex items-center mb-2">
                            <div class="flex text-yellow-400">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <i class="far fa-star"></i>
                            </div>
                            <span class="text-gray-600 dark:text-gray-400 text-sm ml-2">(28)</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <div>
                                <span class="text-primary-light dark:text-primary-dark font-bold">$89.99</span>
                            </div>
                            <button class="text-gray-600 dark:text-gray-400 hover:text-primary-light dark:hover:text-primary-dark transition">
                                <i class="fas fa-shopping-cart"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Special Offers -->
    <section class="py-16 bg-gray-100 dark:bg-dark-800">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12">Special Offers</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Offer 1 -->
                <div class="bg-gradient-to-r from-purple-500 to-indigo-600 rounded-xl p-8 text-white shadow-lg">
                    <div class="flex flex-col md:flex-row items-center">
                        <div class="md:w-1/3 mb-6 md:mb-0 flex justify-center">
                            <div class="bg-white/20 rounded-full p-6">
                                <i class="fas fa-tag text-4xl"></i>
                            </div>
                        </div>
                        <div class="md:w-2/3 md:pl-6 text-center md:text-left">
                            <h3 class="text-2xl font-bold mb-2">Flash Sale!</h3>
                            <p class="mb-4">Up to 50% off on selected items. Limited time only!</p>
                            <div class="flex items-center justify-center md:justify-start space-x-2 mb-4">
                                <div class="bg-white/20 rounded p-2 text-center">
                                    <span class="font-bold block text-xl">02</span>
                                    <span class="text-xs">Days</span>
                                </div>
                                <div class="bg-white/20 rounded p-2 text-center">
                                    <span class="font-bold block text-xl">12</span>
                                    <span class="text-xs">Hours</span>
                                </div>
                                <div class="bg-white/20 rounded p-2 text-center">
                                    <span class="font-bold block text-xl">45</span>
                                    <span class="text-xs">Mins</span>
                                </div>
                            </div>
                            <a href="#" class="inline-block bg-white text-indigo-600 px-6 py-2 rounded-lg font-medium hover:bg-opacity-90 transition">Shop Now</a>
                        </div>
                    </div>
                </div>
                
                <!-- Offer 2 -->
                <div class="bg-gradient-to-r from-amber-500 to-pink-500 rounded-xl p-8 text-white shadow-lg">
                    <div class="flex flex-col md:flex-row items-center">
                        <div class="md:w-1/3 mb-6 md:mb-0 flex justify-center">
                            <div class="bg-white/20 rounded-full p-6">
                                <i class="fas fa-shipping-fast text-4xl"></i>
                            </div>
                        </div>
                        <div class="md:w-2/3 md:pl-6 text-center md:text-left">
                            <h3 class="text-2xl font-bold mb-2">Free Shipping</h3>
                            <p class="mb-4">On all orders over $100. No code needed!</p>
                            <p class="text-sm opacity-80 mb-4">*Applies to standard shipping in selected countries</p>
                            <a href="#" class="inline-block bg-white text-amber-600 px-6 py-2 rounded-lg font-medium hover:bg-opacity-90 transition">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter -->
    <section class="py-16 bg-sky-500 text-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold mb-4">Subscribe to Our Newsletter</h2>
            <p class="max-w-2xl mx-auto mb-8 opacity-90">Stay updated with our latest products, exclusive offers, and news. Subscribe to our newsletter today!</p>
            
            <div class="max-w-md mx-auto sm:flex">
                <input type="email" placeholder="Your email address" class="flex-grow px-4 py-3 sm:rounded-l-lg focus:outline-none text-gray-800 mb-1 sm:!mb-0">
                <button class="bg-dark-800 hover:bg-dark-900 px-6 py-3 sm:rounded-r-lg font-medium transition">Subscribe</button>
            </div>
            
            <p class="text-sm mt-4 opacity-80">We respect your privacy. Unsubscribe at any time.</p>
        </div>
    </section>
@endsection