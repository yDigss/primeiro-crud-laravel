<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>
</head>
<body>
    <h1>Editar Usuário</h1>

    @if ($errors->any())
        <div>
            <strong>Ops!</strong> Algo deu errado.

            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="name">Nome:</label>
            <input type="text" name="name" id="name" value="{{ old('name', $usuario->name) }}" required>
        </div>

        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="{{ old('email', $usuario->email) }}" required>
        </div>

        <div>
            <label for="password">Nova Senha:</label>
            <input type="password" name="password" id="password">
            <small>Deixe em branco para não alterar a senha.</small>
        </div>

        <div>
            <button type="submit">Salvar Alterações</button>
        </div>
    </form>
</body>
</html>