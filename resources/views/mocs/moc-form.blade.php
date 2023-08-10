<x-layout>
    <section class="section container">

        <script src="{{ asset('/js/ckeditor5/ckeditor.js') }}"></script>

        <x-title :params="config('mocs')[$action]" />

        <form action="{{ config('mocs.cu_route') }}{{ $moc ? $moc->id : ''}}" method="POST" enctype="multipart/form-data">
        @csrf

            <x-select :params="config('mocs.form.project')" value="{{ $moc ? $moc->project_id : '' }}"/>
            <x-form-input :params="config('mocs.form.code')" value="{{ $moc ? $moc->code : '' }}"/>
            <x-form-input :params="config('mocs.form.title')" value="{{ $moc ? $moc->name : '' }}"/>
            <x-form-editor :params="config('mocs.form.description')" value="{{ $moc ? $moc->description : '' }}"/>

            <div class="buttons is-right">
                <button class="button is-dark">{{ config('mocs')[$action]['submitText'] }}</button>
            </div>

        </form>

    </section>
</x-layout>
