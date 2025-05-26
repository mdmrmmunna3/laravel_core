<div>
    <flux:modal name="edit-video" class="md:w-96">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Edit video</flux:heading>
                <flux:text class="mt-2">Edit your own favourite videos.</flux:text>
            </div>
            <flux:input label="Name" wire:model="title" placeholder="Your Video Title" />
            <flux:textarea label="Description" wire:model="description" placeholder="Your Video Description" />
            @if ($existing_image_path)
                <p class="text-sm mb-1">Current Image:</p>
                <img src="{{ asset('storage/' . $existing_image_path) }}" class="w-20 h-20 rounded-full">
            @endif
            <flux:input type="file" label="Video Image" wire:model="new_image" placeholder="Your Video Image" />
            <div class="flex">
                <flux:spacer />
                <flux:button type="submit" variant="primary" wire:click="update_video">Update Video</flux:button>
            </div>
        </div>
    </flux:modal>
</div>