<div class="field">
    <label class="label">{{ $params['label'] }}</label>
    <div class="control">
      <input class="input" type="text" name="{{ $params['name'] }}" placeholder="{{ $params['placeholder'] }}" value="{{ old($params['name'], $value) }}">
    </div>

    @error($params['name'])
        <div class="notification is-danger is-light is-size-7 p-1 mt-1">{{ $message }}</div>
    @enderror

</div>