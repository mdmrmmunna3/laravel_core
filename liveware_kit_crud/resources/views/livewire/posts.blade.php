<div>
    <flux:modal.trigger name="create-post">
        <flux:button>Create post</flux:button>
    </flux:modal.trigger>

    <livewire:post-create />
    <livewire:edit-post />

    <flux:modal name="delete-post" class="min-w-[22rem]">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Delete Post?</flux:heading>

                <flux:text class="mt-2">
                    <p>You're about to delete this post.</p>
                    <p>This action cannot be reversed.</p>
                </flux:text>
            </div>

            <div class="flex gap-2">
                <flux:spacer />

                <flux:modal.close>
                    <flux:button variant="ghost">Cancel</flux:button>
                </flux:modal.close>

                <flux:button type="submit" variant="danger" wire:click="destroy">Delete post</flux:button>
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
                    <th>Describtion</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <!-- row 1 -->
                @foreach ($posts as $index => $post)

                    <tr>
                        <th class="py-1">{{ $index + 1 }}</th>
                        <td class="py-1">{{ $post->title }}</td>
                        <td class="py-1">{{ $post->describ }}</td>
                        <td class="py-1">
                            <flux:button size="sm" wire:click="edit({{ $post->id }})">Edit</flux:button>
                            <flux:button size="sm" variant="danger" wire:click="delete({{ $post->id }})">Delete
                            </flux:button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $posts->links() }}
    </div>


</div>