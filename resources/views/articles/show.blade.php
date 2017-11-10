@extends('..\layouts.appAdmin')
@section('content')

<section id="main-content">
   <section class="wrapper">         
     <div class="row">
        <!-- chart morris start -->
        <div class="col-md-11 col-md-offset-1">
             <section class="panel">            
                  <header class="panel-heading">
                    <h2>Visualiser</h2>
                  </header>
            
                 <div class="panel-body">                       
                      <h3 style="text-align:center;" >Visualisation de l'Article "" <b>{{$articles->nomArticle}} </b>""</h3>
               
                      <hr>
                      <div class="form-group">
                          <img style ="height:41px; width:41px ;"src="/img/{{ $articles->image }}" alt=""> </td>              
                      </div>
                
                      <div class="form-group">
                          <label class="col-md-2 control-label"> Nom Article : </label>
                          <div class="col-md-6">               
                              <p>{{$articles->nomArticle}}</p>
                          </div>                                         
                      </div>
                      <br><br>  
                      <div class="form-group">
                          <label  class="col-md-2 control-label"> Description : </label>
                          <div class="col-md-6">
                            <p >{{$articles->descriptionArticle}}</p>
                        </div>
                      </div>
                      <br>                
                      <div class="form-group">
                          <label for="qte"  class="col-md-2 control-label"> Quantite : </label>
                          <div class="col-md-6">
                            <p>{{$articles->quantite}}</p>
                        </div>
                    </div>
                    <br>                
                    <div class="form-group">
                        <label for="qteM"  class="col-md-2 control-label"> Quantite Minimum: : </label>
                        <div class="col-md-6">
                          <p>{{$articles->quantiteMin}}</p>
                      </div>
                    </div>
                    <div class="form-group">
                          <div class="col-md-8 col-md-offset-4">                          
                            <a href="{{url('articles/liste')}}">
                                <input type="button" value="Retour" class="btn btn-danger"> 
                              </a>                              
                          </div>
                      </div>                
                </div>
            </section>
          </div>
        </div>
   </section> 
</section>                  


@endsection