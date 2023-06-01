<div class="container mx-auto">
    <div class="p-4 mt-4 w-full bg-white rounded-lg border shadow-md sm:p-8 dark:bg-gray-800 dark:border-gray-700">
        <div class="card-header">
            <center><span><strong>{{ __('Test Case Details') }}</strong></span></center>
        </div>
        <div class="mt-2 hidden">
            @if($createMode)
            <div class="d-flex mt-4">
                <a type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" id="btnsave" href="{{route('test_case.design')}}">Back to create view</a>
            </div>
            @elseif($edit)
            <div class="d-flex mt-4">
                <a type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" id="btnsave" href="{{route('redesign.testcase' , $test_case)}}">Back to edit view</a>
            </div>
            @endif
        </div>
        <div class="columns-2">
            {{-- Title --}}
            <div class="col-md-6">
                <label>{{ __('Title') }}</label>
                <input wire:model.lazy="test_case_step.title" type="text" name="test_case_step.title" id="test_case_step.title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                @error('test_case_step.title')
                <span class="text-danger text-left">{{ $message }}</span>
                @enderror
            </div>
            {{-- Description --}}
            <div class="col-md-6">
                <label>{{ __('Description') }}</label>
                <input wire:model.lazy="test_case_step.description" type="text" name="test_case_step.description" id="test_case_step.description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                @error('test_case_step.description')
                <span class="text-danger text-left">{{ $message }}</span>
                @enderror
            </div>
            {{-- Expected Result --}}
            <div class="col-md-6">
                <label>{{ __('Expected Result') }}</label>
                <input wire:model.lazy="test_case_step.expected_result" type="text" name="test_case_step.expected_result" id="test_case_step.expected_result" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                @error('test_case_step.expected_result')
                <span class="text-danger text-left">{{ $message }}</span>
                @enderror
            </div>
            {{-- Designer Comment --}}
            <div class="col-md-6">
                <label>{{ __('Designer Comment') }}</label>
                <input wire:model.lazy="test_case_step.designer_comment" type="text" name="test_case_step.designer_comment" id="test_case_step.designer_comment" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                @error('test_case_step.designer_comment')
                <span class="text-danger text-left">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="mt-2">
            <div class=" d-flex">
                @if ($editMode)
                <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" id="btnsave" wire:click="update()">Apply Changes <i class="fas fa-save"></i></button>
                @else
                <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" id="btnsave" wire:click="store()">Add <i class="fas fa-plus"></i></button>
               
                <a type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" id="btnsave" href="{{ url()->previous() }}">Back</a>
              
                @endif
            </div>
        </div>
    </div>

    @livewire('designers.add-test-case-steps', ['test_case' => $test_case])
</div>