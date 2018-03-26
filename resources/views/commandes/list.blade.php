@extends('layouts.appAdmin')
@section('content')
 <section id="main-content">
   <section class="wrapper">         
     <div class="row">
        <!-- chart morris start -->
        <div class="col-md-11 col-md-offset-1">
            <section class="panel">
              <header class="panel-heading">
                          <h2>Liste des commandes  </h2>
                         
                        </header>
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
                        
                          <table class="table">
                              <thead>
                              <tr>
                                  <th>N° Commande</th>
                                  <th>Date Commande</th>
                                  <th>Montant </th>
                                  <th>Client</th>                                
                                  <th>Action</th>
                              </tr>
                              </thead>
                              <tbody>
                                 @foreach($commandes as $commande )
                              <tr>                            
                                 <td>{{$commande->commandeId}}</td>                                  
                                  <td>{{$commande->dateCommande}}</td>

                                  <td> {{$commande->montant}}</td>    
                                  <td> {{$commande->name}}</td>   
                                  <td>
                                      <div class="btn-group">
                                          <a class="btn btn-primary" href="{{url('/commandes/show', $commande->commandeId)}}">Visualiser</a>
                                          
                                      </div>
                                  </td>                         
                           
                           </tr>
                            @endforeach
                              </tbody>
                          </table>
                           <div class=" col-md-5 col-md-offset-5">  
                             {{$commandes->links()}} 
                             </div 
                  </div>
              </div>  
            </section>
          </div>
        </div>
   </section> 
</section>  
@endsection

