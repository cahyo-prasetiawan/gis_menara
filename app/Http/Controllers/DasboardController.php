<?php

namespace App\Http\Controllers;

use App\Models\biaya;
use App\Models\Menara;
use App\Models\retribusi;
use App\Models\Kecamatan;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class DasboardController extends Controller
{
    function index(){
        $years = strftime("%Y", time()); 

   
                $total = retribusi::select(DB::raw("CAST(sum(tagihan) as int) as total"),DB::raw('YEAR(jatuh_tempo) year'))
                ->groupby('year')
                ->pluck("total");
             

       $retribusis = DB::table('retribusis')
                ->whereYear('jatuh_tempo', $years)
                ->get();

              
    
        
       $tagihan = $retribusis->sum('tagihan');
                
        $tahun = retribusi::select(DB::raw('YEAR(jatuh_tempo) year'))
                ->groupby('year')
                ->pluck('year');
                
        
                
    return view('dasboard',[
        'menaras' => Menara::all(),
        'jumlah' => Menara::count('*'),
        'sekarang' => Menara::where('tahun',$years)->count('*'),
        'retribusi' => $tagihan,
        'kecamatans' => Kecamatan::all()
    ], compact('total','tahun'));
    }
}
