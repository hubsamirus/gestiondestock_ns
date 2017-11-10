@extends('layouts.app')
@section('content')
 <section id="main-content">
   <section class="wrapper">         
     <div class="row">
        <!-- chart morris start -->
        <div class="col-md-8 col-md-offset-2">
            <section class="panel">
            
              <div class="panel-body">
                
                <div class="row">                 
                      <section class="panel">
                         <div class="row">
                                  <div class="col-md-6 col-lg-6 col-md-offset-3">
                                    @if(session('info'))
                                    <div class="alert alert-success">
                                        {{session('info')}}                                 
                                    </div> 
                                    @endif
                               </div>
                            </div>
                        <header class="panel-heading">
                          <h2>Liste des Facture  </h2>
                         
                        </header>
                          <table class="table">
                              <thead>
                              <tr>
                                  <th>N° Facture</th>
                                  <th>N° Commande</th>
                                  <th>Référence</th>
                                  <th>Date Facture </th>
                                  <th>Nom du Client</th>
                                  <th>Montant Facture</th>                                
                                  <th>Action</th>
                              </tr>
                              </thead>
                              <tbody>
                                 @foreach($factures as $facture )
                                <tr> 

                                   <td>{{$facture->factureId}}</td>                                  
                                  <td>{{$facture->commandeId}}</td>
                                  <td>{{$facture->reference}}</td>
                                  <td> {{$facture->dateFacture}}</td>  
                                  <td> {{$facture->name}}</td>    
                                  <td> {{$facture->montant}}  $</td>   
                                  <td>
                                      <div class="btn-group">
                                          <a class="btn btn-primary" href="{{url('/factures/show', $facture->factureId)}}">Visualiser</a>
                                          
                                      </div>
                                  </td>                         
                           
                           </tr>
                            @endforeach
                              </tbody>
                          </table>
                           <div class=" col-md-5 col-md-offset-5">  
                             {{$factures->links()}} 
                             </div 
                  </div>
              </div>  
            </section>
          </div>
        </div>
   </section> 
</section>  
@endsection

