<div class="container mx-auto mt-4">
    <div class="bg-white rounded shadow  p-4">
        <div class="md:columns-3">
            {{--Title--}}
            <div class="col-md-6">
                <label>{{ __('Title') }}</label>
                <input wire:model.lazy="status.title" type="text" name="status.title" id="status.title" class="form-control form-control-sm">
                @error('status.title')
                <span class="text-danger text-left">{{ $message }}</span>
                @enderror
            </div>
            {{--Description--}}
            <div class="col-md-6">
                <label>{{ __('Description') }}</label>
                <input wire:model.lazy="status.description" type="text" name="status.description" id="status.description" class="form-control form-control-sm">
                @error('status.description')
                <span class="text-danger text-left">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="flex items-center p-6 space-x-2 rounded-b justify-between">
            @if ($editMode)
            <button class="bg-transparent rounded text-black px-4 py-2 cursor-pointer transition ease-in-out duration-200 hover:translate-y-0.5" wire:click="">{{ __('Cancel') }}</button>
            <button data-modal-toggle="AddDataRequirmentsModal" class="bg-green-700 rounded text-white px-4 py-2 cursor-pointer transition ease-in-out duration-200 hover:translate-y-0.5" wire:click="update()">{{ __('Apply Changes') }}</button>
            @else
            <a class="bg-transparent rounded text-black px-4 py-2 cursor-pointer transition ease-in-out duration-200 hover:translate-y-0.5" href="{{ route('status.index') }}">{{ __('Back') }}</a>
            <button data-modal-toggle="AddDataRequirmentsModal" class="bg-green-700 rounded text-white px-4 py-2 cursor-pointer transition ease-in-out duration-200 hover:translate-y-0.5" wire:click="store()">{{ __('Add') }}</button>
            @endif
        </div>
    </div>
</div>