<div class="header">
    <div class="container-fluid">
        <div class="header-body">
            <center>
                <h1><strong>Designer</strong></h1>
            </center>
            <a class="text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2" href="{{route('test_case.design')}}">New Test Case <i class="fas fa-plus"></i></a>
            <a type="button" class="text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2" wire:click="history()">History </a>
        </div>
    </div>
</div>


<div class="mt-5 py-3 px-5">
    {{-- Filtering Div --}}
    <div class="flex justify-between">
        <select class="rounded" wire:model.lazy="result_no">
            <option value="5">5</option>
            <option value="10">10</option>
            <option value="20">20</option>
            <option value="50">50</option>
            <option value="100">100</option>
        </select>
        <div class="flex justify-center border rounded">
            <label for="search" class="inline-flex items-center"><i class="fas fa-search fa-xl px-2 mt-1"></i></label>
            <input id="search" type="text" class="rounded-none @if (session()->get('locale') == 'ar') rounded-start @else rounded-end @endif border-0 focus:outline-0 sm:w-5 md:w-auto lg:w-auto" wire:model="search.lazy" placeholder="{{ __('Type to Search..') }}">
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <center><span><strong>List</strong></span></center>
        </div>

        <input type="hidden" name="status_id" id="status_id" wire:model.lazy="status">

        <div class="overflow-x-auto relative">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="py-3 px-6"><a wire:click.prevent="sortBy('test_cases.id')" role="button">ID</a></th>
                        <th scope="col" class="py-3 px-6"><a wire:click.prevent="sortBy('test_cases.status_id')" role="button">Test Case</a></th>
                        <th scope="col" class="py-3 px-6"><a wire:click.prevent="sortBy('test_cases.priority_id')" role="button">Priority</a></th>
                        <th scope="col" class="py-3 px-6">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($testcases as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->status ? $item->status->title :''}}</td>
                        <td>{{ $item->priority ? $item->priority->title :''}}</td>
                        <td class="py-4 px-6">
                            <a data-toggle="modal" data-target="#updatemodal" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Redesign</a>
                        </td>
                    </tr>
                    @empty
                    <tr class="">
                        <td colspan="6" class="text-center px-2 text-cool-gray-400">
                            {{ __('No Result Found!') }}
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="d-flex space-y-7">
        {{ $testcases->links() }}
    </div>
</div>