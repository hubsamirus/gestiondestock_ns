@extends('layouts.appAdmin')
@section('content')
  <!--main content start-->
      <section id="main-content">
          <section class="wrapper">		
              <div class="row">
                  <div class="col-md-11 col-md-offset-1">
                      <section class="panel">
                          <header class="panel-heading">
                            Liste des Ventes                           
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
                                  <th>Image</th>
                                  <th>Nom Article</th>
                                   <th>Client</th>                                  
                                   <th>Date De Vente</th>  
                                                               
                                  <th><i class="icon_cogs"></i> Action</th>
                              </tr>
                              </thead>
                              <tbody>
                                
                              <tr> 
                                  @foreach($commandes as $commande)
                                    <td> <img style ="height:41px; width:41px ;" src="/img/{{ $commande->image }}" alt=""> </td>
                                    <td>{{ $commande->image }}</td>
                                    <td>{{ $commande->nomArticle}}</td>
                                    <td>{{ $commande->name}}</td>
                                    <td>{{ $commande->dateCommande}}</td>
                                 
                                  <td>
                                    <div class="btn-group">
                                        <a class="btn btn-primary" href="{{url('/articles/show', $commande->articleId)}}"><i class="fa fa-bullseye" aria-hidden="true"></i></a>
                                        <a class="btn btn-success" href="{{url('/articles/edit', $commande->articleId)}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                        <a class="btn btn-danger" href="{{url('/articles/delete', $commande->articleId)}}"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                    </div>
                                  </td>                          
                           
                               </tr>            
                           @endforeach
                              </tbody>
                          </table>
                          </div>  
                             <div class=" col-md-6 col-md-offset-3">                       
                                 {{$commandes->links()}} 
                             </div>  
                          </div>
                      </section>                   
                  </div>
              </div>
              <!-- page end-->
          </section>
      </section>
  @endsection
