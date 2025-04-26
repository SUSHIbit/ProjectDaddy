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
                                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 px-6 rounded-lg shadow-lg transition duration-300 ease-in-out transform hover:scale-105 focus:outline-none">
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

    <!-- About Me Section -->
    <section id="about-me" class="min-h-screen bg-white">
        <div class="flex flex-col md:flex-row min-h-screen">
            <!-- Left Side - General Manager Image -->
            <div class="w-full md:w-1/3 min-h-[50vh] md:min-h-screen bg-gray-100 flex items-center justify-center p-8">
                <img src="{{ asset($generalManager['image']) }}" alt="{{ $generalManager['name'] }}" 
                     class="object-cover max-h-full max-w-full rounded-lg shadow-xl" 
                     onerror="this.src='https://via.placeholder.com/600x900?text=General+Manager'; this.onerror='';">
            </div>
            
            <!-- Right Side - About Me Content -->
            <div class="w-full md:w-2/3 flex flex-col p-8 md:p-16 justify-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-8 text-gray-800">About Me</h1>
                
                <div class="mb-8">
                    <h2 class="text-2xl md:text-3xl font-semibold text-gray-700 mb-2">{{ $generalManager['name'] }}</h2>
                    <h3 class="text-xl text-blue-600 mb-6">{{ $generalManager['title'] }}</h3>
                </div>
                
                <div class="prose prose-lg max-w-none">
                    <p class="text-gray-700 leading-relaxed mb-6">
                        {{ $generalManager['about'] }}
                    </p>
                    
                    <!-- Example additional content - this would be dynamic in the admin module -->
                    <h3 class="text-xl font-semibold text-gray-800 mt-8 mb-4">Experience</h3>
                    <ul class="space-y-4">
                        <li class="flex">
                            <div class="mr-4 flex-shrink-0">
                                <svg class="h-6 w-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-medium text-gray-900">CEO & Co-Founder</h4>
                                <p class="text-gray-600">Acme Corporation, 2015 - Present</p>
                            </div>
                        </li>
                        <li class="flex">
                            <div class="mr-4 flex-shrink-0">
                                <svg class="h-6 w-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-medium text-gray-900">VP of Operations</h4>
                                <p class="text-gray-600">XYZ Industries, 2010 - 2015</p>
                            </div>
                        </li>
                        <li class="flex">
                            <div class="mr-4 flex-shrink-0">
                                <svg class="h-6 w-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-medium text-gray-900">Senior Manager</h4>
                                <p class="text-gray-600">ABC Company, 2005 - 2010</p>
                            </div>
                        </li>
                    </ul>
                    
                    <h3 class="text-xl font-semibold text-gray-800 mt-8 mb-4">Education</h3>
                    <ul class="space-y-4">
                        <li class="flex">
                            <div class="mr-4 flex-shrink-0">
                                <svg class="h-6 w-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-medium text-gray-900">MBA, Business Administration</h4>
                                <p class="text-gray-600">Harvard Business School, 2003 - 2005</p>
                            </div>
                        </li>
                        <li class="flex">
                            <div class="mr-4 flex-shrink-0">
                                <svg class="h-6 w-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-medium text-gray-900">Bachelor of Science, Engineering</h4>
                                <p class="text-gray-600">MIT, 1999 - 2003</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- About Company Section -->
    <section id="about-company" class="min-h-screen bg-gray-50">
        <div class="flex flex-col md:flex-row min-h-screen">
            <!-- Left Side - Title -->
            <div class="w-full md:w-1/2 flex items-center justify-center bg-gray-50 p-8 md:p-16">
                <div class="max-w-lg">
                    <h1 class="text-4xl md:text-6xl font-bold text-gray-800 mb-6">About Company</h1>
                    <h2 class="text-2xl md:text-3xl font-medium text-blue-600 mb-8">{{ $company['name'] }}</h2>
                    
                    <!-- Example Company Description - would be managed through admin in the full implementation -->
                    <div class="prose prose-lg max-w-none text-gray-700">
                        <p class="mb-4">
                            Founded in 2010, {{ $company['name'] }} has been at the forefront of innovation in our industry, delivering exceptional products and services to our clients worldwide.
                        </p>
                        <p class="mb-4">
                            Our mission is to provide cutting-edge solutions that meet the evolving needs of businesses in an increasingly digital world. With a team of dedicated professionals, we combine technical expertise with creative thinking to drive meaningful results.
                        </p>
                        <p>
                            We believe in building lasting relationships with our clients, understanding their unique challenges, and working collaboratively to achieve their goals.
                        </p>
                    </div>
                </div>
            </div>
            
            <!-- Right Side - YouTube Video -->
            <div class="w-full md:w-1/2 min-h-[50vh]">
                <div class="h-full flex items-center justify-center bg-white p-8">
                    <div class="w-full max-w-2xl aspect-w-16 aspect-h-9">
                        <iframe 
                            class="w-full h-full rounded-lg shadow-lg"
                            src="{{ $company['about_video_url'] }}" 
                            title="About {{ $company['name'] }}"
                            frameborder="0" 
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                            allowfullscreen>
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Company Detail Section -->
    <section id="company-detail" class="min-h-screen bg-white">
        <div class="flex flex-col md:flex-row min-h-screen">
            <!-- Left Side - YouTube Video -->
            <div class="w-full md:w-1/2 min-h-[50vh]">
                <div class="h-full flex items-center justify-center bg-white p-8">
                    <div class="w-full max-w-2xl aspect-w-16 aspect-h-9">
                        <iframe 
                            class="w-full h-full rounded-lg shadow-lg"
                            src="{{ $company['detail_video_url'] }}" 
                            title="{{ $company['name'] }} Details"
                            frameborder="0" 
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                            allowfullscreen>
                        </iframe>
                    </div>
                </div>
            </div>
            
            <!-- Right Side - Title and Details -->
            <div class="w-full md:w-1/2 flex items-center justify-center bg-gray-50 p-8 md:p-16">
                <div class="max-w-lg">
                    <h1 class="text-4xl md:text-6xl font-bold text-gray-800 mb-6">Company Detail</h1>
                    <h2 class="text-2xl md:text-3xl font-medium text-blue-600 mb-8">{{ $company['name'] }}</h2>
                    
                    <div class="prose prose-lg max-w-none text-gray-700">
                        <p class="mb-6">
                            {{ $company['description'] }}
                        </p>
                        
                        <!-- Example Company Details - would be managed through admin in the full implementation -->
                        <h3 class="text-xl font-semibold text-gray-800 mt-8 mb-4">Our Services</h3>
                        <ul class="space-y-3">
                            <li class="flex items-start">
                                <svg class="h-6 w-6 text-blue-600 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Strategic Business Consulting</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="h-6 w-6 text-blue-600 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Digital Transformation Solutions</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="h-6 w-6 text-blue-600 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Technology Implementation</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="h-6 w-6 text-blue-600 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Process Optimization</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Portfolio Section -->
    <section id="portfolio" class="min-h-screen bg-gray-50 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">Portfolio</h1>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Explore our collection of work samples and case studies showcasing our expertise and achievements.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-8">
                @foreach ($portfolios as $portfolio)
                    <div class="bg-white overflow-hidden shadow-lg rounded-lg transition duration-300 ease-in-out transform hover:-translate-y-1 hover:shadow-xl">
                        <div class="p-6">
                            <div class="flex items-center justify-between mb-6">
                                <h3 class="text-2xl font-bold text-gray-800">{{ $portfolio['title'] }}</h3>
                                <img src="{{ asset($portfolio['company_logo']) }}" alt="Company Logo" class="h-12 w-auto" 
                                     onerror="this.src='https://via.placeholder.com/100x50?text=Logo'; this.onerror='';">
                            </div>
                            
                            <div class="flex flex-col md:flex-row bg-gray-100 rounded-lg overflow-hidden mb-6">
                                <!-- PDF Preview -->
                                <div class="w-full md:w-1/2 h-72 bg-gray-200 flex items-center justify-center p-4">
                                    <object 
                                        data="{{ asset($portfolio['pdf_file']) }}" 
                                        type="application/pdf" 
                                        class="w-full h-full"
                                        onerror="this.outerHTML='<div class=\'h-full w-full flex items-center justify-center bg-gray-200\'><p class=\'text-gray-600\'>PDF preview not available.</p></div>'">
                                        <div class="h-full w-full flex items-center justify-center bg-gray-200">
                                            <p class="text-gray-600">
                                                PDF preview not available.
                                            </p>
                                        </div>
                                    </object>
                                </div>
                                
                                <!-- Portfolio Details -->
                                <div class="w-full md:w-1/2 p-4">
                                    <h4 class="text-lg font-semibold mb-2">Project Highlights</h4>
                                    <ul class="space-y-2 mb-4">
                                        <li class="flex items-start">
                                            <svg class="h-5 w-5 text-blue-600 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                            </svg>
                                            <span>Increased efficiency by 35%</span>
                                        </li>
                                        <li class="flex items-start">
                                            <svg class="h-5 w-5 text-blue-600 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                            </svg>
                                            <span>Reduced costs by 20%</span>
                                        </li>
                                        <li class="flex items-start">
                                            <svg class="h-5 w-5 text-blue-600 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                            </svg>
                                            <span>Implemented new technology</span>
                                        </li>
                                    </ul>
                                    
                                    <a href="{{ asset($portfolio['pdf_file']) }}" 
                                       class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                                       target="_blank">
                                        <svg class="h-4 w-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                        </svg>
                                        Download PDF
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="min-h-screen bg-white py-16">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h1 class="text-4xl font-bold text-gray-800 mb-4">Contact Me</h1>
                <p class="text-xl text-gray-600">
                    Have a question or interested in working together? Send me a message.
                </p>
            </div>
            
            <div class="bg-white shadow-xl rounded-lg overflow-hidden">
                <!-- Success Message -->
                @if (session('success'))
                    <div class="bg-green-50 border-l-4 border-green-500 p-4 mb-6">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm text-green-700">
                                    {{ session('success') }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endif
                
                <div class="md:flex">
                    <!-- Contact Info -->
                    <div class="w-full md:w-1/3 bg-blue-600 text-white p-8">
                        <h2 class="text-2xl font-bold mb-6">Contact Information</h2>
                        
                        <div class="space-y-6">
                            <div class="flex items-start">
                                <svg class="h-6 w-6 mr-3 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                                <div>
                                    <p class="font-medium">Phone</p>
                                    <p class="mt-1">+1 (555) 123-4567</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start">
                                <svg class="h-6 w-6 mr-3 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                <div>
                                    <p class="font-medium">Email</p>
                                    <p class="mt-1">contact@example.com</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start">
                                <svg class="h-6 w-6 mr-3 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <div>
                                    <p class="font-medium">Office</p>
                                    <p class="mt-1">123 Business Avenue, Suite 100<br>San Francisco, CA 94107</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mt-12">
                            <h3 class="text-xl font-semibold mb-4">Connect with me</h3>
                            <div class="flex space-x-4">
                                <a href="#" class="text-white hover:text-blue-200">
                                    <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                                <a href="#" class="text-white hover:text-blue-200">
                                    <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                                    </svg>
                                </a>
                                <a href="#" class="text-white hover:text-blue-200">
                                    <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd" d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Contact Form -->
                    <div class="w-full md:w-2/3 p-8">
                        <h2 class="text-2xl font-bold text-gray-800 mb-6">Send a Message</h2>
                        
                        <form action="{{ route('contact.store') }}" method="POST">
                            @csrf
                            
                            <div class="mb-6">
                                <label for="name" class="block text-gray-700 text-sm font-medium mb-2">Name</label>
                                <input 
                                    type="text" 
                                    name="name" 
                                    id="name" 
                                    value="{{ old('name') }}"
                                    class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md @error('name') border-red-500 @enderror" 
                                    required>
                                    
                                @error('name')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div class="mb-6">
                                <label for="email" class="block text-gray-700 text-sm font-medium mb-2">Email</label>
                                <input 
                                    type="email" 
                                    name="email" 
                                    id="email" 
                                    value="{{ old('email') }}"
                                    class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md @error('email') border-red-500 @enderror" 
                                    required>
                                    
                                @error('email')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div class="mb-6">
                                <label for="message" class="block text-gray-700 text-sm font-medium mb-2">Message</label>
                                <textarea 
                                    name="message" 
                                    id="message" 
                                    rows="5"
                                    class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md @error('message') border-red-500 @enderror" 
                                    required>{{ old('message') }}</textarea>
                                    
                                @error('message')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div class="flex justify-end">
                                <button 
                                    type="submit"
                                    class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                    Send Message
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>