<!-- resources/views/portfolio/index.blade.php -->
@extends('layouts.main')

@section('title', 'Portfolio')

@section('content')
<div class="min-h-screen bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
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
                        
                        <div class="aspect-w-16 aspect-h-9 bg-gray-100 rounded-lg mb-6">
                            <!-- Placeholder for portfolio preview image -->
                            <div class="flex items-center justify-center">
                                <svg class="h-16 w-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 012 2m0 10V7m0 10a2 2 0 002 2h2a2 2 0 002-2V7a2 2 0 00-2-2h-2a2 2 0 00-2 2" />
                                </svg>
                            </div>
                        </div>
                        
                        <div class="text-gray-700 mb-6">
                            <p>Click below to view the detailed portfolio document and case study.</p>
                        </div>
                        
                        <div class="flex justify-end">
                            <a href="{{ route('portfolio.show', $portfolio['id']) }}" 
                               class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                View Details
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection