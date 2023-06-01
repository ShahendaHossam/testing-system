<x-app-layout>
    @php
        $codegenerated = "";
        $controller = "";
        $compact = "compact(";
        $store = "";
        
        foreach ($tablecolumns as $column) {
            if($column != "id" && $column != "created_at" && $column != "updated_at" && $column != "deleted_at" && $column != "user_id")
            {
                if(str_contains($column, '_id'))
                {
                    $store .= "\t'".Str::singular($table).".$column' => 'nullable|integer',\n";
                    $noid = str_replace('_id', '', $column);
                    $model = str_replace('_', ' ', $noid);
                    $model = ucwords($model);
                    $model = str_replace(' ', '', $model);
                    $noid = str_replace('_', ' ', $noid);
                    $justtable = str_replace('_id', '', $column);
                    $codegenerated .= "\n{{--". ucwords($noid). "--}}\n".
                    "<div class=\"col-md-6\">\n".
                        "<label>{{ __('". ucwords($noid). "') }}</label>\n".
                        "<select wire:model.lazy=\"".Str::singular($table).".$column\" name=\"".Str::singular($table).".$column\" id=\"".Str::singular($table).".$column\" class=\"form-control form-control-sm\">"."\n".
                        "<option value=\"\">{{__('Select an Option')}}</option>"."\n".
                        "@foreach ($".Str::plural($justtable)." as $".$justtable.")"."\n".
                        "<option value=\"{{ $".$justtable."->id }}\">{{ $".$justtable."->title }}</option>"."\n".
                        "@endforeach"."\n".
                        "</select>"."\n".
                        "@error('".Str::singular($table).".$column')"."\n".
                        "<span class=\"text-danger text-left\">{{ \$message }}</span>"."\n".
                        "@enderror\n</div>";
                    $controller .=  "$".Str::plural($justtable)." = ". $model ."::all();\n";
                    if ($compact == "compact(") {
                        $compact .= "'".Str::plural($justtable)."'";
                    } else {
                        $compact .= ",'".Str::plural($justtable)."'";
                    }
                }
                else if(str_contains($column, 'date'))
                {
                    $store .= "\t'".Str::singular($table).".$column' => 'nullable|max:255',\n";
                    $nounderscore = str_replace('_', ' ', $column);
                    $codegenerated .= "\n{{--". ucwords($nounderscore). "--}}\n".
                    " <div class=\"col-md-6\">\n<label>{{ __('". ucwords($nounderscore). "') }}</label>\n<input wire:model.lazy=\"".Str::singular($table).".$column\" type=\"date\" name=\"".Str::singular($table).".$column\" id=\"".Str::singular($table).".$column\" class=\"form-control form-control-sm\">\n@error('".Str::singular($table).".$column')"."\n".
                        "<span class=\"text-danger text-left\">{{ \$message }}</span>"."\n".
                        "@enderror\n</div>";
                }
                else if(str_contains($column, '_no') || str_contains($column, 'amount') || str_contains($column, 'quantity'))
                {
                    $store .= "\t'".Str::singular($table).".$column' => 'nullable|numeric',\n";
                    $nounderscore = str_replace('_', ' ', $column);
                    $codegenerated .= "\n{{--". ucwords($nounderscore). "--}}"."\n".
                    " <div class=\"col-md-6\">\n<label>{{ __('". ucwords($nounderscore). "') }}</label>\n<input wire:model.lazy=\"".Str::singular($table).".$column\" type=\"number\" name=\"".Str::singular($table).".$column\" id=\"".Str::singular($table).".$column\" min=\"0\" step=\"0.01\" class=\"form-control form-control-sm\">\n@error('".Str::singular($table).".$column')"."\n".
                        "<span class=\"text-danger text-left\">{{ \$message }}</span>"."\n".
                        "@enderror\n</div>";
                }
                else if(str_contains($column, 'time'))
                {
                    $store .= "\t'".Str::singular($table).".$column' => 'nullable|max:255',\n";
                    $nounderscore = str_replace('_', ' ', $column);
                    $codegenerated .= "\n{{--". ucwords($nounderscore). "--}}\n".
                    " <div class=\"col-md-6\">\n<label>{{ __('". ucwords($nounderscore). "') }}</label>\n<input wire:model.lazy=\"".Str::singular($table).".$column\" type=\"datetime-local\" name=\"".Str::singular($table).".$column\" id=\"".Str::singular($table).".$column\" class=\"form-control form-control-sm\">\n@error('".Str::singular($table).".$column')"."\n".
                        "<span class=\"text-danger text-left\">{{ \$message }}</span>"."\n".
                        "@enderror\n</div>";
                }
                else if(str_contains($column, 'is_'))
                {
                    $store .= "\t'".Str::singular($table).".$column' => 'nullable|boolean',\n";
                    $nounderscore = str_replace('_', ' ', $column);
                    $codegenerated .= "\n{{--". ucwords($nounderscore). "--}}\n".
                    " <div class=\"col-md-6\">\n<label>{{ __('". ucwords($nounderscore). "') }}</label>\n<input wire:model.lazy=\"".Str::singular($table).".$column\" type=\"checkbox\" name=\"".Str::singular($table).".$column\" id=\"".Str::singular($table).".$column\" class=\"form-control form-control-sm\">\n@error('".Str::singular($table).".$column')"."\n".
                        "<span class=\"text-danger text-left\">{{ \$message }}</span>"."\n".
                        "@enderror\n</div>";
                }
                else
                {
                    $store .= "\t'".Str::singular($table).".$column' => 'nullable|max:255',\n";
                    $nounderscore = str_replace('_', ' ', $column);
                    $codegenerated .= "\n{{--". ucwords($nounderscore). "--}}\n".
                    "<div class=\"col-md-6\">\n<label>{{ __('". ucwords($nounderscore). "') }}</label>\n<input wire:model.lazy=\"".Str::singular($table).".$column\" type=\"text\" name=\"".Str::singular($table).".$column\" id=\"".Str::singular($table).".$column\" class=\"form-control form-control-sm\">\n@error('".Str::singular($table).".$column')"."\n".
                        "<span class=\"text-danger text-left\">{{ \$message }}</span>"."\n".
                        "@enderror\n</div>";
                }
            }
        }
        $compact .= ")";
    @endphp
    <div class="columns-2 m-5">
        <div class="p-6 bg-white rounded-lg border border-gray-200 max-h-screen shadow-md dark:bg-gray-800 dark:border-gray-700 w-full overflow-auto">
            <div class="text-black text-lg font-bold">
                <center><span><strong>{{ __('View') }}</strong></span></center>
            </div>
            <div>
                <a class="copybtn cursor-pointer flex justify-end"><i class="fa-solid fa-clipboard"></i></a>
                <pre><code>{{ $codegenerated }}</code></pre>
            </div>
        </div>
        <div
            class="mt-4 w-full p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700 overflow-x-auto">
            <div class="text-black text-lg font-bold">
                <center><span><strong>{{ __('Controller - Create') }}</strong></span></center>
            </div>
            <div>
                <a class="copybtn cursor-pointer flex justify-end"><i class="fa-solid fa-clipboard"></i></a>
                <pre><code>{{ $controller . $compact }}</code></pre>
            </div>
        </div>
        <div
            class="mt-4 w-full p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700 overflow-x-auto">
            <div class="text-black text-lg font-bold">
                <center><span><strong>{{ __('Controller - Store') }}</strong></span></center>
            </div>
            <div>
                <a class="copybtn cursor-pointer flex justify-end"><i class="fa-solid fa-clipboard"></i></a>
                <pre><code>{{ $store }}</code></pre>
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
    
    