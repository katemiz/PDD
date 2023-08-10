<x-layout>
<section class="section container">

    <x-title :params="config('projects')[$action]" />

    <form action="{{ config('projects.cu_route') }}{{ $project ? $project->id : ''}}" method="POST" enctype="multipart/form-data">
    @csrf

        <x-select :params="config('projects.form.company')" value="{{ $project ? $project->company_id : '' }}"/>
        <x-form-input :params="config('projects.form.code')" value="{{ $project ? $project->code : '' }}"/>
        <x-form-input :params="config('projects.form.title')" value="{{ $project ? $project->title : '' }}"/>

        <div class="buttons is-right">
            <button class="button is-dark">{{ config('projects')[$action]['submitText'] }}</button>
        </div>

    </form>

</section>
</x-layout>
