<div class="field">

    <label class="label has-text-info has-text-weight-light" for="email">{{__('ui.elements.email.label')}}</label>

    <div class="control has-icons-right">

        <input
            class="input"
            type="email"
            name="email"
            value="{{$attributes["value"]}}"
            placeholder="{{__('ui.elements.email.placeholder')}}" required >
    </div>

    @error($attributes["email"])
    <p class="help is-danger">{{$attributes["email"]}}</p>
    @enderror

</div>
