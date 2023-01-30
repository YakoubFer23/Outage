<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
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
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout</a></li>
                    </ul>
                </li>
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
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Outages
                            </a>
                            @if (Auth::user()->role_as == 1)
                                
                           
                            <div class="sb-sidenav-menu-heading">Section Sup</div>
                            <a class="nav-link" href="{{route('add')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Ajouter un Outage
                            </a>
                             @endif
                            
                            
                            
                    </div>
                    
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Outages</h1>
                        <table class="table table-hover">
                    <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nom</th>
      <th scope="col">Wilaya</th>
    </tr>
  </thead>
  <tbody>
  @foreach ( $outages as $outage )
    <tr>
      <th scope="row">{{$outage->id}}</th>
      <td>{{$outage->name}}</td>
      <td>{{$outage->wilaya}}</td>
      <td><button type="button" class="btn btn-primary" onclick='showPopUp({{$outage->id}},{{$outage->id}})'>Afficher</button></td>
      @if (Auth::user()->role_as == 1)
      <td><button type="button" class="btn btn-danger">Supprimer</button></td>
          
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
                            <div class="text-muted">Copyright &copy; Your Website 2022</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('js/scripts.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        
    </body>
</html>

<script>
    function showPopUp(modalId,capName){
        // Get the modal
        var modal = document.getElementById(modalId);
    
        // Get the image and insert it inside the modal - use its "alt" text as a caption
    //var img = document.getElementById(imageTag);
    //var modalImg = document.getElementById("img01");
    var captionText = document.getElementById("caption"+capName);
    
        modal.style.display = "block";
        
        captionText.innerHTML = modal.getElementsByTagName('img')[0].alt;
    
    
    // Get the <span> element that closes the modal
    //var span = document.getElementsByClassName("close")[0];
    
    // When the user clicks on <span> (x), close the modal
    modal.onclick = function () {
        modal.style.display = "none";
    }

    }

    
</script>
