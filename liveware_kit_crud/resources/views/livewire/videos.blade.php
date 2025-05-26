<div>

    <flux:modal.trigger name="create-video">
        <flux:button>Create Video</flux:button>
    </flux:modal.trigger>

    <livewire:create-video />
    <livewire:edit-video />

    <flux:modal name="delete-video" class="min-w-[22rem]">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Delete Video?</flux:heading>
                <flux:text class="mt-2">
                    <p>You're about to delete this Video.</p>
                    <p>This action cannot be reversed.</p>
                </flux:text>
            </div>
            <div class="flex gap-2">
                <flux:spacer />
                <flux:modal.close>
                    <flux:button variant="ghost">Cancel</flux:button>
                </flux:modal.close>
                <flux:button type="submit" variant="danger" wire:click="destroy_video">Delete Vidoe</flux:button>
            </div>
        </div>
    </flux:modal>

    <div class="overflow-x-auto mt-5 max-w-full rounded-box border border-base-content/5 bg-base-100">
        <table class="table table-zebra w-full text-sm">
            <!-- head -->
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Video Title</th>
                    <th>Describtion</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="text-center">

                @foreach ($videos as $video)
                    <tr>
                        <th class="py-1">{{ $video->id }}</th>
                        <td class="py-1">{{ $video->title }}</td>
                        <td class="py-1">{{ $video->description }}</td>
                        <td class="py-1">
                            @if ($video->videoImage)
                                <img src="{{ asset('storage/' . $video->videoImage) }}" alt="{{ $video->title }}"
                                    class="w-10 h-10 rounded-full">
                            @else
                                <p>No Video Image found</p>
                            @endif
                        </td>
                        <td class="py-1">
                            <flux:button size="sm" wire:click="edit({{ $video->id }})">Edit</flux:button>
                            <flux:button size="sm" variant="danger" wire:click="delete({{ $video->id }})">Delete
                            </flux:button>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>