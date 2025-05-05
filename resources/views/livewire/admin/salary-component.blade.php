<div>
    <x-page-heading :pageHeading="__('Salary Components')" :pageDesc="__('Manage your company salary components')" />

    {{-- Include Allowances & Deductions --}}


    {{-- Allowances --}}
    <div class="mb-4">
        <flux:button icon="plus" variant="primary" type="button" class="w-full">
            {{ __('Add Allowance') }}
        </flux:button>

        <table class="w-full table-auto border-collapse">
            <thead>
                <tr class="text-left text-sm uppercase font-bold border-b">
                    <th class="p-4">{{ __('Name') }}</th>
                    <th class="p-4">{{ __('Amount') }}</th>
                    <th class="p-4">{{ __('Rule') }}</th>
                    <th class="p-4">{{ __('Actions') }}</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>

    <flux:separator  />

    {{-- Deductions --}}
    <div class="mt-4">
        <flux:button icon="plus" variant="primary" type="button" class="w-full">
            {{ __('Add Deduction') }}
        </flux:button>
    </div>

</div>
