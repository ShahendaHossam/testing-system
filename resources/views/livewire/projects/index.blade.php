<div class="container mx-auto">
    @include('livewire.projects.edit')
    @include('livewire.projects.create')
    <div class="shadow p-3 mb-5 bg-white rounded mt-8">
        <div class="header-body text-xl">
            <center>
                <h3><strong>{{ __('Projects') }}</strong></h3>
            </center>
        </div>
        <div class="mb-4">
            <!-- Modal toggle -->
            <button class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" data-modal-toggle="addProject" wire:click.prevent="open()">
                Add
            </button>
        </div>
        <div class="flex justify-between mb-4">
            <select class="block text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" wire:model="result_no">
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="20">20</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>
            <label for="table-search" class="sr-only">{{ __('Search') }}</label>
            <div class="relative mt-1">
                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <input type="text" id="table-search" wire:model="search" class="block p-2 pl-10 w-80 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search for items">
            </div>
        </div>
        <!-- <input type="text" wire:model.lazy="ids"> -->
        <!-- <input type="text" wire:model.lazy="statuses"> -->

        <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="py-3 px-6">
                            <a wire:click.prevent="sortBy('projects.id')" role="button">{{ __('ID') }} <i class="fa-sharp fa-solid fa-sort"></i></a>
                        </th>
                        <th scope="col" class="py-3 px-6">
                            <a wire:click.prevent="sortBy('projects.title')" role="button">{{ __('Title') }} <i class="fa-sharp fa-solid fa-sort"></i></a>
                        </th>
                        <th scope="col" class="py-3 px-6">
                            <a wire:click.prevent="sortBy('projects.description')" role="button">{{ __('Description') }} <i class="fa-sharp fa-solid fa-sort"></i></a>
                        </th>
                        <th scope="col" class="py-3 px-6">
                            {{ __('Action') }}
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($projects as $project)

                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$project->id}}
                        </th>
                        <td class="py-4 px-6">
                            {{$project->title}}
                        </td>
                        <td class="py-4 px-6">
                            {{$project->description}}
                        </td>
                        <td class="py-4 px-6">
                            <!-- Modal toggle -->
                            <button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" wire:click="edit({{$project->id}})" data-modal-toggle="defaultModal">
                                Edit
                            </button>
                            <button type="button" class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900" onclick="return confirm('Are You Sure You Want To Proceed With The Current Request!') || event.stopImmediatePropagation()" wire:click.prevent="delete({{ $project->id }})">Delete</button>
                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-flex space-y-7">
                {{ $projects->links() }}
            </div>
    </div>
</div>