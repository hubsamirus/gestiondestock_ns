@extends('layouts.appAdmin')
@section('content')
  <!--main content start-->
      <section id="main-content">
          <section class="wrapper">		
              <div class="row">
                  <div class="col-md-8 col-md-offset-2">
                      <section class="panel">
                          <header class="panel-heading">
                           Modifier un Fournisseur
                          </header>
                          <div class="panel-body">
                                      
                        <form class="form-horizontal" role="form" method="POST" action="{{url('fournisseurs/update', $fournisseurs->fournisseurId)}}">
                            {{ csrf_field() }}

                             <input type="hidden" name="_method" value="PUT">

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Nom</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{$fournisseurs->nomFournisseur}}" autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                             <div class="form-group{{ $errors->has('raison') ? ' has-error' : '' }}">
                                <label for="raison" class="col-md-4 control-label">Raison Social</label>

                                <div class="col-md-6">
                                    <input id="raison" type="text" class="form-control" name="raison" value="{{$fournisseurs->raisonSocial}}" autofocus>

                                    @if ($errors->has('raison'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('raison') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>



                            <div class="form-group{{ $errors->has('telephone') ? ' has-error' : '' }}">
                                <label for="telephone" class="col-md-4 control-label">Téléphone </label>

                                <div class="col-md-6">
                                    <input id="telephone" type="text" class="form-control" name="telephone" value="{{$fournisseurs->telephone}}">

                                    @if ($errors->has('telephone'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('telephone') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('adresse') ? ' has-error' : '' }}">
                                <label for="adresse" class="col-md-4 control-label">Adresse </label>

                                <div class="col-md-6">
                                    <input id="adresse" type="text" class="form-control" name="adresse" value="{{$fournisseurs->adresse}}">

                                    @if ($errors->has('adresse'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('adresse') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="codeP" class="col-md-4 control-label">Adresse E-mail </label>

                                <div class="col-md-6">
                                    <input id="email" type="text" class="form-control" name="email" value="{{$fournisseurs->email}}">

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group{{ $errors->has('pays') ? ' has-error' : '' }}">
                                <label for="pays" class="col-md-4 control-label">Pays</label>

                                <div class="col-md-6">
                                    <input id="pays" type="text" class="form-control" name="pays" value="{{$fournisseurs->pays}}" autofocus>

                                    @if ($errors->has('pays'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('pays') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                        
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                       Modifier
                                    </button>

                                <a href="{{url('fournisseurs/liste')}}">
                                   <input type="button" value="Annuler" class="btn btn-danger"> 
                                </a> 
                                </div>
                            </div>
                        </form>         

                          </div>
                      </section>                   
                  </div>
              </div>
              <!-- page end-->
          </section>
      </section>
  @endsection
