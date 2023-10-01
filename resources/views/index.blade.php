<?php $etat = array("0"=>"Résolu", "1"=>"Actif");?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Waves Outages</title>
        <link href="assets/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="assets/dist/all.js"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="#">Bonjour: {{ Auth::user()->name }}</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <button class="btn btn-success" id="logout" onclick="event.preventDefault();
                                                      document.getElementById('logout-form').submit();">Se d&#233connecter</button>                </li>
            </ul>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            
                            <a class="nav-link" href="{{route('index')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Outages
                            </a>
                            @if (Auth::user()->role_as >= 1)
                            
                                
                           
                            <div class="sb-sidenav-menu-heading">Section Sup</div>
                            <a class="nav-link" href="{{route('add')}}">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-plus"></i></div>
                                Ajouter un Outage
                            </a>
                            <a class="nav-link" href="{{url('change')}}" >
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-key"></i></i></div>
                                Changer le Mot de Passe
                            </a>
                                @if (Auth::user()->role_as == 2)
                            <a class="nav-link" href="{{route('log')}}">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-book"></i></div>
                                Logs
                            </a>
                                @endif
                             @endif                            
                            
                            
                    </div>
                    
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <div style="display: flex; align-items: center;">
                            <h1 class="mt-4" style="flex: 3;">Outages</h1>
                            

                        </div>
                        <table class="table table-hover">
                    <thead>
    <tr>
      
      <th scope="col">Nom</th>
      <th scope="col">Wilaya</th>
      <th scope="col">Status</th>
      <th scope="col">Date Création</th>
    </tr>
  </thead>
  <tbody>
      
  @foreach ( $outages as $outage )
    <tr class="{{$etat[$outage->status]}} entry">
      
      <td>{{$outage->name}}</td>
      <td>{{$outage->wilaya}}</td>
      <td>{{ $etat[$outage->status] }}</td>
      <td>{{ $outage->created_at }}</td>
      <td><button type="button" class="btn btn-primary" onclick='showPopUp({{$outage->id}})'>Afficher</button></td>
      @if (Auth::user()->role_as >= 1)
            <td>
      <form action="{{route('delete')}}" method="post">
          @csrf
          <input type="hidden" name="deleteId" value="{{$outage->id}}" >
          <button type="submit" class="btn btn-danger">Supprimer</button>
      </form>  

      </td>
          
      @endif
            <!-- Trigger the Modal -->
    <!--<img id="myImg" src="" alt="Snow" style="width:100%;max-width:300px"> -->
    
    <!-- The Modal -->
    <div id="{{$outage->id}}" class="modal">
        
        
    
        <!-- Modal Content (The Image) -->
        <img class="modal-content" src="{{$outage->image}}" alt="{{$outage->name}}">
    
        <!-- Modal Caption (Image Text) -->
        <div id="caption{{$outage->id}}" class="caption"></div>
    </div>             
    </tr>
      
  @endforeach


  </tbody>
</table>
                        
                        
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; FY 2023</div>
                            
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="assets/dist/bootstrap.bundle.min.js"></script>
        <script src="js/scripts.js"></script>
        <script src="assets/dist/Chart.js"></script>
        
        <script src="assets/dist/simple-datatables.js"></script>
        
    </body>
</html>
@if (Auth::user()->role_as == '0')
    <script>
        var rows = document.getElementsByClassName('Résolu');

    Array.from(rows).forEach(element => element.style.display = "none");
    </script>
@endif

<script>
    function showPopUp(modalId){
        // Get the modal
        var modal = document.getElementById(modalId);
    
        // Get the image and insert it inside the modal - use its "alt" text as a caption
    //var img = document.getElementById(imageTag);
    //var modalImg = document.getElementById("img01");
    var captionText = document.getElementById("caption"+modalId);
    
        modal.style.display = "block";
        
        captionText.innerHTML = modal.getElementsByTagName('img')[0].alt;
    
    
    // Get the <span> element that closes the modal
    //var span = document.getElementsByClassName("close")[0];
    
    // When the user clicks on <span> (x), close the modal
    modal.onclick = function () {
        modal.style.display = "none";
    }

    }

    function showActif(){
        var buttonActif = document.getElementById('actifButton');
        var résolu = document.getElementsByClassName('Résolu');
        var actif = document.getElementsByClassName('Actif');
        if (buttonActif.classList.contains('actif')){

        Array.from(résolu).forEach(element => element.style.display = "none");
        Array.from(actif).forEach(element => element.style.display = "table-row");
        buttonActif.innerText = "Afficher Résolu";
        buttonActif.className = "btn btn-success";
        buttonActif.classList.remove('actif');
        buttonActif.classList.add('rés');
        }else{

        
        Array.from(résolu).forEach(element => element.style.display = "table-row");
        buttonActif.innerText = "Masquer Résolu";
        buttonActif.className = "btn btn-secondary";
        buttonActif.classList.remove('rés');
        buttonActif.classList.add('actif');
        }
        
        

    }

    
</script>
