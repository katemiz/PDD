@role('admin')

    <section class="section container">
        <x-title :params="config('users.list')" />
        <x-table-action :params="config('users')" />

        @if ($records->count() > 0)
            <x-table :params="config('users')" :records="$records" />
            {{ $records->links('pagination.bulma') }}
        @else
            <x-notification type="is-warning is-light" message="{{ config('users.list.noitem') }}" />
        @endif
    </section>

@else

    <section class="section container">
        <x-title :params="['title' => 'Oooops..','subtitle' => 'No right']" />
        <x-notification type="notification is-danger" message="You dont have right to view" />
    </section>

@endrole