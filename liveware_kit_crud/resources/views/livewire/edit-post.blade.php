<div>
    <flux:modal name="edit-post" class="md:w-96">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Eidt Post</flux:heading>
                <flux:text class="mt-2">Edit Your own post.</flux:text>
            </div>

            <flux:input label="Title" wire:model="title" placeholder="Your post Title" />
            <flux:textarea label="Description" wire:model="describ" placeholder="Your Post Description" />

            <div class="flex">
                <flux:spacer />

                <flux:button type="submit" variant="primary" wire:click="update">Update Post</flux:button>
            </div>
        </div>
    </flux:modal>
</div>