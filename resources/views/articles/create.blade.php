@extends('layouts.appAdmin')

@section('content')

<section id="main-content">
   <section class="wrapper">         
     <div class="row">
        <!-- chart morris start -->
        <div class="col-md-11 col-md-offset-1">
            <section class="panel">
            
            <header class="panel-heading">
                <h2>Ajouter un Article</h2>
              </header>
            
            <div class="panel-body">
                <form   class="form-horizontal" action="{{url('/articles/store')}}" method="POST">

                 {{ csrf_field() }}
                 
                <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                     <label for="image"  class="col-md-2 control-label"> image de l'Article : </label>
                    <div class="col-md-6">
                      <input class="form-control" type="file" id="image" name="image">
                   </div>
                     @if ($errors->has('image'))
                        <span class="help-block">
                            <strong>{{ $errors->first('image') }}</strong>
                        </span>
                    @endif
                </div>


                 <div class="form-group{{ $errors->has('ncat') ? ' has-error' : '' }}">
                     <label for="ncat"  class="col-md-2 control-label"> Catégorie: </label>
                    <div class="col-md-6">
                     {!! Form::select('ncat', $categories ,null, ['class'=>'form-control', 'required'=>'required']) !!}
                   </div>
                     @if ($errors->has('ncat'))
                        <span class="help-block">
                            <strong>{{ $errors->first('ncat') }}</strong>
                        </span>
                    @endif
                </div>

                

                 <div class="form-group{{ $errors->has('fournisseur') ? ' has-error' : '' }}">
                     <label for="fournisseur"  class="col-md-2 control-label"> Fournisseur: </label>
                    <div class="col-md-6">
                     {!! Form::select('fournisseur', $fournisseurs ,null, ['class'=>'form-control', 'required'=>'required']) !!}
                   </div>
                     @if ($errors->has('fournisseur'))
                        <span class="help-block">
                            <strong>{{ $errors->first('fournisseur') }}</strong>
                        </span>
                    @endif
                </div>
                
                <div class="form-group{{ $errors->has('nomArt') ? ' has-error' : '' }}">
                     <label for="nomArt"  class="col-md-2 control-label"> Nom Article : </label>
                    <div class="col-md-6">
                      <input class="form-control" type="text" id="nomArt" name="nomArt" placeholder="Nom de L'article">
                   </div>
                     @if ($errors->has('nomArt'))
                        <span class="help-block">
                            <strong>{{ $errors->first('nomArt') }}</strong>
                        </span>
                    @endif
                </div>


                <div class="form-group{{ $errors->has('desc') ? ' has-error' : '' }}">
                     <label for="desc"  class="col-md-2 control-label"> Description : </label>
                    <div class="col-md-6">
                      <textarea name="desc" id="desc" cols="68" rows="5" placeholder="Description de l'article"></textarea>
                   </div>
                     @if ($errors->has('desc'))
                        <span class="help-block">
                            <strong>{{ $errors->first('desc') }}</strong>
                        </span>
                    @endif
                </div>

                
                <div class="form-group{{ $errors->has('prix') ? ' has-error' : '' }}">
                     <label for="prix"  class="col-md-2 control-label"> Prix Unitaire : </label>
                    <div class="col-md-6">
                       <input class="form-control" type="text" id="prix" name="prix" placeholder="Prix Unitaire">
                     </div>
                     @if ($errors->has('prix'))
                        <span class="help-block">
                            <strong>{{ $errors->first('prix') }}</strong>
                        </span>
                    @endif
                </div>

                
                <div class="form-group{{ $errors->has('qte') ? ' has-error' : '' }}">
                     <label for="qte"  class="col-md-2 control-label"> Quantite : </label>
                    <div class="col-md-6">
                      <input class="form-control" type="text" id="qte" name="qte" placeholder="Quantité">
                   </div>
                     @if ($errors->has('qte'))
                        <span class="help-block">
                            <strong>{{ $errors->first('qte') }}</strong>
                        </span>
                    @endif
                </div>

                
                <div class="form-group{{ $errors->has('qteM') ? ' has-error' : '' }}">
                     <label for="qteM"  class="col-md-2 control-label"> Quantite Minimum: : </label>
                    <div class="col-md-6">
                      <input class="form-control" type="text" id="qteM" name="qteM" placeholder="La quantité minimum">
                   </div>
                     @if ($errors->has('qteM'))
                        <span class="help-block">
                            <strong>{{ $errors->first('qteM') }}</strong>
                        </span>
                    @endif
                </div>

                

                 <div class="form-group{{ $errors->has('dateachat') ? ' has-error' : '' }}">
                     <label for="dateachat"  class="col-md-2 control-label"> Date D'achat: </label>
                    <div class="col-md-6">
                     <input class="form-control" type="date" id="dateachat" name="dateachat" placeholder="La quantité minimum">
                  </div>
                     @if ($errors->has('dateachat'))
                        <span class="help-block">
                            <strong>{{ $errors->first('dateachat') }}</strong>
                        </span>
                    @endif
                </div>



                  <div class="form-group">
                        <div class="col-md-8 col-md-offset-4">
                            <button type="submit" class="btn btn-success">
                                Ajouter
                            </button>

                           <a href="{{url('pageAdmin')}}">
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