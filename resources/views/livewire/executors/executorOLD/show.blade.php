<div>
    <div class="container-fluid mt--2">
        <div class="card">
            <div class="card-header">
                <center><span><strong>Executor</strong></span></center>
            </div>
            <div class="flex justify-between">
                <select class="rounded" wire:model="result_no">
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
                <div class="flex justify-center border rounded">
                    <label for="search" class="inline-flex items-center"><i class="fas fa-search fa-xl px-2 mt-1"></i></label>
                    <input id="search" type="text" class="rounded-none @if (session()->get('locale') == 'ar') rounded-start @else rounded-end @endif border-0 focus:outline-0" wire:model="search" placeholder="{{ __('Type to Search..') }}">
                </div>
            </div>
            <div class="p-4 w-full  bg-white rounded-lg border shadow-md sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                <div class="overflow-x-auto relative">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th><a wire:click.prevent="sortBy('test_case_steps.id')" role="button">ID</a></th>
                                <th><a wire:click.prevent="sortBy('test_case_steps.description')" role="button">Step Details</a></th>
                                <th><a wire:click.prevent="sortBy('test_case_steps.expected_result')" role="button">Expected Results</a></th>
                                <th><a wire:click.prevent="sortBy('test_case_steps.acual_result')" role="button">Acual Results</a></th>
                                <th><a wire:click.prevent="sortBy('test_case_steps.status_id')" role="button">Test Type</a></th>
                                <th><a wire:click.prevent="sortBy('test_case_steps.designer_comment')" role="button">Comment Designer</a></th>
                                <th><a wire:click.prevent="sortBy('test_case_steps.reviewer_comment')" role="button">Comment Reviewer</a></th>
                                <th><a wire:click.prevent="sortBy('test_case_steps.executor_comment')" role="button">Comment Executor</a></th>
                                <th>Test Data Requierment</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($testcasesteps as $item)
                            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                <td>{{$item->id}}</td>
                                <td>{{$item->description}}</td>
                                <td>{{$item->expected_result}}</td>
                                <td>{{$item->actual_result}}</td>
                                <td>{{$item->status ? $item->status->title : ''}}</td>
                                <td>{{$item->designer_comment}}</td>
                                <td>{{$item->reviewer_comment}}</td>
                                <td>{{$item->executor_comment}}</td>

                                <td class="py-4 px-6">
                                    <button class="text-white bg-purple-700 hover:bg-purple-800 focus:outline-none focus:ring-4 focus:ring-purple-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900" type="button" data-modal-toggle="commentModal" wire:click.prevent="showtestdata({{$item->id}})">
                                        View Test Data
                                    </button>
                                </td>
                                <td class="py-4 px-6">
                                    <button class="text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800" type="button" data-modal-toggle="commentModal" wire:click.prevent="newDataExecutor({{$item->id}})">
                                        ADD
                                    </button>
                                    <button class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" data-modal-toggle="commentModal" wire:click.prevent="editDataExecutor({{$item->id}})">
                                        Edit
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>


                </div>
                <div class="container-fluid mt--2">
                    <div class="card">
                        <div class="card-header">
                            <center><span><strong>Test Case</strong></span></center>
                        </div>

                        <form method="POST" action="">

                            <input type="hidden" wire:model="executor">
                            @csrf
                            @method('PUT')
                            <div class="grid gap-6 mb-6 md:grid-cols-2">
                                <div>
                                    <label for="status_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Status Test Case</label>
                                    <select name="status_id" id="status_id" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" wire:model.lazy="status_id">
                                        <option value="">Select an Option</option>
                                        @foreach ($statuscase as $testcase)
                                        @if($testcase->id != $this->executor)
                                        <option value="{{ $testcase->id }}">{{ $testcase->title }}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <label class="form-control-label" for="post_condition" class="col-block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Post Condition</label>
                                    <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="post_condition" id="post_condition" value="" wire:model.lazy="post_condition" required>
                                    @if ($errors->has('post_condition'))
                                    <span class="text-danger text-left"> {{ $errors->first('post_condition') }}</span>
                                    @endif
                                </div>
                            </div>
                            <button class="text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800" type="button" wire:click.prevent="TestCaseDesc()">
                                Submit
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>