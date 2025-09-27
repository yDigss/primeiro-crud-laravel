<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // <-- GARANTA QUE ESTA LINHA ESTÁ AQUI

class UsuarioController extends Controller
{
    
    public function index()
    {
        $usuarios = User::all();
        return view('usuarios.index', ['usuarios' => $usuarios]);
    }
}