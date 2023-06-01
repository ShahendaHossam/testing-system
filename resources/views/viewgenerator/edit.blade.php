<x-app-layout>

@php
    $codegenerated = "";

    foreach ($tablecolumns as $column) {
        if($column != "id" && $column != "created_at" && $column != "updated_at" && $column != "deleted_at" && $column != "user_id")
        {
            if(str_contains($column, '_id'))
            {
                $noid = str_replace('_id', '', $column);
                $noid = str_replace('_', ' ', $noid);
                $justtable = str_replace('_id', '', $column);
                $codegenerated .= "\n{{--". ucwords($noid). "--}}".
                "\n<div class=\"col-md-6\">\n<label>{{ __('". ucwords($noid). "') }}</label>\n<select name=\"$column\" id=\"$column\" class=\"form-control form-control-sm\">\n<option value=\"\">{{__('Select an Option')}}</option>\n@foreach ($".Str::plural($justtable)." as $".$justtable.")\n<option @if($".Str::singular($table)."->$column == $".$justtable."->id) selected @endif value=\"{{ $".$justtable."->id }}\">{{ $".$justtable."->title }}</option>\n@endforeach\n</select>\n@if (\$errors->has('".$column."'))\n<span class=\"text-danger text-left\">{{ \$errors->first('".$column."') }}</span>\n@endif\n</div>";
            }
            else if(str_contains($column, 'date'))
            {

                $nounderscore = str_replace('_', ' ', $column);
                $codegenerated .= "\n{{--". ucwords($nounderscore). "--}}".
                "\n<div class=\"col-md-6\">\n<label>{{ __('". ucwords($nounderscore). "') }}</label>\n<input type=\"date\" name=\"$column\" id=\"$column\" class=\"form-control form-control-sm\" value=\"{{ $".Str::singular($table)."->$column}}\">\n@if (\$errors->has('".$column."'))\n<span class=\"text-danger text-left\">{{ \$errors->first('".$column."') }}</span>\n@endif\n</div>";
            }
            else if(str_contains($column, 'time'))
            {

                $nounderscore = str_replace('_', ' ', $column);
                $codegenerated .= "\n{{--". ucwords($nounderscore). "--}}".
                "\n<div class=\"col-md-6\">\n<label>{{ __('". ucwords($nounderscore). "') }}</label>\n<input type=\"datetime-local\" name=\"$column\" id=\"$column\" class=\"form-control form-control-sm\" value=\"{{ $".Str::singular($table)."->$column}}\">\n@if (\$errors->has('".$column."'))\n<span class=\"text-danger text-left\">{{ \$errors->first('".$column."') }}</span>\n@endif\n</div>";
            }
            else if(str_contains($column, 'is_'))
            {

                $nounderscore = str_replace('_', ' ', $column);
                $codegenerated .= "\n{{--". ucwords($nounderscore). "--}}".
                "\n<div class=\"col-md-6\">\n<label>{{ __('". ucwords($nounderscore). "') }}</label>\n<input type=\"checkbox\" name=\"$column\" id=\"$column\" class=\"form-control form-control-sm\" value=\"{{ $".Str::singular($table)."->$column}}\">\n@if (\$errors->has('".$column."'))\n<span class=\"text-danger text-left\">{{ \$errors->first('".$column."') }}</span>\n@endif\n</div>";
            }
            else if(str_contains($column, '_no') || str_contains($column, 'amount') || str_contains($column, 'quantity'))
            {
                $nounderscore = str_replace('_', ' ', $column);
                $codegenerated .= "\n{{--". ucwords($nounderscore). "--}}".
                "\n<div class=\"col-md-6\">\n<label>{{ __('". ucwords($nounderscore). "') }}</label>\n<input type=\"number\" name=\"$column\" id=\"$column\" min=\"0\" step=\"0.01\" class=\"form-control form-control-sm\" value=\"{{ $".Str::singular($table)."->$column}}\">\n@if (\$errors->has('".$column."'))\n<span class=\"text-danger text-left\">{{ \$errors->first('".$column."') }}</span>\n@endif\n</div>";
            }
            else
            {
                $nounderscore = str_replace('_', ' ', $column);
                $codegenerated .= "\n{{--". ucwords($nounderscore). "--}}".
                "\n<div class=\"col-md-6\">\n<label>{{ __('". ucwords($nounderscore). "') }}</label>\n<input type=\"text\" name=\"$column\" id=\"$column\" class=\"form-control form-control-sm\" value=\"{{ $".Str::singular($table)."->$column}}\">\n@if (\$errors->has('".$column."'))\n<span class=\"text-danger text-left\">{{ \$errors->first('".$column."') }}</span>\n@endif\n</div>";
            }
        }
    }
@endphp
    {{-- edit view inputs --}}
    <div class="m-5 mx-72 overflow-auto max-h-screen">
        <div class="w-full p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700 overflow-x-auto">
            <div>
                <a class="copybtn cursor-pointer flex justify-end"><i class="fa-solid fa-clipboard"></i></a>
                <pre><code>{{$codegenerated}}</code></pre>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        jQuery(document).ready(function(){
            jQuery('.copybtn').on('click',function(){
                let button = jQuery(this);
                let div = button.parent();
    
                let codetext = div.find('pre').text();
    
                navigator.clipboard.writeText(codetext);
                button.text('Copied');
    
                setTimeout(() => {
                    button.html('<i class="fa-solid fa-clipboard"></i>');
                }, 2000);
            })
        });
    </script>
</x-app-layout>

