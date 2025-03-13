<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsuariController extends Controller
{
    public function index()
    {
        $usuaris = DB::table('usuaris')
            ->join('comandas', 'usuaris.id', '=', 'comandas.usuari_id')
            ->select('usuaris.nom', DB::raw('COUNT(comandas.id) as num_comandas'))
            ->groupBy('usuaris.id', 'usuaris.nom')
            ->having('num_comandas', '>=', 1)
            ->get();

        return view('usuaris', compact('usuaris'));
    }
}
