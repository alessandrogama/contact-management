<x-app-layout title="Detalhes do Contato">
    <h1 class="mb-6 text-3xl font-semibold text-gray-900">Detalhes do Contato</h1>

    <div class="max-w-md space-y-4 text-gray-800">
        <p><strong class="font-semibold">ID:</strong> {{ $contact->id }}</p>
        <p><strong class="font-semibold">Nome:</strong> {{ $contact->name }}</p>
        <p><strong class="font-semibold">Contato:</strong> {{ $contact->contact }}</p>
        <p><strong class="font-semibold">Email:</strong> {{ $contact->email }}</p>
    </div>

    <div class="mt-8 flex space-x-4">
        <a href="{{ route('contacts.edit', $contact) }}" class="btn btn-warning px-5 py-2 rounded hover:bg-yellow-600 transition">
            Editar
        </a>

        <form action="{{ route('contacts.destroy', $contact) }}" method="POST" class="inline" onsubmit="return confirm('Confirma a exclusão do contato {{ addslashes($contact->name) }}?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger px-5 py-2 rounded hover:bg-red-700 transition">
                Excluir
            </button>
        </form>

        <a href="{{ route('contacts.index') }}" class="btn btn-secondary px-5 py-2 rounded hover:bg-gray-700 transition">
            Voltar
        </a>
    </div>
</x-app-layout>
