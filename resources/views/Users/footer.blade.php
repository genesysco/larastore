 <!-- Footer -->
    <footer class="bg-dark-800 text-gray-300 pt-16 pb-8">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
                <!-- Column 1 -->
                <div>
                    <h3 class="text-white text-lg font-semibold mb-4">LaraStore</h3>
                    <p class="mb-4">Your premier destination for international shopping with quality products from around the world.</p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white transition"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white transition"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white transition"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white transition"><i class="fab fa-pinterest"></i></a>
                    </div>
                </div>
                
                <!-- Column 2 -->
                <div>
                    <h3 class="text-white text-lg font-semibold mb-4">Quick Links</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:text-white transition">Home</a></li>
                        <li><a href="#" class="hover:text-white transition">About Us</a></li>
                        <li><a href="#" class="hover:text-white transition">Shop</a></li>
                        <li><a href="#" class="hover:text-white transition">Blog</a></li>
                        <li><a href="#" class="hover:text-white transition">Contact</a></li>
                    </ul>
                </div>
                
                <!-- Column 3 -->
                <div>
                    <h3 class="text-white text-lg font-semibold mb-4">Customer Service</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:text-white transition">FAQs</a></li>
                        <li><a href="#" class="hover:text-white transition">Shipping Policy</a></li>
                        <li><a href="#" class="hover:text-white transition">Returns & Refunds</a></li>
                        <li><a href="#" class="hover:text-white transition">Track Order</a></li>
                        <li><a href="#" class="hover:text-white transition">Privacy Policy</a></li>
                    </ul>
                </div>
                
                <!-- Column 4 -->
                <div>
                    <h3 class="text-white text-lg font-semibold mb-4">Contact Us</h3>
                    <ul class="space-y-2">
                        <li class="flex items-start">
                            <i class="fas fa-map-marker-alt mt-1 mr-3"></i>
                            <span>123 Lara Store Street, Commerce City, WC 12345</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-phone-alt mr-3"></i>
                            <span>+1 (555) 123-4567</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-envelope mr-3"></i>
                            <span>info@LaraStore.com</span>
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="border-t border-gray-700 pt-8 flex flex-col md:flex-row justify-between items-center">
                <p>&copy; 2025 LaraStore. All rights reserved.</p>
                <div class="flex space-x-6 mt-4 md:mt-0">
                    <img src="/images/visa.webp" alt="Visa" class="h-6">
                    <img src="/images/masterCard.webp" alt="Mastercard" class="h-6">
                    <img src="/images/paypal.webp" alt="PayPal" class="h-6">
                    <img src="/images/applePay.webp" alt="Apple Pay" class="h-6">
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS for slider -->
    <script src="/js/jquery.js"></script>
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="/js/all.min.js"></script>
    <!-- Dark mode toggle -->
    <script src="/js/darkMode.js"></script>
    @yield('script')
</body>
</html>
