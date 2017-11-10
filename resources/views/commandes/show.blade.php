@extends('layouts.appAdmin')

@section('content')

<section id="main-content">
   <section class="wrapper">         
     <div class="row">
        <!-- chart morris start -->
        <div class="col-md-10 col-md-offset-1">
          <section class="panel">            
                        
             <div class="panel-body">      
                 
               <form action="{{url('factures/store')}}" method="POST">

                 {{ csrf_field() }}
                
                 <input type="hidden" name="_method" value="PUT">
                
                <input type="hidden" name="idcommande" value="{{$idcommande}} ">
                
                 <h3 style="  text-align:center; background:#7AA5DA; height:40px; padding:10px; border-radius: 10px 10px;
                                    box-shadow: 5px 5px 0 0;"><b>Détails de la Commande N° :  {{$idcommande}}</b> </h3>
                     <hr>

                 <div class="form-group{{ $errors->has('ref') ? ' has-error' : '' }}">
                     <label for="ref"  class="col-md-2 control-label"> Référence : </label>
                    <div class="col-md-3">
                      <input class="form-control" type="text" id="ref" name="ref" placeholder="entrer une référence" required>
                   </div>
                     @if ($errors->has('ref'))
                        <span class="help-block">
                            <strong>{{ $errors->first('ref') }}</strong>
                        </span>
                    @endif
                </div>
                <br>
                <hr>


               <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
                     <label for="date"  class="col-md-2 control-label"> Date De facturation: </label>
                    <div class="col-md-3">
                     <input class="form-control" type="date" id="date" name="date">
                  </div>
                     @if ($errors->has('date'))
                        <span class="help-block">
                            <strong>{{ $errors->first('date') }}</strong>
                        </span>
                    @endif
                </div>
                 <br>
                <hr>

                  
                          <table class="table">
                              <thead style="text-align:center; font-weight: bold; background:#eee; height:30px; padding:5px;">
                                <tr>
                                    <th>Client</th>
                                    <th>Image</th>
                                    <th>Article</th> 
                                    <th>Quantité Commandée</th> 
                                    <th>Prix Unitaire</th> 
                                    <th>Date Commande</th>                                      
                                    <th>Sous Total</th>                                                                   
                                </tr>
                              </thead>
                              <tbody>
                                 @foreach($commandes as $commande )
                                <tr>  
                                 <td> {{$commande->name}}</td> 
                                 <td><img style ="height:41px; width:41px ;"src="/img/{{ $commande->image }}" alt=""> </td>
                                  <td> {{$commande->nomArticle}}</td>  
                                  <td> {{$commande->quantite}}</td> 
                                  <td> {{$commande->prixUnitaire}}  $</td>                                                                                                  
                                  <td> {{$commande->dateCommande}}</td>   
                                  <td> {{($commande->prixUnitaire) * ($commande->quantite)}}  $</td> 
                                  <td>
                               
                             </tr>
                               @endforeach
                          </tbody>
                          
                        </table>
                         <hr>

                          <div class="form-group">
                             <div class="col-md-3 col-md-offset-9">
                                <h4 style="text-align:center;font-weight: bold; background:gray;   height:30px; 
                                        padding:5px;    border-radius: 10px 10px;    box-shadow: 5px 5px 0 0;">
                                       <b>Total: {{$commande->montant}}  $</b>   
                                </h4>                                                  
                            </div>
                          </div>

                           <div class="form-group">
                             <div class="col-md-8 col-md-offset-4">
                            
                                <a href="{{url('commandes/list')}}">
                                    <input type="button" value="Retour" class="btn btn-danger"> 
                                </a> 
                              
                                <input id="" type="submit"  value="Facturer" class="btn btn-primary"> 
                                                                                                
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

