<form action="" class="md:w-1/2 space-y-5 px-4">
    <div>
        <x-input-label for="title" :value="__('Titulo Vacante')" />
        <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')"
            placeholder="Titulo Vacante" />
    </div>

    <div>
        <x-input-label for="salary" :value="__('Salario Mensual')" />
        <select id="salary" name="salary"
            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full">
            <option value="">-- Seleccione --</option>
            @foreach ($salaries as $salary)
                <option value="{{ $salary->id }}">{{ $salary->salary }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <x-input-label for="category" :value="__('Categoría')" />
        <select id="category" name="category"
            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full">
            <option value="">-- Selecciona un Rol --</option>
        </select>
    </div>

    <div>
        <x-input-label for="company" :value="__('Empresa')" />
        <x-text-input id="company" class="block mt-1 w-full" type="text" name="company" :value="old('company')"
            placeholder="Empresa: ej. Netflix, Uber, Shopify" />
    </div>

    <div>
        <x-input-label for="last_date" :value="__('Ultima día para postularse')" />
        <x-text-input id="last_date" class="block mt-1 w-full" type="date" name="last_date" :value="old('last_date')" />
    </div>

    <div>
        <x-input-label for="description" :value="__('Descripción Cargo')" />
        <textarea name="description"
            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full h-72"
            placeholder="Descripción general del puesto, experiencia"></textarea>
    </div>

    <div>
        <x-input-label for="image" :value="__('Imagen')" />
        <x-text-input id="image" class="block mt-1 w-full" type="file" name="image" />
    </div>

    <x-primary-button class="w-full justify-center mt-4">
        {{ __('Crear Vacante') }}
    </x-primary-button>
</form>
