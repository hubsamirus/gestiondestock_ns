 @extends('acceuil')
 @section('container') 
            <div class="container">
               <div class="row">
                 <div  class="col-md-12"> 
                    <!--la liste des Articles-->  
                     <div class="panel-body">
                            <div class="row">                 
                                <section class="panel">
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
                                                <td>
                                                    <div class="btn-group">
                                                        <a type="button"  id="vislualiser" class="btn btn-primary">Visualiser</a>
                                                        
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
                               </div>
                           </section>
                        </div>            
                    </div>
                 </div>
             </div>               
         </div> 
           @yield('container') 

        
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">Visualiser</h4>
                </div>
                <div class="modal-body">
                                           
  
                </div>
            </div>
        </div>
    </div>
 
    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    
    <script>  
        $(function(){  
            $('#vislualiser').click(function() {
                $('#myModal').modal();
            });  
        })
    </script>
@endsection
