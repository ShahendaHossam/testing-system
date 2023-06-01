<div>
@livewire('executors.create-executor',['test_case' => $test_case])

<div class=" flex ">

    <div class="overflow-x-auto relative shadow-md sm:rounded-lg mx-6 px-8 w-full bg-white overflow-y-auto hv-100">
        <div class="header-body text-xl mt-4">
            <center>
                <h3><strong>{{ __('Test Case Steps') }}</strong></h3>
            </center>
        </div>
        <input type="hidden" wire:model.lazy="test_case_id">
        <div class="pb-4 dark:bg-gray-900 p-4 flex justify-between">
            <select class="block text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" wire:model.lazy="result_no">
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
                <input type="text" id="table-search" wire:model.lazy="search" class="block p-2 pl-10 w-80 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search for items">
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
                    <th scope="col" class="py-3 px-6"><a wire:click.prevent="sortBy('test_case_steps.id')" role="button">{{ __('ID') }} <i class="fa-sharp fa-solid fa-sort"></i></a></th>
                    <th scope="col" class="py-3 px-6"><a wire:click.prevent="sortBy('test_case_steps.description')" role="button">{{ __('Step Details') }} <i class="fa-sharp fa-solid fa-sort"></i></a></th>
                    <th scope="col" class="py-3 px-6"><a wire:click.prevent="sortBy('test_case_steps.expected_result')" role="button">{{ __('Expected Results') }} <i class="fa-sharp fa-solid fa-sort"></i></a></th>
                    <th scope="col" class="py-3 px-6"><a wire:click.prevent="sortBy('test_case_steps.actual_result')" role="button">{{ __('Acual Results') }} <i class="fa-sharp fa-solid fa-sort"></i></a></th>
                    <th scope="col" class="py-3 px-6"><a wire:click.prevent="sortBy('test_case_steps.status_id')" role="button">{{ __('Status') }} <i class="fa-sharp fa-solid fa-sort"></i></a></th>
                    <th scope="col" class="py-3 px-6"><a wire:click.prevent="sortBy('test_case_steps.designer_comment')" role="button">{{ __('Comment Designer') }} <i class="fa-sharp fa-solid fa-sort"></i></a></th>
                    <th scope="col" class="py-3 px-6"><a wire:click.prevent="sortBy('test_case_steps.reviewer_comment')" role="button">{{ __('Comment Reviewer') }} <i class="fa-sharp fa-solid fa-sort"></i></a></th>
                    <th scope="col" class="py-3 px-6"><a wire:click.prevent="sortBy('test_case_steps.executor_comment')" role="button">{{ __('Comment Executor') }} <i class="fa-sharp fa-solid fa-sort"></i></a></th>
                    @if($editMode)
                    <th scope="col" class="py-3 px-6">Test Data Requierment</th>
                    @endif
                    <th scope="col" class="py-3 px-6">
                        {{__('Action')}}
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($testcasesteps as $item)
                @if($item->test_case_id == $this->test_case_id )
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
                    @if($editMode)
                    <td>
                      
                        @if($item->id)
                        <table>
                            <thead>
                                <tr>
                                    
                                    <th class="py-2 px-4">Field Name</th>
                                    <th class="py-2 px-4">Old Value</th>
                                    <th class="py-2 px-4">New value</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($item->test_data)
                                @foreach($item->test_data as $testdata)
                                <tr>
                                    <td class="py-2 px-4">{{$testdata->field_name}}</td>
                                    <td class="py-2 px-4">{{$testdata->old_value}}</td>
                                    <td class="py-2 px-4">{{$testdata->new_value}}</td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                        @endif

                    </td>
                    @endif

                    <td class="py-4 px-6">
                        <a class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" wire:click.prevent="testData({{$item->id}})">
                            Test Data
                        </a>
                        <button class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" data-modal-toggle="commentModal" wire:click.prevent="edit({{ $item->id }})">
                            Manage Step
                        </button>
                    </td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
        <div class="footer py-4 px-4 ">
            {{ $testcasesteps->links() }}
        </div>
    </div>
    <div>@livewire('executors.test-data-requirement',['test_case' => $test_case])</div>


</div>
@livewire('executors.add-test-case-form',['test_case' => $test_case])
</div>