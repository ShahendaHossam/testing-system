<x-app-layout>
    @php
        $model = str_replace('_', ' ', $table);
        $model = ucwords($model);
        $model = str_replace(' ', '', $model);

        $listquery = "->when(\$this->search,function(\$searchquery){\n";
        $listquery .= "\t\$searchquery->where(function(\$queryx){\n";
        $listquery .= "\t\t\$queryx->where('$table.id', 'like', '%' . \$this->search . '%')";
        $codegenerated = "";
        $codegenerated .= "<th>{{ __('ID') }}</th>\n";
        //livewire headers
        $livewireheaders = "<th><a wire:click.prevent=\"sortBy('$table.id')\" role=\"button\">{{ __('ID') }}</a></th>\n";
        $tbody = "";
        $tbody .= "@foreach($".Str::plural($table)." as $".Str::singular($table).")\n";
        $tbody .= "<tr>\n";
        $tbody .= "<td>{{\$".Str::singular($table)."->id}}</td>\n";

        $livewiretbody = $tbody;

        foreach ($tablecolumns as $column) {
            if($column != "id" && $column != "created_at" && $column != "updated_at" && $column != "deleted_at" && $column != "user_id")
            {
                $listquery .= "\n\t\t\t->orWhere('$table.$column', 'like', '%' . \$this->search . '%')";
                if(str_contains($column, '_id'))
                {
                    $noid = str_replace('_id', '', $column);
                    $noid_nounderscore = str_replace('_', ' ', $noid);
                    $justtable = str_replace('_id', '', $column);
                    $codegenerated .= "<th>{{ __('". ucwords($noid_nounderscore). "') }}</th>\n";
                    $livewireheaders .= "<th><a wire:click.prevent=\"sortBy('$table.$column')\" role=\"button\">{{ __('". ucwords($noid_nounderscore). "') }}</a></th>\n";
                    $tbody .= "<td>{{\$".Str::singular($table)."->$noid?\$".Str::singular($table)."->".$justtable."->title:\$".Str::singular($table)."->".$column."}}</td>\n";
                    $livewiretbody .= "<td>{{\$".Str::singular($table)."->$noid?\$".Str::singular($table)."->".$justtable."->title:\$".Str::singular($table)."->".$column."}}</td>\n";
                }
                else
                {
                    $nounderscore = str_replace('_', ' ', $column);
                    $codegenerated .= "<th>{{ __('". ucwords($nounderscore). "') }}</th>\n";
                    $livewireheaders .= "<th><a wire:click.prevent=\"sortBy('$table.$column')\" role=\"button\">{{ __('". ucwords($nounderscore). "') }}</a></th>\n";
                    $tbody .= "<td>{{\$".Str::singular($table)."->$column}}</td>\n";
                    $livewiretbody .= "<td>{{\$".Str::singular($table)."->$column}}</td>\n";
                }
            }
        }
        $listquery .= ";\n";
        $listquery .= "\t});\n";
        $listquery .= "})->orderBy(\$this->sortField, \$this->sortDirection)->paginate(\$this->result_no);";
        $tbody .= "</tr>\n";
        $tbody .= "@endforeach\n";
        //livewire tbody generation
        $livewiretbody .= "<td>\n";
        $livewiretbody .= "\t<div class=\"dropdown\">\n";
        $livewiretbody .= "\t\t<button class=\"btn btn-link text-secondary ps-0 pe-2\" data-bs-toggle=\"dropdown\" aria-haspopup=\"false\" aria-expanded=\"false\">\n";
        $livewiretbody .= "\t\t\t<i class=\"fa fa-ellipsis-v text-lg-v text-lg\" aria-hidden=\"true\"></i>\n";
        $livewiretbody .= "\t\t</button>\n";
        $livewiretbody .= "\t\t<div class=\"dropdown-menu me-sm-n4 me-n3\" style=\"position: absolute; inset: 0px 0px auto auto; margin: 0px; transform: translate(0px, 42px);\" data-popper-placement=\"bottom-end\">\n";
        $livewiretbody .= "\t\t\t<a class=\"dropdown-item\" wire:click=\"\$emit('edit',{{ \$".Str::singular($table)."->id }})\">{{ __('Edit') }}</a>\n";
        $livewiretbody .= "\t\t\t<a class=\"dropdown-item\" onclick=\"return confirm('Are You Sure You Want To Proceed With The Current Request!') || event.stopImmediatePropagation()\" wire:click=\"\$emit('delete',{{ \$".Str::singular($table)."->id }})\">{{ __('Delete') }}</a>\n";
        $livewiretbody .= "\t\t</div>\n";
        $livewiretbody .= "\t</div>\n";
        $livewiretbody .= "</td>\n";
        $livewiretbody .= "</tr>\n";
        $livewiretbody .= "@endforeach\n";
    @endphp
    <div class="columns-2 m-5">
        <div class="w-full p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700 overflow-x-auto">
            <div class="text-black text-lg font-bold">
                <center><span><strong>{{ __('THEAD') }}</strong></span></center>
            </div>
            <div>
                <a class="copybtn cursor-pointer flex justify-end"><i class="fa-solid fa-clipboard"></i></a>
                <pre><code>{{ $codegenerated }}</code></pre>
            </div>
        </div>
        <div class="mt-4 w-full p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700 overflow-x-auto">
            <div class="text-black text-lg font-bold">
                <center><span><strong>{{ __('TBODY') }}</strong></span></center>
            </div>
            <div>
                <a class="copybtn cursor-pointer flex justify-end"><i class="fa-solid fa-clipboard"></i></a>
                <pre><code>{{ $tbody }}</code></pre>
            </div>
        </div>
    </div>
    <div class="columns-2 m-5">
        <div class="mt-4 w-full p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700 overflow-x-auto">
            <div class="text-black text-lg font-bold">
                <center><span><strong>{{ __('THEAD - Livewire') }}</strong></span></center>
            </div>
            <div>
                <a class="copybtn cursor-pointer flex justify-end"><i class="fa-solid fa-clipboard"></i></a>
                <pre><code>{{ $livewireheaders }}</code></pre>
            </div>
        </div>
        <div class="mt-4 w-full p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700 overflow-x-auto">
            <div class="text-black text-lg font-bold">
                <center><span><strong>{{ __('TBODY - Livewire') }}</strong></span></center>
            </div>
            <div>
                <a class="copybtn cursor-pointer flex justify-end"><i class="fa-solid fa-clipboard"></i></a>
                <pre><code>{{ $livewiretbody }}</code></pre>
            </div>
        </div>
    </div>
    <div class="m-5">
        <div class="mt-4 w-full p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700 overflow-x-auto">
            <div class="text-black text-lg font-bold">
                <center><span><strong>{{ __('List Search Query') }}</strong></span></center>
            </div>
            <div>
                <a class="copybtn cursor-pointer flex justify-end"><i class="fa-solid fa-clipboard"></i></a>
                <pre><code>{{ $listquery }}</code></pre>
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

