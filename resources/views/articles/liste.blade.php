@extends('layouts.appAdmin')

@section('content')
  <!--main content start-->
      <section id="main-content">
          <section class="wrapper">		
              <div class="row">
                  <div class="col-md-11 col-md-offset-1">
                      <section class="panel">
                          <header class="panel-heading">
                            Liste des Articles                            
                          </header>
                          <div class="panel-body">
                              <div class="row">
                                  <div class="col-md-6 col-lg-6 col-md-offset-3">
                                    @if(session('info'))
                                    <div class="alert alert-success">
                                        {{session('info')}}                                 
                                    </div> 
                                    @endif
                               </div>
                            </div>
                            <div class="col-md-12">
                            <table class="table">
                              <thead>
                              <tr>
                                  <th><i class="fa fa-picture-o" aria-hidden="true" ></i> image</th>
                                  <th><i class="fa fa-product-hunt" aria-hidden="true"></i> Nom Article</th>
                                  <th><i class="fa fa-tags" aria-hidden="true" ></i> Catégorie</th>
                                  <th><i class="fa fa-file-text" aria-hidden="true" ></i> Description </th>
                                  <th> <i class="fa fa-dollar" style="font-size:16px" ></i> Prix Unitaire </th>
                                  <th> <i class="fa fa-balance-scale fa-5x"></i>  Quantite</th>
                                  <th style="width:100px;"> <i class="fa fa-balance-scale" aria-hidden="true"></i> Quantite Minimun</th>
                                  <th><i class="icon_cogs"></i> Action</th>
                              </tr>
                              </thead>
                              <tbody>
                                 @foreach($articles as $article )
                              <tr>                            
                                  <td><img style ="height:41px; width:41px ;"src="../img/{{ $article->image }}" alt=""> </td>
                                  <td style="width:100px;">{{ $article->nomArticle }}</td>    
                                  <td style="width:100px;">{{ $article->nomCategorie }}</td>                                 
                                  <td style="width:150px;">{{ $article->descriptionArticle }}</td>
                                  <td>{{ $article->prixUnitaire }} $</td>
                                  @if($article->quantite <= $article->quantiteMin)
                                       <td style="background:red;">{{ $article->quantite }}</td>  
                                    @else
                                       <td>{{ $article->quantite }}</td>  
                                  @endif
                                    <td> {{ $article->quantiteMin }}</td>   
                                <td >
                                  <div class="btn-group">
                                      <a class="btn btn-primary" href="{{url('/articles/show',$article->articleId)}}"><i class="fa fa-bullseye" aria-hidden="true"></i></a>
                                      <a class="btn btn-success" href="{{url('/articles/edit',$article->articleId)}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                       <form class="inline" action="{{url('/articles/delete',$article->articleId)}}" method="GET"  onsubmit = "return confirm('Êtes vous sûr?')">
                                         <input type="submit" class="btn btn-danger btn-block" value="Delete  ">
                                        
                                      </form> 
                                    </div>
                                  </td>                          
                           
                           </tr>
                           
                            @endforeach
                              </tbody>
                          </table>
                        
                            <div class=" col-md-5 col-md-offset-5">  
                                {{$articles->links()}}           
                              </div>
                          </div>
                      </section>                   
                  </div>
              </div>
              <!-- page end-->
          </section>
      </section>
  @endsection