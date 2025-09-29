@extends('layouts.app')

@section('title', 'Editar Usuário')

@section('content')

    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1>Editar Usuário</h1>
            <hr>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Ops!</strong> Por favor, corrija os erros abaixo:
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST">
            @method('PUT')
            @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Nome:</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $usuario->name) }}" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" name="email" id="email" value="{{ old('email', $usuario->email) }}" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Senha:</label>
                    <input type="password" class="form-control" name="password" id="password">
                    <div id="passwordHelp" class="form-text">Deixe em branco para nao alterar.</div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                    <a href="{{ route('usuarios.index')}}" class="btn btn-secondary">Cancelar</a>
                </div>
                </form>

        </div>

    </div>