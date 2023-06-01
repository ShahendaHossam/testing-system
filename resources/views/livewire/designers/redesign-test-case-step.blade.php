<div class="container mx-auto">
    @if($editMode)
    @include('livewire.designers.redesign')

    <div class="shadow p-3 mb-5 bg-white rounded mt-8">
        <div class="overflow-x-auto relative shadow-md border sm:rounded-lg mt-5 dark:bg-gray-800 dark:border-gray-700">
            <div class="p-4 w-full  bg-white rounded-lg border shadow-md dark:bg-gray-800 dark:border-gray-700">
                <div class="header-body text-xl mt-4">
                    <center>
                        <h3><strong>{{ __('Redesign Test Case Steps') }}</strong></h3>
                    </center>
                <a class="text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800" href="{{route('test_case.steps' ,$test_case->id)}}">Add Test Case Step <i class="fas fa-plus"></i></a>

                <!-- Modal toggle -->
                <!-- <button class="mb-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" data-modal-toggle="defaultModal">
                Add Test Step
                </button> -->
                
                </div>
                <input type="hidden" wire:model.lazy="test_case_id">
                <div class="pb-4 bg-white dark:bg-gray-900 p-4 flex justify-between">
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
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="p-4">
                                <div class="flex items-center">
                                    <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="checkbox-all-search" class="sr-only">checkbox</label>
                                </div>
                            </th>
                            <th scope="col" class="py-3 px-6"><a wire:click.prevent="sortBy('test_case_steps.id')" role="button">{{ __('ID') }}</a> <i class="fa-sharp fa-solid fa-sort"></i></th>
                            <th scope="col" class="py-3 px-6"><a wire:click.prevent="sortBy('test_case_steps.description')" role="button">{{ __('Step Details') }}</a> <i class="fa-sharp fa-solid fa-sort"></i></th>
                            <th scope="col" class="py-3 px-6"><a wire:click.prevent="sortBy('test_case_steps.expected_result')" role="button">{{ __('Expected Results') }}</a> <i class="fa-sharp fa-solid fa-sort"></i></th>
                            <th scope="col" class="py-3 px-6"><a wire:click.prevent="sortBy('test_case_steps.actual_result')" role="button">{{ __('Acual Results') }}</a> <i class="fa-sharp fa-solid fa-sort"></i></th>
                            <th scope="col" class="py-3 px-6"><a wire:click.prevent="sortBy('test_case_steps.status_id')" role="button">{{ __('Status') }}</a> <i class="fa-sharp fa-solid fa-sort"></i></th>
                            <th scope="col" class="py-3 px-6"><a wire:click.prevent="sortBy('test_case_steps.designer_comment')" role="button">{{ __('Comment Designer') }}</a> <i class="fa-sharp fa-solid fa-sort"></i></th>
                            <th scope="col" class="py-3 px-6"><a wire:click.prevent="sortBy('test_case_steps.reviewer_comment')" role="button">{{ __('Comment Reviewer') }}</a> <i class="fa-sharp fa-solid fa-sort"></i></th>
                            <th scope="col" class="py-3 px-6"><a wire:click.prevent="sortBy('test_case_steps.executor_comment')" role="button">{{ __('Comment Executor') }}</a> <i class="fa-sharp fa-solid fa-sort"></i></th>
                            <th scope="col" class="py-3 px-6">Test Data Requierment</th>
                            <th scope="col" class="py-3 px-6">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($testcasesteps as $item)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="p-4 w-4">
                                <div class="flex items-center">
                                    <input id="checkbox-table-search-2" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="checkbox-table-search-2" class="sr-only">checkbox</label>
                                </div>
                            </td>
                            <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{$item->id}}</th>
                            <td class="py-4 px-6">{{$item->description}}</td>
                            <td class="py-4 px-6">{{$item->expected_result}}</td>
                            <td class="py-4 px-6">{{$item->actual_result}}</td>
                            <td class="py-4 px-6">{{$item->status ? $item->status->title : ''}}</td>
                            <td class="py-4 px-6">{{$item->designer_comment}}</td>
                            <td class="py-4 px-6">{{$item->reviewer_comment}}</td>
                            <td class="py-4 px-6">{{$item->executor_comment}}</td>

                            <td class="py-4 px-6">
                                <button class="block text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 " type="button" data-modal-toggle="commentModal" wire:click.prevent="show({{ $item->id }})">
                                    {{__('Test Data')}}
                                </button>
                            </td>
                            <td class="">
                                <button class="block text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 " type="button" wire:click.prevent="edit({{ $item->id }})">
                                    {{ __('Edit') }}
                                </button>
                                
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            </div>
            @livewire('designers.redesign-test-data',['test_case_step' => $test_case_step])

    </div>

    @endif


</div>