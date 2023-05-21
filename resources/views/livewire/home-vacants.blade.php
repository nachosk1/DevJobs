<div>
    <livewire:filter-vacant />
    <div class="py-12">
        <div class="max-w-7xl mx-auto">
            <h3 class="font-extrabold text-4xl text-gray-700 mb-12">Nuestras Vacantes Disponibles</h3>
            <div class="bg-white shadow-sm rounded-lg p-6 divide-y divide-gray-300">
                @forelse ($vacants as $v)
                    <div class="md:flex md:justify-between md:items-center py-5">
                        <div class="md:flex-1">
                            <a  href="{{route('vacants.show', $v->id)}}" class="text-3xl font-extrabold text-gray-600">
                                {{$v->title}}
                            </a>
                            <p class="text-base text-gray-600 mb-1">{{$v->company}}</p>
                            <p class="text-xs font-bold text-gray-600 mb-1">{{$v->category->category}}</p>
                            <p class="text-base text-gray-600 mb-1">{{$v->salary->salary}}</p>
                            <p class="font-bold text-xs text-gray-600 ">
                                Último día para postularse:
                                <span class="font-normal">{{$v->last_date->format('d/m-Y')}}</span>
                            </p>
                        </div>
                        <div class="mt-5 md:mt-0">
                            <a class="bg-green-500 p-3 text-sm uppercase font-bold block text-center text-white rounded-lg" href="{{route('vacants.show', $v->id)}}"">Ver Vacantes</a>
                        </div>
                    </div>
                @empty
                    <p class="p-3 text-center text-sm text-gray-600">No hay vacantes aún</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
