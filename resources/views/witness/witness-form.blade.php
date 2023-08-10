<x-layout>
    <section class="section container">

        <script src="{{ asset('/js/ckeditor5/ckeditor.js') }}"></script>

        <x-title :params="config('witnesses')[$action]" />

        <form action="{{ config('witnesses.cu_route') }}{{ $witness ? $witness->id : ''}}" method="POST" enctype="multipart/form-data">
        @csrf

            <x-select :params="config('witnesses.form.project')" value="{{ $witness ? $witness->project_id : '' }}"/>
            <x-form-input :params="config('witnesses.form.code')" value="{{ $witness ? $witness->code : '' }}"/>
            <x-form-input :params="config('witnesses.form.title')" value="{{ $witness ? $witness->name : '' }}"/>
            <x-form-editor :params="config('witnesses.form.description')" value="{{ $witness ? $witness->description : '' }}"/>

            <div class="buttons is-right">
                <button class="button is-dark">{{ config('witnesses')[$action]['submitText'] }}</button>
            </div>

        </form>

    </section>
</x-layout>
