<div>

    <flux:modal name="create-reel" class="md:w-96">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Create Reel</flux:heading>
                <flux:text class="mt-2">Create your own Reel here!</flux:text>
            </div>

            <flux:input label="Title" wire:model="reels_title" placeholder="Your Reel Title" />
            <flux:textarea label="Description" wire:model="description" placeholder="Your Reel Description" />
            <flux:input type="file" wire:model="image_path" label="Image" />

            <div class="flex">
                <flux:spacer />

                <flux:button type="submit" variant="primary" wire:click="created_reel">Create Reel</flux:button>
            </div>
        </div>
    </flux:modal>
</div>