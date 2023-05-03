<?php

namespace App\Http\Controllers;

use App\Models\Menara;
use App\Http\Requests\StoreMenaraRequest;
use App\Http\Requests\UpdateMenaraRequest;
use App\Models\Kecamatan;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use App\Models\Provider;
use App\Models\biaya;
use App\Models\Jenis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenaraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(request $request)
    {
        // // $cari = $request->cari;
        // // $menaras = Menara::where('nama','LIKE','%'.$cari.'%')
            
        //      ->get();
        return view('provider.menara.index', [
            // 'menaras' => Menara::orderBy('tahun','DESC')->paginate(5)->withQueryString()
            "menaras" => Menara::orderBy('tahun','DESC')->filter(request(['search']))->paginate(5)->withQueryString()
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

    public function map()
    {
        return view('peta', [
            'menaras' => Menara::all(),
            'kecamatans' => Kecamatan::all()
            ]);
    }

}
