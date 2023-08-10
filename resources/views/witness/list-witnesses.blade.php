<section class="section container">

    <x-title :params="config('witnesses.list')" />
    <x-table-action :params="config('witnesses')" />

    @if ($records->count() > 0)
        <x-table :params="config('witnesses')" :records="$records" />
        {{ $records->links('pagination.bulma') }}
    @else
        <x-notification type="is-warning is-light" message="{{ config('witnesses.list.noitem') }}" />
    @endif

</section>
