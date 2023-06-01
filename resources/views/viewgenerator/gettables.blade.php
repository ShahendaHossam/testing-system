<x-app-layout>
    @php
        foreach ($tables as $key => $value) {
            # code...
            foreach ($value as $table) {
                # code...
                $tables[$key] = $table;
            }
        }
    @endphp
    <div
        class="my-5 mx-72 py-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700 w-100 grid justify-items-center">
        <div>
            <label class="text-black text-lg font-bold">Table</label>
            <select name="table" id="table" class="rounded text-black text-lg">
                <option value="">Select an Option</option>
                @foreach ($tables as $table)
                    <option value="{{ $table }}">{{ $table }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="columns-4 mt-4 m-5">
        <div
            class="p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700 w-full">
            <div class="w-full text-black text-lg">
                <center><span><strong>{{ __('Create') }} <i class="fas fa-plus"></i></strong></span></center>
            </div>
            <div class="w-full text-black text-lg">
                <ul>
                    <li> <a style="cursor: pointer;" onclick="formCreate()">View + Controller <i
                                class="fa-solid fa-desktop"></i></a></li>
                    <li>
                        <a style="cursor: pointer;" onclick="formCreateLive()">View + Controller (Livewire) <i
                                class="fa-solid fa-desktop"></i></a>
                    </li>
                </ul>
            </div>
        </div>
        <div
            class="p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700 w-full">
            <div class="w-full text-black text-lg">
                <center><span><strong>{{ __('Edit') }} <i class="fas fa-pencil"></i></strong></span></center>
            </div>
            <div class="w-full text-black text-lg">
                <a style="cursor: pointer;" onclick="formEdit()">View <i class="fa-solid fa-desktop"></i></a>
            </div>
        </div>
        <div
            class="p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700 w-full">
            <div class="w-full text-black text-lg">
                <center><span><strong>{{ __('Index') }} <i class="fas fa-list"></i></strong></span></center>
            </div>
            <div class="w-full text-black text-lg">
                <a style="cursor: pointer;" onclick="formIndex()">View <i class="fa-solid fa-desktop"></i></a>
            </div>
        </div>
        <div
            class="p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700 w-full">
            <div class="w-full text-black text-lg">
                <center><span><strong>{{ __('Model') }} <i class="fa-solid fa-database"></i></strong></span>
                </center>
            </div>
            <div class="w-full text-black text-lg">
                <a style="cursor: pointer;" onclick="model()">Model <i class="fa-solid fa-database"></i></a>
            </div>
        </div>
    </div>
</x-app-layout>

<script type="text/javascript">
    function formCreate() {
        let select = jQuery('#table').val();
        if (select) {
            window.location.href = `${select}/create`;
        } else {
            alert('Select a table from the list!');
        }
    }

    function formCreateLive() {
        let select = jQuery('#table').val();
        if (select) {
            window.location.href = `${select}/create/live`;
        } else {
            alert('Select a table from the list!');
        }
    }

    function model() {
        let select = jQuery('#table').val();
        if (select) {
            window.location.href = `${select}/model`;
        } else {
            alert('Select a table from the list!');
        }
    }

    function formIndex() {
        let select = jQuery('#table').val();

        if (select) {
            window.location.href = `${select}/index`;
        } else {
            alert('Select a table from the list!');
        }
    }

    function formEdit() {
        let select = jQuery('#table').val();

        if (select) {
            window.location.href = `${select}/edit`;
        } else {
            alert('Select a table from the list!');
        }
    }

    jQuery(document).ready(function() {
        // jQuery('select').select2();
    });
</script>
