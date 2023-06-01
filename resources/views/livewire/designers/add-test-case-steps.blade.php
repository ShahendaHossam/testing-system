<div class="mt-4">
    <div class="shadow p-3 mb-5 bg-white rounded">
        <div class="card-header">
            <center><span><strong>{{ __('Details') }}</strong></span></center>
        </div>
        <div class="overflow-x-auto relative sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th class="py-3 px-6"><a wire:click.prevent="sortBy('test_case_steps.id')" role="button">{{ __('ID') }}</a> <i class="fa-sharp fa-solid fa-sort"></i>
                        </th>
                        <th class="py-3 px-6"><a wire:click.prevent="sortBy('test_case_steps.title')" role="button">{{ __('Title') }}</a> <i class="fa-sharp fa-solid fa-sort"></i></th>
                        <th class="py-3 px-6"><a wire:click.prevent="sortBy('test_case_steps.description')" role="button">{{ __('Description') }}</a> <i class="fa-sharp fa-solid fa-sort"></i></th>
                        <th class="py-3 px-6"><a wire:click.prevent="sortBy('test_case_steps.expected_result')" role="button">{{ __('Expected Result') }}</a> <i class="fa-sharp fa-solid fa-sort"></i></th>
                        <th><a wire:click.prevent="sortBy('test_case_steps.designer_comment')" role="button">{{ __('Designer Comment') }}</a> <i class="fa-sharp fa-solid fa-sort"></i></th>
                        <th>Test Data Requierment</th>
                        <th scope="col" class="text-center">{{ __('Actions') }}</th>
                </thead>
                <tbody id="tiers_tbody">
                    @foreach ($test_case_steps as $designerstep)
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
                        <a class="text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800" type="button" href="{{route('test_case_steps.add-data-requirements',$designerstep->id)}}">
                                {{__('Data Requirements')}}
                            </a>
                        </td>
                        <td class="text-center flex py-4 px-6">
                            <a type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" data-modal-toggle="updateStepsDetailModal" wire:click.prevent="edit({{ $designerstep->id }})">
                                {{__('Edit')}}
                            </a>
                            <a class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800" type="button" onclick="return confirm('Are You Sure You Want To Proceed With The Current Request!') || event.stopImmediatePropagation()" wire:click="delete({{ $designerstep->id }})">Delete</a>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>