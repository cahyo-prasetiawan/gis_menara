<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateKecamatanRequest;

class KecamatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('kecamatan.index', [
       'kecamatans' => Kecamatan::orderBy('created_at','DESC')->filter(request(['search']))->paginate(5)->withQueryString()
   
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kecamatan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(request $request)
    {
        $validateData = $request->validate([
            'nama' => 'required||unique:kecamatans|min:5|max:50',
            'geojson' => 'required|file|max:40048',
            'warna' => 'required',],
            [
             'nama.required' => 'Nama Kecamatan Tidak Boleh Kosong',
             'nama.unique' => 'Nama Kecamatan Sudah Ada',
             'geojson.required' => 'File Geojson Harus Di Inputkan',
             'warna.required' => 'Warna Harus Di Inputkan'
        ]);

        if($request->file('geojson'))
        {
            $validateData['geojson'] =  $request->file('geojson')->store('file_geojson');
        }


        Kecamatan::create($validateData);

        return redirect('/kecamatan')->with('toast_success','Data Kecamatan Baru Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kecamatan $kecamatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kecamatan $kecamatan)
    {
        return view('kecamatan.edit', [
            'kecamatan' => $kecamatan,
            'kecamatans' => kecamatan::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kecamatan $kecamatan, $id)
    {
        $rules =[
            'nama' => 'required|max:255',
            'geojson' => 'file|max:40048',
            'warna' => 'required',
            'status' => 'required'
        ];

        if($request->nama != Kecamatan::findOrFail($id)->nama)
        {
            $rules['nama'] = 'required|unique:kecamatans|min:5|max:255';
        }

        $validatedData = $request->validate($rules, [
            'nama.required' => 'Nama Kecamatan Tidak Boleh Kosong',
            'nama.unique' => 'Nama Kecamatan Sudah Ada',
            'warna.required' => 'Warna Harus Di Inputkan'
       ]);

       if($request->file('geojson'))
       {
           if(Kecamatan::findOrFail($id)->geojson)
           {
               Storage::delete(Kecamatan::findOrFail($id)->geojson);
           }
           $validatedData['geojson'] = $request->file('geojson')->store('file_geojson');
       }

        //strip_tags($request->body) = digunakan agar tags yang diinputkan di body dihilangkan

        Kecamatan::where('id', $id)->update($validatedData);
        return redirect('/kecamatan')->with('toast_success', 'Data Kecamatan berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if(Kecamatan::findOrFail($id)->geojson)
        {
            Storage::delete(Kecamatan::findOrFail($id)->geojson);
        }
        Kecamatan::destroy($id);
        return response()->json(['status' => 'Data berhasil Dihapus']);
    }
}
