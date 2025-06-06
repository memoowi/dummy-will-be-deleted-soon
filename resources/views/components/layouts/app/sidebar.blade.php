<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-white dark:bg-zinc-800">
        <flux:sidebar sticky stashable class="border-e border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
            <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

            <a href="{{ route('dashboard') }}" class="me-5 flex items-center space-x-2 rtl:space-x-reverse" wire:navigate>
                <x-app-logo />
            </a>

            <flux:navlist variant="outline">
                <flux:navlist.group :heading="__('Platform')" class="grid">
                    {{-- Dashboard --}}
                    <flux:navlist.item icon="home" :href="route('dashboard')" :current="request()->routeIs('dashboard')" wire:navigate>{{ __('Dashboard') }}</flux:navlist.item>
                    {{-- Employee Management --}}
                    <flux:navlist.item icon="user-group" :href="`#`" :current="`#`" wire:navigate>{{ __('Employee Management') }}</flux:navlist.item>
                    {{-- Payroll --}}
                    <flux:navlist.item icon="circle-stack" :href="`#`" :current="`#`" wire:navigate>{{ __('Payroll') }}</flux:navlist.item>
                    {{-- Time & Attendance --}}
                    <flux:navlist.item icon="calendar-date-range" :href="`#`" :current="`#`" wire:navigate>{{ __('Time & Attendance') }}</flux:navlist.item>
                    {{-- Leave Management --}}
                    <flux:navlist.item icon="inbox-arrow-down" :href="`#`" :current="`#`" wire:navigate>{{ __('Leave Management') }}</flux:navlist.item>
                    {{-- Reports --}}
                    <flux:navlist.item icon="clipboard-document-list" :href="`#`" :current="`#`" wire:navigate>{{ __('Reports') }}</flux:navlist.item>
                </flux:navlist.group>

                <flux:navlist.group :heading="__('Configuration')" class="grid">
                    {{-- Company Setting --}}
                    <flux:navlist.item icon="cog-6-tooth" :href="route('admin.company-settings')" :current="request()->routeIs('admin.company-settings')" wire:navigate>{{ __('Company Setting') }}</flux:navlist.item>
                    
                    {{-- Departments & Positions --}}
                    <flux:navlist.item icon="building-office-2" :href="route('admin.departments-and-positions')" :current="request()->routeIs('admin.departments-and-positions')" wire:navigate>{{ __('Departments & Positions') }}</flux:navlist.item>

                    {{-- Salaries Componenet --}}
                    <flux:navlist.item icon="banknotes" :href="route('admin.salary-components')" :current="request()->routeIs('admin.salary-components')" wire:navigate>{{ __('Salary Components') }}</flux:navlist.item>
                    
                    {{-- Tax Setting --}}
                    <flux:navlist.item icon="document-currency-dollar" :href="`#`" :current="`#`" wire:navigate>{{ __('Tax Settings') }}</flux:navlist.item>
                </flux:navlist.group>
            </flux:navlist>

            <flux:spacer />

            <!-- Desktop User Menu -->
            <flux:dropdown position="bottom" align="start">
                <flux:profile
                    :name="auth()->user()->name"
                    :initials="auth()->user()->initials()"
                    icon-trailing="chevrons-up-down"
                />

                <flux:menu class="w-[220px]">
                    <flux:menu.radio.group>
                        <div class="p-0 text-sm font-normal">
                            <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                                <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                    <span
                                        class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white"
                                    >
                                        {{ auth()->user()->initials() }}
                                    </span>
                                </span>

                                <div class="grid flex-1 text-start text-sm leading-tight">
                                    <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                    <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                                </div>
                            </div>
                        </div>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <flux:menu.radio.group>
                        <flux:menu.item :href="route('settings.profile')" icon="cog" wire:navigate>{{ __('Settings') }}</flux:menu.item>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                            {{ __('Log Out') }}
                        </flux:menu.item>
                    </form>
                </flux:menu>
            </flux:dropdown>
        </flux:sidebar>

        <!-- Mobile User Menu -->
        <flux:header class="lg:hidden">
            <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

            <flux:spacer />

            <flux:dropdown position="top" align="end">
                <flux:profile
                    :initials="auth()->user()->initials()"
                    icon-trailing="chevron-down"
                />

                <flux:menu>
                    <flux:menu.radio.group>
                        <div class="p-0 text-sm font-normal">
                            <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                                <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                    <span
                                        class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white"
                                    >
                                        {{ auth()->user()->initials() }}
                                    </span>
                                </span>

                                <div class="grid flex-1 text-start text-sm leading-tight">
                                    <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                    <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                                </div>
                            </div>
                        </div>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <flux:menu.radio.group>
                        <flux:menu.item :href="route('settings.profile')" icon="cog" wire:navigate>{{ __('Settings') }}</flux:menu.item>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                            {{ __('Log Out') }}
                        </flux:menu.item>
                    </form>
                </flux:menu>
            </flux:dropdown>
        </flux:header>

        {{ $slot }}

        <x-toaster-hub />
        @fluxScripts
    </body>
</html>
