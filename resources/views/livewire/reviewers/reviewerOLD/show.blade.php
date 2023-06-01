<div>

    <div class="header">
        <div class="container-fluid">
            <div class="header-body">

            </div>
        </div>
    </div>
    <div class="container-fluid mt--2">
        <div class="card">
            <div class="card-header">
                <center><span><strong>Reviewer</strong></span></center>
            </div>
            <div class="flex justify-between">
                <select class="rounded" wire:model="result_step_no">
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
                <div class="flex justify-center border rounded">
                    <label for="search" class="inline-flex items-center"><i class="fas fa-search fa-xl px-2 mt-1"></i></label>
                    <input id="search" type="text" class="rounded-none @if (session()->get('locale') == 'ar') rounded-start @else rounded-end @endif border-0 focus:outline-0" wire:model="search_step" placeholder="{{ __('Type to Search..') }}">
                </div>
            </div>
            <div class="p-4 w-full text-center bg-white rounded-lg border shadow-md sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                <div class="overflow-x-auto relative">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th><a wire:click.prevent="sortBy('test_case_steps.id')" role="button">ID</a></th>
                                <th><a wire:click.prevent="sortBy('test_case_steps.description')" role="button">Step Details</a></th>
                                <th><a wire:click.prevent="sortBy('test_case_steps.expected_result')" role="button">Expected Results</a></th>
                                <th><a wire:click.prevent="sortBy('test_case_steps.designer_comment')" role="button">Comment Designer</a></th>
                                <th><a wire:click.prevent="sortBy('test_case_steps.reviewer_comment')" role="button">Comment</a></th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($testcasesteps as $item)
                            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                <td>{{$item->id}}</td>
                                <td>{{$item->description}}</td>
                                <td>{{$item->expected_result}}</td>
                                <td>{{$item->designer_comment}}</td>
                                <td>{{$item->reviewer_comment}}</td>
                                <td class="py-4 px-6">
                                    <button class="text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800" type="button" data-modal-toggle="commentModal" wire:click.prevent="newcomment({{$item->id}})">
                                        Add Comment
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--2">
        <div class="card">
            <div class="card-header">
                <center><span><strong>Test Data</strong></span></center>
            </div>
            <div class="flex justify-between">
                <select class="rounded" wire:model="result_no_test_data">
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
                <div class="flex justify-center border rounded">
                    <label for="search_test_data" class="inline-flex items-center"><i class="fas fa-search fa-xl px-2 mt-1"></i></label>
                    <input id="search_test_data" type="text" class="rounded-none @if (session()->get('locale') == 'ar') rounded-start @else rounded-end @endif border-0 focus:outline-0" wire:model="search_test_data" placeholder="{{ __('Type to Search..') }}">
                </div>
            </div>
            <div class="p-4 w-full text-center bg-white rounded-lg border shadow-md sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                <div class="overflow-x-auto relative">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th><a wire:click.prevent="sortBy('test_case_data_requirements.id')" role="button">ID</a></th>
                                <th><a wire:click.prevent="sortBy('test_case_data_requirements.field_name')" role="button">Field Name</a></th>
                                <th><a wire:click.prevent="sortBy('test_case_data_requirements.old_value')" role="button">Old Value</a></th>
                                <th><a wire:click.prevent="sortBy('test_case_data_requirements.new_value')" role="button">New Value</a></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($testdata as $item)
                            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                <td>{{$item->id}}</td>
                                <td>{{$item->field_name}}</td>
                                <td>{{$item->old_value}}</td>
                                <td>{{$item->new_value}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



    <div class="container-fluid mt--2">
        <div class="card">
            <div class="card-header">
                <center><span><strong>Test Data</strong></span></center>
            </div>
            <form method="POST" action="">
                <input type="hidden" wire:model="reviewer">
            @csrf
            @method('PUT')
                <div class="columns-2">
                    <label for="status_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Status Test Case</label>
                    <select name="status_id" id="status_id"  class=" " wire:model="status_id">
                        <option value="">Select an Option</option>
                        @foreach ($statuscase as $testcase)
                        @if($testcase->id != $this->reviewer)
                        <option value="{{ $testcase->id }}">{{ $testcase->title }}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
                <button class="text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800" type="button"  wire:click.prevent="statusTestCase()">
                    Submit
                </button>
            </form>
        </div>
    </div>
</div>