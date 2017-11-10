@extends('layouts.app')
@section('content')

<section id="main-content">
   <section class="wrapper">         
     <div class="row">
        <!-- chart morris start -->
        <div class="col-md-10 col-md-offset-1">
          <section class="panel">            
                        
             <div class="panel-body">      
                 
               <form action="{{url('clients/Commande')}}" method="POST">

                 {{ csrf_field() }}
                
                 <input type="hidden" name="_method" value="PUT">

                   <h3 style="text-align:center;" >Détails de ma commande </h3>
               
                 <hr>

                     
                  <table class="table">
                      <thead>
                        <tr>
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
                          <td><img style ="height:41px; width:41px ;"src="../img/{{ $liste->image }}" alt=""> </td>
                        
                          <td> {{$liste->nomArticle}}</td>  
                          <td> {{$liste->quantite}}</td> 
                          <td> {{$liste->prixUnitaire}}  $</td>                                                                                                  
                          <td> {{$liste->dateCommande}}</td>   
                          <td> {{($liste->prixUnitaire) * ($liste->quantite)}}  $</td> 
                          <td>
                              <div class="btn-group">
                                <a class="btn btn-danger" href="{{url('/clients/delete', $liste->commandeId)}}"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                                                    
                              </div>
                          </td>
                      </tr>
                        @endforeach
                  </tbody>
                  
                </table>
                  <hr>
                  <div class="form-group">                      
                    <div class="col-md-3 col-md-offset-9">
                      <h4 >Total: {{$lastCommande->montant}}  $ </h4>                                                                
                    </div>
                  </div>

                    <div class="form-group">
                      <div class="col-md-8 col-md-offset-4">
                    
                        <a href="{{url('clients/liste')}}">
                            <input type="button" value="Retour" class="btn btn-danger"> 
                        </a> 
                        <input id="" type="submit"  value="Payer" class="btn btn-primary"> 
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

