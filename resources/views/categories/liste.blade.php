@extends('layouts.appAdmin')
@section('content')
<section id="main-content">
   <section class="wrapper">         
     <div class="row">
        <!-- chart morris start -->
        <div class="col-md-11 col-md-offset-1">
            <section class="panel">
              <header class="panel-heading">
                 <h4>Liste des Categories</h4>
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
                                 <th><i class="icon_profile"></i> Catégorie ID</th>
                                 <th><i class="icon_calendar"></i> Nom Catégorie</th>
                                
                                 <th><i class="icon_cogs"></i> Action</th>
                              </tr>
                              @foreach($categories as $category)
                              <tr>
                                 <td>{{$category->categorieId}}</td>
                                 <td>{{$category->nomCategorie}}</td>
                                
                                <td>
                                  <div class=" col-md-6 btn-group">                                     
                                      <a class="btn btn-success" href="{{url('/categories/edit', $category->categorieId)}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                     
                                      <form class="inline" action="{{url('/categories/delete', $category->categorieId)}}" method="GET"  onsubmit = "return confirm('Êtes vous sûr?')">
                                         <input type="submit" class="btn btn-danger" value="Del  ">
                                        
                                      </form> 
                                  </div>
                                  </td>
                              </tr>
                               @endforeach                 
                           </tbody>    
                  </table>

                       <form class="form-horizontal" role="form" method="POST" action="{{ url('categories/store') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('cat') ? ' has-error' : '' }}">
                                <label for="cat" class="col-md-4 control-label">Nouvelle Catégorie >>></label>

                                <div class="form-group col-md-4">
                                    <input id="cat" type="text" class="form-control" name="cat" value="{{ old('cat') }}" autofocus>

                                    @if ($errors->has('cat'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('cat') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                                 
                            <div class="form-group col-md-4">
                               
                                    <button type="submit" class="btn btn-primary">
                                        Enregistrer
                                    </button>
                             
                            </div> 
                        </div> 
                        </form>  
                            <div class=" col-md-5 col-md-offset-5">  
                                   {{$categories->links()}}   
                            </div>
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