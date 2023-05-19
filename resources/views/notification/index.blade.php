<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Notificaciones') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg md:mx-0 mx-2">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-bold text-center my-4">Mis Notificaciones</h1>
                    <div class="divide-y divide-gray-200">
                        @forelse ($notification as $noti)
                        <div class="p-5 md:flex md:justify-between md:items-center">
                            <div>
                                <p>Tienes un nuevo candidato en:
                                    <span class="font-bold">{{ $noti->data['name_vacant'] }}</span>
                                </p>
                                <p>
                                    <span class="font-bold">{{ $noti->created_at->diffForHumans() }}</span>
                                </p>
                            </div>
                            <div class="mt-5 lg:mt-0">
                                <a href="{{route('candidate.index', $noti->data['id_vacant'])}}" class="p-3 text-sm uppercase font-bold text-white bg-green-500 rounded-lg">Ver candidatos</a>
                            </div>
                        </div>
                    @empty
                        <p class="text-center text-gray-600">No hay notificaciones Nuevas</p>
                    @endforelse
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
