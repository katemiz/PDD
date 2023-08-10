<script>
    function showHideModal() {
        if ( document.getElementById('infomodal').classList.contains('is-active') ) {
            modalOff ()
        } else {
            document.getElementById('infomodal').classList.add('is-active')
        }
    }

    function modalOff () {
        document.getElementById('infomodal').classList.remove('is-active')
    }
</script>



<div class="column has-text-right">
    <a href="javascript:showHideModal()">
        <span class="icon has-text-info">
            <x-carbon-information-square-filled />
        </span>
    </a>
</div>


<div class="modal p-6" id="infomodal">
    <div class="modal-background" onclick="modalOff()"></div>
    <div class="modal-content card p-6">
        <p class="subtitle">{!! $info['title'] !!}</p>
        <p class="my-3">{!! $info['text'] !!}</p>

        @if (isset($info['link']))
            <p class="has-text-right mt-3">
                <a href="{{ $info['link'] }}">{{ $info['source'] }}</a>
            </p>
        @endif
    </div>
</div>