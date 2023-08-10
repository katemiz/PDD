<section class="section container">

    <x-title :params="config('pocs.list')" />
    <x-table-action :params="config('pocs')" />

    @if ($records->count() > 0)

        <x-table :params="config('pocs')" :records="$records" />
        {{ $records->links('pagination.bulma') }}

    @else
        <x-notification type="is-warning is-light" message="{{ config('pocs.list.noitem') }}" />
    @endif

</section>
