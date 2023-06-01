<div>
    @if ($create)
        {{-- <x-create-designer /> --}}
        @livewire('designers.create-designer')
    @elseif($step)

        <x-index-designer />
    @elseif($testdata)
        <x-testdata-designer />
    @elseif($history)
        <x-history-designer />
    @elseif($edittestdata)
        <x-edittestdata-designer />
    @endif

    <script type="text/javascript">
        window.onbeforeunload = function() {
            return;
        }
    </script>
</div>
