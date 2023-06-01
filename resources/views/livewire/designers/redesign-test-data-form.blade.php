<div class="container mx-auto mt-4">
    <div class="bg-white rounded shadow p-4 items-center ">
        <div class="md:columns-3">
            {{-- Field Name --}}
            <div >
                <input type="hidden" wire:model="test_data_id">
                <label>{{ __('Field Name') }}</label>
                <input wire:model.lazy="test_data.field_name" type="text" name="test_data.field_name" id="test_data.field_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                @error('test_data.field_name')
                <span class="text-danger text-left">{{ $message }}</span>
                @enderror
            </div>
            {{-- Old Value --}}
            <div >
                <label>{{ __('Old Value') }}</label>
                <input wire:model.lazy="test_data.old_value" type="text" name="test_data.old_value" id="test_data.old_value" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                @error('test_data.old_value')
                <span class="text-danger text-left">{{ $message }}</span>
                @enderror
            </div>
            {{-- New Value --}}
            <div >
                <label>{{ __('New Value') }}</label>
                <input wire:model.lazy="test_data.new_value" type="text" name="test_data.new_value" id="test_data.new_value" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                @error('test_data.new_value')
                <span class="text-danger text-left">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="flex items-center p-6 space-x-2 rounded-b justify-between">
            <button data-modal-toggle="AddDataRequirmentsModal" class="bg-green-700 rounded-full text-white px-4 py-2 cursor-pointer transition ease-in-out duration-200 hover:translate-y-0.5" wire:click="update()">{{ __('Submit') }}</button>
        </div>
    </div>
</div>