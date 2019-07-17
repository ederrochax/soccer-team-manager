<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Excel;
use App\Exports\JogadoresExport;

use App\Jogador;

class JogadorController extends Controller
{
    protected $categorias = ['Sub-15', 'Sub-17', 'Sub-20', 'Profissional'];

    public function index()
    {
        $jogadores = DB::table('jogadores')
            ->leftJoin('times', 'jogadores.id_time', '=', 'times.id')
            ->select('jogadores.*', 'times.clube')
            ->get();

        return view('jogadores.index')->with(['jogadores' => $jogadores]);
    }

    
    public function create(Request $request)
    {
        $idTime = $request->query('time');

        return view('jogadores.create')->with(['idTime' => $idTime, 'categorias' => $this->categorias]);
    }

    
    public function store(Request $request)
    {
        Jogador::create($request->all());

        return redirect()->route('times.show', $request->id_time);
    }

   
    public function show($id)
    {
        $jogador = Jogador::find($id);

        return view('jogadores.show')->with(['jogador' => $jogador]);
    }


    
    public function edit($id)
    {
        $jogador = Jogador::find($id);

        return view('jogadores.edit')->with(['jogador' => $jogador, 'categorias' => $this->categorias]);
    }

    
    public function update(Request $request, $id)
    {
        $jogador = Jogador::find($id)->update($request->all());
        
        return redirect()->route('times.show', $request->id_time);
    }


    public function destroy(Request $request, $id)
    {
        Jogador::destroy($id);

        return redirect()->route('times.show', $request->id_time);
    }


    public function search(Request $request)
    {
        $jogadores = DB::table('jogadores')
        ->leftJoin('times', 'jogadores.id_time', '=', 'times.id')
        ->select('jogadores.*', 'times.clube')
        ->where('jogadores.nome','like','%' . $request->nome . '%')
        ->get();

        return view('jogadores.index')->with(['jogadores' => $jogadores]);
    }
    

    public function exportJogadores($type)
    {
        return Excel::download(new JogadoresExport, 'jogadores_all.' . $type);
    }

}
