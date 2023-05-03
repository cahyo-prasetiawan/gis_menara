<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use App\Http\Requests\StoreProviderRequest;
use App\Http\Requests\UpdateProviderRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;

class ProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('provider.index', [
            "providers" => Provider::orderBy('name','ASC')->filter(request(['search']))->paginate(5)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('provider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validateData = $request->validate([
            'name' => 'required|unique:providers|max:255',
            'alamat' => 'required|min:3|max:255',
            'icon' => 'image|file|max:800'
        ]);

        if($request->file('icon'))
        {
            $validateData['icon'] =  $request->file('icon')->store('post-icons');
        }

        Provider::create($validateData);

        return redirect('/provider')->with('toast_success','Data Berhasil ditambah','autoClose');
    }

    /**
     * Display the specified resource.
     */
    public function show(Provider $provider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Provider $provider)
    {
       return view('provider.edit', [
        'provider' => $provider
       ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Provider $provider)
    {
        $rules =[
            'alamat' => 'required',       
            'icon' => 'image|file|max:800'
        ];

        if($request->name != $provider->name)
        {
            $rules['name'] ='required|unique:providers|max:255';
        }

        $validatedData = $request->validate($rules);

        if($request->file('icon'))
        {
            if($request->oldImage)
            {
                Storage::delete($request->oldImage);
            }
            $validatedData['icon'] = $request->file('icon')->store('post-icons');
        }


        //strip_tags($request->body) = digunakan agar tags yang diinputkan di body dihilangkan

        Provider::where('id', $provider->id)->update($validatedData);

        return redirect('/provider')->with('toast_success', 'Data berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Provider $provider)
    {
        if($provider->icon)
        {
            Storage::delete($provider->icon);
        }
        Provider::destroy($provider->id);
        // return redirect('/provider')->with('question','Lorem ipsum dolor sit amet.');
        return response()->json(['status' => 'Data berhasil Dihapus']);
    }
}
