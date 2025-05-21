<div>
    <flux:modal name="create-video" class="md:w-96">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Create video</flux:heading>
                <flux:text class="mt-2">Create your own favourite videos.</flux:text>
            </div>
            <flux:input label="Name" wire:model="title" placeholder="Your Video Title" />
            <flux:textarea label="Description" wire:model="description" placeholder="Your Video Description" />
            <div class="flex">
                <flux:spacer />
                <flux:button type="submit" variant="primary" wire:click="submit_video">Create Video</flux:button>
            </div>
        </div>
    </flux:modal>
</div>