@extends('layouts.appAdmin')
@section('content')

<section id="main-content">
   <section class="wrapper">         
     <div class="row">
        <!-- chart morris start -->
        <div class="col-md-11 col-md-offset-1">
            <section class="panel">
            
            <header class="panel-heading">
                <h2>Modifier </h2>
              </header>            
               <div class="panel-body">          
              
                <form   class="form-horizontal" action="{{url('categories/update', $categories->categorieId)}}" method="POST">

                 {{ csrf_field() }}
                 <input type="hidden" name="_method" value="PUT">
                                 
                <div class="form-group{{ $errors->has('cat') ? ' has-error' : '' }}">
                     <label for="cat"  class="col-md-2 control-label"> Nom Categorie : </label>
                    <div class="col-md-6">
                      <input class="form-control" type="text" id="cat" name="cat" value="{{$categories->nomCategorie}}">
                   </div>
                     @if ($errors->has('cat'))
                        <span class="help-block">
                            <strong>{{ $errors->first('cat') }}</strong>
                        </span>
                    @endif
                </div>




                  <div class="form-group">
                        <div class="col-md-8 col-md-offset-4">
                            <button type="submit" class="btn btn-success">
                               Modifier
                            </button>
                           <a href="{{url('categories/liste')}}">
                              <input type="button" value="Annuler" class="btn btn-danger"> 
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