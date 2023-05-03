<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
use App\Http\Requests\StoreJenisRequest;
use App\Http\Requests\UpdateJenisRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class JenisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('biaya.index',[
            'biayas' => Jenis::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('biaya.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|unique:jenis|max:1',
            'tarif' => 'required|max:20',
        ],
            [ 'nama.required' => 'Jenis Menara Tidak Boleh Kosong',
              'tarif.required' => 'Tarif Tidak Boleh Kosong'
        ]);

        //strip_tags($request->body) = digunakan agar tags yang diinputkan di body dihilangkan

        Jenis::create($validatedData);

        return redirect('/jenis')->with('toast_success', 'Data jenis menara berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Jenis $jenis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jenis $jenis,$id)
    {
        return view('biaya.edit',[
            'biaya' => Jenis::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(request $request, Jenis $jenis,$id)
    {
        $rules = [
            'nama' => 'required|max:1',
            'tarif' => 'required|max:20'
        ];

        if($request->nama != jenis::findOrFail($id)->nama)
        {
            $rules['nama'] = 'required|unique:jenis|max:1';
        }

        $validatedData = $request->validate($rules,  
        [ 'nama.required' => 'Jenis Menara Tidak Boleh Kosong',
              'tarif.required' => 'Tarif Tidak Boleh Kosong'
        ]);

        //strip_tags($request->body) = digunakan agar tags yang diinputkan di body dihilangkan

        Jenis::where('id', $id)->update($validatedData);
        return redirect('/jenis')->with('toast_success', 'Data Jenis Menara berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jenis $jenis, $id)
    {
        Jenis::destroy($id);
        return response()->json(['status' => 'Data berhasil Dihapus']);
    }
}
