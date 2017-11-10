<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Article;
use App\Models\ArticleCmd;
use App\Models\Commande;
use DB;

class CommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $commandes = Commande  
        ::join('users', 'users.id', '=', 'commandes.userId')
        ->select( 'users.name', 'commandes.dateCommande','commandes.commandeId', 'commandes.montant')
        ->getQuery()
        ->orderBy('commandes.commandeId', 'ASC')
        ->paginate(5);
        //dd($commandes);
       return view('commandes/list', compact('commandes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $idcommande = $id;
       
       $commandes = Commande
        ::join('articles_cmds', 'articles_cmds.commandeId','=', 'commandes.commandeId')
        ->join('articles', 'articles.articleId', '=', 'articles_cmds.articleId')
        ->join('users', 'users.id', '=', 'commandes.userId')
        ->select('users.name','commandes.commandeId','articles.image','articles.nomArticle', 'articles_cmds.quantite', 'articles.prixUnitaire', 'commandes.dateCommande','commandes.montant')
        ->where('commandes.commandeId', '=' , $id)
        ->getQuery()
        ->orderBy('nomArticle', 'ASC')
        ->paginate(5);
        // dd($commandes);        
        return view('commandes.show', compact('commandes', 'idcommande'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


}
