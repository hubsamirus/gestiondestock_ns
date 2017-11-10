<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Categorie;
use App\Models\Commande;
use App\Models\ArticleCmd;
use App\Models\CommandeTemp;
use \Illuminate\Support\Carbon;
use DB;
use Auth;
use Flashy;

class ClientController extends Controller
{

    /**
     * Affiche la liste des articles
     *
     * @return \liste d'article en plusieurs page
     */
    public function index()
    {
        $categories = Categorie::all();
        $articles = Article::paginate(5);
        return view ('clients.liste',compact('articles', 'categories'));
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
    public function show(Request $request, $id)
    {
        $qte = $request->qteCmd;
         $articles = Article::findOrFail($id);
         
        return view('clients.show', compact('articles', 'users', 'qte'));
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
    public function update($id)
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
       // dd($id);
        //Commande::where()
        ArticleCmd::where('articleId', $id)->delete();
        Flashy::info("votre catégorie à été bien supprimer");
        return redirect()->route('clients.listeCommande')->with('info', 'L\'Article bien supprimer');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function creerCommande(){   

       $users = Auth::user();
       $date = Carbon::now();  
       $userid = $users->id;

       $montant = 0;
           
       Commande:: create([
                    'dateCommande'=>$date,
                    'montant'=>  $montant,
                    'userId' => $userid               
         ]);

       //$lastid = DB::getPdo()->lastInsertId();
       //$idcommande = $lastid;
       Flashy::message('Ajouter des Articles à ta commande');
       return redirect()->route('clients.liste')->with('info','Ajouter des Articles à ta commande');        
     
   }
        /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ajouterCommande(Request $request){   
    
        $idarticle = $request->idarticle;
        $articles = Article::find($idarticle);  
        $lastCommande = DB::table('commandes')->orderBy('commandeId', 'desc')->first();
        $quantite =$request['qteCmd'];
        $montant = $quantite * $articles->prixUnitaire;
      
        ArticleCmd:: create([
                        'articleId'=>$idarticle,
                        'commandeId'=>$lastCommande->commandeId,     
                        'quantite'=>$quantite                 
        ]); 

        $commandes = Commande::find($lastCommande->commandeId); 
        
         $command = array(
            'montant'=>$commandes->montant + $montant
        );       
        Commande::where('commandeId', $lastCommande->commandeId)->update($command); 


        $articles = array(
            'quantite'=>$articles->quantite - $quantite
        );       
        Article::where('articleId', $idarticle)->update($articles); 
        
        Flashy::message('Ajouter des Articles à ta commande');
        return redirect()->route('clients.liste')->with('info', 'l\'article est bien ajouter à ta commande');
      //} 
   }

     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function listerCommande()
    {   
        $users = Auth::user();
        $lastCommande = Commande::where('userId', '=', $users->id)->orderby('commandeId', 'desc')->first(); //DB::table('commandes')->orderBy('commandeId', 'desc')->first(); 
      
      if($lastCommande == null){
         return redirect()->route('home')->with('info', 't\'as aucune commande');
      }else{
        $listes = ArticleCmd        
        ::join('articles', 'articles_cmds.articleId', '=', 'articles.articleId')
        ->join('commandes', 'articles_cmds.commandeId', '=', 'commandes.commandeId')
        ->select('articles_cmds.articleId', 'commandes.commandeId','articles.image','articles.nomArticle','articles_cmds.quantite','articles.prixUnitaire','commandes.montant', 'commandes.dateCommande')
        ->where('commandes.commandeId', '=' , $lastCommande->commandeId)
        ->where('commandes.userId', '=' , $users->id )
        ->getQuery()
        ->orderBy('commandes.commandeId','DESC')
        ->get();

        return view('clients.listeCommande', compact('listes', 'lastCommande') );
      }       
       //dd($lastCommande == null);
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function historique()
    {
        $users = Auth::user();  
        $username = $users->name;

        $commandes = Commande::
        where('commandes.userId', '=' , $users->id )
        ->orderBy('commandes.commandeId','ASC')
        ->get();

        if ($commandes ==null) {
           return redirect()->route('/clients.historique')->with('info', 'historique vide');
        }else{     
          $listes = ArticleCmd        
            ::join('articles', 'articles_cmds.articleId', '=', 'articles.articleId')
            ->join('commandes', 'articles_cmds.commandeId', '=', 'commandes.commandeId')
            ->join('users', 'commandes.userId', '=', 'users.id')
            ->select('users.name','articles.image','articles.nomArticle','articles_cmds.quantite','articles.prixUnitaire','commandes.montant', 'commandes.dateCommande')
            ->where('commandes.userId', '=' , $users->id )
            ->getQuery()
            ->orderBy('commandes.commandeId','DESC')
            ->get();
         return view('clients.historique', compact('listes','commandes','username') );
        // dd($commandes ==null);
       }
   }

   /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        $users = Auth::user();
        $mytime = Carbon::now();        
        return view('clients.profile', compact('users', 'mytime') );
    }
}
