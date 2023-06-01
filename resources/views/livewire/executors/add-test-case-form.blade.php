<div class="mt-4"> 
    <div class="p-3 mt-5 mb-5 bg-white  overflow-x-auto relative shadow-md sm:rounded-lg ">
        <div class="card py-8 px-4">

            <form method="POST" action="">

                <input type="hidden" wire:model="executor">
                @csrf
                @method('PUT')
                <div class="grid gap-6 mb-6 md:grid-cols-2">
                    <div>
                        <label for="status_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Status Test Case</label>
                        <select name="status_id" id="status_id" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" wire:model.lazy="test_case.status_id">
                            <option value="">Select an Option</option>
                            @foreach ($statuses as $testcase)
                            <option value="{{ $testcase->id }}">{{ $testcase->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="form-control-label" for="post_condition" class="col-block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Post Condition</label>
                        <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="post_condition" id="post_condition" value="" wire:model.lazy="test_case.post_condition" required>
                        @if ($errors->has('post_condition'))
                        <span class="text-danger text-left"> {{ $errors->first('post_condition') }}</span>
                        @endif
                    </div>
                </div>
                <button class="text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800" type="button" wire:click.prevent="store()">
                    Submit
                </button>
            </form>
        </div>
    </div>
</div>