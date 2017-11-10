@extends('layouts.app')
@section('content')

<section id="main-content">
   <section class="wrapper">         
     <div class="row">
        <!-- chart morris start -->
        <div class="col-md-10 col-md-offset-1">
          <section class="panel">            
                        
             <div class="panel-body">      
                 
               <form class="form-horizontal" method="POST" id="payment-form" role="form" action="{!! URL::route('paypal') !!}" >
                 
                 {{ csrf_field() }}

                 <h3 style="  text-align:center; background:#7AA5DA; height:40px; padding:10px; border-radius: 10px 10px;
                                    box-shadow: 5px 5px 0 0;"><b>Détails de la Facture N° :  {{$idfacture}}</b> </h3>
                 
                                   <hr><br>
                <div class="form-group ">
                     <label for="ref"  class="col-md-3 control-label"> Nom du Client : </label>
                     <p>{{$name}}</p>                   
                </div>
                <br>
                        
                 <div class="form-group">
                     <label for="ref"  class="col-md-3 control-label"> Référence : </label>
                     <p>{{$reference}}</p>                   
                </div>
                          
               <div class="form-group">
                     <label for="date"  class="col-md-3 control-label"> Date Du facturation: </label>
                     <p>{{$datefacture}}</p> 
                </div>
                 <br>
                <hr>
        

                  
                <table class="table">
                    <thead style="text-align:center; font-weight: bold; background:#eee; height:30px; padding:5px;">
                    <tr>
                              
                        <th>Article</th> 
                        <th class="col-md-2">Quantité Commandée</th> 
                        <th>Prix Unitaire</th> 
                                                           
                        <th>Sous Total</th>                                                                   
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($factures as $facture )
                    <tr>  
                      
                        <td> {{$facture->nomArticle}}</td>  
                        <td> {{$facture->quantite}}</td> 
                        <td> {{$facture->prixUnitaire}}  $</td>                                                                                                  
                          
                        <td> {{($facture->prixUnitaire) * ($facture->quantite)}}  $</td> 
                        
                    
                    </tr>
                    @endforeach
                </tbody>
                
            </table>
                    <hr>

                    <div class="form-group">
                        <div class="col-md-3 col-md-offset-9">
                        <h4 style="text-align:center;font-weight: bold; background:gray;   height:30px; 
                                padding:5px;    border-radius: 10px 10px;    box-shadow: 5px 5px 0 0;">
                                <b>Total: {{$facture->montant}}  $</b>   
                        </h4>                                                  
                    </div>
                    </div>

                      <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Paywith Paypal
                                </button>
                            </div>
                        </div>

                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-4">
                    
                        <a href="{{url('factures/liste')}}">
                            <input type="button" value="Retour" class="btn btn-danger"> 
                        </a> 
                         <a style="border:1px solid red; color:#000; background:gray;" href="{{url('export/facture_xls')}}">
                            <input value="Exporter en xls" class="btn btn-primary"> 
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