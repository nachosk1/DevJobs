<form action="" class="md:w-1/2 space-y-5 px-4" wire:submit.prevent='createVacant'>
    <div>
        <x-input-label for="title" :value="__('Titulo Vacante')" />
        <x-text-input id="title" class="block mt-1 w-full" type="text" wire:model="title" :value="old('title')"
            placeholder="Titulo Vacante" />
        @error('title')
            <livewire:show-alert :message="$message" />
        @enderror
    </div>

    <div>
        <x-input-label for="salary" :value="__('Salario Mensual')" />
        <select id="salary" wire:model="salary"
            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full">
            <option value="">-- Seleccione Salario --</option>
            @foreach ($salaries as $salary)
                <option value="{{ $salary->id }}">{{ $salary->salary }}</option>
            @endforeach
        </select>
        @error('salary')
            <livewire:show-alert :message="$message" />
        @enderror
    </div>

    <div>
        <x-input-label for="category" :value="__('Categoría')" />
        <select id="category" wire:model="category"
            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full">
            <option value="">-- Selecciona Categoría --</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->category }}</option>
            @endforeach
        </select>
        @error('category')
            <livewire:show-alert :message="$message" />
        @enderror
    </div>

    <div>
        <x-input-label for="company" :value="__('Empresa')" />
        <x-text-input id="company" class="block mt-1 w-full" type="text" wire:model="company" :value="old('company')"
            placeholder="Empresa: ej. Netflix, Uber, Shopify" />
        @error('company')
            <livewire:show-alert :message="$message" />
        @enderror
    </div>

    <div>
        <x-input-label for="last_date" :value="__('Ultima día para postularse')" />
        <x-text-input id="last_date" class="block mt-1 w-full" type="date" wire:model="last_date"
            :value="old('last_date')" />
        @error('last_date')
            <livewire:show-alert :message="$message" />
        @enderror
    </div>

    <div>
        <x-input-label for="description" :value="__('Descripción Cargo')" />
        <textarea wire:model="description"
            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full h-72"
            placeholder="Descripción general del puesto, experiencia"></textarea>
        @error('description')
            <livewire:show-alert :message="$message" />
        @enderror
    </div>

    <div>
        <x-input-label for="image" :value="__('Imagen')" />
        <x-text-input id="image" accept="image/*" class="block mt-1 w-full" type="file" wire:model="image" />
        <div class="my-5">
            @if($image)
                Image:
                <img src="{{$image->temporaryUrl()}}" alt="imagen prev">
            @endif
        </div>
        @error('image')
            <livewire:show-alert :message="$message" />
        @enderror
    </div>

    <x-primary-button class="w-full justify-center mt-4">
        {{ __('Crear Vacante') }}
    </x-primary-button>
</form>
