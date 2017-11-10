@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="row">
                <div style="text-align:center;" class="col-md-6 col-lg-10 col-md-offset-1">
                @if(session('info'))
                <div class="alert alert-success">
                    <h3>{{session('info')}}  </h3>                               
                </div> 
                @endif
            </div>
        </div>
        <div class="panel-body">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

             <div class="row">                 
                <section class="panel">
                <header class="panel-heading">
                    <h2>Liste des Articles  </h2>                         
                </header>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>image</th>
                            <th>Nom Article</th>
                            <th>Description </th>
                            <th>Stock</th>
                            <th>Quantite</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($articles as $article )
                        <tr>                            
                            <td><img style ="height:41px; width:41px ;"src="../img/{{$article->image}}" alt=""> </td>
                            <td>{{$article->nomArticle}}</td>                                  
                            <td>{{$article->descriptionArticle}}</td>

                            @if($article->quantite>0)
                            <td>Disponible</td>
                            @else
                            <td>Non Disponible</td>
                            @endif

                            <td> {{$article->quantite}}</td>     
                            <td>
                                <div class="btn-group">
                                    <a class="btn btn-primary" href="{{url('/clients/show', $article->articleId)}}">Visualiser</a>
                                    
                                </div>
                            </td>                         
                    
                    </tr>
                    @endforeach
                        </tbody>
                    </table>
                 <div class=" col-md-5 col-md-offset-5"> 
                   {{$articles->links()}}  
                   </div>
                  </div>
              </div>
                  
            </section>
          </div>            
      </div>         
    </div>
</div>
@endsection
