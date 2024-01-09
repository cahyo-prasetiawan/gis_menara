<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Jenis;
use App\Models\Menara;
use App\Mail\sendEmail;
use App\Models\Provider;
use App\Models\pengguna;
use App\Models\retribusi;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Notifications\TagihanNotification;
use Illuminate\Support\Facades\Notification;
use App\Http\Requests\StoreretribusiRequest;
use App\Http\Requests\UpdateretribusiRequest;
use Carbon\Carbon;
use Illuminate\Notifications\DatabaseNotification;

class RetribusiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->filled('provider_id')){
            
            $retribusis = DB::table('retribusis')
            ->join('providers', 'retribusis.provider_id', '=', 'providers.id')
            ->select('retribusis.*','providers.name')
            ->where('status', '0')
            ->where('retribusis.provider_id', $request->provider_id )
            ->orderBy('retribusis.jatuh_tempo', 'DESC')
            ->get(); 
            
            $total = $retribusis->sum('tagihan');
        }
        else {
            $retribusis = DB::table('retribusis')
            ->join('providers', 'retribusis.provider_id', '=', 'providers.id')
            ->select('retribusis.*','providers.name')
            ->orderBy('retribusis.jatuh_tempo', 'DESC')
            ->where('status', '0')
            ->get();
            $total = $retribusis->sum('tagihan');
        }
        
                
        $providers = Provider::all();
        return view('provider.retribusi.index', compact('retribusis','total','providers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('provider.retribusi.create',[
            'providers' => Provider::all()
        ]);
    }

    public function getTagihan(Request $request ,$id)
    {
        // $tagihan = DB::table('menaras')->select(DB::raw("CAST(COUNT(nama) as int) as total"))
        // ->join("jenis", "jenis.id", "=", "menaras.jenis_id")
        // ->where('provider_id', $id)
        // ->GroupBy('menaras.nama')
        // ->get();
 
    //    $tagihan = Menara::selectRaw('sum(tarif) as total')
    //     ->with('jenis')
    //     ->where('provider_id', $id)
    //     ->get()
    //     ->groupBy('menaras.nama');
        // $tagihan = Menara::select(
        //     "menaras.id", 
        //     "menaras.nama",
        //     "menaras.jenis", 
        //     "jenis.nama as nama_jenis"
        // )
        // ->join("jenis", "jenis.id", "=", "menaras.jenis_id")
        // ->where('provider_id', $id)
        // ->GroupBy('menaras.nama')
        // ->get();


       $tagihan = Menara::where('provider_id',$id)
             ->get();
       return response()->json($tagihan);

      
       
    }

    public function getTarif(Request $request ,$id)
    {
        
        $tarif = DB::table('menaras')
        ->join('jenis', 'menaras.jenis_id', '=', 'jenis.id')
        ->select('menaras.nama', 'jenis.tarif')
        ->where('menaras.id', $id)
        ->get();

       return response()->json($tarif);
  
    }

    public function getEmail(Request $request ,$id)
    {
        
        $getEmail = DB::table('pengguna')
        ->where('provider_id', $id)
        ->get();

       return response()->json($getEmail);
  
    }

    public function total(Request $request ,$id)
    {
        $retribusis = DB::table('menaras')
        ->join('jenis', 'menaras.jenis_id', '=', 'jenis.id')
        ->select('menaras.nama', 'jenis.tarif')
        ->where('menaras.provider_id', $id)
        ->get();

        // $retribusis = DB::table('retribusis')
        // ->where('provider_id', $id)
        // ->whereYear('jatuh_tempo','2023')
        // ->get(); 

        // $cek= $retribusis->whereYear('jatuh_tempo','2023');

        $total = $retribusis->sum('tarif');
        
        return response()->json($total);
  
    }


   

   

    /**
     * Store a newly created resource in storage.
     */
    public function store(request $request)
    {
    $rules = [
        'provider_id' => 'required',
        'tagihan' => 'required',
        'jatuh_tempo' => 'required',
    ];

    if($request->provider_id == retribusi::where('provider_id') && $request->jatuh_tempo == retribusi::where('jatuh_tempo'))
    {
        $rules['provider_id'] = 'required|unique:retribusis';
    }

    $validatedData = $request->validate($rules);
      
    //strip_tags($request->body) = digunakan agar tags yang diinputkan di body dihilangkan

    $tagihan = Retribusi::create($validatedData);
    $users = User::all();
    Notification::send($users,new TagihanNotification($tagihan));
    return redirect('/retribusi')->with('toast_success', 'Data Tagihan retribusi berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(retribusi $retribusi)
    {
       
     
        $provider = $retribusi->provider_id;

        auth()->user()->unreadNotifications->where('id', request('id'))->first()?->markAsRead();
      
        $retribusis = DB::table('retribusis')
        ->join('providers', 'retribusis.provider_id', '=', 'providers.id')
        ->select('retribusis.*','providers.name')
        ->where('providers.id', $provider)
        ->get();

        $detail = pengguna::where('provider_id', $provider);

       
    $total = $retribusi->tagihan;
  

        $id = DB::table('menaras')
            ->join('providers', 'menaras.provider_id', '=', 'providers.id')
            ->join('jenis', 'menaras.jenis_id', '=', 'jenis.id')
            ->join('kecamatans', 'menaras.kecamatan_id', '=', 'kecamatans.id')
            ->select('menaras.*','providers.name','jenis.nama as jnama','jenis.tarif','kecamatans.nama as knama')
            ->where('menaras.provider_id', $provider)
            ->get();

            $tanggal = Carbon::now()->locale('id_ID')->Format('dmy');
            $tanggalA = Carbon::parse($retribusi->jatuh_tempo)->locale('id_ID')->isoFormat('LL');
            $tanggalB = Carbon::parse($retribusi->created_at)->locale('id_ID')->isoFormat('LL');

        return view('provider.retribusi.detail',[
           'menara' => $id,
           'retribusi' =>$retribusi,
           'total' => $total,
           'detail' => $detail,
           'providers' => Provider::all(),
           'sekarang' => $tanggal,
           'tempo' => $tanggalA,
           'buat' => $tanggalB
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $retribusi = retribusi::findOrFail($id);

        return view('provider.retribusi.edit',[
            'retribusi' => $retribusi,
            'providers' => Provider::all(),
            'menaras' => Menara::all(),
            'jeniss' => Jenis::all()
        ]);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(request $request, retribusi $retribusi, $id)
    {
       
        $rules = [
            
            'jatuh_tempo' => 'required',
            'status' => 'required',
        ];

      
        
        $validatedData = $request->validate($rules,
        [ 
          'jatuh_tempo.required' => 'Tanggal Jatuh Tempo Tidak Boleh Kosong',
        ]);
    
      
        //strip_tags($request->body) = digunakan agar tags yang diinputkan di body dihilangkan
    
        retribusi::where('id', $id)->update($validatedData);
    
        return redirect('/retribusi')->with('toast_success', 'Data Tagihan retribusi berhasil di perbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
     
        retribusi::destroy($id);
        return response()->json(['status' => 'Data berhasil Dihapus']);
    }

    public function read($id)
    {
        
        DatabaseNotification::find($id)->markAsRead(); return back()->with('toast_success', 'Notifikasi telah di lihat');
    }

    public function readAll()
    {
        
        DatabaseNotification::all()->markAsRead(); return back()->with('toast_success', 'Notifikasi telah di lihat Semua');
    }

    public function formKirim()
    {
        return view('provider.retribusi.kirim',[
            'providers' => Provider::all()
        ]);
    }

    public function kirimEmail(request $request)
    {
     
        $validatedData = $request->validate([
            'provider_id' => 'required',
            'email' => 'required',
            'tagihan' => 'required',
            'pesan' => 'required',
            'subject' => 'required',
            'file' => 'file|max:10900'
        ]);

    
         $file = $request->file->store('post-file');
    

        $isi = [
            'title' => 'Tagihan Retribusi Menara Telekomunikasi',
            'body' => $request->pesan,
            'tagihan' => $request->tagihan,
            'subject' => $request->subject,
            'path' => $file
        ];


        Mail::to( $request->email)->send(new sendEmail($isi));
        return redirect('/retribusi')->with('toast_success', 'Tagihan retribusi berhasil di kirim ke email');

    }

    public function cetakPdf($id)
    {
        $ide = retribusi::findOrfail($id);
       
        $provider = $ide->provider_id;
       
        
     

        $retribusis = DB::table('retribusis')
        ->join('providers', 'retribusis.provider_id', '=', 'providers.id')
        ->select('retribusis.*','providers.name')
        ->where('providers.id', $provider)
        ->get();

        $detail = pengguna::where('provider_id', $provider);

       
    $total = $retribusis->sum('tagihan');

    $id = DB::table('menaras')
    ->join('providers', 'menaras.provider_id', '=', 'providers.id')
    ->join('jenis', 'menaras.jenis_id', '=', 'jenis.id')
    ->join('kecamatans', 'menaras.kecamatan_id', '=', 'kecamatans.id')
    ->select('menaras.*','providers.name','jenis.nama as jnama','jenis.tarif','kecamatans.nama as knama')
    ->where('menaras.provider_id', $provider)
    ->get();

    $tanggal = Carbon::now()->locale('id_ID')->isoFormat('LLLL');
    $tanggalA = Carbon::parse($ide->jatuh_tempo)->locale('id_ID')->isoFormat('LL');
    $tanggalB = Carbon::parse($ide->created_at)->locale('id_ID')->isoFormat('LL');
       
        return view('provider.retribusi.cetak',[
            'menara' => $id,
            'retribusi' =>$ide,
            'total' => $total,
            'detail' => $detail,
            'providers' => Provider::all(),
            'sekarang' => $tanggal,
            'tempo' => $tanggalA,
            'buat' => $tanggalB
         ]);

    }


}
