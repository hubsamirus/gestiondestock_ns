<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fournisseur;
use Flashy;

class FournisseurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $fournisseurs = Fournisseur::all();
        return view ('fournisseurs.liste', compact('fournisseurs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fournisseurs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Fournisseur:: create([
            'nomFournisseur'=>$request->name,
            'raisonSocial'=> $request->raison,
            'telephone'=>$request->telephone,
            'adresse'=>$request->adresse,             
            'email'=>$request->email,
            'pays'=>$request->pays   
      ]);
          Flashy::info("Fournisseur bien ajouté");
         return redirect()->route('fournisseurs.liste')->with('info','Fournisseur bien Ajouter');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $fournisseurs = Fournisseur::findOrFail($id);
        return view('fournisseurs.show', compact('fournisseurs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {           
        $fournisseurs = Fournisseur::findOrFail($id);
        return view('fournisseurs.edit', compact('fournisseurs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
             $fournisseurs = array(
              'nomFournisseur'=>$request->name,
                'raisonSocial'=> $request->raison,
                'telephone'=>$request->telephone,
                'adresse'=>$request->adresse,             
                'email'=>$request->email,
                'pays'=>$request->pays   
            );       
        Fournisseur::where('fournisseurId', $id)->update($fournisseurs);
         Flashy::info("Fournisseur bien modifié");
        return redirect()->route('fournisseurs.liste')->with('info', 'Fournisseur bien modifier');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Fournisseur::where('fournisseurId', $id)->delete();
         Flashy::info("Fournisseur bien supprimer");
        return redirect()->route('fournisseurs.liste')->with('info', 'Fournisseur bien supprimer');
    }
}
