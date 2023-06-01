<div class="container mx-auto mt-4">
    @include('livewire.reviewers.comment')
    @include('livewire.reviewers.show-test-data-reviewer')
    <div class="overflow-x-auto relative shadow-md sm:rounded-lg mt-5 bg-white py-4 px-4">
        <div class="card-header mt-4">
            <center><span><strong>{{ __('Test Case Steps') }}</strong></span></center>
        </div>
        <div class="pb-4  dark:bg-gray-900 p-4 flex justify-between">
            <select class="block text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" wire:model="result_no">
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
        <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="py-3 px-6">
                            <a wire:click.prevent="sortBy('test_case_steps.id')" role="button">{{ __('ID') }} <i class="fa-sharp fa-solid fa-sort"></i></a>
                        </th>
                        <th scope="col" class="py-3 px-6">
                            <a wire:click.prevent="sortBy('test_case_steps.description')" role="button">{{ __('Description') }} <i class="fa-sharp fa-solid fa-sort"></i></a>
                        </th>
                        <th scope="col" class="py-3 px-6">
                            <a wire:click.prevent="sortBy('test_case_steps.expected_result')" role="button">{{ __('Expected Result') }} <i class="fa-sharp fa-solid fa-sort"></i></a>
                        </th>
                        <th scope="col" class="py-3 px-6">
                            <a wire:click.prevent="sortBy('test_case_steps.designer_comment')" role="button">{{ __('Designer Comment') }} <i class="fa-sharp fa-solid fa-sort"></i></a>
                        </th>
                        <th scope="col" class="py-3 px-6">
                            <a wire:click.prevent="sortBy('test_case_steps.reviewer_comment')" role="button">{{ __('Reviewer Comment') }} <i class="fa-sharp fa-solid fa-sort"></i></a>
                        </th>
                        <th scope="col" class="text-center" colspan="2">
                            <span >Action</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($testcasesteps as $item)
                    @if($this->test_case_id == $item->test_case_id)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$item->id}}
                        </th>
                        <td class="py-4 px-6">
                            {{$item->description}}
                        </td>
                        <td class="py-4 px-6">
                            {{$item->expected_result}}
                        </td>
                        <td class="py-4 px-6">
                            {{$item->designer_comment}}
                        </td>
                        <td class="py-4 px-6">
                            {{$item->reviewer_comment}}
                        </td>
                        <td class="py-4 px-6 text-right">
                            <a wire:click.prevent="filter({{ $item->id }})" class="text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 cursor-pointer" type="button" data-modal-toggle="defaultModal">Add Comment</a>
                            <a wire:click.prevent="filterTestData({{ $item->id }})" class="text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 cursor-pointer" type="button" data-modal-toggle="showtModal">Test Data</a>

                            <!-- <a wire:click.prevent="showtestdata({{ $item->id }})" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">Show Test Data</a> -->
                        </td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class='footer'>
            {{ $testcasesteps->links() }}
        </div>
@livewire('reviewers.show-test-data-reviewer',['test_case_step' => $test_case_step])

        <div class="mt-4">
            <div class="card">
                <form method="POST" action="">
                    <input type="hidden" wire:model="reviewer">
                    @csrf
                    @method('PUT')
                    <div>
                        <label for="status_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">{{ __('Status Test Case') }} </label>
                        <select name="status_id" id="status_id" class="rounded" wire:model="status_id">
                            <option value="">{{ __('Select an Option') }}</option>
                            @foreach ($statuscase as $testcase)
                            @if($testcase->id != $this->reviewer )
                            <option value="{{ $testcase->id }}">{{ $testcase->title }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <button class="mt-2 text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800" type="button" wire:click.prevent="statusTestCase()">
                        {{ __('Submit') }}
                    </button>
                </form>
            </div>
        </div>
    </div>

</div>


