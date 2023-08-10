<x-log-layout>

    <x-auth-validation-errors class="notification is-danger is-light mx-4" :errors="$errors" />

    <form method="POST" class="mx-4" action="{{ route('register') }}">
        @csrf

        <div class="columns">
            <div class="column is-half">
                <!-- Name -->
                <x-input name="name" label="{{__('ui.elements.name.label')}}" :value="old('name')" placeholder="{{__('ui.elements.name.placeholder')}}"/>
            </div>

            <div class="column">
                <!-- Lastname -->
                <x-input name="lastname" label="{{__('ui.elements.lastname.label')}}" :value="old('lastname')" placeholder="{{__('ui.elements.lastname.label')}}"/>
            </div>
        </div>

        <!-- Email Address -->
        <x-email name="email" :value="old('email')" />

        <div class="columns">

            <div class="column is-half">
                <!-- Password -->
                <x-password name="password" label="{{__('ui.elements.password.label')}}" :value="old('password')" placeholder="{{__('ui.elements.password.placeholder')}}" />
            </div>

            <div class="column is-half">
                <!-- Password -->
                <x-password name="password_confirmation" label="{{__('ui.elements.cpassword.label')}}" :value="old('password_confirmation')" placeholder="{{__('ui.elements.cpassword.placeholder')}}" />
            </div>
        </div>

        <button class="button is-primary my-6 is-fullwidth">{{ __('Register') }}</button>

        <!-- Other Actions Links -->
        <x-auth-actions action="register"/>

    </form>

</x-log-layout>
