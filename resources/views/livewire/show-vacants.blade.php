<div>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        @forelse ($vacants as $v)
            <div class="p-6 bg-white border-b border-gray-200 md:flex md:justify-between md:items-center">
                <div class="leading-10">
                    <a href="{{route('vacants.show', $v->id)}}" class="text-xl font-bold">
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
                    <a href="{{ route('vacants.edit', $v->id) }}"
                        class="bg-blue-800 text-center py-2 px-4 rounded-lg text-white text-xs font-bold uppercase">
                        Editar
                    </a>
                    <button wire:click="$emit('showAlert', {{ $v->id }})"
                        class="bg-red-600 text-center py-2 px-4 rounded-lg text-white text-xs font-bold uppercase">
                        Eliminar
                    </button>
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
@push('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Livewire.on('showAlert', vacantId => {
            Swal.fire({
                title: '¿Esta seguro eliminar vacante?',
                text: "Una vacante eliminada no se puede recuperar",
                icon: 'peligro',
                showCancelButton: true,
                confirmButtonColor: 'rgb(34 197 94',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, Eliminar',
                cancelButtonColor: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    //eliminar la vacante, accion en ShowVacants
                    Livewire.emit('deleteVacant', vacantId)

                    Swal.fire(
                        'Se eliminó vacante',
                        'Eliminado correctamente',
                        'success'
                    )
                }
            })
        })
    </script>
@endpush
