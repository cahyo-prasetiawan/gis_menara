<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pesan;
use App\Http\Requests\StorePesanRequest;
use App\Http\Requests\UpdatePesanRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;
use App\Notifications\PesanNotification;
use Illuminate\Support\Facades\Notification;

class PesanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        auth()->user()->unreadNotifications->where('id', request('id'))->first()?->markAsRead();
        return view('pesan.index',[
            'pesans' => Pesan::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(request $request)
    {
        $validatedData = $request->validate( [
            'provider_id' => 'required',
            'laporan' => 'required',
            'pesan' => 'required',
        ]);
    
        //strip_tags($request->body) = digunakan agar tags yang diinputkan di body dihilangkan
    
        $pesan = Pesan::create($validatedData);
        $users = User::all();
        Notification::send($users,new PesanNotification($pesan));
        return redirect('/kontak')->with('success', 'Pesan Laporan Berhasil Dikirim');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pesan $pesan): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pesan $pesan): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePesanRequest $request, Pesan $pesan): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Pesan::destroy($id);
        return response()->json(['status' => 'Data berhasil Dihapus']);
    }
}
