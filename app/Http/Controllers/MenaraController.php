<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\biaya;
use App\Models\Jenis;
use App\Models\Menara;
use App\Models\Provider;
use App\Models\Kecamatan;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreMenaraRequest;
use App\Http\Requests\UpdateMenaraRequest;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MenaraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(request $request)
    {
        // $menara = DB::table('menaras')
        // ->join('providers', 'menaras.provider_id', '=', 'providers.id')
        // ->join('jenis', 'menaras.jenis_id', '=', 'jenis.id')
        // ->join('kecamatans', 'menaras.kecamatan_id', '=', 'kecamatans.id')
        // ->select('menaras.*','providers.name','jenis.nama as jnama','jenis.tarif','kecamatans.nama as knama')
        // ->get();

        return view('provider.menara.index', [
            // 'menaras' => Menara::orderBy('tahun','DESC')->paginate(5)->withQueryString()
            "menaras" => Menara::orderBy('created_at','DESC')->filter(request(['search']))->paginate(7)->withQueryString(),
            'kecamatans' => Kecamatan::all(),
            'providers' => Provider::all()
            // 'menaras' => $menara
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('provider.menara.create', [
            'providers' => Provider::all(),
            'kecamatans' => Kecamatan::all(),
            'jeniss' => Jenis::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|unique:menaras|min:5|max:255',
            'provider_id' => 'required',
            'kecamatan_id' => 'required',
            'alamat' => 'required|min:5|max:255',
            'tinggi' => 'required',
            'jenis_id' => 'required',
            'tahun' => 'required',
            'lat' => 'required',
            'long' => 'required',
            'foto' => 'image|file|max:2048',
        ],
            [ 'nama.required' => 'Nama Menara Tidak Boleh Kosong',
                'provider_id.required' => 'Nama Proveider Tidak Boleh Kosong',
              'kecamatan_id.required' => 'Nama Kecamatan Tidak Boleh Kosong',
              'alamat.required' => 'Alamat Tidak Boleh Kosong',
              'tinggi.required' => 'Tinggi Tidak Boleh Kosong',
              'jenis_id.required' => 'Jenis Tidak Boleh Kosong',
              'tahun.required' => 'tahun Tidak Boleh Kosong',
              'lat.required' => 'Latitude Tidak Boleh Kosong',
              'long.required' => 'Longtitude Tidak Boleh Kosong'
        ]);

        if($request->file('foto'))
        {
            $validatedData['foto'] =  $request->file('foto')->store('post-menara');
        }

        //strip_tags($request->body) = digunakan agar tags yang diinputkan di body dihilangkan

        Menara::create($validatedData);

        return redirect('/menara')->with('toast_success', 'Data Menara berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Menara $menara)
    {
        return view('provider.menara.detail', [
            'menara' => $menara,
            'providers' => Provider::all(),
            'kecamatans' => Kecamatan::all(),
            'jeniss' => Jenis::all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menara $menara)
    {
        return view('provider.menara.edit', [
            'menara' => $menara,
            'menaras' => Menara::all(),
            'providers' => Provider::all(),
            'kecamatans' => Kecamatan::all(),
            'jeniss' => Jenis::all()
           ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menara $menara,$id)
    {
        
        $rules = [
            'nama' => 'required|min:5|max:255',
            'provider_id' => 'required',
            'kecamatan_id' => 'required',
            'alamat' => 'required|min:5|max:255',
            'tinggi' => 'required',
            'jenis_id' => 'required',
            'tahun' => 'required',
            'lat' => 'required',
            'long' => 'required',
            'foto' => 'image|file|max:2048',
        ];

        if($request->nama != Menara::findOrFail($id)->nama)
        {
            $rules['nama'] = 'required|unique:menaras|min:5|max:255';
        }

        $validatedData = $request->validate($rules,  
        [ 'nama.required' => 'Nama Menara Tidak Boleh Kosong',
            'provider_id.required' => 'Nama Proveider Tidak Boleh Kosong',
        'kecamatan_id.required' => 'Nama Kecamatan Tidak Boleh Kosong',
        'alamat.required' => 'Alamat Tidak Boleh Kosong',
        'tinggi.required' => 'Tinggi Tidak Boleh Kosong',
        'jenis_id.required' => 'Jenis Tidak Boleh Kosong',
        'tahun.required' => 'Tahun Tidak Boleh Kosong',
        'lat.required' => 'Latitude Tidak Boleh Kosong',
        'long.required' => 'Longtitude Tidak Boleh Kosong'
         ]);

         if($request->file('foto'))
         {
             if(Menara::findOrFail($id)->foto)
             {
                 Storage::delete(Menara::findOrFail($id)->foto);
             }
             $validatedData['foto'] = $request->file('foto')->store('post-menara');
         }

        //strip_tags($request->body) = digunakan agar tags yang diinputkan di body dihilangkan

        Menara::where('id', $id)->update($validatedData);
        return redirect('/menara')->with('toast_success', 'Data Menara berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    
    public function destroy($id)
    {
        if(Menara::findOrFail($id)->foto)
        {
            Storage::delete(Menara::findOrFail($id)->foto);
        }

        Menara::destroy($id);
        return response()->json(['status' => 'Data berhasil Dihapus']);
    }

    public function map(request $request)
    {
        if($request->filled('provider_id')){
            $menara = DB::table('menaras')
            ->join('providers','menaras.provider_id','=','providers.id')
            ->join('kecamatans','menaras.kecamatan_id','=','kecamatans.id')
            ->select('menaras.*','providers.icon','kecamatans.status','providers.name')
           
            ->where('provider_id', $request->provider_id)
            ->where('kecamatans.status', '0' )
            ->get(); 

        }else{
            $menara = DB::table('menaras')
            ->join('providers','menaras.provider_id','=','providers.id')
            ->join('kecamatans','menaras.kecamatan_id','=','kecamatans.id')
            ->select('menaras.*','providers.icon','kecamatans.status','providers.name')
            ->where('kecamatans.status', '0' )
            ->get(); 
        }

      

        
        $provider = DB::table('providers')
        ->select('providers.name')
        ->get();

        $kecamatan = DB::table('kecamatans')
                ->where('status', '0')
                ->get(); 

     
        return view('provider.peta.index', [
            'menaras' => $menara,
            'kecamatans' => $kecamatan,
            'providers' => $provider,
            'pemilik' => Provider::all()
            ]);
    }

    public function getMenara($id)
    {
        
        $menara = DB::table('menaras')
        ->where('provider_id', $id)
        ->get();
       return response()->json($menara);
  
    }

    public function getLok($id)
    {
        $menara = Menara::findOrFail($id);

        dd($menara);

        $provider = DB::table('providers')
        ->select('providers.name')
        ->get();
     
        return view('provider.peta.index', [
            'menaras' => Menara::all(),
            'kecamatans' => Kecamatan::all(),
            'providers' => $provider,
            'pemilik' => Provider::all()
            ]);
    }

    public function tes()
    {
        
        $provider = DB::table('providers')
        ->select('providers.name')
        ->get();

        $menara = DB::table('menaras')
        ->select('nama','lat','long')
        ->get();

        $menara = DB::table('menaras')
        ->join('providers', 'menaras.provider_id', '=', 'providers.id')
        ->select('menaras.nama','menaras.lat','menaras.long','providers.icon','menaras.id')
        ->get();
     
     
      
        return view('test', [
            'tower' => $menara,
            'menaras' => Menara::all(),
            'kecamatans' => Kecamatan::all(),
            'providers' => $provider
            ]);
    }

    public function cetakPdf()
    {
        // $menara = Menara::all();
 
    	// $pdf = PDF::loadview('menara_pdf',['menara'=>$menara]);
    	// return $pdf->download('laporan-menara-pdf');
        // $data = Menara::all();
        // // share data to view
        // view()->share('menara',$data);
        // $pdf = PDF::loadView('menara_pdf', $data);
        // // download PDF file with download method
        // return $pdf->download('pdf_file.pdf');

        $data = Menara::all();
 
        return view('menara_pdf');

    }

    public function Detail($id)
    {
        $menara = Menara::findOrFail($id);

        return view('provider.peta.detail', [
            'menara' => $menara,
            'providers' => Provider::all(),
            'kecamatans' => Kecamatan::all(),
            'jeniss' => Jenis::all()
        ]);
    }

    public function Rute(request $request,$id)
    {
        if($request->filled('menara_id')){
            $menara = DB::table('menaras')
            ->join('providers','menaras.provider_id','=','providers.id')
            ->join('kecamatans','menaras.kecamatan_id','=','kecamatans.id')
            ->select('menaras.*','providers.icon','kecamatans.status','providers.name')
            ->where('menaras.id', $request->menara_id )
            ->where('kecamatans.status', '0' )
            ->get(); 

        }else{
            $menara = DB::table('menaras')
            ->join('providers','menaras.provider_id','=','providers.id')
            ->join('kecamatans','menaras.kecamatan_id','=','kecamatans.id')
            ->select('menaras.*','providers.icon','kecamatans.status','providers.name')
            ->where('menaras.id', $id )
            ->where('kecamatans.status', '0' )
            ->get(); 
        }
        $provider = DB::table('providers')
        ->select('providers.name')
        ->get();

        $kecamatan = DB::table('kecamatans')
                ->where('status', '0')
                ->get(); 

     
        return view('provider.peta.rute', [
            'menaras' => $menara,
            'kecamatans' => $kecamatan,
            'providers' => $provider,
            'pemilik' => Provider::all()
            ]);
    }

    public function menaraCetak()
    {
        
        $pemilik = Provider::findOrFail(request('provider_id'));
       

        $id = DB::table('menaras')
        ->join('providers', 'menaras.provider_id', '=', 'providers.id')
        ->join('jenis', 'menaras.jenis_id', '=', 'jenis.id')
        ->join('kecamatans', 'menaras.kecamatan_id', '=', 'kecamatans.id')
        ->select('menaras.*','providers.name','jenis.nama as jnama','jenis.tarif','kecamatans.nama as knama')
       
        ->Where('provider_id',request('provider_id'))
        ->OrWhere('kecamatan_id',request('kecamatan_id'))
        ->get(); 

        // $id = DB::table('menaras')
        // ->join('providers', 'menaras.provider_id', '=', 'providers.id')
        // ->join('jenis', 'menaras.jenis_id', '=', 'jenis.id')
        // ->join('kecamatans', 'menaras.kecamatan_id', '=', 'kecamatans.id')
        // ->select('menaras.*','providers.name','jenis.nama as jnama','jenis.tarif','kecamatans.nama as knama')
        // ->get();

        $tanggal = Carbon::now()->locale('id_ID')->isoFormat('LLLL');
        $tahun = Carbon::now()->locale('id_ID')->Format('dmy');
      
        return view('provider.menara.cetak', [
           
            'sekarang' => $tanggal,
            'menara' => $id,
            'pemilik' => $pemilik,
            'tahun' => $tahun
        ]);
    }

}
