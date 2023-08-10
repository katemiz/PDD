<nav class="level my-6">

    <!-- Left side -->
    <div class="level-left">

        @if (isset($params['roles']['w']))
        @role($params['roles']['w'])
            <div class="level-item  has-text-centered">
                <a href="{{ $params['list']['addButton']['route'] }}" class="button is-dark">
                    <span class="icon is-small"><x-carbon-add /></span>
                    <span>{{ $params['list']['addButton']['text'] }}</span>
                </a>
            </div>
        @endrole
        @endif

        @if (isset($params['perms']['w']))
        @can($params['perms']['w'])
            <div class="level-item  has-text-centered">
                <a href="{{ $params['list']['addButton']['route'] }}" class="button is-dark">
                    <span class="icon is-small"><x-carbon-add /></span>
                    <span>{{ $params['list']['addButton']['text'] }}</span>
                </a>
            </div>
        @endcan
        @endif

    </div>

        
    <!-- Right side -->
    <div class="level-right">

        <div class="level-item">

            <div class="field has-addons">
                <p class="control">
                    <a class="button">
                        <span class="icon is-small is-left"><x-carbon-search /></span>
                    </a>
                </p>
                <p class="control">
                <input class="input" type="text" placeholder="{{ $params['list']['filterText'] }}" wire:model="search">
                </p>
                <p class="control">
                <a class="button">
                    <span class="icon is-small is-left" wire:click="resetFilter">
                        <x-carbon-close />
                    </span>
                </a>
                </p>
            </div>

        </div>

    </div>

</nav>