<div class="flex flex-col gap-6">
    <x-auth-header title="Log in to your account" description="Enter your email and password below to log in" />

    <!-- Session Status -->
    <x-auth-session-status class="text-center" :status="session('status')" />

    <form wire:submit="login" class="flex flex-col gap-6">
        <!-- Email Address -->
        <x-input
            wire:model="email"
            :label="__('Email address')"
            type="email"
            name="email"
            required
            autofocus
            autocomplete="email"
            placeholder="email@example.com"
        />

        <!-- Password -->
        <div class="relative">
            <x-input
                wire:model="password"
                :label="__('Password')"
                type="password"
                name="password"
                required
                autocomplete="current-password"
                placeholder="Password"
            />

            @if (Route::has('password.request'))
                <a class="absolute right-0 top-0 text-sm" href="{{ route('password.request') }}" wire:navigate>
                    {{ __('Forgot your password?') }}
                </a>
            @endif
        </div>

        <!-- Remember Me -->
        <x-checkbox wire:model="remember" label="{{ __('Remember me') }}" />

        <div class="flex items-center justify-end">
            <x-button variant="primary" type="submit" class="w-full">{{ __('Log in') }}</x-button>
        </div>
    </form>

    @if (Route::has('register'))
      <div class="space-x-1 text-center text-sm text-zinc-600 dark:text-zinc-400">
          Don't have an account?
          <a href="{{route('register')}}" wire:navigate>Sign up</a>
      </div>
    @endif
</div>
