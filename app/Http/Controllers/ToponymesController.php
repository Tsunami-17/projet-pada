<?php

namespace App\Http\Controllers;

use App\Models\Toponymes;
use App\Http\Requests\StoreToponymesRequest;
use App\Http\Requests\UpdateToponymesRequest;
use Illuminate\Http\Request;

class ToponymesController extends Controller
{
    /**
     * Display a listing of the resource.
     *Toponymes::select('commune')->distinct()->orderBy('commune','asc')->get() obtenir tout les communes
     *
     * @return \Illuminate\Http\Response
     */
    public $communes;
    
    public function communes()
    {
        //
        $this->communes = Toponymes::select('commune')
            ->distinct()
            ->orderBy('commune','asc')
            ->get();
        return view('pages.denomination');


    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Toponymes  $toponymes
     * Show the form for creating a new resource.
     *Toponymes::select('typologie')->distinct()->where('commune','KOUMASSI')->orderBy('typologie','asc')->get() typologie selon commune
     * @return \Illuminate\Http\Response
     */
    public function trieTypo(Toponymes $toponymes)
    {
        //
        $Tries = Toponymes::select('typologie')
            ->distinct()
            ->where('commune',$toponymes->commune)
            ->orderBy('typologie','asc')
            ->get();
        return $Tries;
    }

    /**
     * Store a newly created resource in storage.
     *Toponymes::select('nom_propose')->distinct()->where('commune','KOUMASSI')->whereNotnull('nom_propose')->whereNotNull('gid_ati')->orderBy('nom_propose','asc')->get()
     * @param  \App\Http\Requests\StoreToponymesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function listNomPropose(StoreToponymesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Toponymes  $toponymes
     * @return \Illuminate\Http\Response
     */
    public function show(Toponymes $toponymes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Toponymes  $toponymes
     * @return \Illuminate\Http\Response
     */
    public function edit(Toponymes $toponymes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateToponymesRequest  $request
     * @param  \App\Models\Toponymes  $toponymes
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateToponymesRequest $request, Toponymes $toponymes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Toponymes  $toponymes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Toponymes $toponymes)
    {
        //
    }
}
