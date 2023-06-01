<div class="container mx-auto">
    <div class="p-4 mt-4 w-full bg-white rounded-lg border shadow-md sm:p-8 dark:bg-gray-800 dark:border-gray-700">
        <div class="card-header text-xl mb-4">
            <center><span><strong>{{ __('Edit Test Case') }}</strong></span></center>
        </div>
        <div class="grid gap-2 mb-2 md:grid-cols-2">
            {{-- Title --}}
            <div class="">
                <label>{{ __('Title') }}</label>
                <input wire:model.lazy="test_case.title" type="text" name="test_case.title" id="test_case.title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                @error('test_case.title')
                <span class="text-danger text-left">{{ $message }}</span>
                @enderror
            </div>
            {{-- Project --}}
            <div class="">
                <label>{{ __('Project') }}</label>
                <select wire:model.lazy="test_case.project_id" type="text" name="test_case.project_id" id="test_case.project_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                <option value="{{$test_case->project_id}}">{{ $test_case->project ? $test_case->project->title : ''}}</option>
                    @foreach ($projects as $project)
                    <option value="{{ $project->id }}">{{ $project->title }}</option>
                    @endforeach
                </select>
                @error('test_case.project_id')
                <span class="text-danger text-left">{{ $message }}</span>
                @enderror
            </div>
            {{-- Module --}}
            <div class="">
                <label>{{ __('Module') }}</label>
                <input wire:model.lazy="test_case.module_name" type="text" name="test_case.module_name" id="test_case.module_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                @error('test_case.module_name')
                <span class="text-danger text-left">{{ $message }}</span>
                @enderror
            </div>
            {{-- Description --}}
            <div class="">
                <label>{{ __('Description') }}</label>
                <input wire:model.lazy="test_case.description" type="text" name="test_case.description" id="test_case.description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                @error('test_case.description')
                <span class="text-danger text-left">{{ $message }}</span>
                @enderror
            </div>
            {{-- Priority --}}
            <div class="">
                <label>{{ __('Priority') }}</label>
                <select wire:model.lazy="test_case.priority_id" type="text" name="test_case.priority_id" id="test_case.priority_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                <option value="{{$test_case->priority_id}}">{{ $test_case->priority ? $test_case->priority->title : ''}}</option>
                    @foreach ($priorities as $priority)
                    <option value="{{ $priority->id }}">{{ $priority->title }}</option>
                    @endforeach
                </select>
                @error('test_case.priority_id')
                <span class="text-danger text-left">{{ $message }}</span>
                @enderror
            </div>
            {{-- Pre-Condition --}}
            <div class="">
                <label>{{ __('Pre-Condition') }}</label>
                <input wire:model.lazy="test_case.pre_condition" type="text" name="test_case.pre_condition" id="test_case.pre_condition" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                @error('test_case.pre_condition')
                <span class="text-danger text-left">{{ $message }}</span>
                @enderror
            </div>
            {{-- Post-Condition --}}
            <div class="">
                <label>{{ __('Post-Condition') }}</label>
                <input wire:model.lazy="test_case.post_condition" type="text" name="test_case.post_condition" id="test_case.post_condition" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                @error('test_case.post_condition')
                <span class="text-danger text-left">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="mt-4">
            <div class=" d-flex">
            <button type="button"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        id="btnsave" wire:click="update()">Proceed To Test Case Steps</button>
            </div>
        </div>
    </div>
</div>