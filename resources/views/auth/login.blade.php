<x-log-layout>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" class="mx-4" action="{{ route('login') }}">
        @csrf

        <!-- Validation Errors -->
        <x-auth-validation-errors class="notification is-danger is-light" :errors="$errors" />

        <!-- Email Address -->
        <x-email name="email" :value="old('email')" />

        <!-- Password -->
        <x-password name="password" label="{{__('ui.elements.password.label')}}" :value="old('password')" placeholder="{{__('ui.elements.password.placeholder')}}" />

        <button class="button is-link my-6 is-fullwidth">{{__('ui.links.login.text')}}</button>

        <!-- Other Actions Links -->
        {{-- <x-auth-actions action="login"/> --}}

    </form>

</x-log-layout>
