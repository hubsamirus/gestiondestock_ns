@extends('layouts.app')
@section('content')

<section id="main-content">
   <section class="wrapper">         
     <div class="row">
        <!-- chart morris start -->
        <div class="col-md-10 col-md-offset-1">
          <section class="panel">            
                      
             <div class="panel-body">      
                 
               <form action="{{url('clients/ajouterCommande')}}" method="POST">

                 {{ csrf_field() }}
                
                 <input type="hidden" name="_method" value="PUT">

                 <input type="hidden" name="idarticle" value="{{$articles->articleId}} ">
                   <h3 style="text-align:center;" >Visualisation de l'Article "" <b>{{$articles->nomArticle}} </b>""</h3>
               
                 <hr>
                 <div class="form-group">
                    <img style ="height:80px; width:80px ;"src="/img/{{ $articles->image }}" alt=""> </td>  
                                                              
                </div>
                
                <div class="form-group">
                     <label class="col-md-3 control-label"> Nom Article : </label>
                     <div class="col-md-6">               
                        <p>{{$articles->nomArticle}}</p>
                    </div>                                         
                </div>

                <br><br>
                

                <div class="form-group">
                     <label  class="col-md-3 control-label"> Description : </label>
                    <div class="col-md-6">
                      <p >{{$articles->descriptionArticle}}</p>
                   </div>
                </div>
                <br>

                <div class="form-group">
                     <label  class="col-md-3 control-label"> Stock : </label>
                    <div class="col-md-6">                    
                        @if($articles->quantite>0)
                            <td>Disponible</td>
                            @else
                            <td><h5 style="color:red;">Non Disponible</h5></td>
                            @endif                      
                   </div>
                </div>
                <br> <br>

               <div class="form-group">
                     <label  class="col-md-3 control-label"> Prix Unitaire : </label>
                    <div class="col-md-6">
                      <p >{{$articles->prixUnitaire}}  $</p>
                   </div>
                </div>
                <br>

                <div class="form-group">
                     <label for="qte"  class="col-md-3 control-label"> Quantite en stock : </label>
                    <div class="col-md-6">
                      <p>{{$articles->quantite}}  Unités</p>
                   </div>
               </div>
               <br><br>

                <div class="form-group">
                     <label for="qteCmd"  class="col-md-3 control-label"> je Commande: </label>
                 <div class="col-md-6">
                      <input class="form-inline quantity" type="number"  min="1" max="{{$articles->quantite}}" id="qteCmd" name="qteCmd" value="1">
                      <p>{{$articles->nomArticle}}(s)</p>
                   </div>
               </div>
               <br>
           
                <div class="form-group">
                    <div class="col-md-8 col-md-offset-4">
                    
                        <a href="{{url('clients/liste')}}">
                            <input type="button" value="Retour" class="btn btn-danger"> 
                        </a> 
                      
                        <input id="" type="submit"  value="Ajouter cet Article" class="btn btn-primary"> 
                                                                                        
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