<!-- resources/views/portfolio/show.blade.php -->
@extends('layouts.main')

@section('title', $portfolio['title'])

@section('content')
<div class="min-h-screen flex flex-col md:flex-row">
    <!-- Left Side - PDF Viewer -->
    <div class="w-full md:w-2/3 min-h-[70vh] md:min-h-screen bg-gray-100 p-4">
        <div class="h-full w-full rounded-lg overflow-hidden shadow-lg">
            <object 
                data="{{ asset($portfolio['pdf_file']) }}" 
                type="application/pdf" 
                class="w-full h-full"
                onerror="this.outerHTML='<div class=\'h-full w-full flex items-center justify-center bg-gray-200\'><p class=\'text-gray-600\'>PDF preview not available. <a href=\'{{ asset($portfolio['pdf_file']) }}\' class=\'text-blue-600 underline\' target=\'_blank\'>Download PDF</a> to view.</p></div>'">
                <div class="h-full w-full flex items-center justify-center bg-gray-200">
                    <p class="text-gray-600">
                        PDF preview not available. 
                        <a href="{{ asset($portfolio['pdf_file']) }}" class="text-blue-600 underline" target="_blank">
                            Download PDF
                        </a> 
                        to view.
                    </p>
                </div>
            </object>
        </div>
    </div>
    
    <!-- Right Side - Portfolio Details -->
    <div class="w-full md:w-1/3 p-8 flex flex-col">
        <div class="mb-6">
            <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $portfolio['title'] }}</h1>
            <img src="{{ asset($portfolio['company_logo']) }}" alt="Company Logo" class="h-16 w-auto mb-6" 
                 onerror="this.src='https://via.placeholder.com/200x100?text=Logo'; this.onerror='';">
        </div>
        
        <!-- Example Portfolio Details - would be managed through admin in the full implementation -->
        <div class="prose prose-lg max-w-none text-gray-700 mb-6">
            <p class="mb-4">
                This portfolio showcases our successful implementation of strategic business solutions for a leading client in the industry. The project demonstrates our expertise in problem-solving, innovation, and delivering measurable results.
            </p>
            
            <h3 class="text-xl font-semibold text-gray-800 mt-6 mb-3">Project Highlights</h3>
            <ul class="space-y-2">
                <li class="flex items-start">
                    <svg class="h-5 w-5 text-blue-600 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <span>Increased operational efficiency by 35%</span>
                </li>
                <li class="flex items-start">
                    <svg class="h-5 w-5 text-blue-600 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <span>Reduced costs by 20% within 6 months</span>
                </li>
                <li class="flex items-start">
                    <svg class="h-5 w-5 text-blue-600 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <span>Implemented cutting-edge technology solutions</span>
                </li>
                <li class="flex items-start">
                    <svg class="h-5 w-5 text-blue-600 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <span>Developed a scalable framework for future growth</span>
                </li>
            </ul>
        </div>
        
        <div class="mt-auto space-y-4">
            <a href="{{ asset($portfolio['pdf_file']) }}" 
               class="inline-flex items-center justify-center w-full px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
               target="_blank">
                <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                </svg>
                Download PDF
            </a>
            
            <a href="{{ route('portfolio') }}" 
               class="inline-flex items-center justify-center w-full px-4 py-2 border border-gray-300 text-base font-medium rounded-md shadow-sm text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Back to Portfolio
            </a>
        </div>
    </div>
</div>
@endsection