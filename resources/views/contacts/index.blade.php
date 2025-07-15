<x-app-layout title="Contatos">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 py-12">
        <section class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <header class="mb-6">
                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    {{ __('Lista de Contatos') }}
                </h2>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    {{ __('Visualize, edite ou exclua seus contatos cadastrados.') }}
                </p>
            </header>
                <div class="flex justify-end mb-4">
                    <x-primary-button
                        onclick="window.location.href='{{ route('contacts.create') }}'"
                        class="bg-green-600 hover:bg-green-700"
                        type="button"
                    >
                        + Novo Contato
                    </x-primary-button>
                </div>
            @if($contacts->isEmpty())
                <div class="bg-blue-100 text-blue-800 px-4 py-3 rounded-md text-sm">
                    Nenhum contato encontrado.
                </div>
            @else
                <div class="overflow-x-auto rounded-md">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700 border border-gray-200 dark:border-gray-700 shadow-sm">
                        <thead class="bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-300 text-left text-sm uppercase tracking-wider">
                            <tr>
                                <th class="px-4 py-3">ID</th>
                                <th class="px-4 py-3">Nome</th>
                                <th class="px-4 py-3">Contato</th>
                                <th class="px-4 py-3">Email</th>
                                <th class="px-4 py-3 text-center">Ações</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-900 divide-y divide-gray-200 dark:divide-gray-800 text-sm">
                            @foreach($contacts as $contact)
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-800">
                                    <td class="px-4 py-3">{{ $contact->id }}</td>
                                    <td class="px-4 py-3">{{ $contact->name }}</td>
                                    <td class="px-4 py-3">{{ $contact->contact }}</td>
                                    <td class="px-4 py-3">{{ $contact->email }}</td>
                                    <td class="px-4 py-3 text-center">
                                        <div class="flex items-center gap-4">
                                            <x-primary-button onclick="window.location.href='{{ route('contacts.edit', $contact) }}'">
                                                {{ __('Editar') }}
                                            </x-primary-button>
                                            <form action="{{ route('contacts.destroy', $contact) }}" method="POST"
                                                  onsubmit="return confirm('Excluir contato {{ addslashes($contact->name) }}?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white text-xs font-medium rounded-md shadow-sm transition">
                                                    EXCLUIR
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- Paginação --}}
                @if(method_exists($contacts, 'links'))
                    <div class="mt-6">
                        {{ $contacts->links() }}
                    </div>
                @endif
            @endif
        </section>
    </div>
    
</x-app-layout>
