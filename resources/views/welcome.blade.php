<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>🧼 DJ Laundry</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <!-- Add FontAwesome for better icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <style>
            /* Custom Animations */
            @keyframes float {
                0% { transform: translateY(0px); }
                50% { transform: translateY(-10px); }
                100% { transform: translateY(0px); }
            }
            .animate-float {
                animation: float 3s ease-in-out infinite;
            }
            .hover-scale {
                transition: transform 1s ease;
            }
            .hover-scale:hover {
                transform: scale(1.05);
            }
            .fade-in {
                animation: fadeIn 1s ease-in-out;
            }
            @keyframes fadeIn {
                0% { opacity: 0; }
                100% { opacity: 1; }
            }
            .hover-highlight-scale {
                transition: transform 0.3s ease, background-color 0.3s ease;
            }
            .hover-highlight-scale:hover {
                transform: scale(1.05);
                background-color: #f0f4f8;
            }
            .hover-outline-blue {
                transition: transform 0.3s ease, outline 0.3s ease, background-color 0.3s ease;
            }
            .hover-outline-blue:hover {
                transform: scale(1.05);
                outline: 2px solid #2563eb; /* Blue color similar to the services section */
                background-color: #e0f2fe; /* Light blue background color on hover */
            }
 
            .show-active {
                max-height: 500px; /* Adjust as needed */
                opacity: 1;
                transition: max-height 0.5s ease, opacity 0.5s ease;
            }
            .show-inactive {
                max-height: 0;
                opacity: 0;
                transition: max-height 0.5s ease, opacity 0.5s ease;
                overflow: hidden;
            }
        </style>
        <script>
            // Function to initialize smooth scrolling
            function initializeSmoothScrolling() {
                document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                    anchor.addEventListener('click', function(e) {
                        e.preventDefault();
                        const targetId = this.getAttribute('href');
                        const targetElement = document.querySelector(targetId);
                        
                        // Hide all elements first
                        document.querySelectorAll('.show-active').forEach(el => {
                            el.classList.remove('show-active');
                            el.classList.add('show-inactive');
                        });

                        // Determine which element to show based on the target
                        if (targetElement) {  // Add null check
                            if (targetElement.id === 'terms') {
                                targetElement.classList.remove('show-inactive');
                                targetElement.classList.add('show-active');
                            } else if (targetElement.id === 'privacy') {
                                targetElement.classList.remove('show-inactive');
                                targetElement.classList.add('show-active');
                            } else {
                                // Default to showing terms if no specific target
                                const termsElement = document.getElementById('terms');
                                if (termsElement) {  // Add null check
                                    termsElement.classList.remove('show-inactive');
                                    termsElement.classList.add('show-active');
                                }
                            }

                            // Smooth scrolling for navigation links
                            targetElement.scrollIntoView({ behavior: 'smooth' });
                        }
                    });
                });
            }

            // Initialize on DOMContentLoaded
            document.addEventListener('DOMContentLoaded', function() {
                initializeSmoothScrolling();
                
                // Add fade-in animation on page load
                document.querySelector('body').classList.add('fade-in');
            });

            // Re-initialize on popstate (browser back/forward)
            window.addEventListener('popstate', function() {
                initializeSmoothScrolling();
            });

            // Optional: Handle page cache restoration
            if (document.readyState === 'complete') {
                initializeSmoothScrolling();
            }
        </script>
        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    </head>
    <body class="antialiased font-sans fade-in">
        <!-- Navigation - Enhanced with better styling and interactions -->
        <nav x-data="{ open: false }" class="bg-white/90 backdrop-blur-md shadow-lg fixed w-full z-50 transition-all duration-300">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-20">
                    <!-- Logo and Brand -->
                    <div class="flex items-center logo-container justify-between">
                        <a href="/" class="flex items-center space-x-3 hover:opacity-75 transition-opacity duration-150">
                            <i class="fas fa-washer text-3xl text-blue-600"></i>
                            <span class="text-2xl font-bold bg-gradient-to-r from-blue-600 to-blue-800 bg-clip-text text-transparent">
                                <i class="fa-solid fa-soap"></i> Dj Laundry shop
                            </span>
                        </a>
                        <!-- Mobile Navigation -->
                        <div class="sm:hidden ml-auto absolute right-4">
                            <button @click="open = !open" class="flex items-center px-3 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-200">
                                <i class="fas fa-bars"></i>
                            </button>
                        </div>
                        <!-- Mobile Menu -->
                        <div x-show="open" @click.away="open = false" class="absolute right-0 mt-1 w-48 bg-white rounded-md shadow-lg z-50" style="margin-right: 1rem; top: 100%;">
                            <a href="#hero" @click="open = false" class="block px-4 py-2 text-gray-700 hover:bg-blue-600 hover:text-white">Home</a>
                            <a href="#services" @click="open = false" class="block px-4 py-2 text-gray-700 hover:bg-blue-600 hover:text-white">Services</a>
                            <a href="#contact" @click="open = false" class="block px-4 py-2 text-gray-700 hover:bg-blue-600 hover:text-white">Contact</a>
                        </div>
                    </div>

                    <!-- Desktop Navigation -->
                    <div class="hidden sm:flex sm:items-center sm:space-x-8">
                        <a href="#hero" 
                           class="text-gray-700 hover:text-blue-600 px-3 py-2 text-sm font-medium transition-colors duration-200 relative group">
                            <span>Home</span>
                            <span class="absolute bottom-0 left-0 w-full h-0.5 bg-blue-600 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-200"></span>
                        </a>
                        <a href="#services" 
                           class="text-gray-700 hover:text-blue-600 px-3 py-2 text-sm font-medium transition-colors duration-200 relative group">
                            <span>Services</span>
                            <span class="absolute bottom-0 left-0 w-full h-0.5 bg-blue-600 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-200"></span>
                        </a>
                        <a href="#contact" 
                           class="text-gray-700 hover:text-blue-600 px-3 py-2 text-sm font-medium transition-colors duration-200 relative group">
                            <span>Contact</span>
                            <span class="absolute bottom-0 left-0 w-full h-0.5 bg-blue-600 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-200"></span>
                        </a>

                </div>
            </div>
        </nav>

        <!-- Hero Section - Enhanced with gradient and animation -->
        <div id="hero" class="relative bg-gradient-to-r from-blue-600 via-blue-500 to-indigo-600 pt-24 overflow-hidden">
            <div class="absolute inset-0 bg-[url('/public/grid.svg')] bg-center [mask-image:linear-gradient(180deg,white,rgba(255,255,255,0))]"></div>
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 relative">
                <div class="grid lg:grid-cols-2 gap-12 items-center">
                    <div class="text-white">
                        <h1 class="text-4xl md:text-5xl font-bold mb-6 animate-float">P-4 ORIGINAL POBLACION, TAGBINA, SURIGAO DEL SUR</h1>
                        <p class="text-xl mb-8 text-blue-100">Experience premium laundry care at <span class="bg-white text-blue-600 px-2 py-1 rounded-lg">DJ Laundry Shop</span></p>
                       
                    </div>
                    <div class="space-y-6 border border-white p-5">
                        <!-- Image and Map Carousel -->
                        <div x-data="{ 
                            activeSlide: 0,
                            slides: [0, 1, 2], // Ensure this matches the number of slides
                            init() {
                                // Auto advance slides every 5 seconds
                                setInterval(() => {
                                    this.nextSlide();
                                }, 5000);
                            },
                            nextSlide() {
                                this.activeSlide = (this.activeSlide + 1) % this.slides.length;
                            },
                            prevSlide() {
                                this.activeSlide = (this.activeSlide - 1 + this.slides.length) % this.slides.length;
                            }
                        }" class="relative rounded-lg overflow-hidden shadow-2xl">
                            <!-- Carousel container -->
                            <div class="relative h-[300px]">
                                <!-- Slide 1 -->
                                <div x-show="activeSlide === 0" 
                                     x-transition:enter="transition ease-out duration-300"
                                     x-transition:enter-start="opacity-0 transform translate-x-full"
                                     x-transition:enter-end="opacity-100 transform translate-x-0"
                                     x-transition:leave="transition ease-in duration-300"
                                     x-transition:leave-start="opacity-100 transform translate-x-0"
                                     x-transition:leave-end="opacity-0 transform -translate-x-full"
                                     class="absolute inset-0">
                                    <img src="{{ asset('storage/images/dj_laundry.png') }}" 
                                         alt="DJ Laundry" 
                                         class="w-full h-full object-cover">
                                </div>
                                <!-- Slide 2 -->
                                <div x-show="activeSlide === 1"
                                     x-transition:enter="transition ease-out duration-300"
                                     x-transition:enter-start="opacity-0 transform translate-x-full"
                                     x-transition:enter-end="opacity-100 transform translate-x-0"
                                     x-transition:leave="transition ease-in duration-300"
                                     x-transition:leave-start="opacity-100 transform translate-x-0"
                                     x-transition:leave-end="opacity-0 transform -translate-x-full"
                                     class="absolute inset-0">
                                    <img src="{{ asset('storage/images/laundry_machine.webp') }}" 
                                         alt="Laundry Machine" 
                                         class="w-full h-full object-cover">
                                </div>
                                <!-- Slide 3 - Google Map -->
                                <div x-show="activeSlide === 2"
                                     x-transition:enter="transition ease-out duration-300"
                                     x-transition:enter-start="opacity-0 transform translate-x-full"
                                     x-transition:enter-end="opacity-100 transform translate-x-0"
                                     x-transition:leave="transition ease-in duration-300"
                                     x-transition:leave-start="opacity-100 transform translate-x-0"
                                     x-transition:leave-end="opacity-0 transform -translate-x-full"
                                     class="absolute inset-0">
                                    <iframe class="w-full h-full" 
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15809.115830731344!2d126.17387721766725!3d8.447222115657392!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x32ff8bea37e3b73f%3A0x4e5f34a9c5e2f9ab!2sP-4%20Original%20Poblacion%2C%20Tagbina%2C%20Surigao%20del%20Sur!5e0!3m2!1sen!2sph!4v1709799031099!5m2!1sen!2sph" 
                                        style="border: 0;" 
                                        allowfullscreen="" 
                                        loading="lazy" 
                                        referrerpolicy="no-referrer-when-downgrade">
                                    </iframe>
                                </div>
                            </div>

                            <!-- Updated Arrow Controls -->
                            <button @click="prevSlide()" 
                                    class="absolute left-2 top-1/2 -translate-y-1/2 bg-white/30 hover:bg-white/50 rounded-full p-2 transition-all duration-300">
                                <i class="fas fa-chevron-left text-white"></i>
                            </button>
                            <button @click="nextSlide()" 
                                    class="absolute right-2 top-1/2 -translate-y-1/2 bg-white/30 hover:bg-white/50 rounded-full p-2 transition-all duration-300">
                                <i class="fas fa-chevron-right text-white"></i>
                            </button>

                            <!-- Updated Carousel Controls -->
                            <div class="absolute bottom-4 left-0 right-0 flex justify-center space-x-2">
                                <template x-for="(slide, index) in slides" :key="index">
                                    <button @click="activeSlide = index" 
                                            :class="{ 'bg-white': activeSlide === index, 'bg-white/50': activeSlide !== index }"
                                            class="w-3 h-3 rounded-full transition-all duration-300"></button>
                                </template>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Services Section -->
        <div id="services" class="py-24 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl font-bold text-center mb-12">Our Services</h2>
                <div class="grid md:grid-cols-3 gap-8">
                    <div class="bg-white p-6 rounded-lg shadow-lg transition-transform transform hover:scale-105 hover:shadow-xl hover:outline hover:outline-2 hover:outline-blue-600">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 20h16M4 4h16M4 10h16M4 16h16"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Wash & Fold</h3>
                        <p class="text-gray-600">Professional washing, drying, and folding services for all your laundry needs.</p>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-lg transition-transform transform hover:scale-105 hover:shadow-xl hover:outline hover:outline-2 hover:outline-blue-600">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3v18h18V3H3zm3 3h12v12H6V6zm3 3v6h6V9H9z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Dry Cleaning</h3>
                        <p class="text-gray-600">Professional dry cleaning services for delicate fabrics and garments.</p>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-lg transition-transform transform hover:scale-105 hover:shadow-xl hover:outline hover:outline-2 hover:outline-blue-600">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 2v20M17 2v20M7 2h10M7 22h10"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Stain Removal</h3>
                        <p class="text-gray-600">Professional stain removal services to restore your clothes to their original condition.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact Section -->
        <div id="contact" class="py-10 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl font-bold text-center mb-12">Fill up now</h2>
               
                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                @if (session('success'))
                <script>
                    Swal.fire({
                        position: "center",
                        icon: "success",
                        title: "  {{ session('success') }}",
                        showConfirmButton: false,
                        timer: 2500
                    });
                </script>

      
        @endif

        <form method="POST" action="Customer/store" class="p-9 bg-blue-800 rounded-md w-full">
            @csrf
        
            <div class="mb-4">
                <label for="name" class="block font-medium text-yellow-100">Full Name</label>
                <input type="text" id="name" name="name" class="w-full border rounded p-2 bg-gray-800 text-white" placeholder="first-name, last-name" value="{{ old('name') }}" required>
                @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label  class="block font-medium text-yellow-100">Email</label>
                <input type="email"  name="email" class="w-full border rounded p-2 bg-gray-800 text-yellow-100" value="{{ old('date_of_birth') }}" required>
                @error('email') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label  class="block font-medium text-yellow-100">Permanet Address</label>
                <input type="text"  name="permanent_address" class="w-full border rounded p-2 bg-gray-800 text-white" value="{{ old('permanent_address') }}">
                @error('permanent_address') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label  class="block font-medium text-yellow-100">Phone Number</label>
                <input type="number"  name="phone_number" class="w-full border rounded p-2 bg-gray-800 text-white" value="{{ old('phone_number') }}">
                @error('phone_number') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label  class="block font-medium text-yellow-100">Clothes Type</label>
                <select  name="clothes_type" class="w-full border rounded p-2 bg-gray-800 text-yellow-100" value="{{ old('clothes_type') }}"required>
                    <option value="">Select Type</option>
                    <option value="Cotton">Cotton</option>
                    <option value="Silk">Silk</option>
                    <option value="Wool">Wool</option>

                </select>
                @error('clothes_type') <span class="text-red-500 text-yellow-100">{{ $message }}</span> @enderror
            </div>

            <button type="submit" class="w-full rounded-sm bg-yellow-500 text-white p-2 rounded">Submit</button>
        </form>

                    </div>
                </div>
            </div>
        </div>

        <div>
            <!-- Terms and Services Section -->
            <div id="terms" class="py-8 bg-white border border-gray-300 rounded-lg show-inactive">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                    <h2 class="text-3xl font-bold mb-12">
                        <i class="fas fa-file-contract text-blue-600 w-6 h-6 mr-2"></i>
                        Terms and Services
                    </h2>
                    <p class="text-gray-600 mb-6">Welcome to DJ Laundry, where we strive to provide you with the highest quality laundry services tailored to your needs. By using our services, you agree to the following terms and conditions, which are designed to ensure a smooth and satisfactory experience for all our customers. Please take a moment to review these terms carefully to understand your rights and responsibilities while using our services...</p>
                </div>
            </div>
            <div id="privacy" class="py-8 bg-white border border-gray-300 rounded-lg show-active">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                    <h2 class="text-3xl font-bold mb-12">
                        <i class="fas fa-user-shield text-blue-600 w-6 h-6 mr-2"></i>
                        Privacy Policy
                    </h2>
                    <p class="text-gray-600 mb-6">At DJ Laundry, we prioritize your privacy. This privacy policy outlines the types of personal information we collect, how we utilize it, and the measures we take to safeguard your data. We are committed to ensuring that your information is handled with the utmost care and respect, and we encourage you to read through this policy to understand our practices.</p>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="bg-blue-600 py-8 text-center text-sm text-white">
            <div class="container mx-auto">
                <p class="mb-4">Laundry System v1.0</p>
                <div class="flex justify-center space-x-4">
                    <a href="#privacy" class="text-gray-400 hover:text-white">Privacy Policy</a>
                    <a href="#terms" class="text-gray-400 hover:text-white">Terms of Service</a>
                    <a href="#contact" class="text-gray-400 hover:text-white">Contact Us</a>
                </div>
                <div class="mt-4">
                    <p class="text-gray-400">&copy; 2023 DJ Laundry. All rights reserved.</p>
                </div>
            </div>
        </footer>
    </body>
</html>

