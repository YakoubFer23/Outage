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
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Outages
                            </a>
                            @if (Auth::user()->role_as == 1)
                                
                           
                            <div class="sb-sidenav-menu-heading">Section Sup</div>
                            <a class="nav-link" href="{{route('add')}}" >
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-plus"></i></div>
                                Ajouter un Outage
                            </a>
                            <a class="nav-link" href="{{route('trash')}}">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-trash"></i></div>
                                Corbeille
                            </a>
                             @endif
                            
                            
                            
                    </div>
                    
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <div class="card mt-4">
                            <div class="card-header">
                                <h4>Ajouter un Outage</h4>
                            </div>
                            <div class="card-body">

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    @foreach ($errors->all() as $error )
                                        <div>{{$error}}</div>
                                    @endforeach

                                </div>
                            @endif



                            <form action="{{route('store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                        <div class="mb-3">
                            <label for="">Nom</label>
                            <input type="text" name="name" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="">Wilaya</label>
                            <input type="text" name="wilaya" class="form-control">
                           <!-- <select name="wilaya" class="form-control">
                                <option selected disabled>Sélectionner la Wilaya </option>
                                <option value="Adrar">01 - Adrar</option>
                                <option value="Chlef">02 - Chlef</option>
                                <option value="Laghouat">03 - Laghouat</option>
                                <option value="Oum El Bouaki">04 - Oum El Bouaki</option>
                                <option value="Batna">05 - Batna</option>
                                <option value="Bejaia">06 - Bejaia</option>
                                <option value="Biskra">07 - Biskra</option>
                                <option value="Bechar">08 - Bechar</option>
                                <option value="Blida">09 - Blida</option>
                                <option value="Bouira">10 - Bouira</option>
                                <option value="Tamenrasset">11 - Tamenrasset</option>
                                <option value="Tebessa">12 - Tebessa</option>
                                <option value="Tlemcen">13 - Tlemcen</option>
                                <option value="Tiaret">14 - Tiaret</option>
                                <option value="Tizi Ouzou">15 - Tizi Ouzou</option>
                                <option value="Alger">16 - Alger</option>
                                <option value="Djelfa">17 - Djelfa</option>
                                <option value="Jijel">18 - Jijel</option>
                                <option value="Setif">19 - Setif</option>
                                <option value="Saida">20 - Saida</option>
                                <option value="Skikda">21 - Skikda</option>
                                <option value="Sidi Bel Abbas">22 - Sidi Bel Abbas</option>
                                <option value="Annaba">23 - Annaba</option>
                                <option value="Guelma">24 - Guelma</option>
                                <option value="Constantine">25 - Constantine</option>
                                <option value="Medea">26 - Medea</option>
                                <option value="Mostaganem">27 - Mostaganem</option>
                                <option value="Msila">28 - Msila</option>
                                <option value="Mascara">29 - Mascara</option>
                                <option value="Ouargla">30 - Ouargla</option>
                                <option value="Oran">31 - Oran</option>
                                <option value="El Bayadh">32 - El Bayadh</option>
                                <option value="Illizi">33 - Illizi</option>
                                <option value="Bordj Bou Arreridj">34 - Bordj Bou Arreridj</option>
                                <option value="Boumerdas">35 - Boumerdas</option>
                                <option value="ElTaref">36 - ElTaref</option>
                                <option value="Tindouf">37 - Tindouf</option>
                                <option value="Tissemsilt">38 - Tissemsilt</option>
                                <option value="El Oued">39 - El Oued</option>
                                <option value="Khenchla">40 - Khenchla</option>
                                <option value="Souk Ahras">41 - Souk Ahras</option>
                                <option value="Tipaza">42 - Tipaza</option>
                                <option value="Mila">43 - Mila</option>
                                <option value="AinDefla">44 - AinDefla</option>
                                <option value="Naama">45 - Naama</option>
                                <option value="Ain Témouchent">46 - Ain Témouchent</option>
                                <option value="Gherdaia">47 - Gherdaia</option>
                                <option value="Relizane">48 - Relizane</option>
                                <option value="Timimoun">49 - Timimoun</option>
                                <option value="Bordj Badji Mokhtar">50 - Bordj Badji Mokhtar</option>
                                <option value="Ouled Djellal">51 - Ouled Djellal</option>
                                <option value="Beni Abbas">52 - Beni Abbas</option>
                                <option value="Ain Salah">53 - Ain Salah</option>
                                <option value="Ain Guezzam">54 - Ain Guezzam</option>
                                <option value="Touggourt">55 - Touggourt</option>
                                <option value="Djanet">56 - Djanet</option>
                                <option value="El M'ghair">57 - El M'ghair</option>
                                <option value="El Meniaa">58 - El Meniaa</option>
                                </select>
-->                        </div>

                        <div class="mb-3">
                            <label for="">Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Ajouter</button>

                        </div>
                            </form>




                    </div>
                        </div>
                    </div>
                    





                </main>
           
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Herbaia 2023</div>
                            
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
