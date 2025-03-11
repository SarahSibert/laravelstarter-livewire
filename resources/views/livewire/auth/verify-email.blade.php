<div class="mt-4 flex flex-col gap-6">
    <p class="text-center">
        {{ __('Please verify your email address by clicking on the link we just emailed to you.') }}
    </p>

    @if (session('status') == 'verification-link-sent')
        <p class="text-center font-medium !dark:text-green-400 !text-green-600">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </p>
    @endif

    <div class="flex flex-col items-center justify-between space-y-3">
        <x-button wire:click="sendVerification" variant="primary" class="w-full">
            {{ __('Resend verification email') }}
        </x-button>

        <a class="text-sm cursor-pointer" wire:click="logout">
            {{ __('Log out') }}
        </a>
    </div>
</div>
