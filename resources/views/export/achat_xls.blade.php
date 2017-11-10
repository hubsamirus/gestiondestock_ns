<table>
    
        <tr> 
            <th>Nom Article</th>
            <th>Catégorie</th> 
            <th>Fournisseur </th> 
            <th>Quantite</td>
            <th>Date D'achat</th> 
        </tr>
            @foreach(\App\Models\ Achat
            ::join('articles', 'achats.articleId', '=', 'articles.articleId')
            ->join('fournisseurs', 'achats.fournisseurId', '=', 'fournisseurs.fournisseurId')
            ->join('categories', 'articles.categorieId', '=', 'categories.categorieId')
            ->select('articles.articleId','articles.image','articles.nomArticle', 'articles.prixUnitaire', 'fournisseurs.nomFournisseur', 'achats.dateAchat', 'achats.quantite', 'categories.nomCategorie')
            ->get() as $achat)

            <tr>         
            <td>{{ $achat->nomArticle }}</td>
            <td>{{ $achat->nomCategorie}}</td>
            <td>{{ $achat->nomFournisseur}}</td>
            <td>{{ $achat->quantite}}</td>
            <td>{{ $achat->dateAchat }}</td>  
        </tr>            
        @endforeach
    </tbody>
</table>
