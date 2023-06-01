<div>
    @if ($show)
    <x-show-executor />
    @elseif($create)
    <x-create-executor />
    @elseif($edit)
    <x-edit-executor />
    @elseif($showTestdata)
    <x-showTestdata-executor />
    @elseif($index)
    <x-index-executor />
    @endif

    <script type="text/javascript">
        window.onbeforeunload = function() {
            return;
        }
    </script>
</div>