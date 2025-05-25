<div>
    <flux:modal.trigger name="create-articles">
        <flux:button>Create Articles</flux:button>
    </flux:modal.trigger>

    <livewire:create-articles>
        <livewire:edit-article>

            <flux:modal name="delete-article" class="min-w-[22rem]">
                <div class="space-y-6">
                    <div>
                        <flux:heading size="lg">Delete Article?</flux:heading>
                        <flux:text class="mt-2">
                            <p>You're about to delete this Article.</p>
                            <p>This action cannot be reversed.</p>
                        </flux:text>
                    </div>
                    <div class="flex gap-2">
                        <flux:spacer />
                        <flux:modal.close>
                            <flux:button variant="ghost">Cancel</flux:button>
                        </flux:modal.close>
                        <flux:button type="submit" variant="danger" wire:click="destroy_article">Delete Article
                        </flux:button>
                    </div>
                </div>
            </flux:modal>

            <div class="overflow-x-auto mt-5 max-w-full rounded-box border border-base-content/5 bg-base-100">
                <table class="table table-zebra w-full text-sm">
                    <!-- head -->
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <!-- row 1 -->
                        @foreach ($articles as $index => $article)
                            <tr>
                                <th class="py-1">{{ $index + 1 }}</th>
                                <td class="py-1">{{ $article->title }}</td>
                                <td class="py-1">{{ $article->content }}</td>
                                <td class="py-1">
                                    <flux:button size="sm" wire:click="edit({{ $article->id }})">Edit</flux:button>
                                    <flux:button size="sm" variant="danger" wire:click="delete({{ $article->id }})">Delete
                                    </flux:button>
                                </td>
                            </tr>
                        @endforeach



                    </tbody>
                </table>
            </div>
</div>