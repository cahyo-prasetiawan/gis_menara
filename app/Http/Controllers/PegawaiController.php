<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Crypt;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pegawai.index',[
            'users' => User::all(),
            'users' => User::where('role', '0')->paginate(5)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pegawai.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'username' => ['required', 'min:3', 'max:255', 'unique:users'],
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:8',
            'image' => 'image|file|max:800'],
            [ 
            'name.required' => 'Nama Tidak Boleh Kosong',
            'username.required' => 'Username Tidak Boleh Kosong',
            'email.required' => 'Email Tidak Boleh Kosong',
            'password.required' => 'Password Tidak Boleh Kosong',
            'image.max' => 'Ukuran file gambar tidak boleh diatas 800 KB',
            'password.max' => 'Penulisan password hanya bisa 8 karakter',
            'email.email' => 'Penulisan Email tidak valid'
            ]);

        if($request->file('image'))
        {
            $validateData['image'] =  $request->file('image')->store('post-profile');
        }
        //$validateData['password'] = bcrypt($validateData['password']);
        $validateData['password'] = Hash::make($validateData['password']);

        User::create($validateData);

        return redirect('/pegawai')->with('toast_success','Data Pegawai Baru Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit(Request $request, $id)
     {   
      $user = User::findOrFail($id);
      return view('pegawai.edit')->with('user',$user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user, $id)
    {
       
        $rules =[
            'name' => 'required|max:255',
            'username' => 'required',
            'password' => 'required|min:5|max:255',
            'image' => 'image|file|max:800'
        ];

        if($request->email != User::findOrFail($id)->email)
        {
            $rules['email'] = 'required|email:dns|unique:users';
        }

        $validatedData = $request->validate($rules,
    [ 
    'name.required' => 'Nama Tidak Boleh Kosong',
    'username.required' => 'Username Tidak Boleh Kosong',
    'email.required' => 'Email Tidak Boleh Kosong',
    'password.required' => 'Password Tidak Boleh Kosong',
    'image.max' => 'Ukuran file gambar tidak boleh diatas 800 KB',
    'password.max' => 'Penulisan password hanya bisa 8 karakter',
    'email.email' => 'Penulisan Email tidak valid'
    ]);
        //$validateData['password'] = bcrypt($validateData['password']);
        $validatedData['password'] = Hash::make($validatedData['password']);

        if($request->file('image'))
        {
            if(User::findOrFail($id)->image)
            {
                Storage::delete(User::findOrFail($id)->image);
            }
            $validatedData['image'] = $request->file('image')->store('post-profile');
        }

        User::where('id', $id)->update($validatedData);

        return redirect('/pegawai')->with('toast_success', 'Pegawai berhasil di update');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( User $user, $id)
    {
        if(User::findOrFail($id)->image)
        {
            Storage::delete(User::findOrFail($id)->image);
        }
        User::destroy($id);
        return response()->json(['status' => 'Data berhasil Dihapus']);
        // return redirect('/pegawai')->with('toast_success', 'Pegawai berhasil dihapus');
    }

    public function formedit(Request $request, User $user)
    {
        return view('profile.edit');
    }

    public function profile(Request $request, User $user, $id)
    {
       
        $rules =[
            'name' => 'required|max:255',
            'username' => 'min:0|max:10',
            'password' => 'min:0|max:8',
            'image' => 'image|file|max:800'
        ];

        if($request->email != User::findOrFail($id)->email)
        {
            $rules['email'] = 'required|unique:users';
        }

        $validatedData = $request->validate($rules);
        //$validateData['password'] = bcrypt($validateData['password']);
        $validatedData['password'] = Hash::make($validatedData['password']);

        if($request->file('image'))
        {
            if(User::findOrFail($id)->image)
            {
                Storage::delete(User::findOrFail($id)->image);
            }
            $validatedData['image'] = $request->file('image')->store('post-profile');
        }

        User::where('id', $id)->update($validatedData);

        return redirect('/myprofile')->with('ksuccess', 'Akun berhasil di update');

    }
    
}
