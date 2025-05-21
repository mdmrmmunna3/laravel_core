<x-layouts.app :title="__('Dashboard')">
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('Welcome to Videos Dashboard') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ __('Manage your vidoes') }}</flux:subheading>
        <flux:separator variant="subtle" />
    </div>

    <livewire:videos />

</x-layouts.app>