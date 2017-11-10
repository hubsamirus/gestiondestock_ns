@extends('layouts.appAdmin')

@section('content')

<section id="main-content">
   <section class="wrapper">         
     <div class="row">
        <!-- chart morris start -->
        <div class="col-md-11 col-md-offset-1">
            <section class="panel">
              <header class="panel-heading">
                <h4>Liste des fournisseurs</h4>
              </header>
              <div class="panel-body">
                 <div class="row">
                  <div class="col-lg-12">
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
                          <table class="table table-striped table-advance table-hover">
                           <tbody>
                              <tr>
                                 <th><i class="icon_profile"></i> Nom</th>
                                 <th><i class="icon_calendar"></i> Raison Social</th>                               
                                 <th><i class="icon_mobile"></i> Mobile</th>
                                 <th><i class="icon_pin_alt"></i> Adresse</th>
                                 <th><i class="icon_mail_alt"></i> Email</th>
                                 <th><i class="fa fa-flag" aria-hidden="true"></i> Pays</th>                               
                                 <th><i class="icon_cogs"></i> Action</th>
                              </tr>
                             @foreach($fournisseurs as $fournisseur)
                              <tr>
                                <td>{{$fournisseur->nomFournisseur}}</td>
                                 <td>{{$fournisseur->raisonSocial}}</td>
                                 <td>{{$fournisseur->telephone}}</td>
                                 <td>{{$fournisseur->adresse}}</td>
                                 <td>{{$fournisseur->email}}</td>
                                 <td>{{$fournisseur->pays}}</td>
                                 <td>
                                  <div class="btn-group">
                                     <a class="btn btn-primary" href="{{url('/fournisseurs/show',$fournisseur->fournisseurId)}}"><i class="fa fa-bullseye" aria-hidden="true"></i></i></a>
                                      <a class="btn btn-success" href="{{url('/fournisseurs/edit',$fournisseur->fournisseurId)}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                     
                                     <form class="inline" action="{{url('/fournisseurs/delete',$fournisseur->fournisseurId)}}" method="GET"  onsubmit = "return confirm('Êtes vous sûr?')">
                                         <input type="submit" class="btn btn-danger btn-block" value="Delete  ">
                                        
                                      </form> 
                                
                                      </div>
                                  </td>
                              </tr> 
                              @endforeach                             
                           </tbody>
                        </table>
                      </section>
                  </div>
              </div>
              </div>
            </section>
          </div>
        </div>
   </section> 
</section>                  


@endsection