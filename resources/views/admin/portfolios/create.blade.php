@extends('admin.layout')

@section('header', 'Add Portfolio')

@section('content')
<div class="p-6">
    <form action="{{ route('admin.portfolios.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        
        <div class="bg-white shadow-sm rounded-lg overflow-hidden">
            <div class="px-4 py-5 sm:p-6">
                <div class="grid grid-cols-1 gap-6">
                    <!-- Title -->
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                        <div class="mt-1">
                            <input type="text" name="title" id="title" value="{{ old('title') }}" class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md @error('title') border-red-300 text-red-900 placeholder-red-300 focus:outline-none focus:ring-red-500 focus:border-red-500 @enderror" placeholder="Portfolio title">
                        </div>
                        @error('title')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Company Logo -->
                    <div>
                        <label for="company_logo" class="block text-sm font-medium text-gray-700">Company Logo</label>
                        <div class="mt-1 flex items-center">
                            <span class="inline-block h-12 w-12 rounded-full overflow-hidden bg-gray-100">
                                <svg class="h-full w-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                            </span>
                            <input type="file" name="company_logo" id="company_logo" accept="image/png, image/jpeg, image/jpg, image/gif" class="ml-5 bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 @error('company_logo') border-red-300 text-red-900 placeholder-red-300 focus:outline-none focus:ring-red-500 focus:border-red-500 @enderror">
                        </div>
                        <p class="mt-2 text-sm text-gray-500">PNG, JPG, GIF up to 2MB</p>
                        @error('company_logo')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- PDF File -->
                    <div>
                        <label for="pdf_file" class="block text-sm font-medium text-gray-700">PDF File</label>
                        <div class="mt-1">
                            <input type="file" name="pdf_file" id="pdf_file" accept="application/pdf" class="bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 @error('pdf_file') border-red-300 text-red-900 placeholder-red-300 focus:outline-none focus:ring-red-500 focus:border-red-500 @enderror">
                        </div>
                        <p class="mt-2 text-sm text-gray-500">PDF up to 10MB</p>
                        @error('pdf_file')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                        <div class="mt-1">
                            <textarea id="description" name="description" rows="4" class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md @error('description') border-red-300 text-red-900 placeholder-red-300 focus:outline-none focus:ring-red-500 focus:border-red-500 @enderror" placeholder="Description of the portfolio">{{ old('description') }}</textarea>
                        </div>
                        @error('description')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Highlights -->
                    <div x-data="{ 
                        highlights: {{ old('highlights') ? json_encode(old('highlights')) : '[]' }},
                        newHighlight: '',
                        addHighlight() {
                            if (this.newHighlight.trim() !== '') {
                                this.highlights.push(this.newHighlight.trim());
                                this.newHighlight = '';
                            }
                        },
                        removeHighlight(index) {
                            this.highlights.splice(index, 1);
                        }
                    }">
                        <label for="highlights" class="block text-sm font-medium text-gray-700">Project Highlights</label>
                        <div class="mt-1">
                            <input type="text" x-model="newHighlight" @keydown.enter.prevent="addHighlight()" class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="Add a project highlight">
                            <button type="button" @click="addHighlight()" class="mt-2 inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                Add Highlight
                            </button>
                        </div>
                        <div class="mt-2">
                            <ul class="space-y-2">
                                <template x-for="(highlight, index) in highlights" :key="index">
                                    <li class="flex items-center justify-between px-3 py-2 bg-gray-50 rounded-md">
                                        <span x-text="highlight"></span>
                                        <input type="hidden" :name="'highlights[' + index + ']'" x-model="highlights[index]">
                                        <button type="button" @click="removeHighlight(index)" class="text-red-600 hover:text-red-900">
                                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </li>
                                </template>
                            </ul>
                        </div>
                        @error('highlights')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Order -->
                    <div>
                        <label for="order" class="block text-sm font-medium text-gray-700">Order (optional)</label>
                        <div class="mt-1">
                            <input type="number" name="order" id="order" value="{{ old('order') }}" class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="Leave blank for automatic ordering">
                        </div>
                        <p class="mt-2 text-sm text-gray-500">Position in the portfolio list (lower numbers appear first)</p>
                        @error('order')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Publish Status -->
                    <div class="relative flex items-start">
                        <div class="flex items-center h-5">
                            <input id="is_published" name="is_published" type="checkbox" checked class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded">
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="is_published" class="font-medium text-gray-700">Publish immediately</label>
                            <p class="text-gray-500">Uncheck to save as draft</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                <a href="{{ route('admin.portfolios.index') }}" class="inline-flex justify-center py-2 px-4 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 mr-2">
                    Cancel
                </a>
                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Save Portfolio
                </button>
            </div>
        </div>
    </form>
</div>
@endsection