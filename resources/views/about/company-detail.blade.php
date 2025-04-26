<!-- resources/views/about/company-detail.blade.php -->
@extends('layouts.main')

@section('title', 'Company Detail')

@section('content')
<div class="min-h-screen flex flex-col md:flex-row">
    <!-- Left Side - YouTube Video -->
    <div class="w-full md:w-1/2 min-h-[50vh]">
        <div class="h-full flex items-center justify-center bg-white p-8">
            <div class="w-full max-w-2xl aspect-w-16 aspect-h-9">
                <iframe 
                    class="w-full h-full rounded-lg shadow-lg"
                    src="{{ $companyDetail['video_url'] }}" 
                    title="{{ $companyDetail['name'] }} Details"
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
            <h2 class="text-2xl md:text-3xl font-medium text-blue-600 mb-8">{{ $companyDetail['name'] }}</h2>
            
            <div class="prose prose-lg max-w-none text-gray-700">
                <p class="mb-6">
                    {{ $companyDetail['description'] }}
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
                
                <h3 class="text-xl font-semibold text-gray-800 mt-8 mb-4">Our Approach</h3>
                <p class="mb-4">
                    At {{ $companyDetail['name'] }}, we believe in a client-centered approach that focuses on understanding your unique challenges and delivering tailored solutions that drive real results. Our methodology combines proven strategies with innovative thinking to help you achieve your business objectives.
                </p>
                
                <h3 class="text-xl font-semibold text-gray-800 mt-8 mb-4">Our Team</h3>
                <p>
                    Our diverse team of experts brings together decades of industry experience, technical knowledge, and creative problem-solving abilities. We're passionate about what we do and committed to your success.
                </p>
            </div>
            
            <div class="mt-10">
                <a href="{{ route('portfolio') }}" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    View Portfolio
                </a>
            </div>
        </div>
    </div>
</div>
@endsection