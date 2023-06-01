<div class="container mx-auto">

    <div class="p-4 w-full  bg-white rounded-lg border border-gray-200 shadow-md sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
        <div class="mb-4">
            <center>
                <span class="text-xl text-black font-bold">{{ __('New Test Case') }}</span>
            </center>
        </div>

        <div class="grid gap-6 mb-6 md:grid-cols-2">
            <div>
                <label>{{ __('Title') }}</label>
                <input wire:model.lazy="test_case.title" type="text" name="title" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @error('title')
                <span class="text-danger text-left">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label>{{ __('Module Name') }}</label>
                <input wire:model.lazy="test_case.module_name" type="text" name="module_name" id="module_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @error('module_name')
                <span class="text-danger text-left">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label>{{ __('Project') }}</label>
                <select wire:model.lazy="test_case.project_id" name="project_id" id="project_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="">{{ __('Select an Option') }}</option>
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
                <input wire:model.lazy="test_case.description" type="text" name="description" id="description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @error('description')
                <span class="text-danger text-left">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label>{{ __('Dependency') }}</label>
                <select wire:model.lazy="test_case.dependency_id" name="dependency_id" id="dependency_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="">{{ __('Select an Option') }}</option>
                    @foreach ($dependencies as $dependency)
                    <option value="{{ $dependency->id }}">{{ $dependency->title }}</option>
                    @endforeach
                </select>
                @error('dependency_id')
                <span class="text-danger text-left">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label>{{ __('Priority') }}</label>
                <select wire:model.lazy="test_case.priority_id" name="priority_id" id="priority_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="">{{ __('Select an Option') }}</option>
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
                <input wire:model.lazy="test_case.pre_condition" type="text" name="pre_condition" id="pre_condition" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @error('pre_condition')
                <span class="text-danger text-left">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="text-right">
            @if($editMode)
            <button type="button"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        id="btnsave" wire:click="update()">Proceed To Test Case Steps <i class="fas fa-save"></i></button>
                        @else
            <button class="text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center ml-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800" type="submit" wire:click.prevent="store()">Submit</button>
            @endif
        </div>
        </form>
    </div>
</div>