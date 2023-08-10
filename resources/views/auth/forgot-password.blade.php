<x-log-layout>

    <form method="POST" class="mx-4" action="{{ route('password.email') }}">
        @csrf

        <div class="notification">
            {{ __('ui.links.forgot.info') }}
        </div>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="notification is-danger is-light" :errors="$errors" />

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Email Address -->
        <x-email name="email" :value="old('email')" />

        <button class="button is-danger my-6 is-fullwidth">
            {{ __('ui.links.forgot.resetlink') }}
        </button>

        <!-- Other Actions Links -->
        <x-auth-actions action="fpassword"/>

    </form>

</x-log-layout>
