@extends('layouts.appAdmin')
@section('content')

<section id="main-content">
   <section class="wrapper">         
     <div class="row">
        <!-- chart morris start -->
        <div class="col-md-11 col-md-offset-1">
            <section class="panel">
              <header class="panel-heading">
                 <h4>Liste des Utilisateurs</h4>
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
                                 <th><i class="icon_calendar"></i> Role</th>
                                 <th><i class="icon_mail_alt"></i> Email</th>
                                
                                 <th><i class="icon_cogs"></i> Action</th>
                              </tr>
                              @foreach($users as $user)
                              <tr>
                                 <td>{{$user->name}}</td>

                                 @if($user->admin==0)
                                   <td>Client</td>
                                 @else
                                   <td>Administrateur</td>
                                 @endif  
                                 <td>{{$user->email}}</td>
                           
                                <td>
                                  <div class="col-md-6 btn-group">

                                       <a class="btn btn-primary" href="{{url('/users/show',$user->id)}}"><i class="fa fa-bullseye" aria-hidden="true"></i></a>
                                      <a class="btn btn-success" href="{{url('/users/edit',$user->id)}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                      
                                       <form action="{{url('/users/delete', $user->id)}}" method="GET"  onsubmit = "return confirm('Êtes vous sûr?')">
                                                                    
                                             <input type="submit" class="btn btn-danger btn-block" value="Delete">
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