<div class="nav">
    <div class="container container_navbar">      
        <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

            <a class="navbar-brand" href="#">
          <img class="logo" src="img/gstock.jpg" alt="">
        </a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
        <ul class="nav navbar-nav">                       
          @if(Auth:: user())
           <li class="active"><a href="/home">Acceuil <span class="sr-only">(current)</span></a></li>
           <li> <a href="{{url('/clients/creerCommande')}}">Creer une commande</a> </li> 
           <li> <a href="{{url('/clients/listeCommande')}}"> ma commande</a> </li>          
           <li><a href="{{url('/factures/liste')}}">Mes Facture</a></li>
           <li><a href="{{url('/clients/historique')}}">Historique</a></li>
           @else
           <li class="active"><a href="/index">Acceuil <span class="sr-only">(current)</span></a></li>
          @endif
        </ul>
   
         
        <ul class="nav navbar-nav navbar-right">

            @guest
            <li><a href="{{ route('login') }}">Se Connecter</a></li> 
            <li> <a href="{{ route('register') }}">S'inscrire</a></li> 

               @else
               <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <ul class="dropdown-menu extended logout" role="menu">
                        <div class="log-arrow-up"></div>
                    <li class="eborder-top">
                        <a href="{{url('clients/profile')}}"><i class="icon_profile"></i> Mon Profile</a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            Se Deconnecter
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </li>
        @endguest
        </ul>
         
        </div>       
    </div>
</div>