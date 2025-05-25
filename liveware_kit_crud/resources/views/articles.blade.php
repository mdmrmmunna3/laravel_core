<x-layouts.app :title="__('Dashboard')">
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('Welcome to Articles Dashboard') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ __('Create your own intractive Articles') }}</flux:subheading>
        <flux:separator variant="subtle" />
    </div>

    <livewire:articles />




</x-layouts.app>