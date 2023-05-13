<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Vacantes') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session()->has('message'))
                <div class="uppercase border text-sm border-green-600 bg-green-100 text-green-600 font-bold p-2 my-3">
                    {{ session('message') }}
                </div>
            @endif
            <livewire:show-vacants />
        </div>
    </div>
</x-app-layout>
