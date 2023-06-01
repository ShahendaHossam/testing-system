<div>
    @if($isOpen)
    <div class="mt-5">
        <div class="col-md-6">
            <div class=" w-full bg-white rounded-lg border shadow-md sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                <div class="card-header pb-8">
                    <center><span><strong>{{ __('Executor Test Case') }}</strong></span></center>
                </div>
                <form action="">
                    <!-- <input type="hidden" wire:model.lazy="test_case_id"> -->
                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <div class="col-md-6">
                            <label class="form-control-label" for="actual_result" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Actual Result</label>
                            <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="actual_result" id="actual_result" wire:model.lazy="test_case_step.actual_result" required>
                            @if ($errors->has('actual_result'))
                            <span class="text-danger text-left">{{ $errors->first('actual_result') }}</span>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <label class="form-control-label" for="executor_comment" class="col-block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Comment</label>
                            <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="executor_comment" id="executor_comment" value="" wire:model.lazy="test_case_step.executor_comment" required>
                            @if ($errors->has('executor_comment'))
                            <span class="text-danger text-left"> {{ $errors->first('executor_comment') }}</span>
                            @endif
                        </div>
                        <div class="col-md-6">
                        <label for="status_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Status</label>
                        <select name="status_id" id="status_id" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" wire:model.lazy="test_case_step.status_id">
                            <option value="">Select an Option</option>
                            @foreach ($this->statuses as $testcase)
                            <option value="{{ $testcase->id }}">{{ $testcase->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    </div>
                </form>
            </div>
            <div class=" d-flex">
                @if ($editMode)
                <button type="button" class="text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800" id="btnsave" wire:click="update()">Apply Changes <i class="fas fa-save"></i></button>
                @endif
            </div>
        </div>
    </div>
    @endif
</div>