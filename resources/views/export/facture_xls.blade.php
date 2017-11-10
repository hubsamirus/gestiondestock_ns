<table>
    
        <tr> 
            <th>Nom client</th>
            <th>Reférence</th> 
            <th>Date Facturation </th> 
            <th>prix Unitaire</td>
            <th>Montant</th> 
        </tr>
            @foreach(\App\Models\Facture  
                ::join('commandes', 'commandes.commandeId', '=', 'factures.commandeId')            
                ->join('articles_cmds' , 'articles_cmds.commandeId', '=', 'commandes.commandeId')
                ->join('articles', 'articles.articleId' , '=' , 'articles_cmds.articleId')
                ->join('users' , 'users.id', '=', 'factures.userId')
                ->select( 'factures.factureId','factures.dateFacture','commandes.commandeId', 'commandes.dateCommande','commandes.montant', 'users.name', 'factures.reference','articles.nomArticle','articles.prixUnitaire','articles_cmds.quantite')
                ->where('factures.userId' , '=' , Auth::user()->name)      
                ->get()  as $facture)

            <tr>         
            <td>{{ $facture->name }}</td>
            <td>{{ $facture->reference}}</td>
            <td>{{ $facture->dateFacture}}</td>
            <td>{{ $facture->prixUnitare}}</td>
            <td>{{ $facture->montant }}</td>  
        </tr>            
        @endforeach
    </tbody>
</table>
