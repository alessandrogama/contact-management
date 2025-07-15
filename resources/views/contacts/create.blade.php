<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <form method="POST" action="{{ $contact ? route('contacts.update', $contact) : route('contacts.store') }}">
        @csrf
        @if($contact)
            @method('PUT')
        @endif
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                         <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('Cadastrar Contato') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600">
                                {{ __("Preencha as informações do novo contato.") }}
                            </p>
                        </header>
                <div class="max-w-xl">
                    @include('contacts.partials.form')
                </div>
            </div>
  
            <div class="flex items-center gap-4">
                <x-primary-button type="submit">
                    {{ $contact ? 'Atualizar' : 'Salvar' }}
                </x-primary-button>

                <x-secondary-button type="button" onclick="window.location.href='{{ route('contacts.index') }}'">
                    Cancelar
                </x-secondary-button>
            </div>

    </form>
</x-app-layout>
