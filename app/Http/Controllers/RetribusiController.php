<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use App\Models\retribusi;
use App\Models\Menara;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreretribusiRequest;
use App\Http\Requests\UpdateretribusiRequest;

class RetribusiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('provider.retribusi.index', [
            "retribusis" => Retribusi::orderBy('jatuh_tempo','ASC')->paginate(5)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('provider.retribusi.create',[
            'providers' => Provider::all(),
            'menaras' => Menara::all()
        ]);
    }

    public function getTagihan($id)
    {
       $tagihan = Menara::where('provider_id',$id);
       return response()->json($tagihan);
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreretribusiRequest $request): RedirectResponse
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(retribusi $retribusi): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(retribusi $retribusi): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateretribusiRequest $request, retribusi $retribusi): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(retribusi $retribusi): RedirectResponse
    {
        //
    }
}
