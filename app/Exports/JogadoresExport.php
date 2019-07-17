<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;

class JogadoresExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $jogadores = DB::table('jogadores')
            ->leftJoin('times', 'jogadores.id_time', '=', 'times.id')
            ->select('jogadores.id', 'jogadores.nome', 'jogadores.altura', 'jogadores.peso', 'jogadores.categoria', 'times.clube')
            ->get();

        return $jogadores;
    }
}
