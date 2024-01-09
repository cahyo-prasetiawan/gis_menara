<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\Menara;
use App\Models\pengguna;
use App\Models\Provider;
use App\Models\retribusi;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class TampilanController extends Controller
{
    public function index(request $request)
    {
        $id = Auth::guard('pengguna')->user()->provider_id;
    
        $total = Menara::select(DB::raw("COUNT(nama) as total"))
                ->where('provider_id', $id)
                ->GroupBy(DB::raw("provider_id"))
                ->pluck("total");
        // $total = Menara::count()->where('provider_id',$id);

        $total_kecamatan = kecamatan::select(DB::raw("COUNT(nama) as total"))
        ->GroupBy(DB::raw("nama"))
        ->pluck("total");

        // $tota_menara = DB::table('menaras')
        // ->join('kecamatans', 'menaras.kecamatan_id', '=', 'kecamatans.id')
        // ->select('menaras.*','menaras.nama as menara','menaras.id as mid','kecamatans.*','kecamatans.nama as jumlah')
        // ->where('providers.id', $id)
        // ->GroupBy(DB::raw("kecamatan_id"))
        // ->get();

      

        $tampil = DB::table('menaras')
        ->join('providers', 'menaras.provider_id', '=', 'providers.id')
        ->join('kecamatans', 'menaras.kecamatan_id', '=', 'kecamatans.id')
        ->select('providers.*','menaras.*','menaras.nama as menara','menaras.id as mid','kecamatans.*','kecamatans.nama as jumlah')
        ->where('providers.id', $id)
        ->where('kecamatans.status', '0' )
        ->get();

        $kec = DB::table('menaras')
        ->join('kecamatans', 'menaras.kecamatan_id', '=', 'kecamatans.id')
        ->select('menaras.*','kecamatans.*')
        ->where('menaras.provider_id', $id)
        ->where('kecamatans.status', '0' )
        ->get();

        

        $th = Carbon::now()->locale('id_ID')->Format('Y');
            $retribusis = DB::table('retribusis')
                ->join('providers', 'retribusis.provider_id', '=', 'providers.id')
                ->join('menaras', 'providers.id', '=', 'menaras.provider_id')
                ->join('jenis', 'menaras.jenis_id', '=', 'jenis.id')
                ->join('kecamatans', 'menaras.kecamatan_id', '=', 'kecamatans.id')
                ->select('retribusis.*','providers.name','menaras.*','jenis.nama as jnama','jenis.tarif','kecamatans.nama as knama')
                ->where('providers.id', $id)
                ->WhereYear('retribusis.jatuh_tempo', $th)
                ->where('retribusis.status', '0')
                ->get();

                $ta = DB::table('retribusis')
                ->where('provider_id', $id)
                ->WhereYear('jatuh_tempo', $th)
                ->where('status', '0')
                ->get();

          
             $tagihan = $retribusis->sum('tagihan');
  
        return view('interface.index',[
            'title' => 'Beranda',
            'tampil1' => menara::where('provider_id', $id)->paginate(8)->withQueryString()
        ], compact('tampil','total','tagihan','retribusis','kec','total_kecamatan'));
    }


    public function menara(request $request)
    {
        $id = Auth::guard('pengguna')->user()->provider_id;
    
        $total = Menara::select(DB::raw("COUNT(nama) as total"))
                ->where('provider_id', $id)
                ->GroupBy(DB::raw("provider_id"))
                ->pluck("total");
        // $total = Menara::count()->where('provider_id',$id);

        $tampil = DB::table('menaras')
        ->join('providers', 'menaras.provider_id', '=', 'providers.id')
        ->join('kecamatans', 'menaras.kecamatan_id', '=', 'kecamatans.id')
        ->select('providers.*','menaras.*','menaras.nama as menara','menaras.id as mid','kecamatans.*','kecamatans.nama as jumlah')
        ->where('providers.id', $id)
        ->where('kecamatans.status', '0' )
        ->get();

    

        return view('interface.menara',[
            'title' => 'Menara',
            'kecamatan'=> Kecamatan::all(),
            'tampil1' => menara::where('provider_id', $id)->filter(request(['search']))->paginate(8)->withQueryString()
        ], compact('tampil','total'));
    }

    public function kontak(request $request)
    {
        $id = Auth::guard('pengguna')->user()->provider_id;
    
        $total = Menara::select(DB::raw("COUNT(nama) as total"))
                ->where('provider_id', $id)
                ->GroupBy(DB::raw("provider_id"))
                ->pluck("total");
        // $total = Menara::count()->where('provider_id',$id);

        $tampil = DB::table('menaras')
        ->join('providers', 'menaras.provider_id', '=', 'providers.id')
        ->join('kecamatans', 'menaras.kecamatan_id', '=', 'kecamatans.id')
        ->select('providers.*','menaras.*','menaras.nama as menara','menaras.id as mid','kecamatans.*','kecamatans.nama as jumlah')
        ->where('providers.id', $id)
        ->where('kecamatans.status', '0' )
        ->get();

        
  
        return view('interface.kontak',[
            'title' => 'Kontak Kami'
        ], compact('tampil','total'));
    }

    public function akun(request $request)
    {
        $id = Auth::guard('pengguna')->user()->provider_id;
    
        $total = Menara::select(DB::raw("COUNT(nama) as total"))
                ->where('provider_id', $id)
                ->GroupBy(DB::raw("provider_id"))
                ->pluck("total");
        // $total = Menara::count()->where('provider_id',$id);

        $tampil = DB::table('menaras')
        ->join('providers', 'menaras.provider_id', '=', 'providers.id')
        ->join('kecamatans', 'menaras.kecamatan_id', '=', 'kecamatans.id')
        ->select('providers.*','menaras.*','menaras.nama as menara','menaras.id as mid','kecamatans.*','kecamatans.nama as jumlah')
         ->where('providers.id', $id)
         ->where('kecamatans.status', '0' )
        ->get();

        
  
        return view('interface.profile',[
            'title' => 'Profile'
        ], compact('tampil','total'));
    }

    public function profile(Request $request, $id)
    {
       
        $rules =[
            'name' => 'required|max:255',
            'username' => 'min:0|max:10',
            'password' => 'min:0|max:8',
            'image' => 'image|file|max:800'
        ];

        if($request->email != pengguna::findOrFail($id)->email)
        {
            $rules['email'] = 'required|unique:penggunas';
        }

        $validatedData = $request->validate($rules);
        //$validateData['password'] = bcrypt($validateData['password']);
        $validatedData['password'] = Hash::make($validatedData['password']);

        if($request->file('image'))
        {
            if(pengguna::findOrFail($id)->image)
            {
                Storage::delete(pengguna::findOrFail($id)->image);
            }
            $validatedData['image'] = $request->file('image')->store('post-profile');
        }

        pengguna::where('id', $id)->update($validatedData);

        return redirect('/akun')->with('ksuccess', 'Akun berhasil di update');

    }

    public function retribusi(request $request)
    {
        $provider = Auth::guard('pengguna')->user()->provider_id;
    
      
        if($request->filled('tahun')){

        $retribusis = DB::table('retribusis')
        ->join('providers', 'retribusis.provider_id', '=', 'providers.id')
        ->join('menaras', 'providers.id', '=', 'menaras.provider_id')
        ->join('jenis', 'menaras.jenis_id', '=', 'jenis.id')
        ->join('kecamatans', 'menaras.kecamatan_id', '=', 'kecamatans.id')
        ->select('retribusis.*','providers.name','menaras.*','jenis.nama as jnama','jenis.tarif','kecamatans.nama as knama')
        ->where('providers.id', $provider)
        ->WhereYear('retribusis.jatuh_tempo', $request->tahun)
        ->get();

        // $tahunT = retribusi::select(DB::raw('YEAR(jatuh_tempo) year'))
        // ->WhereYear('retribusis.jatuh_tempo', $request->tahun)
        // ->groupby('year')
        // ->pluck('year');

        $tahunT = DB::table('retribusis')
        ->join('providers', 'retribusis.provider_id', '=', 'providers.id')
        ->select('retribusis.jatuh_tempo')
        ->where('providers.id', $provider)
        ->WhereYear('retribusis.jatuh_tempo', $request->tahun)
        ->get();
    

  
        $status = DB::table('retribusis')
        ->join('providers', 'retribusis.provider_id', '=', 'providers.id')
        ->select('retribusis.status')
        ->where('providers.id', $provider)
        ->WhereYear('retribusis.jatuh_tempo', $request->tahun)
        ->get();

        
         $total = DB::table('retribusis')
         ->join('providers', 'retribusis.provider_id', '=', 'providers.id')
         ->select('retribusis.tagihan')
         ->where('providers.id', $provider)
         ->WhereYear('retribusis.jatuh_tempo', $request->tahun)
         ->get();
 
        }
        else {
            $th = Carbon::now()->locale('id_ID')->Format('Y');
            $retribusis = DB::table('retribusis')
                ->join('providers', 'retribusis.provider_id', '=', 'providers.id')
                ->join('menaras', 'providers.id', '=', 'menaras.provider_id')
                ->join('jenis', 'menaras.jenis_id', '=', 'jenis.id')
                ->join('kecamatans', 'menaras.kecamatan_id', '=', 'kecamatans.id')
                ->select('retribusis.*','providers.name','menaras.*','jenis.nama as jnama','jenis.tarif','kecamatans.nama as knama')
                ->where('providers.id', $provider)
                ->WhereYear('retribusis.jatuh_tempo', $th)
                ->get();

                $tahunT = DB::table('retribusis')
                ->join('providers', 'retribusis.provider_id', '=', 'providers.id')
                ->select('retribusis.jatuh_tempo')
                ->where('providers.id', $provider)
                ->WhereYear('retribusis.jatuh_tempo', $th)
                ->get();

              
          
                $status = DB::table('retribusis')
                ->join('providers', 'retribusis.provider_id', '=', 'providers.id')
                ->select('retribusis.status')
                ->where('providers.id', $provider)
                ->WhereYear('retribusis.jatuh_tempo', $th)
                ->get();

           
                $total = DB::table('retribusis')
                ->join('providers', 'retribusis.provider_id', '=', 'providers.id')
                ->select('retribusis.tagihan')
                ->where('providers.id', $provider)
                ->WhereYear('retribusis.jatuh_tempo', $th)
                ->get();

           
        }
        $detail = pengguna::where('provider_id', $provider);


        // $id = DB::table('menaras')
        //     ->join('providers', 'menaras.provider_id', '=', 'providers.id')
        //     ->join('jenis', 'menaras.jenis_id', '=', 'jenis.id')
        //     ->join('kecamatans', 'menaras.kecamatan_id', '=', 'kecamatans.id')
        //     ->select('menaras.*','providers.name','jenis.nama as jnama','jenis.tarif','kecamatans.nama as knama')
        //     ->where('menaras.provider_id', $provider)
        //     ->get();

            $tanggal = Carbon::now()->locale('id_ID')->Format('Y');
            // $tanggalA = Carbon::parse($retribusis->jatuh_tempo)->locale('id_ID')->isoFormat('LL');
            // $tanggalB = Carbon::parse($retribusis->created_at)->locale('id_ID')->isoFormat('LL');

            $tampil = DB::table('menaras')
            ->join('providers', 'menaras.provider_id', '=', 'providers.id')
            ->join('kecamatans', 'menaras.kecamatan_id', '=', 'kecamatans.id')
            ->select('providers.*','menaras.*','menaras.nama as menara','menaras.id as mid','kecamatans.*','kecamatans.nama as jumlah')
            ->where('providers.id', $provider)
            ->where('kecamatans.status', '0' )
            ->get();

            $tahun = retribusi::select(DB::raw('count(id) as `data`'),DB::raw('YEAR(jatuh_tempo) year'))
            ->groupby('year')
            ->get();

         
  
        return view('interface.retribusi',[
            'title' => 'Retribusi',
            'menara' => $retribusis,
            'retribusi' =>$retribusis,
            'total' => $total,
            'detail' => $detail,
            'providers' => Provider::all(),
            'sekarang' => $tanggal
            // 'tempo' => $tanggalA,
            // 'buat' => $tanggalB
        ], compact('tampil','tahun','tahunT','status'));
    }


    public function detail($id)
    {

        $provider = Auth::guard('pengguna')->user()->provider_id;
    
        $menara = Menara::findOrFail($id);

        $tampil = DB::table('menaras')
        ->join('providers', 'menaras.provider_id', '=', 'providers.id')
        ->join('kecamatans', 'menaras.kecamatan_id', '=', 'kecamatans.id')
        ->select('providers.*','menaras.*','menaras.nama as menara','menaras.id as mid','kecamatans.*','kecamatans.nama as jumlah')
         ->where('providers.id', $provider)
         ->where('kecamatans.status', '0' )
        ->get();

        return view('interface.lihat', [
            'title' => 'Detail Menara',
            'menara' => $menara,
            'providers' => Provider::all()
        ], compact('tampil'));
    }

    public function rute($id)
    {
     
     $ide = menara::findOrFail($id);
    
      
        // $total = Menara::count()->where('provider_id',$id);

        $tampil = DB::table('menaras')
        ->join('providers', 'menaras.provider_id', '=', 'providers.id')
        ->join('kecamatans', 'menaras.kecamatan_id', '=', 'kecamatans.id')
        ->select('providers.*','menaras.*','menaras.nama as menara','menaras.id as mid','kecamatans.*','kecamatans.nama as jumlah')
        ->where('menaras.id', $ide->id)
        ->where('kecamatans.status', '0' )
        ->get();

 

        $kec = DB::table('menaras')
        ->join('kecamatans', 'menaras.kecamatan_id', '=', 'kecamatans.id')
        ->select('menaras.*','kecamatans.*')
        ->where('menaras.provider_id', $ide->provider_id)
        ->where('kecamatans.status', '0' )
        ->get();

        return view('interface.rute',[
            'title' => 'Beranda'
           
        ], compact('tampil','kec'));
    }


}
