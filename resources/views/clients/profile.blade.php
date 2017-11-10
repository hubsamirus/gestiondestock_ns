@extends('layouts.app')
@section('content')

  <section style="background:#eee;">
     <section class="wrapper">
		   <div class="row">
             <div class="col-md-8   col-md-offset-2">
                    <h5 style="padding:10px; font-size:17px;" class="col-md-4 col-md- pull-right"><i class="fa fa-calendar" aria-hidden="true"></i>
                          {{ $mytime->format('l jS \\of F Y ')}}            
                	</h5>  
					<h3 class=" col-md-5 "><i class="fa fa-user-md"></i> Profil</h3>	 
              </div>
			</div>
            <div class="row">
               <div class="col-md-8 col-md-offset-2">
                  <div class="profile-widget profile-widget-info">
                    <div class="panel-body">
                        <div class="col-lg-4 col-sm-4">
                            <h4>Bonjour: {{ Auth::user()->name }} </h4>               
                            <div class="follow-ava">
                                <img src="img/avatar-mini2.jpg" alt="">
                            </div>                           
                        </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- page start-->
              <div class="row">
                 <div class="col-md-8 col-md-offset-2">
                    <section class="panel">
                          <header class="panel-heading tab-bg-info">
                              <ul class="nav nav-tabs">                               
                                  <li class="active">
                                      <a data-toggle="tab" href="#profile">
                                          <i class="icon-user"></i>
                                          Profil
                                      </a>
                                  </li>
                                  <li class="">
                                      <a data-toggle="tab" href="#edit-profile">
                                          <i class="icon-envelope"></i>
                                         Modifier le Profil
                                      </a>
                                  </li>
                              </ul>
                          </header>
                          <div class="panel-body">
                              <div class="tab-content">
                                  <div id="profile" class="tab-pane active">
                                      <div class="profile-activity">                                          
                                   
                                    <div class="panel-body bio-graph-info">
                                          <h1>Biographie</h1>
                                          <div class="row">
                                              <div class="bio-row">
                                                  <p><span>Nom </span>: {{ $users->name }}  </p>
                                              </div>

                                              <div class="bio-row">
                                                  <p><span>Email </span>:{{ $users->email }} </p>
                                              </div>

                                              <div class="bio-row">  
                                                    @if(($users->admin)==0)                   
                                                      <p><span>Role</span>: Client </p>
                                                    @else
                                                      <p><span>Role</span>: Administrateur </p>
                                                    @endif
                                              </div>
                                             
                                              <div class="bio-row">
                                                  <p><span>Pays </span>: Canada</p>
                                              </div>
                                              <div class="bio-row">
                                                  <p><span>Occupation </span>: Analyste Programmeur</p>
                                              </div>
                                             
                                              <div class="bio-row">
                                                  <p><span>Mobile </span>: (+283) 456 7849</p>
                                              </div>                                             
                                          </div>
                                      </div>                              
                                   </div>
                                 </div>
                               
                                  <div id="edit-profile" class="tab-pane">
                                    <section class="panel">                                          
                                          <div class="panel-body bio-graph-info">
                                              <h1> Information sur le Profil </h1>
                                              <form class="form-horizontal" role="form">                                                  
                                                  <div class="form-group">
                                                      <label class="col-lg-2 control-label">Nom</label>
                                                      <div class="col-lg-6">
                                                          <input type="text" class="form-control" id="f-name" placeholder=" ">
                                                      </div>
                                                  </div>
                                                  <div class="form-group">
                                                      <label class="col-lg-2 control-label">Email</label>
                                                      <div class="col-lg-6">
                                                          <input type="email" class="form-control" id="l-name" placeholder=" ">
                                                      </div>
                                                  </div>
                                             
                                                  <div class="form-group">
                                                      <label class="col-lg-2 control-label">Pays</label>
                                                      <div class="col-lg-6">
                                                          <input type="text" class="form-control" id="c-name" placeholder=" ">
                                                      </div>
                                                  </div>
                                              
                                               
                                                  <div class="form-group">
                                                      <label class="col-lg-2 control-label">Email</label>
                                                      <div class="col-lg-6">
                                                          <input type="text" class="form-control" id="email" placeholder=" ">
                                                      </div>
                                                  </div>
                                                  <div class="form-group">
                                                      <label class="col-lg-2 control-label">Mobile</label>
                                                      <div class="col-lg-6">
                                                          <input type="text" class="form-control" id="mobile" placeholder=" ">
                                                      </div>
                                                  </div>
                                              

                                                  <div class="form-group">
                                                      <div class="col-lg-offset-2 col-lg-10">
                                                          <button type="submit" class="btn btn-primary">Enregistrer</button>
                                                          <button type="button" class="btn btn-danger">Annuler</button>
                                                      </div>
                                                  </div>
                                              </form>
                                          </div>
                                      </section>
                                  </div>
                              </div>
                          </div>
                      </section>
                 </div>
              </div>

              <!-- page end-->
          </section>
      </section>
      @endsection