@role('admin')

    <section class="section container">

        <x-title :params="config('permissions.list')" />
        <x-table-action :params="config('permissions')" />

        @if ($records->count() > 0)

            <x-table :params="config('permissions')" :records="$records" />
            {{ $records->links('pagination.bulma') }}

        @else
            <x-notification type="is-warning is-light" message="{{ config('permissions.list.noitem') }}" />
        @endif

    </section>

@else

    <section class="section container">
        <x-title :params="['title' => 'Oooops..','subtitle' => 'No right']" />
        <x-notification type="notification is-danger" message="You dont have right to view" />
    </section>

@endrole
