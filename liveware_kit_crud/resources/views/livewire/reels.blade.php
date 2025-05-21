<div>

    <flux:modal.trigger name="create-reel">
        <flux:button>Create Reel</flux:button>
    </flux:modal.trigger>

    <livewire:create-reels />
    <livewire:edit-reel />

    <flux:modal name="delete-reel" class="min-w-[22rem]">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Delete Reel?</flux:heading>
                <flux:text class="mt-2">
                    <p>You're about to delete this Reel.</p>
                    <p>This action cannot be reversed.</p>
                </flux:text>
            </div>
            <div class="flex gap-2">
                <flux:spacer />
                <flux:modal.close>
                    <flux:button variant="ghost">Cancel</flux:button>
                </flux:modal.close>
                <flux:button type="submit" variant="danger" wire:click="destroy_reel">Delete Reel</flux:button>
            </div>
        </div>
    </flux:modal>

    <div class="overflow-x-auto mt-5 max-w-full rounded-box border border-base-content/5 bg-base-100">
        <table class="table table-zebra w-full text-sm">
            <!-- head -->
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Reel Title</th>
                    <th>Describtion</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <!-- row 1 -->
                @foreach ($reels as $reel)
                    <tr>
                        <th class="py-1">{{ $reel->id }}</th>
                        <td class="py-1">{{$reel->reels_title}}</td>
                        <td class="py-1">{{$reel->description}}</td>
                        <td class="py-1">
                            <flux:button size="sm" wire:click="edit({{ $reel->id }})">Edit</flux:button>
                            <flux:button size="sm" variant="danger" wire:click="delete({{ $reel->id }})">Delete
                            </flux:button>
                        </td>
                    </tr>
                @endforeach


            </tbody>
        </table>
    </div>

</div>