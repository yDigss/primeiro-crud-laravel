<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Criar Novo Usuário') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    @if ($errors->any())
                        {{-- A classe 'alert alert-danger' do Bootstrap vira isso no Tailwind: --}}
                        <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded" role="alert">
                            <strong class="font-bold">Ops!</strong>
                            <span class="block sm:inline">Por favor, corrija os erros abaixo:</span>
                            <ul class="list-disc pl-5 mt-2">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('usuarios.store') }}" method="POST">
                        @csrf

                        {{-- Campo Nome --}}
                        <div class="mb-4">
                            {{-- A classe 'form-label' do Bootstrap vira isso: --}}
                            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nome Completo</label>
                            {{-- A classe 'form-control' do Bootstrap vira isso: --}}
                            <input type="text" id="name" name="name" value="{{ old('name') }}" required
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>

                        {{-- Campo Email --}}
                        <div class="mb-4">
                            <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" required
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>

                        {{-- Campo Senha --}}
                        <div class="mb-4">
                            <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Senha</label>
                            <input type="password" id="password" name="password" required
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>

                        {{-- Botões de Ação --}}
                        <div class="mt-6 flex items-center justify-end gap-x-6">
                            {{-- A classe 'btn btn-secondary' vira isso: --}}
                            <a href="{{ route('usuarios.index') }}" class="text-sm font-semibold leading-6 text-gray-900">Cancelar</a>
                            {{-- A classe 'btn btn-primary' vira isso: --}}
                            <button type="submit"
                                    class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                Salvar
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>