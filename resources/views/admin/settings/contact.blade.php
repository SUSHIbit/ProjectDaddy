@extends('admin.layout')

@section('header', 'Contact Settings')

@section('content')
<div class="p-6">
    <div class="mb-6">
        <h2 class="text-lg font-medium text-gray-900">Contact Information</h2>
        <p class="mt-1 text-sm text-gray-600">Update the contact details displayed on the website.</p>
    </div>

    <form action="{{ route('admin.settings.contact.update') }}" method="POST" class="space-y-6">
        @csrf
        
        <div class="bg-white shadow-sm rounded-lg overflow-hidden">
            <div class="px-4 py-5 sm:p-6">
                <div class="grid grid-cols-1 gap-6">
                    <!-- Email -->
                    <div>
                        <label for="contact_email" class="block text-sm font-medium text-gray-700">Email Address</label>
                        <div class="mt-1">
                            <input type="email" name="contact_email" id="contact_email" value="{{ old('contact_email', $settings['contact_email'] ?? '') }}" class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md @error('contact_email') border-red-300 text-red-900 placeholder-red-300 focus:outline-none focus:ring-red-500 focus:border-red-500 @enderror" placeholder="contact@example.com">
                        </div>
                        <p class="mt-2 text-sm text-gray-500">Contact form submissions will be sent to this email address.</p>
                        @error('contact_email')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Phone -->
                    <div>
                        <label for="contact_phone" class="block text-sm font-medium text-gray-700">Phone Number</label>
                        <div class="mt-1">
                            <input type="text" name="contact_phone" id="contact_phone" value="{{ old('contact_phone', $settings['contact_phone'] ?? '') }}" class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md @error('contact_phone') border-red-300 text-red-900 placeholder-red-300 focus:outline-none focus:ring-red-500 focus:border-red-500 @enderror" placeholder="+1 (555) 123-4567">
                        </div>
                        @error('contact_phone')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Address -->
                    <div>
                        <label for="contact_address" class="block text-sm font-medium text-gray-700">Office Address</label>
                        <div class="mt-1">
                            <textarea id="contact_address" name="contact_address" rows="3" class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md @error('contact_address') border-red-300 text-red-900 placeholder-red-300 focus:outline-none focus:ring-red-500 focus:border-red-500 @enderror" placeholder="123 Business Avenue, Suite 100, San Francisco, CA 94107">{{ old('contact_address', $settings['contact_address'] ?? '') }}</textarea>
                        </div>
                        @error('contact_address')
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