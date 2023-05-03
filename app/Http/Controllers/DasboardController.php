<?php

namespace App\Http\Controllers;

use App\Models\biaya;
use App\Models\Menara;
use App\Models\Kecamatan;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class DasboardController extends Controller
{
    function index(){
        $years = strftime("%Y", time()); 

        $total = Menara::select(DB::raw("CAST(COUNT(nama) as int) as total"))
                ->GroupBy(DB::raw("tahun"))
                ->pluck("total");
                
        $tahun = Menara::select(DB::raw("CAST(tahun as int) as tahun"))
                ->GroupBy('tahun')
                ->pluck("tahun");
                
    return view('dasboard',[
        'menaras' => Menara::all(),
        'jumlah' => Menara::count('*'),
        'sekarang' => Menara::where('tahun',$years)->count('*'),
        'retribusi' => biaya::sum('tarif'),
        'kecamatans' => Kecamatan::all()
    ], compact('total','tahun'));
    }
}
