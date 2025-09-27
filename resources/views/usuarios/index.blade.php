<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuários - Laravel</title>
</head>
<body>
    <h1>Lista de Usuários</h1>

    <ul>
        @forelse ($usuarios as $usuario)
            <li>
                <strong>Nome:</strong> {{$usuario->name}} |
                <strong>Email:</strong> {{$usuario-email}}
            </li>
        @empty
            <li>Nenhum usuário cadastrado.</li>
        @endforelse
    </ul>
</body>
</html>