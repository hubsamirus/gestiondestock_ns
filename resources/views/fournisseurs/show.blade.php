@extends('layouts.appAdmin')
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
                     
                   <h3 style="text-align:center;" >Visualisation du Fournisseur "" <b>{{$fournisseurs->nomFournisseur}} </b>""</h3>
               
                 <hr>
             
                
                <div class="form-group">
                     <label class="col-md-2 control-label"> Nom : </label>
                     <div class="col-md-6">               
                        <p>{{$fournisseurs->nomFournisseur}}</p>
                    </div>                                         
                </div>

                <br><br>
                

                
                <div class="form-group">
                     <label for="qte"  class="col-md-2 control-label"> Raison social : </label>
                    <div class="col-md-6">
                      <p>{{$fournisseurs->raisonSocial}}</p>
                   </div>
               </div>
               <br>

               
                <div class="form-group">
                     <label  class="col-md-2 control-label"> Téléphone : </label>
                    <div class="col-md-6">
                      <p >{{$fournisseurs->telephone}}</p>
                   </div>
                </div>
                <br>
                
                <div class="form-group">
                     <label  class="col-md-2 control-label"> Adresse : </label>
                    <div class="col-md-6">
                      <p >{{$fournisseurs->adresse}}</p>
                   </div>
                </div>
                <br>
                
                <div class="form-group">
                     <label  class="col-md-2 control-label"> Email : </label>
                    <div class="col-md-6">
                      <p >{{$fournisseurs->email}}</p>
                   </div>
                </div>
                <br>

                  <div class="form-group">
                     <label  class="col-md-2 control-label"> Pays : </label>
                    <div class="col-md-6">
                      <p >{{$fournisseurs->pays}}</p>
                   </div>
                </div>
                <br>
                
              
                  <div class="form-group">
                        <div class="col-md-8 col-md-offset-4">
                        
                           <a href="{{url('fournisseurs/liste')}}">
                              <input type="button" value="Retour" class="btn btn-danger"> 
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
