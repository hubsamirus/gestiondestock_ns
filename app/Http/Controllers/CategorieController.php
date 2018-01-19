<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;
use Flashy;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $categories = Categorie
         ::orderBy('nomCategorie', 'ASC')
         ->paginate(5);        
         return view ('categories.liste', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
        return 'hello git';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       

         if( Categorie::where('nomCategorie', '=' , $request->cat )->exists())
         {
            return redirect()->route('categories.liste')->with('info', 'Catégorie déja Ajoutée');
         }
         else{
               Categorie:: create(['nomCategorie'=>$request->cat]);
               Flashy::info("votre catégorie à été bien ajoutée");
               return redirect()->route('categories.liste')->with('info', 'Catégorie bien Ajouter');
         }         
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $categories = Categorie::findOrFail($id);
       
        return view('categories.edit', compact('categories'));
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
       // $categories = Categorie::find($id);        
       // dd($categories); 
        $categories = array('nomCategorie' => $request->cat);       
        Categorie::where('categorieId', $id)->update($categories);
         Flashy::info("votre catégorie à été bien modifiée");
        return redirect()->route('categories.liste')->with('info', 'Catégorie bien modifier');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {        
        Categorie::where('categorieId', $id)->delete();
         Flashy::info("votre catégorie à été bien supprimée");
        return redirect()->route('categories.liste')->with('info', 'Catégorie bien supprimer');
    }
}
