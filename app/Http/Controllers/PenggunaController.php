<?php

namespace App\Http\Controllers;

use App\Models\pengguna;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StorepenggunaRequest;
use App\Http\Requests\UpdatepenggunaRequest;
use App\Models\Provider;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pengguna.index',[
            'penggunas' =>  pengguna::orderBy('name','DESC')->filter(request(['search']))->paginate(5)->withQueryString()
           
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pengguna.create', [
            'providers' => Provider::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $validateData = $request->validate([
            'name' => 'required|max:255',
            'provider_id' => 'required|unique:pengguna',
            'username' => ['required', 'min:3', 'max:255', 'unique:pengguna'],
            'email' => 'required|email:dns|unique:pengguna',
            'password' => 'required|min:5|max:8',
            'no_hp' => 'required|max:12',
            'image' => 'image|file|max:800' ],
            [ 'provider_id.required' => 'Nama Proveider Tidak Boleh Kosong',
            'name.required' => 'Nama Tidak Boleh Kosong',
            'username.required' => 'Username Tidak Boleh Kosong',
            'email.required' => 'Email Tidak Boleh Kosong',
            'password.required' => 'Password Tidak Boleh Kosong',
            'no_hp.required' => 'No HP Tidak Boleh Kosong',
            'image.max' => 'Ukuran file gambar tidak boleh diatas 800 KB',
            'no_hp.max' => 'Penulisan No Hp tidak boleh lebih dari 12 angka', 
            'password.max' => 'Penulisan password hanya bisa 8 karakter'
            ]);

        if($request->file('image'))
        {
            $validateData['image'] =  $request->file('image')->store('post-profile');
        }

        //$validateData['password'] = bcrypt($validateData['password']);
        $validateData['password'] = Hash::make($validateData['password']);
        

        Pengguna::create($validateData);

        return redirect('/pengguna')->with('toast_success','Pengguna Baru Berhasil Ditambah');
   
    }

    /**
     * Display the specified resource.
     */
    public function show(pengguna $pengguna)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {   
     $user = Pengguna::findOrFail($id);
     return view('pengguna.edit', [
        'user' => $user,
        'users' => Pengguna::all(),
        'providers' => Provider::all()
       ]);
   }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pengguna $pengguna, $id)
    {
        $rules =[
            'name' => 'required|max:255',
            'username' => 'required',
            'password' => 'required|min:5|max:255',
            'no_hp'  => 'required|max:12',
            'image' => 'image|file|max:800'
        ];
        
        if($request->email != Pengguna::findOrFail($id)->email)
        {
            $rules['email'] = 'required|email:dns|unique:pengguna';
        }

        if($request->provider_id != Pengguna::findOrFail($id)->provider_id)
        {
            $rules['provider_id'] = 'required|unique:pengguna';
        }

        $validatedData = $request->validate($rules,
        [ 'provider_id.required' => 'Nama Proveider Tidak Boleh Kosong',
        'name.required' => 'Nama Tidak Boleh Kosong',
        'username.required' => 'Username Tidak Boleh Kosong',
        'email.required' => 'Email Tidak Boleh Kosong',
        'password.required' => 'Password Tidak Boleh Kosong',
        'no_hp.required' => 'No HP Tidak Boleh Kosong',
        'image.max' => 'Ukuran file gambar tidak boleh diatas 800 KB',
        'no_hp.max' => 'Penulisan No Hp tidak boleh lebih dari 12 angka'
    ]);

        //$validateData['password'] = bcrypt($validateData['password']);
        $validatedData['password'] = Hash::make($validatedData['password']);

        if($request->file('image'))
        {
            if(Pengguna::findOrFail($id)->image)
            {
                Storage::delete(Pengguna::findOrFail($id)->image);
            }
            $validatedData['image'] = $request->file('image')->store('post-profile');
        }


       Pengguna::where('id', $id)->update($validatedData);

        return redirect('/pengguna')->with('toast_success', 'Pengguna berhasil di update');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if(Pengguna::findOrFail($id)->image)
        {
            Storage::delete(Pengguna::findOrFail($id)->image);
        }
        Pengguna::destroy($id);
        return response()->json(['status' => 'Data berhasil Dihapus']);

    }

    
}
