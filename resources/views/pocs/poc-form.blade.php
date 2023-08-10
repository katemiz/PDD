<x-layout>
    <section class="section container">

        <script src="{{ asset('/js/ckeditor5/ckeditor.js') }}"></script>

        <x-title :params="config('pocs')[$action]" />

        <form action="{{ config('pocs.cu_route') }}{{ $poc ? $poc->id : ''}}" method="POST" enctype="multipart/form-data">
        @csrf

            <x-select :params="config('pocs.form.project')" value="{{ $poc ? $poc->project_id : '' }}"/>
            <x-form-input :params="config('pocs.form.code')" value="{{ $poc ? $poc->code : '' }}"/>
            <x-form-input :params="config('pocs.form.title')" value="{{ $poc ? $poc->name : '' }}"/>
            <x-form-editor :params="config('pocs.form.description')" value="{{ $poc ? $poc->description : '' }}"/>

            <div class="buttons is-right">
                <button class="button is-dark">{{ config('pocs')[$action]['submitText'] }}</button>
            </div>

        </form>

    </section>
</x-layout>
