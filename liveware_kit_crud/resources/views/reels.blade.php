<x-layouts.app :title="__('Dashboard')">
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('Welcome to Reels Dashboard') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ __('Create your own intractive Reels') }}</flux:subheading>
        <flux:separator variant="subtle" />
    </div>

    <livewire:reels />
</x-layouts.app>