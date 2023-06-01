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
                <center><span><strong>History</strong></span></center>
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

            <div class="p-4 w-full text-center bg-white rounded-lg border shadow-md sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                <div class="overflow-x-auto relative">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th><a wire:click.prevent="sortBy('test_cases.id')" role="button">ID</a></th>
                                <th><a wire:click.prevent="sortBy('test_cases.title')" role="button">Title</a></th>
                                <th><a wire:click.prevent="sortBy('test_cases.module_name')" role="button">Module Name</a></th>
                                <th><a wire:click.prevent="sortBy('test_cases.project_id')" role="button">Project</a></th>
                                <th><a wire:click.prevent="sortBy('test_cases.description')" role="button">Description</a></th>
                                <th><a wire:click.prevent="sortBy('test_cases.dependency_id')" role="button">Dependency</a></th>
                                <!-- <th>Priority</th>
                        <th>Status</th>
                        <th>Test Browser</th>
                        <th>Pre Condition</th>
                        <th>Post Condition</th> -->


                                <th>Actions</th>



                            </tr>
                        </thead>
                        <tbody>
                            @foreach($testcases as $item)
                            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                <td>{{$item->id}}</td>
                                <td>{{$item->title}}</td>
                                <td>{{$item->module_name}}</td>
                                <td>{{$item->project_id}}</td>
                                <td>{{$item->description}}</td>
                                <td>{{$item->dependency_id}}</td>
                                <!-- <td>{{$item->priority_id}}</td>
                        <td>{{$item->status_id}}</td>
                        <td>{{$item->test_browser}}</td>
                        <td>{{$item->pre_condition}}</td>
                        <td>{{$item->post_condition}}</td> -->

                                <td class="py-4 px-6">
                                    <a href="{{ route('history.edit', $item->id)}}" class="text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Edit</a>
                                    <a href="{{ route('history.show', $item->id) }}" class="text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">show</a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card-footer">
                    {{$testcases->links()}}
                </div>
        </div>

    </div>

</div>