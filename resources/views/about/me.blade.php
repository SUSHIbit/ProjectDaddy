<!-- resources/views/about/me.blade.php -->
@extends('layouts.main')

@section('title', 'About Me')

@section('content')
<div class="min-h-screen flex flex-col md:flex-row">
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
        
        <div class="mt-10">
            <a href="{{ route('contact') }}" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Contact Me
            </a>
        </div>
    </div>
</div>
@endsection