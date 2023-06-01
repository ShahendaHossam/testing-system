<div>
    <div class="header">
        <div class="container-fluid">
            <div class="header-body">
                <center><span><strong>Executor Test Case</strong></span></center>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="p-4 w-full bg-white rounded-lg border shadow-md sm:p-8 dark:bg-gray-800 dark:border-gray-700">
            <div class="card-header">
                <center><span><strong>{{ __('Test Case Details') }}</strong></span></center>
            </div>
            <form action="">
                <div class="grid gap-6 mb-6 md:grid-cols-2">
                    <div class="col-md-6">
                        <label class="form-control-label" for="actual_result" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Actual Result</label>
                        <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="actual_result" id="actual_result" wire:model.lazy="actual_result" required>
                        @if ($errors->has('actual_result'))
                        <span class="text-danger text-left">{{ $errors->first('actual_result') }}</span>
                        @endif
                    </div>

                    <div class="col-md-6">
                        <label class="form-control-label" for="executor_comment" class="col-block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Comment</label>
                        <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="executor_comment" id="executor_comment" value="" wire:model.lazy="executor_comment" required>
                        @if ($errors->has('executor_comment'))
                        <span class="text-danger text-left"> {{ $errors->first('executor_comment') }}</span>
                        @endif
                    </div>

                    <div class="col-md-6">
                        <label>{{ __('Status') }}</label>
                        <select wire:model.lazy="status_id" name="status_id" id="status_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                            <option value="">{{__('Select an Option')}}</option>
                            @foreach ($statuses as $status)
                            @if($status->id == 4 || $status->id == 5)
                            <option value="{{ $status->id }}">{{ $status->title }}</option>
                            @endif
                            @endforeach
                        </select>
                        @error('status_id')
                        <span class="text-danger text-left">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </form>
            <div class="card-footer">
                <div class=" d-flex">
                    <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" id="btnsave" wire:click.prevent="addDataExecutor()">Update</button>
                </div>
            </div>

        </div>
    </div>
</div>