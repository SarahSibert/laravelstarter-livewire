<section class="mt-10 space-y-6">
    <div class="relative mb-5">
        <h1 class="text-xl">{{ __('Delete account') }}</h1>
        <p class="text-sm">{{ __('Delete your account and all of its resources') }}</p>
    </div>

    <div x-data="{ show: false }">
        <x-button variant="danger" x-on:click="show = true">
            {{ __('Delete account') }}
        </x-button>
    
        <x-modal x-show="show" x-transition x-on:click="show = false" class="max-w-lg">
            <form wire:submit="deleteUser" class="space-y-6">
                <div>
                    <h2 class="text-lg">{{ __('Are you sure you want to delete your account?') }}</h2>

                    <p class="text-sm">
                        {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                    </p>
                </div>

                <x-input wire:model="password" id="password" :label="__('Password')" type="password" name="password" />

                <div class="flex justify-end space-x-2">
                    <x-button variant="filled" x-on:click="show = false">{{ __('Cancel') }}</x-button>
                   
                    <x-button variant="danger" type="submit">{{ __('Delete account') }}</x-button>
                </div>
            </form>
        </x-modal>
    </div>
</section>
