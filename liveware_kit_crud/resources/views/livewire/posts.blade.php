<div>
    <flux:modal.trigger name="create-post">
        <flux:button>Create post</flux:button>
    </flux:modal.trigger>

    <livewire:post-create />

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
                <tr>
                    <th class="py-1">1</th>
                    <td class="py-1">Cy Ganderton</td>
                    <td class="py-1">Quality Control Specialist</td>
                    <td class="py-1">Blue</td>
                </tr>


            </tbody>
        </table>
    </div>


</div>