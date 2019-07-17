<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Excel;
use App\Exports\TimesExport;

use App\Time;

class TimeController extends Controller
{
    protected $series = ['A', 'B', 'C'];

    public function index()
    {
        $times = Time::all();

        return view('times.index')->with(['times' => $times]);
    }

    
    public function create()
    {

        return view('times.create')->with(['series' => $this->series]);
    }

    
    public function store(Request $request)
    {
        Time::create($request->all());

        return redirect()->route('times.index');
   }

    
    public function show($id)
    {
        $jogador = DB::table('jogadores')
        ->leftJoin('times', 'jogadores.id_time', '=', 'times.id')
        ->select('jogadores.*', 'times.clube')
        ->where('jogadores.id_time', $id);

        $jogadores = $jogador->get();
        $count = $jogador->count();

        $time = Time::find($id);
        
        return view('times.show')->with([
         'jogadores' => $jogadores,
         'time' => $time,
         'count' => $count
        ]);
    }

   
    public function edit($id)
    {
        $time = Time::find($id);

        return view('times.edit')->with(['time' => $time, 'series' => $this->series]);
    }

   
    public function update(Request $request, $id)
    {
        $time = Time::find($id)->update($request->all());

        return redirect()->route('times.index');
    }

    
    public function destroy($id)
    {
        Time::destroy($id);

        return redirect()->route('times.index');
    }


    public function exportTimes($type)
    {
        return Excel::download(new TimesExport, 'times_all.' . $type);
    }
}
