<?php

namespace App\Http\Controllers;

use App\Models\retribusi;
use App\Models\pengguna;
use App\Models\Provider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(request $request)
    {
        if( $request->filled('tahun')){
            
            $retribusis = DB::table('retribusis')
            ->join('providers', 'retribusis.provider_id', '=', 'providers.id')
            ->select('retribusis.*','providers.name')
            ->where('status', '1')
            ->WhereYear('retribusis.jatuh_tempo', $request->tahun)
            ->orderBy('retribusis.jatuh_tempo', 'DESC')
            ->get(); 
            
            $total = $retribusis->sum('tagihan');
        }
        else {
            $retribusis = DB::table('retribusis')
            ->join('providers', 'retribusis.provider_id', '=', 'providers.id')
            ->select('retribusis.*','providers.name')
            ->orderBy('retribusis.jatuh_tempo', 'DESC')
            ->where('status', '1')
            ->get();
            $total = $retribusis->sum('tagihan');
        }

        $tahun = retribusi::select(DB::raw('count(id) as `data`'),DB::raw('YEAR(jatuh_tempo) year'))
           ->groupby('year')
           ->get();
        
              
        $providers = Provider::all();
        return view('provider.laporan.index', compact('retribusis','total','providers','tahun'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(retribusi $retribusi,$id)
    {
       $cek = retribusi::findOrFail($id);

        $provider = $cek->provider_id;

        auth()->user()->unreadNotifications->where('id', request('id'))->first()?->markAsRead();
      
        $retribusis = DB::table('retribusis')
        ->join('providers', 'retribusis.provider_id', '=', 'providers.id')
        ->select('retribusis.*','providers.name')
        ->where('providers.id', $provider)
        ->get();

        $tanggal = Carbon::now()->locale('id_ID')->Format('dmy');
        $tanggalA = Carbon::parse($retribusi->jatuh_tempo)->locale('id_ID')->isoFormat('LL');
        $tanggalB = Carbon::parse($retribusi->created_at)->locale('id_ID')->isoFormat('LL');
      
        $detail = pengguna::where('provider_id', $provider);

       
    $total = $retribusis->sum('tagihan');

        $id = DB::table('menaras')
            ->join('providers', 'menaras.provider_id', '=', 'providers.id')
            ->join('jenis', 'menaras.jenis_id', '=', 'jenis.id')
            ->join('kecamatans', 'menaras.kecamatan_id', '=', 'kecamatans.id')
            ->select('menaras.*','providers.name','jenis.nama as jnama','jenis.tarif','kecamatans.nama as knama')
            ->where('menaras.provider_id', $provider)
            ->get();

        return view('provider.laporan.detail',[
           'menara' => $id,
           'retribusi' =>$cek,
           'total' => $total,
           'detail' => $detail,
           'providers' => Provider::all(),
           'tanggal' => $tanggal,
           'tanggalA' => $tanggalA,
           'tanggalB' => $tanggalB,
           'retribusis' => retribusi::all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(retribusi $retribusi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, retribusi $retribusi): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(retribusi $retribusi): RedirectResponse
    {
        //
    }

    public function cetak()
    {
        $retribusis = DB::table('retribusis')
        ->join('providers', 'retribusis.provider_id', '=', 'providers.id')
        ->select('retribusis.*','providers.name')
        ->Where('retribusis.provider_id',request('provider_id'))
        ->WhereYear('retribusis.jatuh_tempo',request('tahun'))
        ->where('retribusis.status', '1')
        ->orderBy('retribusis.jatuh_tempo', 'DESC')
        ->get();    

        $total = $retribusis->sum('tagihan');

        $tahun = request('tahun');

        $pemilik = Provider::findOrFail(request('provider_id'));
       

        $id = DB::table('retribusis')
        ->join('providers', 'retribusis.provider_id', '=', 'providers.id')
        ->join('menaras', 'providers.id', '=', 'menaras.provider_id')
        ->join('kecamatans', 'menaras.kecamatan_id', '=', 'kecamatans.id')
        ->join('jenis', 'menaras.jenis_id', '=', 'jenis.id')
        ->select('retribusis.*','menaras.*','providers.name','jenis.nama as jnama','jenis.tarif','kecamatans.nama as knama')
        ->Where('retribusis.provider_id',request('provider_id'))
        ->WhereYear('retribusis.jatuh_tempo',request('tahun'))
        ->where('retribusis.status', '1')
        ->get(); 

        // $id = DB::table('menaras')
        // ->join('providers', 'menaras.provider_id', '=', 'providers.id')
        // ->join('jenis', 'menaras.jenis_id', '=', 'jenis.id')
        // ->join('kecamatans', 'menaras.kecamatan_id', '=', 'kecamatans.id')
        // ->select('menaras.*','providers.name','jenis.nama as jnama','jenis.tarif','kecamatans.nama as knama')
        // ->get();

        $tanggal = Carbon::now()->locale('id_ID')->isoFormat('LL');
      
        return view('provider.laporan.cetak', [
            'retribusi' => $retribusis,
            'sekarang' => $tanggal,
            'menara' => $id,
            'total' => $total,
            'tahun' => $tahun,
            'pemilik' => $pemilik
        ]);

    }
}
