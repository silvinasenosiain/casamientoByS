<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <link rel="icon" href="assets/img/anillos-de-boda.png">
        <title>¡NOS CASAMOS!</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" type="text/css" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <script type="text/javascript" src="https://maps.google.com/maps/api/js?key=API-KEY"></script> 
        @livewireStyles
    </head>
    <body>
        <!-- Navigation-->
        <section class="features-icons bg-light text-center section-rosado" id="Incio">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Profesionales') }}</div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($profesionales as $item)
                                    <tr>
                                        <td>{{ $item->nombre}}</td>
                                        <td>{{ $item->apellido}}</td>
                                        <td><a href="{{ route('profesionales.edit',$item)}}" class="btn btn-warning btn-sm">Voy a ir</a>
                                    
                                        <form action="{{ route('profesionales.delete', $item)}}" method="POST" class="d-inline">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-danger btn-sm" type="submit">No podré</button>
                                            
                                        </form>
                                    </td>

                                    </tr>
                                    @empty
                                    @endforelse
                                </tbody>
                            </table> 
                

                            <a href="{{ route('profesionales.create')}}"><button>Agregar Profesional</button></a>
                        </div>
                        {{ $profesionales->links('vendor.pagination.bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
        @livewireScripts
    </body>
</html>
