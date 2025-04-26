@extends('admin.layout')

@section('header', 'General Manager Settings')

@section('content')
<div class="p-6">
    <div class="mb-6">
        <h2 class="text-lg font-medium text-gray-900">General Manager Information</h2>
        <p class="mt-1 text-sm text-gray-600">Update the general manager's details displayed on the website.</p>
    </div>

    <form action="{{ route('admin.settings.general-manager.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6" x-data="{
        experience: {{ json_encode($experience ?? []) }},
        education: {{ json_encode($education ?? []) }},
        addExperience() {
            this.experience.push({
                title: '',
                company: '',
                period: ''
            });
        },
        removeExperience(index) {
            this.experience.splice(index, 1);
        },
        addEducation() {
            this.education.push({
                degree: '',
                school: '',
                period: ''
            });
        },
        removeEducation(index) {
            this.education.splice(index, 1);
        }
    }">
        @csrf
        
        <div class="bg-white shadow-sm rounded-lg overflow-hidden">
            <div class="px-4 py-5 sm:p-6">
                <div class="grid grid-cols-1 gap-6">
                    <!-- Name -->
                    <div>
                        <label for="gm_name" class="block text-sm font-medium text-gray-700">Name</label>
                        <div class="mt-1">
                            <input type="text" name="gm_name" id="gm_name" value="{{ old('gm_name', $settings['gm_name'] ?? '') }}" class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md @error('gm_name') border-red-300 text-red-900 placeholder-red-300 focus:outline-none focus:ring-red-500 focus:border-red-500 @enderror" placeholder="General Manager Name">
                        </div>
                        @error('gm_name')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Title -->
                    <div>
                        <label for="gm_title" class="block text-sm font-medium text-gray-700">Title</label>
                        <div class="mt-1">
                            <input type="text" name="gm_title" id="gm_title" value="{{ old('gm_title', $settings['gm_title'] ?? '') }}" class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md @error('gm_title') border-red-300 text-red-900 placeholder-red-300 focus:outline-none focus:ring-red-500 focus:border-red-500 @enderror" placeholder="Job Title">
                        </div>
                        @error('gm_title')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Profile Image -->
                    <div>
                        <label for="gm_image" class="block text-sm font-medium text-gray-700">Profile Image</label>
                        <div class="mt-1 flex items-center">
                            @if(isset($settings['gm_image']) && $settings['gm_image'])
                                <div class="relative">
                                    <img src="{{ asset($settings['gm_image']) }}" alt="Current Profile Image" class="h-32 w-auto object-cover rounded-lg">
                                    <div class="mt-2 text-sm text-gray-500">Current image</div>
                                </div>
                            @else
                                <span class="inline-block h-24 w-24 rounded-full overflow-hidden bg-gray-100">
                                    <svg class="h-full w-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                                    </svg>
                                </span>
                            @endif
                            <input type="file" name="gm_image" id="gm_image" accept="image/png, image/jpeg, image/jpg, image/gif" class="ml-5 bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 @error('gm_image') border-red-300 text-red-900 placeholder-red-300 focus:outline-none focus:ring-red-500 focus:border-red-500 @enderror">
                        </div>
                        <p class="mt-2 text-sm text-gray-500">PNG, JPG, GIF up to 2MB. Leave blank to keep current image.</p>
                        @error('gm_image')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- About -->
                    <div>
                        <label for="gm_about" class="block text-sm font-medium text-gray-700">About</label>
                        <div class="mt-1">
                            <textarea id="gm_about" name="gm_about" rows="6" class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md @error('gm_about') border-red-300 text-red-900 placeholder-red-300 focus:outline-none focus:ring-red-500 focus:border-red-500 @enderror" placeholder="About the General Manager">{{ old('gm_about', $settings['gm_about'] ?? '') }}</textarea>
                        </div>
                        @error('gm_about')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Experience Section -->
                    <div>
                        <div class="flex justify-between items-center">
                            <label class="block text-sm font-medium text-gray-700">Experience</label>
                            <button type="button" @click="addExperience" class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded text-blue-700 bg-blue-100 hover:bg-blue-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                <svg class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                </svg>
                                Add Experience
                            </button>
                        </div>
                        
                        <div class="mt-2 space-y-4">
                            <template x-for="(item, index) in experience" :key="index">
                                <div class="bg-gray-50 p-4 rounded-md">
                                    <div class="flex justify-between items-center mb-3">
                                        <h4 class="text-sm font-medium text-gray-700" x-text="'Experience #' + (index + 1)"></h4>
                                        <button type="button" @click="removeExperience(index)" class="text-red-600 hover:text-red-800">
                                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </div>
                                    
                                    <div class="grid grid-cols-1 gap-4">
                                        <div>
                                            <label :for="'experience['+index+'][title]'" class="block text-xs font-medium text-gray-700">Job Title</label>
                                            <input type="text" :name="'experience['+index+'][title]'" x-model="item.title" class="mt-1 shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="Job Title">
                                        </div>
                                        <div>
                                            <label :for="'experience['+index+'][company]'" class="block text-xs font-medium text-gray-700">Company</label>
                                            <input type="text" :name="'experience['+index+'][company]'" x-model="item.company" class="mt-1 shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="Company Name">
                                        </div>
                                        <div>
                                            <label :for="'experience['+index+'][period]'" class="block text-xs font-medium text-gray-700">Period</label>
                                            <input type="text" :name="'experience['+index+'][period]'" x-model="item.period" class="mt-1 shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="e.g., 2015 - Present">
                                        </div>
                                    </div>
                                </div>
                            </template>
                            
                            <div x-show="experience.length === 0" class="text-center py-4 text-sm text-gray-500">
                                No experience items added yet. Click "Add Experience" to add your first item.
                            </div>
                        </div>
                    </div>
                    
                    <!-- Education Section -->
                    <div>
                        <div class="flex justify-between items-center">
                            <label class="block text-sm font-medium text-gray-700">Education</label>
                            <button type="button" @click="addEducation" class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded text-blue-700 bg-blue-100 hover:bg-blue-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                <svg class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                </svg>
                                Add Education
                            </button>
                        </div>
                        
                        <div class="mt-2 space-y-4">
                            <template x-for="(item, index) in education" :key="index">
                                <div class="bg-gray-50 p-4 rounded-md">
                                    <div class="flex justify-between items-center mb-3">
                                        <h4 class="text-sm font-medium text-gray-700" x-text="'Education #' + (index + 1)"></h4>
                                        <button type="button" @click="removeEducation(index)" class="text-red-600 hover:text-red-800">
                                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </div>
                                    
                                    <div class="grid grid-cols-1 gap-4">
                                        <div>
                                            <label :for="'education['+index+'][degree]'" class="block text-xs font-medium text-gray-700">Degree</label>
                                            <input type="text" :name="'education['+index+'][degree]'" x-model="item.degree" class="mt-1 shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="Degree/Certificate">
                                        </div>
                                        <div>
                                            <label :for="'education['+index+'][school]'" class="block text-xs font-medium text-gray-700">Institution</label>
                                            <input type="text" :name="'education['+index+'][school]'" x-model="item.school" class="mt-1 shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="School/University">
                                        </div>
                                        <div>
                                            <label :for="'education['+index+'][period]'" class="block text-xs font-medium text-gray-700">Period</label>
                                            <input type="text" :name="'education['+index+'][period]'" x-model="item.period" class="mt-1 shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="e.g., 2010 - 2014">
                                        </div>
                                    </div>
                                </div>
                            </template>
                            
                            <div x-show="education.length === 0" class="text-center py-4 text-sm text-gray-500">
                                No education items added yet. Click "Add Education" to add your first item.
                            </div>
                        </div>
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