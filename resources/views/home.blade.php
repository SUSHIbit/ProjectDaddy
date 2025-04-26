<!-- resources/views/home.blade.php -->
@extends('layouts.main')

@section('content')
    <!-- Home/Landing Section -->
    <section id="home" class="min-h-screen">
        <div class="flex flex-col md:flex-row min-h-screen">
            <!-- Left Side - General Manager Image -->
            <div class="w-full md:w-1/2 min-h-[50vh] md:min-h-screen bg-gray-100 flex items-center justify-center">
                <img src="{{ asset($generalManager['image']) }}" alt="{{ $generalManager['name'] }}" 
                     class="object-cover h-full w-full" 
                     onerror="this.src='https://via.placeholder.com/800x1200?text=General+Manager'; this.onerror='';">
            </div>
            
            <!-- Right Side - Split Vertically -->
            <div class="w-full md:w-1/2 flex flex-col min-h-[50vh] md:min-h-screen">
                <!-- Top Section - Company Logo -->
                <div class="h-1/2 bg-white flex items-center justify-center p-8">
                    <img src="{{ asset($company['logo']) }}" alt="{{ $company['name'] }}" 
                         class="max-h-64 max-w-full" 
                         onerror="this.src='https://via.placeholder.com/400x200?text=Company+Logo'; this.onerror='';">
                </div>
                
                <!-- Bottom Section - About Me Button -->
                <div class="h-1/2 bg-gray-50 flex flex-col items-center justify-center p-8">
                    <h2 class="text-3xl font-bold mb-6 text-gray-800">{{ $generalManager['name'] }}</h2>
                    <h3 class="text-xl text-gray-600 mb-8">{{ $generalManager['title'] }}</h3>
                    
                    <div x-data="{ open: false }" class="w-full max-w-md">
                        <button @click="open = !open" 
                                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 px-6 rounded-lg shadow-lg transition duration-300 ease-in-out transform hover:scale-105 focus:outline-none"
                                x-text="open ? 'Hide Info' : 'Know About Me'">
                            Know About Me
                        </button>
                        
                        <div x-show="open" 
                             x-transition:enter="transition ease-out duration-300"
                             x-transition:enter-start="opacity-0 transform -translate-y-4"
                             x-transition:enter-end="opacity-100 transform translate-y-0"
                             x-transition:leave="transition ease-in duration-300"
                             x-transition:leave-start="opacity-100 transform translate-y-0"
                             x-transition:leave-end="opacity-0 transform -translate-y-4"
                             class="mt-6 bg-white p-6 rounded-lg shadow-lg">
                            <p class="text-gray-700 leading-relaxed">
                                {{ $generalManager['about'] }}
                            </p>
                            <div class="mt-4 flex justify-end">
                                <a href="#about-me" class="text-blue-600 hover:text-blue-800 font-medium"
                                   onclick="event.preventDefault(); document.querySelector(this.getAttribute('href')).scrollIntoView({behavior: 'smooth'});">
                                    Read more →
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Rest of your sections here -->
    <!-- About Me Section -->
    <section id="about-me" class="min-h-screen bg-white">
        <!-- Your existing about-me section code -->
    </section>

    <!-- About Company Section -->
    <section id="about-company" class="min-h-screen bg-gray-50">
        <!-- Your existing about-company section code -->
    </section>

    <!-- Company Detail Section -->
    <section id="company-detail" class="min-h-screen bg-white">
        <!-- Your existing company-detail section code -->
    </section>

    <!-- Portfolio Section -->
    <section id="portfolio" class="min-h-screen bg-gray-50 py-16">
        <!-- Your existing portfolio section code -->
    </section>

    <!-- Contact Section -->
    <section id="contact" class="min-h-screen bg-white py-16">
        <!-- Your existing contact section code -->
    </section>
@endsection