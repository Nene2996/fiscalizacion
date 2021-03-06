<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
        <div class="container">
        <div class="card">
            <div class="card-header">
               <strong> CONSULTA DE INFRACCIONES AL REGLAMENTO NACIONAL DE TRANSITO </strong>
            </div>
            <div class="card-body">
            
                <form id="form">
                @csrf
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="numerolicencia">NÚMERO DE LICENCIA:</label>
                            <input type="text" name="numerolicencia" class="form-control form-control-sm" id="numerolicencia">
                        </div>
                        
                        <div class="form-group col-md-4">
                            <button type="submit" class="btn btn-primary my-4">Buscar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        </br>
        <div class="card">
                <div class="card-body">
                    <div class="table-responsive">  
                    <table   class="table table-sm table-hover table-bordered">
                        <thead>
                            <tr bgcolor= "#f7ba66" border="2px">
                            <th scope="col">Nombre</th>
                            <th scope="col">DNI</th>
                            <th scope="col">Número de Licencia</th>
                            <th scope="col">Categoría de Licencia</th>                        
                            </tr>
                        </thead>
                        <tbody id="contenido">
                            
                        </tbody>
                    </table>
                    </div>
                </div>
        </div>
        </div>
    </div>
</body>
</html>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

<script>



    document.getElementById('form').addEventListener('submit', fetchInformationData);


    function fetchInformationData(event){
        event.preventDefault();
        console.log('Hey nene me diste un click');

        let numeroLicencia = document.getElementById('numerolicencia').value;
        console.log(EnterpriseName);

        if (EnterpriseName == '') {
            alert('Tiene que ingresar el nombre de la empresa');
        }else{
            fetch(`/infracciones/${numeroLicencia}/infraccion`)
            .then()
            .then()
            .cath()
        }
    }
</script>


