@extends('layouts.appAdmin')
@section('content')
  <!--main content start-->
      <section id="main-content">
          <section class="wrapper">		
              <div class="row">
                  <div class="col-md-11 col-md-offset-1">
                      <section class="panel">
                          <header class="panel-heading">
                            Liste des Achats                            
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
                             <div class="form-group">
                                   <input type="text" class="form-control" id="search" name="search" placeholder="Entrer le nom de l'article"/>
                             </div>  
                            <div class="col-md-12">
                            <table class="table">
                              <thead>
                              <tr>                                 
                                  <th>Image</th>
                                  <th>Nom Article</th>
                                   <th>Catégorie</th> 
                                   <th>Fournisseur </th> 
                                    <th>Quantite</td>
                                   <th>Date D'achat</th>                   
                                                               
                                  <th><i class="icon_cogs"></i> Action</th>
                              </tr>
                              </thead>
                              <tbody>
                           
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
      <script type="text/javascript">
         $('#search').on('keyup', function() {
             $value= $(this).val();
             $.ajax({
                 type: 'GET',
                 url:'{{url('/articles/search')}}',
                 data:{'search':$value},
                 success:function (data) {
                    $('tbody').html(data);
                   //alert(data);
                 }

             });
         });
      </script>
  @endsection