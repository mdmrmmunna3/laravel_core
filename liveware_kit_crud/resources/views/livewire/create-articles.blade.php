<div>
    <flux:modal name="create-articles" class="md:w-96">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Create Your Own Articles</flux:heading>
                <flux:text class="mt-2">Create Your Own favourte aritcles</flux:text>
            </div>

            <flux:input label="Title" wire:model="title" placeholder="Your Article Title" />
            <flux:input label="Content" wire:model="content" placeholder="Your Article Content" />

            <div class="flex">
                <flux:spacer />

                <flux:button type="submit" variant="primary" wire:click="create_articles">Create Articles</flux:button>
            </div>
        </div>
    </flux:modal>
</div>