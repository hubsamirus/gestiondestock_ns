@extends('layouts.appAdmin')
@section('content')

<section id="main-content">
   <section class="wrapper">         
     <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <section class="panel">
                <header class="panel-heading">
                    <h4>Statistiques Generales</h2> 
                </header>
                <div class="panel-body">                
                    <div class="row">                   
                        <div class="col-lg-10 col-md-offset-1">
                            <section class="panel">
                                <header class="panel-heading">
                                    Statistque en chiffre
                                </header>
                                <div class="panel-body">
                                    <table class="table table-bordred table-striped">
                                        <tr>
                                            <td>Total des Categorie</td>
                                            <td><span class="badge"> {{$statistics['cat']}}</span></td>                                      
                                        </tr>
                                        <tr></tr>
                                        <tr>
                                            <td>Total des Achats</td>
                                            <td><span class="badge"> {{$statistics['achat']}}</span> </td>                                                                            
                                        </tr>
                                        <tr>
                                            <td>Nombre des Utilisateurs</td>
                                            <td> <span class="badge">{{$statistics['user']}}</span></td>                                    
                                        </tr>
                                        <tr></tr>

                                        <tr>
                                            <td>
                                                <table class="table table-bordred table-striped">
                                                    <tr>
                                                        <td colspan="2"> <b>Stocks</b> </td>
                                                     </tr>
                                                    <tr>                                                
                                                    <td>Nb Article en qté Bas</td>
                                                    <td><span class="badge">{{$statistics['bas']}}</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Qté en stocks</td>
                                                        <td><span class="badge">{{$statistics['stock']}}</span></td>
                                                    </tr>
                                                </table>                                               
                                            </td>

                                            <td>
                                                <table class="table table-bordred table-striped">
                                                   <tr>
                                                      <td colspan="2"> <b>Commandes</b> </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Total des Commandes</td>
                                                        <td><span class="badge">{{$statistics['totalCmd']}}</span></td>
                                                    </tr>
                                                        <tr>
                                                        <td>Nombre d'Articles Commandés</td>
                                                        <td><span class="badge">{{$statistics['artCmd']}}</span></td>
                                                    </tr>
                                                        <tr>
                                                        <td>Commandes traitée</td>
                                                        <td><span class="badge">{{$statistics['traite']}}</span></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <br>
                                        <tr>
                                            <td style>Total des Articles</td>
                                            <td><span class="badge">{{$statistics['total']}} </span> articles </td>                                      
                                        </tr> 
                                        <tr class="flash ">
                                            <td>Meilleurs Acheteur</td>
                                            <td class=" meilleur"><span class="badge">{{$statistics['vip']}} </span>  </td>                                      
                                        </tr> 

                                        <tr class="flash ">
                                            <td>Article plus Vendu</td>
                                            <td class=" meilleur"><span class="badge">{{$statistics['vipArt']}} </span>  </td>                                      
                                        </tr> 
                                    </table>
                                </div>
                            </section>
                        </div> 
                    </div>
                    <div class="row">                       
                        <div class="col-lg-10 col-md-offset-1">
                            <section class="panel">
                                <header class="panel-heading">
                                <h2>liste des Achats  <a style="border:1px solid red; color:#000; background:gray;" href="{{url('export/achat_xls')}}">Exporer en xls</a></h2>
                                </header>                                         
                                <div class="panel-body text-center"> 

                                                            
                                    <table class="table">
                                    <thead>
                                        <tr> 
                                            <th>Image</th>
                                            <th>Nom Article</th>
                                            <th>Catégorie</th> 
                                            <th>Fournisseur </th> 
                                            <th>Quantite</td>
                                            <th>Date D'achat</th> 
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr> 
                                            @foreach($achats as $achat)
                                                <td> <img style ="height:41px; width:41px ;" src="/img/{{ $achat->image }}" alt=""> </td>
                                                <td>{{ $achat->nomArticle }}</td>
                                                <td>{{ $achat->nomCategorie}}</td>
                                                <td>{{ $achat->nomFournisseur}}</td>
                                                <td>{{ $achat->quantite}}</td>
                                                <td>{{ $achat->dateAchat }}</td>  
                                        </tr>            
                                        @endforeach
                                    </tbody>
                                </table>
                                    <div class=" col-md-6 col-md-offset-3">                       
                                        {{$achats->links()}} 
                                    </div>
                                </div>                           
                            </section>
                        </div>
                    </div>
                    <div class="row">
                       <div class="col-lg-10 col-md-offset-1">
                      <section class="panel">
                        <header class="panel-heading">
                            <h3>Statistiques en Graphique</h3>
                        </header>
                        <div class="panel-body">                        
                          <div class="row">                         
                            <div class="col-lg-6">
                              <section class="panel">
                                <header class="panel-heading">
                                   Articles
                                </header>
                                <div class="panel-body text-center">
                                    <div style=" width:250px;">
                                        <canvas id="commande" width="200px" height="200px"></canvas>
                                     </div>                                  
                                </div>
                             </section> 
                           </div>                      
                          <!-- Bar -->
                          <div class="col-lg-6">
                              <section class="panel">
                                  <header class="panel-heading">
                                     Articles
                                  </header>
                                  <div class="panel-body text-center">
                                     <div style=" width:250px;">
                                        <canvas id="bar" height="200" width="200"></canvas>

                                     </div>
                                  </div>
                              </section>
                            </div>
                         </div>
                      </div> 
                    </div>  
                </div>               
            </section>
         </div>
      </div>
   </section>
</section>
@push('scripts')
<script>
    var ctx = document.getElementById("commande");
    var data = {
     labels: [        
        'Articles Commandés',
        'Articles en Stock'
    ],
    datasets: [{
        data: [
             {{ number_format($statistics ['artCmd']/$statistics['total']*100 ,2)}} ,
             {{ number_format($statistics ['stock']/$statistics['total']*100,2)}}
        ],
        backgroundColor:[
            "#FF6384",
            "#36A2EB",
            "#FFCE56"
        ],
         hoverBackgroundColor:[
            "#FF6384",
            "#36A2EB",
            "#FFCE56"
        ]
    }]  
 };

 var options = {
        elements: {
            arc: {
                borderColor: "#000000"
            }
        }
    }

var myPieChart = new Chart(ctx,{
    type: 'pie',
    data: data,
    options: options
});
//========================================bar===========================
 var ctx1 = document.getElementById("bar");

    var data = {
     labels: [      
      'Articles Commandés',
        'Articles en Stock'
        
    ],
    datasets: [{
        data: [
             {{ number_format($statistics ['artCmd']/$statistics['total']*100 ,2)}} ,
             {{ number_format($statistics ['stock']/$statistics['total']*100,2)}}
        ],
        backgroundColor:[
            "#FF6384",
            "#36A2EB"
            
        ],
         hoverBackgroundColor:[
            "#FF6384",
            "#36A2EB"
            
        ]
    }]  
 };

 var options = {
        legend: {
            display: true,
            labels: {
                fontColor: 'rgb(255, 99, 132)'
            }
        }
}

var myBarChart = new Chart(ctx1, {
    type: 'bar',
    data: data,
    options: options
});
</script>
@endpush
@endsection