<x-app-layout>

    @php
        $fillable = "protected \$fillable = [\n";
        $attributes = "protected \$attributes = [\n";
        $relations = '';
        $start = "\$table->foreign('";
        $mid = "')->references('id')->on('";
        $end = "')->onDelete('cascade')->onUpdate('cascade');\n\n";
        $migration = '';
        $dropforeign = '';
        $dropstart = "\$table->dropForeign(['";
        $dropend = "']);\n";
        
        foreach ($tablecolumns as $column) {
            if ($column != 'id' && $column != 'created_at' && $column != 'updated_at' && $column != 'deleted_at' && $column != 'deleted_at') {
                if (str_contains($column, '_id')) {
                    $noid = str_replace('_id', '', $column);
                    $migration .= $start . $column . $mid . Str::plural($noid) . $end;
                    $dropforeign .= $dropstart . $column . $dropend;
                    $model = str_replace('_', ' ', $noid);
                    $model = ucwords($model);
                    $model = str_replace(' ', '', $model);
                    $justtable = str_replace('_id', '', $column);
                    $relations .= "public function $noid(){\n";
                    $relations .= "\t\$model = \$this->hasOne(" . $model . "::class, 'id', '$column');\n";
                    $relations .= "\tif(\$model){\n";
                    $relations .= "\t\treturn \$model;\n";
                    $relations .= "\t}\n";
                    $relations .= "\telse{\n";
                    $relations .= "\t\treturn false;\n";
                    $relations .= "\t}\n";
                    $relations .= "}\n";
                }
                $fillable .= "\t'$column',\n";
                $attributes .= "\t'$column' => NULL,\n";
            }
        }
        
        $fillable .= "];\n";
        $attributes .= "];\n";
    @endphp
    <div class="columns-2 m-5">
        <div
            class="w-full max-h-screen p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700 overflow-auto">
            <div class="text-black text-lg font-bold">
                <center><span><strong>{{ __('Model') }}</strong></span></center>
            </div>
            <div>
                <a class="copybtn cursor-pointer flex justify-end"><i class="fa-solid fa-clipboard"></i></a>
                <pre><code>{{ $fillable . $attributes . $relations }}</code></pre>
            </div>
        </div>
        <div
            class="w-full p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700 overflow-x-auto">
            <div class="text-black text-lg font-bold">
                <center><span><strong>{{ __('Migration Foreign Keys') }}</strong></span></center>
            </div>
            <div>
                <a class="copybtn cursor-pointer flex justify-end"><i class="fa-solid fa-clipboard"></i></a>
                <pre><code>{{ $migration . $dropforeign }}</code></pre>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            jQuery('.copybtn').on('click', function() {
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
