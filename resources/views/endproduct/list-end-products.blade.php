<section class="section container">

    <div class="columns">
        <div class="column"><x-title :params="config('endproducts.list')" /></div>
        <div class="column is-one"><x-info :info="config('definitions.endproduct')" /></div>
    </div>
    
    <x-table-action :params="config('endproducts')" />

    @if ($records->count() > 0)

        <x-table :params="config('endproducts')" :records="$records" />
        {{ $records->links('pagination.bulma') }}

    @else
        <x-notification type="is-warning is-light" message="{{ config('endproducts.list.noitem') }}" />
    @endif

</section>
