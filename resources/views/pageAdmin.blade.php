@extends('layouts.appAdmin')
@section('content')
<section id="main-content">
   <section class="wrapper">         
     <div class="row">       
        <div  class="col-md-10 col-md-offset-1">
            <section class="panel">
                <header class="panel-heading">
                    <h3> Page D'Acceuil</Char>
                </header>
                 <div class="panel-body">
                     <div class="tab-pane" id="chartjs">
                                @if (session('status'))
                                    <div class="alert alert-success">
                                        {{ session('status') }}
                                    </div>
                                @endif

                            <div class="row">                 
                                <div class="col-lg-6 ">
                                    <section class="panel">
                                        <header class="panel-heading">
                                         Fournisseurs
                                        </header>
                                        <div style="padding:0px;" class="panel-body">
                                            <a href="{{url('fournisseurs/liste')}}"><img  class="img-responsive" style ="height:210px; width:457px ;" src="img/fournisseur.jpg" alt=""></a>
                                            <!--<canvas id="Admin" height="200" width="300"></canvas>-->
                                        </div>
                                    </section>
                                </div>                      
                            
                                <div class="col-lg-6">
                                    <section class="panel">
                                        <header class="panel-heading">
                                           Clients 
                                        </header>
                                        <div  style="padding:0px;"  class="panel-body">
                                            <a href="{{url('users/liste')}}"> <img style ="height:210px; width:427px ;" src="img/client.jpg" alt=""></a>
                                        </div>
                                    </section>
                                </div>
                            </div>


                              <div class="row">                 
                                <div class="col-lg-6 ">
                                    <section class="panel">
                                        <header class="panel-heading">
                                       Articles
                                        </header>
                                        <div style="padding:0px;" class="panel-body">
                                            <a href="{{url('articles/liste')}}"><img  class="img-responsive" style ="height:210px; width:457px ;" src="img/produits.jpg" alt=""></a>
                                            <!--<canvas id="Admin" height="200" width="300"></canvas>-->
                                        </div>
                                    </section>
                                </div>                      
                            
                                <div class="col-lg-6">
                                    <section class="panel">
                                        <header class="panel-heading">
                                            Statistique
                                        </header>
                                        <div  style="padding:0px;"  class="panel-body">
                                            <a href="{{url('articles/statistique')}}"> <img style ="height:210px; width:442px;" src="img/stat.jpg" alt=""></a>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>      
        </div>
    </section>
</section>
@endsection
    




























