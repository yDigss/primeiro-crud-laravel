<x-app-layout>
    <div class="max-w-4xl mx-auto py-10 px-4">
        <h1 class="text-3xl font-bold text-gray-700 mb-6">Minhas Tarefas</h1>

        @if (session('success'))
            <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <div class="mb-6 flex justify-between items-center">
            <p class="text-gray-600">Total de tarefas: {{ $tarefas->count() }}</p>
            <a href="{{ route('tarefas.create') }}"
               class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg transition">
               + Nova Tarefa
            </a>
        </div>

        @if ($tarefas->isEmpty())
            <p class="text-gray-500 text-center">Você ainda não tem tarefas cadastradas.</p>
        @else
            <div class="bg-white shadow rounded-lg divide-y divide-gray-200">
                @foreach ($tarefas as $tarefa)
                    <div class="flex justify-between items-center p-4 hover:bg-gray-50 transition">
                        <div>
                            <h2 class="font-semibold text-gray-800">{{ $tarefa->titulo }}</h2>
                            <p class="text-sm text-gray-500">{{ $tarefa->descricao ?? 'Sem descrição' }}</p>
                            <span class="text-xs text-gray-400">Status: {{ ucfirst(str_replace('_', ' ', $tarefa->status)) }}</span>
                        </div>
                        <div class="flex space-x-2">
                            <a href="{{ route('tarefas.show', $tarefa->id) }}"
                               class="text-blue-600 hover:text-blue-800 font-medium text-sm">Ver</a>
                            <a href="{{ route('tarefas.edit', $tarefa->id) }}"
                               class="text-yellow-600 hover:text-yellow-800 font-medium text-sm">Editar</a>
                            <form action="{{ route('tarefas.destroy', $tarefa->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir esta tarefa?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="text-red-600 hover:text-red-800 font-medium text-sm">Excluir</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-app-layout>