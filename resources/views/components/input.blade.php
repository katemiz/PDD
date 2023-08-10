<div class="field">

    <label class="label has-text-info has-text-weight-light" for="{{$attributes['name']}}">
        {{$attributes['label']}}
    </label>

    <div class="control has-icons-right">

        <input
            {!! $attributes->merge(['class' => 'input']) !!}
            name="{{$attributes['name']}}"
            id="{{$attributes['name']}}"
            type="text"
            placeholder="{{$attributes['placeholder']}}" required>
    </div>
</div>
