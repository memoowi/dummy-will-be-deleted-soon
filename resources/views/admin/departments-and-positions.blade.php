<x-layouts.app :title="__('Departments and Positions')">
    <x-page-heading :pageHeading="__('Departments and Positions')" :pageDesc="__('Manage your departments and positions')" />

    <div class="flex h-full w-full flex-1 flex-col gap-4">

        <div class="flex items-center gap-4">
            <livewire:add-department />
            <flux:button icon="plus" variant="primary" type="button" class="w-full">
                {{ __('Add Position') }}
            </flux:button>
        </div>
            
        <table class="w-full table-auto border-collapse">
            <thead>
                <tr class="text-left text-sm uppercase font-bold border-b">
                    <th class="p-4">{{ __('Department') }}</th>
                    <th class="p-4">{{ __('Position') }}</th>
                    <th class="p-4">{{ __('Actions') }}</th>
                </tr>
            </thead>
            <tbody>
                <tr class="text-sm border-b border-neutral-500 hover:bg-gray-50/5">
                    <td class="px-4 py-2">Department 1</td>
                    <td class="px-4 py-2">Positions 1</td>
                    <td class="px-4 py-2">
                        <div class="flex items-center gap-2">
                            <flux:button icon="pencil-square" variant="primary" type="button">
                                {{ __('Edit') }}
                            </flux:button>
                            <flux:button icon="trash" variant="danger" type="button">
                                {{ __('Delete') }}
                            </flux:button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</x-layouts.app>