<div class="mt-4">

    <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
        <div class="pb-4 bg-white dark:bg-gray-900 p-4">
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
        <input type="hidden" wire:model="test_case_id">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="p-4">
                        <div class="flex items-center">
                            <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="checkbox-all-search" class="sr-only">checkbox</label>
                        </div>
                    </th>
                    <th scope="col" class="py-3 px-6">
                        <a wire:click.prevent="sortBy('test_case_data_requirements.id')" role="button">{{ __('ID') }}</a> <i class="fa-sharp fa-solid fa-sort"></i>
                    </th>
                    <th scope="col" class="py-3 px-6">
                        <a wire:click.prevent="sortBy('test_case_data_requirements.field_name')" role="button">{{ __('Field Name') }}</a> <i class="fa-sharp fa-solid fa-sort"></i>
                    </th>
                    <th scope="col" class="py-3 px-6">
                        <a wire:click.prevent="sortBy('test_case_data_requirements.old_value')" role="button">{{ __('Old Value') }}</a> <i class="fa-sharp fa-solid fa-sort"></i>
                    </th>
                    <th scope="col" class="py-3 px-6">
                        <a wire:click.prevent="sortBy('test_case_data_requirements.new_value')" role="button">{{ __('New Value') }}</a> <i class="fa-sharp fa-solid fa-sort"></i>
                    </th>
                    <th scope="col">
                        {{ __('Action') }}
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($test_case_data_requirements as $test_case_data_requirement)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="p-4 w-4">
                        <div class="flex items-center">
                            <input id="checkbox-table-search-2" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="checkbox-table-search-2" class="sr-only">checkbox</label>
                        </div>
                    </td>
                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $test_case_data_requirement->id }}
                    </th>
                    <td class="py-4 px-6">
                        {{ $test_case_data_requirement->field_name }}
                    </td>
                    <td class="py-4 px-6">
                        {{ $test_case_data_requirement->old_value }}
                    </td>
                    <td class="py-4 px-6">
                        {{ $test_case_data_requirement->new_value }}
                    </td>
                    <td class="">
                        <a class="font-medium text-blue-600 dark:text-blue-500 cursor-pointer" wire:click="$emit('edit',{{ $test_case_data_requirement->id }})"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a class="font-medium text-blue-600 dark:text-blue-500 cursor-pointer" onclick="return confirm('Are You Sure You Want To Proceed With The Current Request!') || event.stopImmediatePropagation()" wire:click="$emit('delete',{{ $test_case_data_requirement->id }})"><i class="fa-solid fa-trash"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        <button class="text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-800 dark:focus:ring-green-800" type="button" data-modal-toggle="commentModal" wire:click.prevent="doneRedesigne({{ $test_case_id }})">
            {{__('Done')}}
        </button>
    </div>
</div>