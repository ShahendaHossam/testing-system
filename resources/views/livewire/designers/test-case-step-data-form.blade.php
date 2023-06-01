<div class="container mx-auto mt-4">
    <div class="bg-white rounded shadow  p-4">
        <div class="md:columns-3">
            {{-- Field Name --}}
            <div>
                <label>{{ __('Field Name') }}</label>
                <input wire:model.lazy="test_case_data_requirement.field_name" type="text"
                    name="test_case_data_requirement.field_name" id="test_case_data_requirement.field_name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                @error('test_case_data_requirement.field_name')
                    <span class="text-danger text-left">{{ $message }}</span>
                @enderror
            </div>
            {{-- Old Value --}}
            <div>
                <label>{{ __('Old Value') }}</label>
                <input wire:model.lazy="test_case_data_requirement.old_value" type="text"
                    name="test_case_data_requirement.old_value" id="test_case_data_requirement.old_value"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                @error('test_case_data_requirement.old_value')
                    <span class="text-danger text-left">{{ $message }}</span>
                @enderror
            </div>
            {{-- New Value --}}
            <div>
                <label>{{ __('New Value') }}</label>
                <input wire:model.lazy="test_case_data_requirement.new_value" type="text"
                    name="test_case_data_requirement.new_value" id="test_case_data_requirement.new_value"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                @error('test_case_data_requirement.new_value')
                    <span class="text-danger text-left">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div
            class="flex items-center p-6 space-x-2 rounded-b justify-between">
            @if ($editMode)
                <button
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 duration-200 hover:translate-y-0.5"
                    wire:click="cancelEdit()">{{ __('Cancel') }}</button>
                <button data-modal-toggle="AddDataRequirmentsModal"
                    class="bg-green-700 rounded-full text-white px-4 py-2 cursor-pointer transition ease-in-out duration-200 hover:translate-y-0.5"
                    wire:click="update()">{{ __('Apply Changes') }}</button>
            @else
                <a class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 duration-200 hover:translate-y-0.5"
                    href="{{ route('test_case.steps', $test_case_step->test_case_id) }}">{{ __('Back') }}</a>
                <button data-modal-toggle="AddDataRequirmentsModal"
                    class="bg-green-700 rounded-full text-white px-4 py-2 cursor-pointer transition ease-in-out duration-200 hover:translate-y-0.5"
                    wire:click="store()">{{ __('Add') }}</button>
            @endif
        </div>
    </div>
    @livewire('designers.test-case-step-data-list', ['test_case_step' => $test_case_step])
</div>
