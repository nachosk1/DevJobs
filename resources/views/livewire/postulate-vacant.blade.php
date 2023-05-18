<div class="border-gray-100 p-5 mt-10 flex flex-col justify-center items-center">
    <h3 class="texr-center text-2xl font-bold my-4">Postular a esta vacante</h3>
    @if (session()->has('message'))
        <p class="rounded-lg uppercase border border-green-600 bg-green-100 text-green-500 font-bold p-2 my-5 text-sm">
            {{ session('message') }}
        </p>
    @else
        <form action="" class="w-96 mt-5" wire:submit.prevent='postulate'>
            <div class="mb-4">
                <x-input-label for="cv" :value="__('Curriculum o Hoja de Vida (PDF)')" />
                <x-text-input id="cv" type="file" wire:model="cv" accept=".pdf" class="block mt-1 w-full" />
            </div>
            @error('cv')
                <livewire:show-alert :message="$message" />
            @enderror
            <x-primary-button class="w-full justify-center mt-4">
                {{ __('Postular') }}
            </x-primary-button>
        </form>
    @endif

</div>
