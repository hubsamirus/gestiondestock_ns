@extends('layouts.app')
@section('content')

<section id="main-content">
   <section class="wrapper">         
     <div class="row">
        <!-- chart morris start -->
        <div class="col-md-10 col-md-offset-1">
          <section class="panel">
                   
                        
             <div class="jsOff panel-body">  

                  <div class="row">
                      <div class="col-md-6 col-lg-6 col-md-offset-3">
                        @if(session('info'))
                        <div class="alert alert-success">
                            {{session('info')}}                                 
                        </div> 
                        @endif
                    </div>
                </div>       
                 
               <form action="{{url('clients/Commande')}}" method="POST">

                 {{ csrf_field() }}
                
                 <input type="hidden" name="_method" value="PUT">
         
                 <hr>

                 <dl class="accordion">
                     @foreach($commandes as $commande)
                    <dt>Commande N° : {{$commande->commandeId}}</dt> 
                    <dd>
                      <table class="table">                      
                            <h3 style="text-align:center;" >Détails de ma commande N° : {{$commande->commandeId}} </h3>    
                              <thead>
                                <tr>
                                    <th>Client</th>
                                    <th>Image</th>
                                    <th>Article</th> 
                                    <th>Quantité Commandée</th> 
                                    <th>Prix Unitaire</th> 
                                    <th>Date Commande</th>                                      
                                    <th>Sous Total</th>  
                                    <th>Action</th>                                   
                                </tr>
                              </thead>
                                <tbody>
                                 @foreach($listes as $liste )
                                <tr>  
                                 <td> {{$liste->name}}</td> 
                                 <td><img style ="height:41px; width:41px ;"src="/img/{{ $liste->image }}" alt=""> </td>
                                  <td> {{$liste->nomArticle}}</td>  
                                  <td> {{$liste->quantite}}</td> 
                                  <td> {{$liste->prixUnitaire}}  $</td>                                                                                                  
                                  <td> {{$liste->dateCommande}}</td>   
                                  <td> {{($liste->prixUnitaire) * ($liste->quantite)}}  $</td> 
                                  <td>
                               
                             </tr>
                               @endforeach
                          </tbody>
                        </table>
                    </dd>  
                    @endforeach              
                 </dl>

                    <hr>

                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-4">
                    
                        <a href="{{url('clients/liste')}}">
                            <input type="button" value="Retour" class="btn btn-info"> 
                        </a>               
                      
                                                                                        
                    </div>
                    </div>                     
                  
              
                </form>                       
              </div>
            </section>
          </div>
        </div>
   </section> 
</section>   

@endsection

