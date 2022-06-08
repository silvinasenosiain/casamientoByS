<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Policonsultorio SUIZA</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" type="text/css" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <script type="text/javascript" src="https://maps.google.com/maps/api/js?key=API-KEY"></script> 

    </head>
    <body>
        <!-- Navigation-->
        <div id="app">
        <nav class="navbar-expand-md navbar-light section-rosado fixed-top">
            <div class="container">
                
                <div class="" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto menunav">
                        
                        <li class="nav-item dropdown" style = "margin-top:3px;margin-left:10px;">
                            <a class="nav-link" href="#Inicio" >Inicio</a>                           
                        </li>
                        <li class="nav-item dropdown" style = "margin-top:3px;margin-left:10px;">
                            <a class="nav-link" href="#Historia">Nuestra Historia</a>                           
                        </li>
                        <li class="nav-item dropdown" style = "margin-top:3px;margin-left:10px;">
                            <a class="nav-link" href="#LaFiesta">La Fiesta</a>                           
                        </li>
                        <li class="nav-item dropdown" style = "margin-top:3px;margin-left:10px;">
                            <a class="nav-link" href="#Lugar">Ubicación</a>                           
                        </li>
                        <li class="nav-item dropdown" style = "margin-top:3px;margin-left:10px;">
                            <a class="nav-link" href="#Regalos">Regalos</a>                           
                        </li>
                    </ul>

                </div>
            </div>
        </nav>
    </div>

    <section class="features-icons bg-light text-center section-rosado" id="Incio">
            <div class="container">
                <br><div class="row">
                        <h1>¡¡NOS CASAMOS!!</h1>                        
                </div>
            </div>
        </section>
        <section class="showcase section-rosado">
            <div class="container-fluid p-0">
                <img src="assets/img/fecha.png">
            <div class="col-lg-4">
                <div class="features-icons-item">
                    <br>
                    <h3>18:00hs - LaLola Multiespacio</h3>
                    <br>
                    <h2>SILVI & BELÉN</h2>
                </div>
            </div>
            <br>

        </section>
        
        <!-- Icons Grid-->
        <section class="features-icons text-center section-blanco" id="Historia">
            <div class="container">
                <div class="container-fluid p-0">
                    <img src="assets/img/flor1.png">
                </div>
                <br><br>
                <h1>NUESTRA HISTORIA</h1>
                    <div class="order-lg-1 my-auto showcase-text">
                        <p class="lead mb-0" style="font-size:1.7rem ">Nos conocemos hace mucho tiempo, pero desde el 1° de julio de 2018 nos miramos y decidimos emprender un viaje juntas que nos trajo a este lugar. Hoy queremos hacerlos partícipes de este momento que será único e inolvidable en nuestras vidas.</p>
                    </div>
            </div>
        </section>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container position-relative">
                <div class="row justify-content-center">
                    <div class="col-xl-6">
                        <div class="text-center text-white">
                            <!-- Page heading-->
                            <h1 class="mb-5"></h1>
                            <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </header><!-- Image Showcases-->
        <section class="features-icons text-center section-blanco" id="LaFiesta">
            <div class="container">
                <div class="container-fluid p-0">
                    <img src="assets/img/flor2.png">
                </div>
                <br><br>
                <h1>LA FIESTA</h1><br><br>
                    <div class="order-lg-2 my-auto showcase-text row">
                        <div class="col-sm-6 ">
                            <h2 >¿Cuándo?</h2><br><p>24-sept 18:00hs</p>
                        </div>
                        <div class="col-sm-6 " style="border-left: 1px solid;">
                            <h2>¿Dónde?</h2><br><p>LaLola Multiespacio</p><p>Acceso Perichón - km 1,5</p><p>Corrientes Capital</p></div>
                    </div>
                    <div class="order-lg-2 my-auto showcase-text"><br>
                        <p class="lead mb-0" style= "font-size: 1.5rem">Adoramos a sus hijos, también creemos que les vendría bien una noche libre. Por eso decidimos que sea solo de adultos. Deseamos que no sea un obstáculo para contar con su presencia.</p><br>
                    </div>

                    <a href="{{ route('invitados.buscar')}}"><button class="bton">¿Nos confirmas?</button></a>
                    <p class="lead mb-0" style="font-size:1.7rem ">Vestimenta: Elegante</p>
                    
            </div>
        </section>
        <!-- Testimonials-->
        
        <section class="testimonials text-center bg-light section-rosado" width="100px" height="100px"  id="Lugar">
            <div class="container">
                <h2 class="mb-5" >¿No conocés dónde queda el salón?</h2>
                <!-- Leaflet -->
                   <!-- // Mapa con Latitud y Longitud-->
                   <x-maps-leaflet 
                        :centerPoint="['lat' => -27.442771903980855, 'long' => -58.74928717993579]"
                        :zoomLevel="16"
                        :markers="[['lat' => -27.442771903980855, 'long' => -58.74928717993579]]">
                    </x-maps-leaflet>
            </div>
        </section>
        <!-- Call to Action-->
        <header class="foto2">
            <div class="container position-relative">
                <div class="row justify-content-center">
                    <div class="col-xl-6">
                        <div class="text-center text-white">
                            <!-- Page heading-->
                            <h1 class="mb-5"></h1>
                            <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </header><!-- Image Showcases-->
        <section class="features-icons text-center section-blanco" id="Regalos">
            <div class="container">
                <div class="container-fluid p-0">
                    <img src="assets/img/flor3.png">
                </div>
                <br><br>
                <h1>REGALO</h1>
                    <div class="order-lg-2 my-auto showcase-text"><br>
                        <p  class="lead mb-0" style="font-size:1.7rem "">Nuestro mayor obsequio es que compartas con nosotras esa día tan soñado. Si de todas formas querés hacerlo, podes ayudarnos con nuestra luna de miel. Te dejamos las cuentas o ese día habrá una caja con sobres.</p>
                    </div>

                    <p  class="lead mb-0" style="font-size:1.5rem ">Cuenta de Brubank<br>Titular: Silvina Senosiain<br>CBU: 1430001713028506770016<br>Alias: silvinasenosiain<br><br>​Cuenta de MercadoPago<br>​Titular: Silvina Senosiain<br>CVU: 0000003100037706581928<br>Alias: silvi.senosiain.mp</p>
                </div>
        </section>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
