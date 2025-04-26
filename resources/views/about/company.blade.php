<!-- resources/views/about/company.blade.php -->
@extends('layouts.main')

@section('title', 'About Company')

@section('content')
<div class="min-h-screen flex flex-col md:flex-row">
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
            
            <div class="mt-10">
                <a href="{{ route('company.detail') }}" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Learn More
                </a>
            </div>
        </div>
    </div>
    
    <!-- Right Side - YouTube Video -->
    <div class="w-full md:w-1/2 min-h-[50vh]">
        <div class="h-full flex items-center justify-center bg-white p-8">
            <div class="w-full max-w-2xl aspect-w-16 aspect-h-9">
                <iframe 
                    class="w-full h-full rounded-lg shadow-lg"
                    src="{{ $company['video_url'] }}" 
                    title="About {{ $company['name'] }}"
                    frameborder="0" 
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                    allowfullscreen>
                </iframe>
            </div>
        </div>
    </div>
</div>
@endsection