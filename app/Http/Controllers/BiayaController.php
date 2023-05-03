<?php

namespace App\Http\Controllers;

use App\Models\biaya;
use App\Http\Requests\StorebiayaRequest;
use App\Http\Requests\UpdatebiayaRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class BiayaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('biaya.index',[
            'biayas' => biaya::all()
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
            'jenis' => 'required|unique:biayas|max:1',
            'tarif' => 'required|max:20',
        ],
            [ 'jenis.required' => 'Jenis Menara Tidak Boleh Kosong',
              'tarif.required' => 'Tarif Tidak Boleh Kosong'
        ]);

        //strip_tags($request->body) = digunakan agar tags yang diinputkan di body dihilangkan

        Biaya::create($validatedData);

        return redirect('/jenis')->with('toast_success', 'Data jenis menara berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(biaya $biaya): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(biaya $biaya, $id)
    {
        return view('biaya.edit',[
            'biaya' => biaya::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(request $request, biaya $biaya,$id)
    {
       
        $rules = [
            'jenis' => 'required|max:1',
            'tarif' => 'required|max:20'
        ];

        if($request->jenis != biaya::findOrFail($id)->jenis)
        {
            $rules['jenis'] = 'required|unique:biayas|max:1';
        }

        $validatedData = $request->validate($rules,  
        [ 'jenis.required' => 'Jenis Menara Tidak Boleh Kosong',
              'tarif.required' => 'Tarif Tidak Boleh Kosong'
        ]);

        //strip_tags($request->body) = digunakan agar tags yang diinputkan di body dihilangkan

        biaya::where('id', $id)->update($validatedData);
        return redirect('/jenis')->with('toast_success', 'Data Jenis Menara berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Biaya $biaya, $id)
    {

        Biaya::destroy($id);
        return response()->json(['status' => 'Data berhasil Dihapus']);
    }
}
