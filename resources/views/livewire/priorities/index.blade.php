<div class="container mx-auto">
    <div class="overflow-x-auto relative shadow-md sm:rounded-lg mt-5">
        <div class="p-4 w-full text-center bg-white rounded-lg border shadow-md sm:p-8 dark:bg-gray-800 dark:border-gray-700">
            <div class="card-header">
                <center><span><strong>Priorities</strong></span></center>
            </div>
            <button class="block  bg-blue-700 text-white  hover:bg-white-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-500 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" data-modal-toggle="defaultModal" wire:click.prevent="open()">
                New <i class="fas fa-plus"></i>
            </button>
            <div class="pb-4 dark:bg-gray-900 p-4 flex justify-between">
                <select class="rounded" wire:model="result_no">
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
                <label for="table-search" class="sr-only">Search</label>
                <div class="relative mt-1">
                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <input type="text" id="table-search" wire:model="search" class="block p-2 pl-10 w-80 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search for items">
                </div>
            </div>
            <div class="overflow-x-auto relative">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="p-4">
                                <div class="flex items-center">
                                    <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="checkbox-all-search" class="sr-only">checkbox</label>
                                </div>
                            </th>
                            <th scope="col" class="py-3 px-6"><a wire:click.prevent="sortBy('priorities.id')" role="button">{{ __('ID') }}</a></th>
                            <th scope="col" class="py-3 px-6"><a wire:click.prevent="sortBy('priorities.title')" role="button">{{ __('Title') }}</a></th>
                            <th scope="col" class="py-3 px-6"><a wire:click.prevent="sortBy('priorities.description')" role="button">{{ __('Description') }}</a></th>
                            <th  class="py-3 px-6" scope="col">Actions</th>
                            

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($priorities as $priority)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="p-4 w-4">
                                <div class="flex items-center">
                                    <input id="checkbox-table-search-2" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="checkbox-table-search-2" class="sr-only">checkbox</label>
                                </div>
                            </td>
                            <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{$priority->id}}</th>
                            <td class="py-4 px-6">{{$priority->title}}</td>
                            <td class="py-4 px-6">{{$priority->description}}</td>
                            <td colspan="2"class="flex">
                                <button class="block text-blue focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" data-modal-toggle="defaultModal" wire:click.prevent="edit({{$priority->id}})">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                            <button class="font-medium text-blue-600 dark:text-blue-500 cursor-pointer" onclick="return confirm('Are You Sure You Want To Proceed With The Current Request!') || event.stopImmediatePropagation()" wire:click.prevent="delete({{ $priority->id }})"><i class="fa-solid fa-trash"></i></button>
                            </td>
                        
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    @include('livewire.priorities.priority-form')
    <div >
    {{ $priorities->links() }}
    </div>
</div>
