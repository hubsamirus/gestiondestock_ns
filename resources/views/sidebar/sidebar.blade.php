  <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu">                
                  <li class="active">
                      <a class="" href="{{url('pageAdmin')}}">
                          <i class="icon_house_alt"></i>
                          <span>Tableau de bord</span>
                      </a>
                  </li>
				  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="fa fa-users" aria-hidden="true"></i>
                          <span>Gestion des Utilisateurs</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="{{url('users/create')}}">Ajouter un utilisateur.</a></li>                          
                         
                      </ul>
                  </li>       
      
             	  <li class="sub-menu">
                      <a href="javascript:;" class="">
                        <img src="/img/fourni.jpg" style="width:25px; height:25px;"alt="">
                          <span>Gestion des  Fournisseurs</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="{{url('fournisseurs/create')}}">Ajouter un Fournisseur</a></li>                          
                      </ul>
                  </li> 
                 <li class="sub-menu">                     
                      <a class="" href="javascript:;">
                          <img src="/img/categorie.ico" style="width:20px; height:20px;"alt="">
                          <span>Catégories</span>
                           <span class="menu-arrow arrow_carrot-right"></span>                          
                      </a>
                            
                          <ul class="sub">
                           <li><a class="" href="{{url('categories/liste')}}">Liste des Catégories</a></li>  
                           </ul>
                  </li>
                         
              
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                        <i class="fa fa-refresh" aria-hidden="true"></i>
                          <span>Mouvement de Stock</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="{{url('articles/entrer')}}">Articles Entrés</a></li>
                     
                          <li><a class="" href="{{url('articles/sortie')}}">Articles Sortie</a></li>
                      </ul>
                  </li>
                  
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <img src="/img/produit.jpg" style="width:20px; height:20px;"alt="">
                          <span>Articles</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">                          
                          <li><a class="" href="{{url('articles/liste')}}">Liste des Articles</a></li>
                          <li><a class="" href="{{url('articles/create')}}"><span>Ajouter un Article</span></a></li>
                          </ul>
                  </li>

                  <li>                     
                      <a class="" href="{{ url('articles/statistique') }}">
                          <i class="icon_piechart"></i>
                          <span>Statistiques</span>
                          
                      </a>
                                         
                  </li>
                         
                  
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->