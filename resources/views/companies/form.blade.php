<x-layout>
<section class="section container">

    <x-title :params="config('companies')[$action]" />

    <form action="{{ config('companies.cu_route') }}{{ $company ? $company->id : '' }}" method="POST" enctype="multipart/form-data">
    @csrf

        <x-form-input :params="config('companies.form.name')" value="{{ $company ? $company->name : '' }}"/>
        <x-form-input :params="config('companies.form.fullname')" value="{{ $company ? $company->fullname : '' }}"/>

        <div class="buttons is-right">
            <button class="button is-dark">{{ config('companies')[$action]['submitText'] }}</button>
        </div>

    </form>

</section>
</x-layout>
