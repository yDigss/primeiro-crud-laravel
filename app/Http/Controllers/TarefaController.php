<?php

namespace App\Http\Controllers;

use App\Models\Tarefa; // Importe o model Tarefa com 'A' maiúsculo
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Importe o Facade Auth

class TarefaController extends Controller
{
    /**
     * Exibe todas as tarefas do usuário autenticado.
     */
    public function index()
    {
        // Busca as tarefas do usuário autenticado, ordenadas da mais nova para a mais antiga
        $tarefas = Auth::user()->tarefas()->latest()->get();
        return view("tarefas.index", compact("tarefas"));
    }

    /**
     * Exibe o formulário para criar uma nova tarefa.
     */
    public function create()
    {
        return view("tarefas.create");
    }

    /**
     * Armazena uma nova tarefa no banco de dados.
     */
    public function store(Request $request)
    {
        // Validação dos dados da requisição
        $validatedData = $request->validate([
            "titulo" => "required|string|max:255",
            "descricao" => "nullable|string",
            "status" => "required|in:pendente,em_progresso,concluida", // Adicionei a validação para o status
        ]);

        // Cria a tarefa diretamente através do relacionamento com o usuário autenticado
        Auth::user()->tarefas()->create($validatedData);

        return redirect()->route("tarefas.index")->with("success", "Tarefa criada com sucesso!");
    }

    /**
     * Exibe uma tarefa específica.
     * Usa Route Model Binding para injetar a instância de Tarefa.
     */
    public function show(Tarefa $tarefa)
    {
        // Garante que o usuário só possa ver suas próprias tarefas
        if ($tarefa->user_id !== Auth::id()) {
            abort(403); // Proibido
        }
        return view("tarefas.show", compact("tarefa"));
    }

    /**
     * Exibe o formulário para editar uma tarefa existente.
     * Usa Route Model Binding para injetar a instância de Tarefa.
     */
    public function edit(Tarefa $tarefa)
    {
        // Garante que o usuário só possa editar suas próprias tarefas
        if ($tarefa->user_id !== Auth::id()) {
            abort(403);
        }
        return view("tarefas.edit", compact("tarefa"));
    }

    /**
     * Atualiza uma tarefa existente no banco de dados.
     * Usa Route Model Binding para injetar a instância de Tarefa.
     */
    public function update(Request $request, Tarefa $tarefa)
    {
        // Garante que o usuário só possa atualizar suas próprias tarefas
        if ($tarefa->user_id !== Auth::id()) {
            abort(403);
        }

        // Validação dos dados da requisição
        $validatedData = $request->validate([
            "titulo" => "required|string|max:255",
            "descricao" => "nullable|string",
            "status" => "required|in:pendente,em_progresso,concluida",
        ]);

        // Atualiza a tarefa
        $tarefa->update($validatedData);

        return redirect()->route("tarefas.index")->with("success", "Tarefa atualizada com sucesso!");
    }

    /**
     * Remove uma tarefa do banco de dados.
     * Usa Route Model Binding para injetar a instância de Tarefa.
     */
    public function destroy(Tarefa $tarefa)
    {
        // Garante que o usuário só possa excluir suas próprias tarefas
        if ($tarefa->user_id !== Auth::id()) {
            abort(403);
        }

        // Exclui a tarefa
        $tarefa->delete();

        return redirect()->route("tarefas.index")->with("success", "Tarefa excluída com sucesso!");
    }
}
