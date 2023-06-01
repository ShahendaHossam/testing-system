<div>
    @if ($show)
    <x-show-reviewer />
    @elseif($index)
    <x-index-reviewer />
    @elseif($comment)
    <x-comment-reviewer />
    @endif

    <script type="text/javascript">
        window.onbeforeunload = function() {
            return;
        }
    </script>
</div>