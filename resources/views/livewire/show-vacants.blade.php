<div>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        @forelse ($vacants as $v)
            <div class="p-6 bg-white border-b border-gray-200 md:flex md:justify-between md:items-center">
                <div class="leading-10">
                    <a href="#" class="text-xl font-bold">
                        {{ $v->title }}
                    </a>
                    <p class="text-sm text-gray-600 font-bold">{{ $v->company }}</p>
                    <p class="text-sm text-gray-500">Último día: {{ $v->last_date->format('d/m/Y') }}</p>
                </div>
                <div class="flex flex-col md:flex-row gap-3 items-stretch mt-5 md:mt-0">
                    <a href=""
                        class="bg-slate-800 text-center py-2 px-4 rounded-lg text-white text-xs font-bold uppercase">
                        Ver candidatos
                    </a>
                    <a href="{{route('vacants.edit', $v->id)}}"
                        class="bg-blue-800 text-center py-2 px-4 rounded-lg text-white text-xs font-bold uppercase">
                        Editar
                    </a>
                    <a href=""
                        class="bg-red-600 text-center py-2 px-4 rounded-lg text-white text-xs font-bold uppercase">
                        Eliminar
                    </a>
                </div>
            </div>

        @empty
            <p class="p-3 text-center text-sm text-gray-500">No hay Vacantes</p>
        @endforelse
        
    </div>
    <div class="mt-5">
        {{ $vacants->links() }}
    </div>
</div>
