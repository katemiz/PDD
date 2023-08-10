<footer class="footer has-background-dark">
<div class="columns has-text-white">
    <div class="column has-text-centered-mobile">

        <a href="{{ config('appconstants.kapkara.link') }}" class="icon-text has-color-warning">
            <span class="icon has-text-grey-light">
                <img src="{{ asset('/images/'.config('appconstants.kapkara.logo'))}}" alt="kapkara logo" width="28px">
            </span>
        </a>
        <br>
        <span class="ml-1 block">{{ config('appconstants.kapkara.name') }}</span>

    </div>
    <div class="column">
        <p class="has-text-weight-light has-text-centered has-text-centered-mobile">

        <span class="icon has-text-link has-text-centered">
            <x-carbon-tree-view-alt class="h-6 w-6 text-red-600"/>
        </span>
    </p>

        <p class="has-text-weight-light has-text-centered has-text-centered-mobile">{{ config('appconstants.app.name') }}</p>
        <p class="has-text-weight-light has-text-centered has-text-centered-mobile is-size-7 has-text-warning">{{ config('appconstants.app.motto') }}</p>
    </div>
    <div class="column">
        <p class="has-text-weight-light has-text-right has-text-centered-mobile">{{config('appconstants.app.version') }}</p>
        <p class="has-text-weight-light has-text-right has-text-centered-mobile is-size-7">{{config('appconstants.app.copyright') }}</p>
        <p class="has-text-weight-light has-text-right has-text-centered-mobile is-size-7 has-text-warning">{{config('appconstants.kapkara.motto') }}</p>
    </div>
</div>
</footer>