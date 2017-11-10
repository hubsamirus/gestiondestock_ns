<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Facture;
use App\Models\Commande;
use Excel;
use DB;
use Flashy;
use Auth;
class FactureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        $factures = Facture  
        ::join('commandes', 'commandes.commandeId', '=', 'factures.commandeId')
        ->join('users' , 'users.id', '=', 'factures.userId')
        ->select( 'factures.factureId','factures.dateFacture','commandes.commandeId', 'commandes.montant', 'users.name', 'factures.reference')
        ->where('factures.userId' , '=' , $user->id)      
        ->orderBy('factures.factureId', 'ASC')
        ->paginate(5);
        //dd($factures);
       return view('factures/liste', compact('factures'));
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
        $idcommande = $request->idcommande;
        $reference = $request->ref;
        $date = $request->date;

        $iduser =DB::table('commandes')
        ->where('commandeId', '=' , $idcommande)        
        ->pluck('userId')->first();
         //dd($iduser);
      
        Facture:: create([
                        'reference'=>$reference, 
                        'dateFacture'=>$date,
                        'commandeId'=>$idcommande, 
                        'userId'=>$iduser                                     
        ]); 

        
        Flashy::info('La facture à été envoyer');
        return redirect()->route('commandes.list')->with('info', 'la facture à été bien envoyée!');
      //} 
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
         $user= Auth::user();
         $name= $user->name;
         $referenc = Facture::where('factureId','=', $id)->pluck('reference');  
         $reference= $referenc[0];
         $datefacture =  Facture::findOrFail($id)->pluck('dateFacture')->first();   
       

         $ref = $request->reference;
         $date = $request->date;
        
         $idfacture = $id;
         $user = Auth::user();

        $factures = Facture  
        ::join('commandes', 'commandes.commandeId', '=', 'factures.commandeId')     
        ->join('articles_cmds' , 'articles_cmds.commandeId', '=', 'commandes.commandeId')
        ->join('articles', 'articles.articleId' , '=' , 'articles_cmds.articleId')
        ->join('users' , 'users.id', '=', 'factures.userId')
        ->select( 'factures.factureId','factures.dateFacture','commandes.commandeId', 'commandes.dateCommande','commandes.montant', 'users.name', 'factures.reference','articles.nomArticle','articles.prixUnitaire','articles_cmds.quantite')
        -> where('factures.factureId' , '=' , $id)  
        //->orWhere('factures.userId' , '=' , $user->id)      
        ->orderBy('factures.factureId', 'ASC')
        ->get();

        return view('factures/show', compact('factures', 'idfacture','datefacture','reference','name'));
  
        //dd($user->name);
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


    public function export()
     {
        Excel::create('mafacture', function($excel) {
        $excel->sheet('facture', function($sheet) {
            $sheet->loadView('export.facture_xls');


            $sheet->row('A1:E1', function($cells) {                    
                $cells->setBackground('#CDCBEA');
            });
        })
        ->store('xls')->export('xls');
    
        });
    }
}
