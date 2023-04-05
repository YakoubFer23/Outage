<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Ajouter un Outage</title>
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
                                                      document.getElementById('logout-form').submit();">Se d&#233connecter</button>                 </li>
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
                            <a class="nav-link" href="{{route('add')}}" >
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
            
                     

                <div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">

                @if (session('message'))
                    <h5 class="alert alert-success mb-2">{{ session('message') }}</h5>
                @endif

                @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                    <li class="text-danger">{{ $error }}</li>
                    @endforeach
                </ul>
                @endif

                <div class="card shadow">
                    <div class="card-header bg-dark">
                        <h4 class="mb-0 text-white">Modifier votre mot de passe</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('change') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label>Ancien mot de passe</label>
                                <input type="password" name="current_password" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label>Nouveau mot de passe</label>
                                <input type="password" name="password" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label>Confirmer le nouveau mot de passe</label>
                                <input type="password" name="password_confirmation" class="form-control" />
                            </div>
                            <div class="mb-3 text-end">
                                <hr>
                                <button type="submit" class="btn btn-primary">Modifier le mot de passe</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
