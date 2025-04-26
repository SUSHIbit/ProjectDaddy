@extends('admin.layout')

@section('header', 'Portfolios')

@section('content')
<div class="p-6">
    <div class="mb-6 flex justify-between items-center">
        <div>
            <h2 class="text-lg font-medium text-gray-900">All Portfolios</h2>
            <p class="mt-1 text-sm text-gray-600">Manage your portfolio items here.</p>
        </div>
        <a href="{{ route('admin.portfolios.create') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
            <svg class="-ml-1 mr-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
            </svg>
            Add Portfolio
        </a>
    </div>

    @if(count($portfolios) > 0)
        <div class="bg-white shadow-sm rounded-lg overflow-hidden">
            <ul class="divide-y divide-gray-200" x-data="{ 
                dragging: false,
                orderChanged: false,
                draggedItem: null,
                originalOrder: [],
                portfolioItems: {{ json_encode($portfolios) }}, 
                
                init() {
                    this.originalOrder = this.portfolioItems.map(item => item.id);
                },
                
                startDrag(event, item) {
                    this.dragging = true;
                    this.draggedItem = item;
                    event.dataTransfer.effectAllowed = 'move';
                    event.dataTransfer.setData('text/plain', item.id);
                    event.target.closest('li').classList.add('bg-blue-50');
                },
                
                endDrag(event) {
                    this.dragging = false;
                    document.querySelectorAll('li').forEach(el => {
                        el.classList.remove('bg-blue-50');
                    });
                },
                
                dragEnter(event, targetItem) {
                    if (!this.dragging || this.draggedItem.id === targetItem.id) return;
                    
                    const sourceIndex = this.portfolioItems.findIndex(item => item.id === this.draggedItem.id);
                    const targetIndex = this.portfolioItems.findIndex(item => item.id === targetItem.id);
                    
                    const newItems = [...this.portfolioItems];
                    newItems.splice(sourceIndex, 1);
                    newItems.splice(targetIndex, 0, this.draggedItem);
                    
                    this.portfolioItems = newItems;
                    this.orderChanged = this.originalOrder.join(',') !== this.portfolioItems.map(item => item.id).join(',');
                },
                
                saveOrder() {
                    fetch('{{ route('admin.portfolios.order') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name=\"csrf-token\"]').getAttribute('content')
                        },
                        body: JSON.stringify({
                            order: this.portfolioItems.map(item => item.id)
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            this.orderChanged = false;
                            this.originalOrder = this.portfolioItems.map(item => item.id);
                            window.location.reload();
                        }
                    });
                }
            }">
                <template x-for="(portfolio, index) in portfolioItems" :key="portfolio.id">
                    <li class="flex items-center px-6 py-4 hover:bg-gray-50 cursor-move transition-colors duration-150"
                        draggable="true"
                        @dragstart="startDrag($event, portfolio)"
                        @dragend="endDrag"
                        @dragenter.prevent="dragEnter($event, portfolio)"
                        @dragover.prevent>
                        <div class="text-gray-400 mr-4">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 8h16M4 16h16" />
                            </svg>
                        </div>
                        
                        <div class="flex-1 flex flex-col md:flex-row md:items-center">
                            <div class="flex-1">
                                <div class="flex items-center">
                                    <div class="text-base font-semibold text-gray-900" x-text="portfolio.title"></div>
                                    <div class="ml-2">
                                        <span x-show="portfolio.is_published" class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            Published
                                        </span>
                                        <span x-show="!portfolio.is_published" class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                            Draft
                                        </span>
                                    </div>
                                </div>
                                <div class="mt-1 text-sm text-gray-500">
                                    <span x-text="'Order: ' + (index + 1)"></span>
                                </div>
                            </div>
                            
                            <div class="mt-2 md:mt-0 flex">
                                <a :href="'{{ route('admin.portfolios.edit', '') }}/' + portfolio.id" class="text-blue-600 hover:text-blue-900 mr-3">
                                    Edit
                                </a>
                                <form :id="'delete-form-' + portfolio.id" :action="'{{ route('admin.portfolios.destroy', '') }}/' + portfolio.id" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" @click="if(confirm('Are you sure you want to delete this portfolio?')) document.getElementById('delete-form-' + portfolio.id).submit();" class="text-red-600 hover:text-red-900">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </li>
                </template>

                <div x-show="orderChanged" class="flex justify-center py-4 bg-blue-50">
                    <button @click="saveOrder" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Save New Order
                    </button>
                </div>
            </ul>
        </div>
    @else
        <div class="text-center py-12 bg-white shadow-sm rounded-lg">
            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
            </svg>
            <h3 class="mt-2 text-sm font-medium text-gray-900">No portfolios</h3>
            <p class="mt-1 text-sm text-gray-500">Get started by creating a new portfolio.</p>
            <div class="mt-6">
                <a href="{{ route('admin.portfolios.create') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    <svg class="-ml-1 mr-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                    </svg>
                    Add Portfolio
                </a>
            </div>
        </div>
    @endif
</div>
@endsection