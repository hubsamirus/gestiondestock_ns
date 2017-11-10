@extends('layouts.appAdmin')

@section('content')
  <!--main content start-->
      <section id="main-content">
          <section class="wrapper">		
              <div class="row">
                  <div class="col-md-11 col-md-offset-1">
                      <section class="panel">
                          <header class="panel-heading">
                            Le bas stock                          
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
                                  <th>image</th>
                                  <th>Nom Article</th>
                                  <th>Catégorie</th>
                                  <th>Description </th>
                                  <th>Prix Unitaire </th>
                                  <th>Quantite</th>
                                  <th>Quantite Minimun</th>
                                  <th><i class="icon_cogs"></i> Action</th>
                              </tr>
                              </thead>
                              <tbody>
                                 @foreach($stocksbas as $stockbas )
                              <tr>                            
                                  <td><img style ="height:41px; width:41px ;"src="../img/{{ $stockbas->image }}" alt=""> </td>
                                  <td>{{ $stockbas->nomArticle }}</td>    
                                  <td>{{ $stockbas->nomCategorie }}</td>                                 
                                  <td>{{ $stockbas->descriptionArticle }}</td>
                                  <td>{{ $stockbas->prixUnitaire }} $</td>
                                  <td>{{ $stockbas->quantite }}</td>
                                  <td> {{ $stockbas->quantiteMin }}</td>
                                       <td>
                                  <div class="btn-group">
                                      <a class="btn btn-primary" href="{{url('/stockbass/show',$stockbas->stockbasId)}}"><i class="fa fa-bullseye" aria-hidden="true"></i></a>
                                      <a class="btn btn-success" href="{{url('/stockbass/edit',$stockbas->stockbasId)}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                </div>
                                  </td>  
                           </tr>
                           
                            @endforeach
                              </tbody>
                          </table>
                          </div>
                            <div class=" col-md-6 col-md-offset-3">  
                                          
                              </div>
                          </div>
                      </section>                   
                  </div>
              </div>
              <!-- page end-->
          </section>
      </section>
  @endsection