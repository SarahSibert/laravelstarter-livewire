 <div class="flex flex-col gap-6">
    <x-auth-header title="Forgot password" description="Enter your email to receive a password reset link" />

    <!-- Session Status -->
    <x-auth-session-status class="text-center" :status="session('status')" />

    <form wire:submit="sendPasswordResetLink" class="flex flex-col gap-6">
        <!-- Email Address -->
        <x-input
            wire:model="email"
            :label="__('Email Address')"
            type="email"
            name="email"
            required
            autofocus
            placeholder="email@example.com"
        />

        <x-button variant="primary" type="submit" class="w-full">{{ __('Email password reset link') }}</x-button>
    </form>

    <div class="space-x-1 text-center text-sm text-zinc-400">
        Or, return to
        <a href="{{ route('login') }}" wire:navigate>log in</a>
    </div>
</div>
