@extends('admin.layout')

@section('header', 'Messages')

@section('content')
<div class="p-6">
    <div class="mb-6">
        <h2 class="text-lg font-medium text-gray-900">Contact Messages</h2>
        <p class="mt-1 text-sm text-gray-600">View and manage messages received from the contact form.</p>
    </div>

    @if(count($messages) > 0)
        <div class="bg-white shadow-sm rounded-lg overflow-hidden">
            <ul class="divide-y divide-gray-200">
                @foreach($messages as $message)
                    <li class="px-6 py-4 hover:bg-gray-50 {{ !$message->read ? 'bg-blue-50' : '' }}">
                        <a href="{{ route('admin.messages.show', $message) }}" class="block">
                            <div class="flex items-center justify-between">
                                <p class="text-sm font-medium text-blue-600 truncate">
                                    {{ $message->name }}
                                </p>
                                <div class="ml-2 flex-shrink-0 flex">
                                    @if(!$message->read)
                                        <p class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                            Unread
                                        </p>
                                    @endif
                                </div>
                            </div>
                            <div class="mt-2 sm:flex sm:justify-between">
                                <div class="sm:flex">
                                    <p class="flex items-center text-sm text-gray-500">
                                        <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                                        </svg>
                                        {{ $message->email }}
                                    </p>
                                </div>
                                <div class="mt-2 flex items-center text-sm text-gray-500 sm:mt-0">
                                    <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <p>
                                        {{ $message->created_at->diffForHumans() }}
                                    </p>
                                </div>
                            </div>
                            <div class="mt-2">
                                <p class="text-sm text-gray-600 line-clamp-2">{{ $message->message }}</p>
                            </div>
                        </a>
                    </li>
                @endforeach
            </ul>
            <!-- Pagination Links -->
            <div class="px-6 py-4 bg-gray-50 border-t border-gray-200">
                {{ $messages->links() }}
            </div>
        </div>
    @else
        <div class="text-center py-12 bg-white shadow-sm rounded-lg">
            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
            </svg>
            <h3 class="mt-2 text-sm font-medium text-gray-900">No messages</h3>
            <p class="mt-1 text-sm text-gray-500">You haven't received any contact messages yet.</p>
        </div>
    @endif
</div>
@endsection