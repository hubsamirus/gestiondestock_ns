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
                          <h2>Liste des Articles  </h2>
                         
                        </header>
                          <table class="table">
                              <thead>
                              <tr>
                                  <th>image</th>
                                  <th>Nom Article</th>
                                  <th>Description </th>
                                  <th>Stock</th>
                                  <th>Quantite</th>
                                  <th>prix Unitaire</th>
                                  <th>Action</th>
                              </tr>
                              </thead>
                              <tbody>
                                 @foreach($articles as $article )
                              <tr>                            
                                  <td><img style ="height:41px; width:41px ;"src="../img/{{$article->image}}" alt=""> </td>
                                  <td>{{$article->nomArticle}}</td>                                  
                                  <td>{{$article->descriptionArticle}}</td>

                                  @if($article->quantite>0)
                                  <td>Disponible</td>
                                    @else
                                  <td>Non Disponible</td>
                                  @endif

                                  <td> {{$article->quantite}}</td>    
                                  <td> {{$article->prixUnitaire}}  $</td>   
                                  <td>
                                      <div class="btn-group">
                                          <a class="btn btn-primary" href="{{url('/clients/show', $article->articleId)}}">Visualiser</a>
                                          
                                      </div>
                                  </td>                         
                           
                           </tr>
                            @endforeach
                              </tbody>
                          </table>
                           <div class=" col-md-5 col-md-offset-5">  
                             {{$articles->links()}} 
                             </div 
                  </div>
              </div>  
            </section>
          </div>
        </div>
   </section> 
</section>  
@endsection

