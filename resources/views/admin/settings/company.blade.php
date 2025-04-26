@extends('admin.layout')

@section('header', 'Company Settings')

@section('content')
<div class="p-6">
    <div class="mb-6">
        <h2 class="text-lg font-medium text-gray-900">Company Information</h2>
        <p class="mt-1 text-sm text-gray-600">Update the company details displayed on the website.</p>
    </div>

    <form action="{{ route('admin.settings.company.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        
        <div class="bg-white shadow-sm rounded-lg overflow-hidden">
            <div class="px-4 py-5 sm:p-6">
                <div class="grid grid-cols-1 gap-6">
                    <!-- Company Name -->
                    <div>
                        <label for="company_name" class="block text-sm font-medium text-gray-700">Company Name</label>
                        <div class="mt-1">
                            <input type="text" name="company_name" id="company_name" value="{{ old('company_name', $settings['company_name'] ?? '') }}" class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md @error('company_name') border-red-300 text-red-900 placeholder-red-300 focus:outline-none focus:ring-red-500 focus:border-red-500 @enderror" placeholder="Company Name">
                        </div>
                        @error('company_name')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Company Logo -->
                    <div>
                        <label for="company_logo" class="block text-sm font-medium text-gray-700">Company Logo</label>
                        <div class="mt-1 flex items-center">
                            @if(isset($settings['company_logo']) && $settings['company_logo'])
                                <div class="relative">
                                    <img src="{{ asset($settings['company_logo']) }}" alt="Current Company Logo" class="h-20 w-auto object-contain">
                                    <div class="mt-2 text-sm text-gray-500">Current logo</div>
                                </div>
                            @else
                                <span class="inline-block h-12 w-12 overflow-hidden bg-gray-100">
                                    <svg class="h-full w-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 12h7a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-7m0 14h7a2 2 0 0 0 2-2v-3a2 2 0 0 0-2-2h-7m0-4h-7a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h7m0 4h-7a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h7" />
                                    </svg>
                                </span>
                            @endif
                            <input type="file" name="company_logo" id="company_logo" accept="image/png, image/jpeg, image/jpg, image/gif" class="ml-5 bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 @error('company_logo') border-red-300 text-red-900 placeholder-red-300 focus:outline-none focus:ring-red-500 focus:border-red-500 @enderror">
                        </div>
                        <p class="mt-2 text-sm text-gray-500">PNG, JPG, GIF up to 2MB. Leave blank to keep current logo.</p>
                        @error('company_logo')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- About Company Video URL -->
                    <div>
                        <label for="company_about_video" class="block text-sm font-medium text-gray-700">About Company Video URL</label>
                        <div class="mt-1">
                            <input type="url" name="company_about_video" id="company_about_video" value="{{ old('company_about_video', $settings['company_about_video'] ?? '') }}" class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md @error('company_about_video') border-red-300 text-red-900 placeholder-red-300 focus:outline-none focus:ring-red-500 focus:border-red-500 @enderror" placeholder="https://www.youtube.com/embed/VIDEO_ID">
                        </div>
                        <p class="mt-2 text-sm text-gray-500">Enter a YouTube embed URL (e.g., https://www.youtube.com/embed/dQw4w9WgXcQ)</p>
                        @error('company_about_video')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Company Detail Video URL -->
                    <div>
                        <label for="company_detail_video" class="block text-sm font-medium text-gray-700">Company Detail Video URL</label>
                        <div class="mt-1">
                            <input type="url" name="company_detail_video" id="company_detail_video" value="{{ old('company_detail_video', $settings['company_detail_video'] ?? '') }}" class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md @error('company_detail_video') border-red-300 text-red-900 placeholder-red-300 focus:outline-none focus:ring-red-500 focus:border-red-500 @enderror" placeholder="https://www.youtube.com/embed/VIDEO_ID">
                        </div>
                        <p class="mt-2 text-sm text-gray-500">Enter a YouTube embed URL (e.g., https://www.youtube.com/embed/dQw4w9WgXcQ)</p>
                        @error('company_detail_video')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Company Description -->
                    <div>
                        <label for="company_description" class="block text-sm font-medium text-gray-700">Company Description</label>
                        <div class="mt-1">
                            <textarea id="company_description" name="company_description" rows="6" class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md @error('company_description') border-red-300 text-red-900 placeholder-red-300 focus:outline-none focus:ring-red-500 focus:border-red-500 @enderror" placeholder="About the company">{{ old('company_description', $settings['company_description'] ?? '') }}</textarea>
                        </div>
                        @error('company_description')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Save Settings
                </button>
            </div>
        </div>
    </form>
</div>
@endsection