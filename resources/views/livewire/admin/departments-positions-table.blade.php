<div>
    <table class="w-full table-auto border-collapse">
        <thead>
            <tr class="text-left text-sm uppercase font-bold border-b">
                <th class="p-4">{{ __('Department') }}</th>
                <th class="p-4">{{ __('Position') }}</th>
                <th class="p-4">{{ __('Actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($positions as $position)
                <tr class="text-sm border-b border-neutral-500 hover:bg-gray-50/5">
                    <td class="px-4 py-2">{{ $position->department->name }}</td>
                    <td class="px-4 py-2">{{ $position->name }}</td>
                    <td class="px-4 py-2">
                        <div class="flex items-center gap-2">
                            <flux:button icon="pencil-square" variant="primary" type="button">
                                {{ __('Edit') }}
                            </flux:button>

                            <flux:modal.trigger :name="'delete-position' . $position->id">
                                <flux:button icon="trash" variant="danger" type="button">
                                    {{ __('Delete') }}
                                </flux:button>
                            </flux:modal.trigger>
                            <flux:modal :name="'delete-position' . $position->id" class="min-w-[22rem]">
                                <div class="space-y-6">
                                    <div>
                                        <flux:heading size="lg">Delete project {{ $selectedPositionId }}?
                                        </flux:heading>
                                        <flux:text class="mt-2">
                                            <p>You're about to delete this project.</p>
                                            <p>This action cannot be reversed.</p>
                                        </flux:text>
                                    </div>
                                    <div class="flex gap-2">
                                        <flux:spacer />
                                        <flux:modal.close>
                                            <flux:button variant="ghost">Cancel</flux:button>
                                        </flux:modal.close>
                                        <flux:button type="submit" variant="danger">Delete project</flux:button>
                                    </div>
                                </div>
                            </flux:modal>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
