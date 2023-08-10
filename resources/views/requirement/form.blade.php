<section class="section container">

    <script src="{{ asset('/js/ckeditor5/ckeditor.js') }}"></script>
    <x-title :params="config('requirements')[$action]" />

    <form action="{{ config('requirements.cu_route') }}{{ $requirement ? $requirement->id : '' }}" method="POST" enctype="multipart/form-data">
    @csrf

        <div class="field">
            <label class="label">{{ config('requirements.form.project.label') }}</label>
            <div class="control">
              <div class="select">
                <select name="{{ config('requirements.form.project.name') }}">
                  <option value="notselected">Select</option>

                  @foreach ($projects as $project)
                    <option value="{{ $project->id }}" @selected( count($projects) == 1 || $project->id == $value)>{{ $project->code }}</option>
                  @endforeach

                </select>
              </div>
            </div>

            @error(config('requirements.form.project.name'))
            <div class="notification is-danger is-light is-size-7 p-1 mt-1">{{ $message }}</div>
            @enderror
        </div>

        @if ($selectedPrj)

        <div class="field">
          <label class="label">{{ config('requirements.form.endproduct.label') }}</label>

          <div class="control">

              @if ( count($endproducts) > 0)

                @foreach ($endproducts as $endproduct)

                    <label class="checkbox is-block">
                        <input
                          type="checkbox"
                          name="{{ config('requirements.form.endproduct.name') }}{{$endproduct->id}}"
                          value="{{$endproduct->id}}"
                          @checked(in_array($endproduct->id,$current_ep_id_arr))>
                          {{ $endproduct->code }}
                    </label>

                @endforeach

              @else
                <p>{{ config('requirements.form.endproduct.nooptions')}}</p>
              @endif

          </div>
        </div>

        @else
        <p>{{ config('requirements.form.endproduct.nooptions') }}</p>
        @endif

        <x-select :params="config('requirements.form.rtype')" value="{{ $requirement ? $requirement->rtype : '' }}"/>
        <x-form-input :params="config('requirements.form.cross_ref_no')" value="{{ $requirement ? $requirement->cross_ref_no : '' }}"/>
        <x-form-editor :params="config('requirements.form.text')" value="{{ $requirement ? $requirement->text : '' }}" />
        <x-form-editor :params="config('requirements.form.remarks')" value="{{ $requirement ? $requirement->remarks : '' }}"/>


        <div class="buttons is-right">
            <button class="button is-dark">{{ config('requirements')[$action]['submitText'] }}</button>
        </div>

    </form>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif


</section>
