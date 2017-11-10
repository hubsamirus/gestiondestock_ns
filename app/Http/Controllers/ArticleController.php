<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Achat;
use App\Models\Article;
use App\Models\Categorie;
use App\Models\Fournisseur;
use Illuminate\Http\Request;
use App\Models\ArticleCmd;
use App\Models\Commande;
use App\Models\Facture;
use App\User;
use PDF;
use Flashy;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  
    public function index(Request $request)
    {  
         $articles = Article     
         ::join('categories', 'articles.categorieId', '=', 'categories.categorieId')
        ->select('articles.articleId','articles.image','articles.nomArticle','articles.descriptionArticle','articles.quantite','articles.descriptionArticle','articles.quantiteMin', 'articles.prixUnitaire','categories.nomCategorie')
        ->getQuery()
        ->orderBy('nomArticle', 'ASC')
        ->paginate(5);
        //dd($articles);
        return view ('articles.liste',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() 
    {
        $categories   = DB::table('categories')->pluck('nomCategorie','categorieId');
        $fournisseurs = DB::table('fournisseurs')->pluck('nomFournisseur','fournisseurId');
       // dd($categories);
        
       return view('articles.create', compact('categories', 'fournisseurs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)  
    {

        if( Article::where('nomArticle', '=' , $request->nomArt )->exists()){

            //Article::where('ArticleId', $id)->update($articles);
            return redirect()->route('articles.liste')->with('info', 'brrrrrrrrrrrr');

        }else {
             Article:: create([
            'image'=>$request->image,
            'categorieId'=> $request->ncat,
            'nomArticle'=> $request->nomArt,
            'descriptionArticle'=>$request->desc,
            'prixUnitaire'=>$request->prix,
            'quantite'=>$request->qte,
            'quantiteMin'=>$request->qteM            
            ]);

         $id = DB::getPdo()->lastInsertId();
         
         Achat:: create([
            'articleId'=>$id,
            'fournisseurId'=>$request->fournisseur,     
            'quantite'=>$request->qte,
            'dateAchat'=>$request->dateachat            
            ]);

         Flashy::message('L\'article à été bien Ajouter');
         return redirect()->route('articles.liste');
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
        $articles = Article::findOrFail($id);
        return view('articles.show', compact('articles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $articles = Article::findOrFail($id);
        //$categories = Categorie::find($articles->categorieId);
        return view('articles.edit', compact('articles'));
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
        $articles = array(
            'image'=>$request->image,
            'categorieId'=> $request->ncat,
            'nomArticle'=> $request->nomArt,
            'descriptionArticle'=>$request->desc,
            'prixUnitaire'=>$request->prix,
            'quantite'=>$request->qte,
            'quantiteMin'=>$request->qteM   
        );       
        Article::where('articleId', $id)->update($articles);
        Flashy::info("votre catégorie à été bien modifié");
        return redirect()->route('articles.liste')->with('info', 'Article bien modifier');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Article::where('articleId', $id)->delete();
        Flashy::info("votre catégorie à été bien supprimer");
        
        return redirect()->route('articles.liste')->with('info', 'Article bien supprimer');
    }

    public function entrer()
    {
         return view('articles.entrer');
    }

    public function search(Request $request)
    {
        $picture= "../img/";
        if ($request->ajax()) {
            
            $resultat = "";

            $achats = Achat
            ::join('articles', 'achats.articleId', '=', 'articles.articleId')
            ->join('fournisseurs', 'achats.fournisseurId', '=', 'fournisseurs.fournisseurId')
            ->join('categories', 'articles.categorieId', '=', 'categories.categorieId')
            ->where('nomArticle', '=', $request->search)
            ->orWhere('nomFournisseur', 'LIKE', '%'.$request->search.'%')
            ->orWhere('nomCategorie', 'LIKE', '%'.$request->search.'%')   
            //->take(7)         
            ->get();
                 

           if ($achats) {
                foreach ($achats as $key => $achat) {
                    $resultat .= "<tr>".
                                   "<td> <img style ='height:41px; width:41px;' src='".$picture.$achat->image."'></td>".                                 
                                    "<td>".$achat->nomArticle ."</td>".
                                    "<td>".$achat->nomCategorie."</td>".
                                    "<td>".$achat->nomFournisseur."</td>".
                                    "<td>".$achat->quantite."</td>".
                                    "<td>".$achat->dateAchat."</td>".
                                     "<td>".
                                    "<div class='btn-group'>".
                                        "<a class='btn btn-primary' href='{{url(\'/articles/show\'.','.$achat->articleId.')}}'><i class='fa fa-bullseye' aria-hidden='true'></i></a>".
                                        "<a class='btn btn-primary' href='{{url(\'/articles/edit\'.','.$achat->articleId.')}}'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a>".
                                        "<a class='btn btn-primary' href='{{url(\'/articles/delete\'.','.$achat->articleId.')}}'><i class='fa fa-trash-o' aria-hidden='true'></i></a>".
                                      "</div>".
                                    "</td>".                              
                                 "</tr>";
                }
            
            }
            return Response($resultat);
          //  dd($achats);
       }
    }

    public function sortie()
    {
        $commandes = Commande
        ::join('articles_cmds', 'articles_cmds.commandeId','=', 'commandes.commandeId')
        ->join('articles', 'articles.articleId', '=', 'articles_cmds.articleId')
        ->join('users', 'users.id', '=', 'commandes.userId')
        ->select('articles.articleId','articles.image','articles.nomArticle', 'users.name', 'commandes.dateCommande')
        ->getQuery()
        ->orderBy('nomArticle', 'ASC')
        ->paginate(5);
        // dd($achats);  
        return view('articles.sortie', compact('commandes'));
            
    }


    public function stockbas()
    { 
        $articles = Article::all();
        $stocksbas = $articles->filter(function ($article) {
            return $article->quantite <= $article->quantiteMin;
        });
        return view('articles.stock', compact('stocksbas', 'articles'));
    }

    public function statistique(Request $request)
    { 
         $articles = Article::all();
         $artCommande = ArticleCmd::all();

        $achats = Achat
        ::join('articles', 'achats.articleId', '=', 'articles.articleId')
        ->join('fournisseurs', 'achats.fournisseurId', '=', 'fournisseurs.fournisseurId')
        ->join('categories', 'articles.categorieId', '=', 'categories.categorieId')
        ->select('articles.articleId','articles.image','articles.nomArticle', 'articles.prixUnitaire', 'fournisseurs.nomFournisseur', 'achats.dateAchat', 'achats.quantite', 'categories.nomCategorie')
         ->getQuery()
        ->orderBy('nomArticle', 'ASC')
        ->paginate(5);
        
        $statistics['traite'] = Facture::all()->count();
        $statistics['cat'] = Categorie::all()->count();
        $statistics['total'] = Article::sum('quantite');
        $statistics['user'] = User::all()->count();
        $statistics['achat'] =  DB::table('achats')->count();
        $statistics['totalCmd'] = Commande::all()->count();

        $cmduser = DB::table('commandes')
                 ->select('userId', DB::raw('count(*) as total'))
                 ->groupBy('userId')
                 ->first();
         
        $idartvendu = DB::table('articles_cmds')
                 ->select( 'articleId', DB::raw('count(*) as total'))
                 ->groupBy('articleId')
                 ->first();

        $fournisseurs = DB::table('achats')
            ->join('fournisseurs','achats.fournisseurId', '=', 'fournisseurs.fournisseurId')
            ->select('achats.fournisseurId', DB::raw('count(*) as total'), 'fournisseurs.nomFournisseur' )
            ->groupBy('achats.fournisseurId', 'fournisseurs.nomFournisseur')
            ->take(3)          
            ->get();    
           
            $nom = array();
            $total =array();
            foreach($fournisseurs as $fournisseur){
                $nom[]=     $fournisseur->nomFournisseur;
                $total[]=   $fournisseur->total; 
              }
              
        $meilleurvente = Article::where('articleId', '=' , $idartvendu->articleId)->first();       
        $meilleurachteur = User::where('id', '=' , $cmduser->userId)->first();    

        $statistics['totalCmd'] = Commande::all()->count();

        $statistics['bas'] = $articles->filter(function ($article) {
            return $article->quantite <= $article->quantiteMin;
        })->count();
       
         $statistics['artCmd'] = DB::table('articles_cmds')->sum('quantite');    
         $statistics['stock'] = $statistics['total'] - $statistics['artCmd'];
         $statistics['vip'] = $meilleurachteur->name ;         
         $statistics['vipArt'] = $meilleurvente->nomArticle ;


        //dd($total);
        
        return view('articles.statistique', compact('statistics', 'achats','nom','total'));
    }


}
