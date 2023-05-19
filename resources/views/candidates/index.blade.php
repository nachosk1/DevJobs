<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Candidatos Vacante') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg md:mx-0 mx-2">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-2xl font-bold text-center my-10">{{ $vacant->title }}</h1>
                    <div class="md:flex md:justify-center p-5">
                        <ul class="divide-y divide-gray-200 w-full">
                            @forelse ($vacant->candidates as $candidate)
                                <li class="p-3 flex items-center">
                                    <div class="flex-1">
                                        <p class="text-xl font-medium text-gray-800">{{ $candidate->user->name }}</p>
                                        <p class="text-sm text-gray-600">{{ $candidate->user->email }}</p>
                                        <p class="text-sm font-medium text-gray-600">Día que se postuló:
                                            <span
                                                class="font-normal">{{ $candidate->created_at->diffForHumans() }}</span>
                                        </p>
                                    </div>
                                    <div>
                                        <a href="{{ asset('storage/cv/' . $candidate->cv) }}" target="_blank" rel="noreferrer noopener"
                                            class="inline-flex items-center shadow-sm px-3 py-1 border border-gray-300 text-sm leading-5 font-medium rounded-full text-white bg-gray-700 hover:bg-gray-50 hover:text-black">
                                            Ver CV
                                        </a>
                                    </div>
                                </li>
                            @empty
                                <p class="p-3 text-center text-sm text-gray-600">No hay candidatos aún</p>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
