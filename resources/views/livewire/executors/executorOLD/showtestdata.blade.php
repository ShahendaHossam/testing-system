<div>
    <div class="container-fluid mt--2">
        <div class="card">
            <div class="card-header">
                <center><span><strong>Test Data</strong></span></center>
            </div>
            <div class="flex justify-between">
                <select class="rounded" wire:model="">
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
                <input type="text" wire:model="test_data_id">
                <div class="flex justify-center border rounded">
                    <label for="search" class="inline-flex items-center"><i class="fas fa-search fa-xl px-2 mt-1"></i></label>
                    <input id="search" type="text" class="rounded-none @if (session()->get('locale') == 'ar') rounded-start @else rounded-end @endif border-0 focus:outline-0" wire:model="search" placeholder="{{ __('Type to Search..') }}">
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
                            @if($item->test_case_step_id == $this->test_data_id)
                            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                <td>{{$item->id}}</td>
                                <td>{{$item->field_name}}</td>
                                <td>{{$item->old_value}}</td>
                                <td>{{$item->new_value}}</td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
