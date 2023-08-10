<section class="section container">

    <x-title :params="config('projects.list')" />
    <x-table-action :params="config('projects')" />

    @if ($records->count() > 0)

        <x-table :params="config('projects')" :records="$records" />
        {{ $records->links('pagination.bulma') }}

    @else
        <x-notification type="is-warning is-light" message="{{ config('projects.list.noitem') }}" />
    @endif

</section>
