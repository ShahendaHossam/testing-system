<div >
    <div>
        <input type="hidden" wire:model.lazy="executor">
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
    <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="py-3 px-6">
                        <a wire:click.prevent="sortBy('test_cases.id')" role="button">ID</a>
                    </th>
                    <th scope="col" class="py-3 px-6">
                        <a wire:click.prevent="sortBy('test_cases.title')" role="button">Title</a>
                    </th>
                    <th scope="col" class="py-3 px-6">
                        <a wire:click.prevent="sortBy('test_cases.project_id')" role="button">Project</a>
                    </th>
                    <th scope="col" class="py-3 px-6">
                        <a wire:click.prevent="sortBy('test_cases.module_name')" role="button">Module</a>
                    </th>
                    <th scope="col" class="py-3 px-6">
                        <a wire:click.prevent="sortBy('test_cases.description')" role="button">Description</a>
                    </th>
                    <th scope="col" class="py-3 px-6">
                        <a wire:click.prevent="sortBy('test_cases.priority_id')" role="button">Priority</a>
                    </th>
                    <th scope="col" class="py-3 px-6">
                        <a wire:click.prevent="sortBy('test_cases.reviewer_id')" role="button">Reviewed By</a>
                    </th>
                    <th scope="col" class="py-3 px-6">
                        <a wire:click.prevent="sortBy('test_cases.created_at')" role="button">Reviewed Date</a>
                    </th>
                    <th scope="col" class="py-3 px-6">
                        <a wire:click.prevent="sortBy('test_cases.pre_condition')" role="button">Pre Condition</a>
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($testcases as $testcase)
                @if($testcase->status_id == $this->executor)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$testcase->id}}
                    </th>
                    <td class="py-4 px-6">
                        {{$testcase->title}}
                    </td>
                    <td class="py-4 px-6">
                        {{$testcase->project_id}}
                    </td>
                    <td class="py-4 px-6">
                        {{$testcase->module_name}}
                    </td>
                    <td class="py-4 px-6">
                        {{$testcase->description}}
                    </td>
                    <td class="py-4 px-6">
                        {{$testcase->priority ? $testcase->priority->title : $testcase->priority->id}}
                    </td>
                    <td class="py-4 px-6">
                        {{$testcase->reviewer ? $testcase->reviewer->name : ''}}
                    </td>
                    <td class="py-4 px-6">
                        {{$testcase->created_at}}
                    </td>
                    <td class="py-4 px-6">
                        {{$testcase->pre_condition}}
                    </td>
                    <td class="py-4 px-6 text-right">
                        <button wire:click.prevent="view({{$testcase->id}})" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">View</button>
                    </td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>