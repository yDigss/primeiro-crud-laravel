<x-app-layout>
    <div class="max-w-3x1 mx-auto mt-10 bg-white rounded-lg shadow p-6">
        <h2 class="text-2x1 font-bold mb-6 text-gray-800">Adicionar Nova Tarefa</h2>

        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('tarefas.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Título</label>
                <input type="text" name="titulo" value="{{ old('titulo') }}" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-indigo-200 focus:border-indigo-400">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Descrição</label>
                <textarea name="descricao" rows="4" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-indigo-200 focus:border-indigo-400">{{ old('descricao') }}</textarea>
            </div>

            <div class="flex justify-between">
                <a href="{{ route('tarefas.index') }}" class="text-gray-600 hover:text-gray-800">← Voltar</a>
                <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">Salvar Tarefa</button>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Status</label>
                <select name="status" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-indigo-200 focus:border-indigo-400">
                    <option value="pendente">Pendente</option>
                    <option value="em_progresso">Em progresso</option>
                    <option value="concluida">Concluida</option>
                </select>
            </div>
        </form>
    </div>
</x-app-layout>