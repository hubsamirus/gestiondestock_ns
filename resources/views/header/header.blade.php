<nav class="header dark-bg">
    <div class="toggle-nav">
        <div class="icon-reorder tooltips" data-original-title="La Navigation Bascule" data-placement="bottom"><i class="icon_menu"></i></div>
    </div>

    <!--logo start-->
    <a href="{{ url('/pageAdmin') }}" class="logo"><span  class="lite">Acceuil</span></a>
    <!--logo end-->

    <div class="nav search-row" id="top_menu">
        <!--  search form start 
                          
            <li>
                <form class="navbar-form">
                    <input class="form-control" placeholder="Recherche..." type="text">
                </form>
            </li>  -->
        <ul class="nav top-menu"> 
              @if(Auth::user())
                <li> <a href="{{url('/users/liste')}}">Liste des Utilisateurs</a> </li>
                <li> <a href="{{url('/fournisseurs/liste')}}">Liste des Fournisseurs</a> </li>
                <li> <a href="{{url('/commandes/list')}}">Gestion de Commandes</a> </li>
                <li> <a href="{{url('/articles/stock')}}"> Articles/Stocks Bas</a> </li>
               @endif 

        </ul>
        <!--  search form end -->                
    </div>
  

    <div class="top-nav notification-row">              
        <ul class="nav pull-right top-menu">
                <!-- Authentication Links -->
            @if (Auth::guest())
                <li><a href="{{ url('/admin/login') }}">Se Connecter</a></li>
                <li><a href="{{ url('/admin/register') }}">S'enregistrer</a></li>
            @else

            <!-- user login dropdown start-->
            <li class="dropdown">                       

                <a data-toggle="dropdown" class="dropdown-toggle" href="#"  role="button" aria-expanded="false">
                    
                    <span  class="username">{{ Auth::user()->name }} </span>
                    <b class="caret"></b>
                </a>

                <ul class="dropdown-menu extended logout">
                    <div class="log-arrow-up"></div>
                  
                
                    <li>
                        <a href="{{ url('/admin/logout') }}"
                            onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            Se Deconnecter
                        </a>

                        <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                    
                </ul>
            </li>
                @endif
            <!-- user login dropdown end -->
        </ul>
        <!-- notificatoin dropdown end-->
    </div>
</nav>      
