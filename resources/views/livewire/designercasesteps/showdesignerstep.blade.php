<!-- Main modal -->
<div wire:ignore.self id="showDesignerStepsModal" tabindex="-1" aria-hidden="true" class="hidden bg-gray-600 overflow-y-auto bg-opacity-50 overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full inset-0 h-modal h-full justify-center items-center">
    <div class="relative p-4 w-full  md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    <center>{{ __('Show Test Case Details') }}</center>
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="showDesignerStepsModal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <div class="overflow-x-auto relative">
            <form action="">
                        <div class="grid gap-6 mb-6 md:grid-cols-2">
                            <div class="col-md-6">
                                <label class="form-control-label" for="title"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Title</label>
                                <input
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    name="title" id="title" wire:model="title" required>
                                @if ($errors->has('title'))
                                    <span class="text-danger text-left">{{ $errors->first('title') }}</span>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <label class="form-control-label" for="description"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Description</label>
                                <input
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    name="description" id="description" wire:model="description" required>
                                @if ($errors->has('description'))
                                    <span class="text-danger text-left">{{ $errors->first('description') }}</span>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <label class="form-control-label" for="expected_result"
                                    class="col-block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Expected
                                    Results</label>
                                <input
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    name="expected_result" id="expected_result" value=""
                                    wire:model="expected_result" required>
                                @if ($errors->has('expected_result'))
                                    <span class="text-danger text-left"> {{ $errors->first('expected_result') }}</span>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <label class="form-control-label" for="comment"
                                    class="col-block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Comment</label>
                                <input
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    name="designer_comment" id="designer_comment" value=""
                                    wire:model="designer_comment" required>
                                @if ($errors->has('comment'))
                                    <span class="text-danger text-left"> {{ $errors->first('comment') }}</span>
                                @endif
                            </div>
                        </div>
                    </form>
            </div>

            <!-- Modal header -->
            <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    {{ __('Show Test Data Details') }}
                </h3>
            </div>
            <div class="overflow-x-auto relative">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="py-3 px-6">
                                ID
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Name
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Old Value
                            </th>
                            <th scope="col" class="py-3 px-6">
                                New Value
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($testdatadetails as $testdatadetail)
                        @if($test_case_step_id == $testdatadetail->test_case_step_id)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $testdatadetail->id }}
                            </th>
                            <td class="py-4 px-6">
                                {{ $testdatadetail->field_name }}
                            </td>
                            <td class="py-4 px-6">
                                {{ $testdatadetail->old_value }}
                            </td>
                            <td class="py-4 px-6">
                                {{ $testdatadetail->new_value }}
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>