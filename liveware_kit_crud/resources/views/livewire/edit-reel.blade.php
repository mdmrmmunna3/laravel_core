<div>
    <flux:modal name="edit-reel" class="md:w-96">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Edit Reel</flux:heading>
                <flux:text class="mt-2">Edit your own Reel here!</flux:text>
            </div>

            <flux:input label="Title" wire:model="reels_title" placeholder="Your Reel Title" />
            <flux:textarea label="Description" wire:model="description" placeholder="Your Reel Description" />
            @if ($extstingImage)
                <p class="text-sm mb-1">Current Image:</p>
                <img src="{{ asset('storage/' . $extstingImage) }}" style="max-height: 100px; border-radius: 4px;">
            @endif
            <flux:input type="file" wire:model="newImage" label="New Image" />

            <div class="flex">
                <flux:spacer />

                <flux:button type="submit" variant="primary" wire:click="update_reel">Update Reel</flux:button>
            </div>
        </div>
    </flux:modal>
</div>