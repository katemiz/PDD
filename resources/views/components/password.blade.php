<div class="field">

    <label class="label has-text-info has-text-weight-light" for="password" >{{$attributes["label"]}}</label>

    <div class="control has-icons-right">
        <input
            class="input"
            type="password"
            name="{{$attributes["name"]}}"
            value="{{$attributes["value"]}}"
            placeholder="{{$attributes["placeholder"]}}"
            required autocomplete="current-password">
    </div>

</div>
