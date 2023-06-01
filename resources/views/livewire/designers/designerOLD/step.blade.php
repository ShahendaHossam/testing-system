<div>


    <div class="content">
        <input type="text" wire:model="test_case_id">
        <div class="">
            <div class="col-md-6">
                <div class="p-4 w-full bg-white rounded-lg border shadow-md sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                    <div class="card-header">
                        <center><span><strong>{{ __('Test Case Details') }}</strong></span></center>
                    </div>
                    <form action="">
                        <div class="grid gap-6 mb-6 md:grid-cols-2">
                            <div class="col-md-6">
                                <label class="form-control-label" for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Title</label>
                                <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="title" id="title" wire:model.lazy="title_step" required>
                                @if ($errors->has('title'))
                                <span class="text-danger text-left">{{ $errors->first('title') }}</span>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <label class="form-control-label" for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Description</label>
                                <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="description" id="description" wire:model.lazy="description_step" required>
                                @if ($errors->has('description'))
                                <span class="text-danger text-left">{{ $errors->first('description') }}</span>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <label class="form-control-label" for="expected_result" class="col-block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Expected
                                    Results</label>
                                <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="expected_result" id="expected_result" value="" wire:model.lazy="expected_result" required>
                                @if ($errors->has('expected_result'))
                                <span class="text-danger text-left"> {{ $errors->first('expected_result') }}</span>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <label class="form-control-label" for="comment" class="col-block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Comment</label>
                                <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="designer_comment" id="designer_comment" value="" wire:model.lazy="designer_comment" required>
                                @if ($errors->has('comment'))
                                <span class="text-danger text-left"> {{ $errors->first('comment') }}</span>
                                @endif
                            </div>
                        </div>
                    </form>
                    <div class="card-footer">
                        <div class=" d-flex">
                            <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" id="btnsave" wire:click.prevent="storeStep()">Add New Step Details</button>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-6">
                <div class="card shadow p-3 mb-5 bg-white rounded">
                    <div class="card-header">
                        <center><span><strong>{{ __('Details') }}</strong></span></center>
                    </div>
                    <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="py-3 px-6">
                                        ID
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Title
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Description
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Expected Results
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Comment
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Test Data
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="tiers_tbody">
                                @foreach ($designersteps as $designerstep)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td class="py-4 px-6">
                                        {{ $designerstep->id }}
                                    </td>
                                    <td class="py-4 px-6">
                                        {{ $designerstep->title }}
                                    </td>
                                    <td class="py-4 px-6">
                                        {{ $designerstep->description }}
                                    </td>
                                    <td class="py-4 px-6">
                                        {{ $designerstep->expected_result }}
                                    </td>
                                    <td class="py-4 px-6">
                                        {{ $designerstep->designer_comment }}
                                    </td>
                                    <td class="py-4 px-6">
                                        <!-- Modal toggle -->

                                        <button class="text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800" type="button" data-modal-toggle="defaultModal" wire:click.prevent="filter({{ $designerstep->id }})">
                                            Manage Test Data
                                        </button>

                                        <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" data-modal-toggle="updateStepsDetailModal" wire:click.prevent="editSteps({{ $designerstep->id }})">Edit</button>

                                        <button type="button" class="text-white bg-purple-700 hover:bg-purple-800 focus:outline-none focus:ring-4 focus:ring-purple-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900" data-modal-toggle="showDesignerStepsModal" wire:click.prevent="show({{ $designerstep->id }})">View</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>