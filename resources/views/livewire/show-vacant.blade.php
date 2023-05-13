<div class="p-10">
    <div class="mb-5">
        <h3 class="font-bold text-3xl text-gray-800 my-3">
            {{ $vacant->title }}
        </h3>
        <div class="md:grid md:grid-cols-2 bg-gray-50 p-4 md:my-5">
            <p class="font-bold text-sm uppercase text-gray-800 my-3">Empresa: 
                <span class="normal-case font-normal">{{$vacant->company}}</span>
            </p>
            <p class="font-bold text-sm uppercase text-gray-800 my-3">Último día para postularse: 
                <span class="normal-case font-normal">{{$vacant->last_date->toFormattedDateString()}}</span>
            </p>
            <p class="font-bold text-sm uppercase text-gray-800 my-3">Categoría: 
                <span class="normal-case font-normal">{{$vacant->category->category}}</span>
            </p>
            <p class="font-bold text-sm uppercase text-gray-800 my-3">Salario: 
                <span class="normal-case font-normal">{{$vacant->salary->salary}}</span>
            </p>
        </div>
    </div>
    <div class="md:grid md:grid-cols-6 gap-4">
        <div class="md:col-span-2">
            <img src="{{asset('storage/vacants/'.$vacant->image)}}" alt="{{'Imagen Vacante '.$vacant->title}}">
        </div>
        <div class="md:col-span-4">
            <h2 class="text-2xl font-bold mb-5">Descripción del Puesto</h2>
            <p>{{$vacant->description}}</p>
        </div>
    </div>
</div>
