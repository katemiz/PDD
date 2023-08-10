<x-layout>
<section class="section container">


    <div class="columns">
        <div class="column"><x-title :params="config('endproducts')[$action]" /></div>
        <div class="column is-one"><x-info :info="config('definitions.endproduct')" /></div>
    </div>

    <form action="{{ config('endproducts.cu_route') }}{{ $endproduct ? $endproduct->id : '' }}" method="POST" enctype="multipart/form-data">
    @csrf

        <x-select :params="config('endproducts.form.project')" value=" {{ $endproduct ? $endproduct->project_id : ''}}"/>
        <x-form-input :params="config('endproducts.form.code')" value=" {{ $endproduct ? $endproduct->code : ''}}"/>
        <x-form-input :params="config('endproducts.form.title')" value=" {{ $endproduct ? $endproduct->title : ''}}"/>

        <div class="buttons is-right">
            <button class="button is-dark">{{ config('endproducts')[$action]['submitText'] }}</button>
        </div>

    </form>

</section>
</x-layout>
