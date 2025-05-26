<div>
    @if ($successMessage)
        <div class="alert alert-success">
            {{ $successMessage }}
        </div>
    @endif
    <flux:modal name="create-post" class="md:w-96">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Create New Post</flux:heading>
                <flux:text class="mt-2">Create Your own post.</flux:text>
            </div>

            <flux:input label="Title" wire:model="title" placeholder="Your post Title" />
            <flux:textarea label="Description" wire:model="describ" placeholder="Your Post Description" />

            <div class="flex">
                <flux:spacer />

                <flux:button type="submit" variant="primary" wire:click="submit">Create Post</flux:button>
            </div>
        </div>
    </flux:modal>
</div>