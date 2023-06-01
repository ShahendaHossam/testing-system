<div class="container mx-auto">
    <!-- Main modal -->
    <div wire:ignore.self id="showtModal" tabindex="-1" aria-hidden="true" class="bg-opacity-50 bg-gray-600 hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center">
        <div class="relative p-4 w-full max-w-2xl h-full max-h-screen md:h-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        {{ __('Test Data Details') }}
                    </h3>

                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="showtModal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-6 space-y-6 overflow-y-auto max-h-96">
                    <input type="hidden" wire:model.lazy="test_case_step_id">
                    <div class="card-header mb-2">
                        <center><span><strong>{{ __('Test Data') }}</strong></span></center>
                    </div>
                    <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="py-3 px-6">
                                        <a wire:click.prevent="sortBy('test_case_data_requirements.id')" role="button">{{ __('ID') }}</a>
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        <a wire:click.prevent="sortBy('test_case_data_requirements.field_name')" role="button">{{ __('Field Name') }}</a>
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        <a wire:click.prevent="sortBy('test_case_data_requirements.old_value')" role="button">{{ __('Old Value') }}</a>
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        <a wire:click.prevent="sortBy('test_case_data_requirements.new_value')" role="button">{{ __('New Value') }}</a>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($testdata as $item)
                                @if($item->test_case_step_id == $this->test_case_step_id)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $item->id }}
                                    </th>
                                    <td class="py-4 px-6">
                                        {{ $item->field_name }}
                                    </td>
                                    <td class="py-4 px-6">
                                        {{ $item->old_value }}
                                    </td>
                                    <td class="py-4 px-6">
                                        {{ $item->new_value }}
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                    <button data-modal-toggle="showtModal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">{{ __('Close') }}</button>
                </div>
            </div>
        </div>
    </div>
</div>