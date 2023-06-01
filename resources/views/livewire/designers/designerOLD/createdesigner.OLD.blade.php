<div class="header">
    <div class="container-fluid">
        <div class="card-header">
            <center><span><strong>{{ __('Create New Test Case') }}</strong></span></center>
        </div>
    </div>
</div>
<div">
    <div class="p-4 w-full  bg-white rounded-lg border border-gray-200 shadow-md sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
        <form class="space-y-6" action="">
            <input type="hidden" wire:model.lazy="status">
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div>
                    <label>{{ __('Title') }}</label>
                    <input wire:model.lazy="title" type="text" name="title" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @error('title')
                    <span class="text-danger text-left">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label>{{ __('Module Name') }}</label>
                    <input wire:model.lazy="module_name" type="text" name="module_name" id="module_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @error('module_name')
                    <span class="text-danger text-left">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label>{{ __('Project') }}</label>
                    <select wire:model.lazy="project_id" name="project_id" id="project_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="">{{__('Select an Option')}}</option>
                        @foreach ($projects as $project)
                        <option value="{{ $project->id }}">{{ $project->title }}</option>
                        @endforeach
                    </select>
                    @error('project_id')
                    <span class="text-danger text-left">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label>{{ __('Description') }}</label>
                    <input wire:model.lazy="description" type="text" name="description" id="description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @error('description')
                    <span class="text-danger text-left">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label>{{ __('Dependency') }}</label>
                    <select wire:model.lazy="dependency_id" name="dependency_id" id="dependency_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="">{{__('Select an Option')}}</option>
                        @foreach ($dependencies as $dependency)
                        <option value="{{ $dependency->id }}">{{ $dependency->title }}</option>
                        @endforeach
                    </select>
                    @error('dependency_id')
                    <span class="text-danger text-left">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label>{{ __('Status') }}</label>
                    <select wire:model.lazy="status_id" name="status_id" id="status_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="">{{__('Select an Option')}}</option>
                        @foreach ($statuses as $status)
                        @if($status->id != $this->status)
                        <option value="{{ $status->id }}">{{ $status->title }}</option>
                        @endif
                        @endforeach
                    </select>
                    @error('status_id')
                    <span class="text-danger text-left">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label>{{ __('Priority') }}</label>
                    <select wire:model.lazy="priority_id" name="priority_id" id="priority_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="">{{__('Select an Option')}}</option>
                        @foreach ($priorities as $priority)
                        <option value="{{ $priority->id }}">{{ $priority->title }}</option>
                        @endforeach
                    </select>
                    @error('priority_id')
                    <span class="text-danger text-left">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label>{{ __('Pre Condition') }}</label>
                    <input wire:model.lazy="pre_condition" type="text" name="pre_condition" id="pre_condition" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @error('pre_condition')
                    <span class="text-danger text-left">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="text-right">
            <button class="text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center ml-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800" type="submit" wire:click.prevent="store()">Submit</button>
            </div>
        </form>
    </div>