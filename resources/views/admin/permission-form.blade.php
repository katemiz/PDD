<x-layout>
<section class="section container">

    <x-title :params="config('permissions')[$action]" />

    <form action="{{ config('permissions.cu_route') }}{{ $permission ? $permission->id : '' }}" method="POST" enctype="multipart/form-data">
    @csrf

        <x-form-input :params="config('permissions.form.name')" value="{{ $permission ? $permission->name : '' }}"/>
        {{-- <x-form-input :params="config('permissions.form.fullname')" value="{{ $permission ? $permission->fullname : '' }}"/> --}}

        <div class="buttons is-right">
            <button class="button is-dark">{{ config('permissions')[$action]['submitText'] }}</button>
        </div>

    </form>

</section>
</x-layout>
