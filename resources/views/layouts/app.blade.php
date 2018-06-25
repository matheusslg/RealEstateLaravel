<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Real Estate Laravel</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script type="text/javascript" src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/pages/property.js') }}"></script>
    <script src="{{ asset('js/toastr.min.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css"> 
    <link rel="stylesheet" type="text/css" href="{{ asset('css/toastr.min.css') }}">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
    <link href="{{ asset('css/pages/property.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">

        <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
            <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="{{ url('/') }}">Real Estate Laravel</a>
            <input class="form-control form-control-dark w-100" type="text" placeholder="Buscar..." aria-label="Buscar">
            <ul class="navbar-nav px-3">
                @guest
                <li class="nav-item text-nowrap">
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                </li>
                @else
                <li class="nav-item text-nowrap">
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">Sair</a>
                </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                @endguest
            </ul>
        </nav>

        <div class="container-fluid">
            <div class="row">
                @auth
                <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                    <div class="sidebar-sticky">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ url('/home') }}">
                                <span data-feather="home"></span>
                                Painel <span class="sr-only">(current)</span>
                              </a>
                            </li>
                            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                                <span>Propriedades</span>
                                <a class="d-flex align-items-center text-muted" href="{{ route('property.index') }}">
                                      <span data-feather="home"></span>
                                    </a>
                            </h6>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('property.create') }}">
                                <span data-feather="chevron-right"></span>
                                Nova propriedade
                              </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('property.index') }}">
                                    <span data-feather="chevron-right"></span>
                                    Ver propriedades
                                  </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('property.trash') }}">
                                    <span data-feather="chevron-right"></span>
                                    Lixeira
                                </a>
                            </li>
                            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                                <span>Categorias</span>
                                <a class="d-flex align-items-center text-muted" href="{{ route('category.index') }}">
                                          <span data-feather="list"></span>
                                        </a>
                            </h6>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('category.create') }}">
                                <span data-feather="chevron-right"></span>
                                Nova categoria
                              </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('category.index') }}">
                                    <span data-feather="chevron-right"></span>
                                    Ver categorias
                                  </a>
                            </li>
                            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                                <span>Modalidades</span>
                                <a class="d-flex align-items-center text-muted" href="{{ route('modality.index') }}">
                                              <span data-feather="type"></span>
                                            </a>
                            </h6>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('modality.create') }}">
                                <span data-feather="chevron-right"></span>
                                Nova modalidade
                              </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('modality.index') }}">
                                    <span data-feather="chevron-right"></span>
                                    Ver modalidades
                                  </a>
                            </li>
                            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                                <span>Localizações</span>
                                <a class="d-flex align-items-center text-muted" href="{{ route('location.index') }}">
                                              <span data-feather="map-pin"></span>
                                            </a>
                            </h6>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('location.create') }}">
                                <span data-feather="chevron-right"></span>
                                Nova localização
                              </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('location.index') }}">
                                    <span data-feather="chevron-right"></span>
                                    Ver localizações
                                  </a>
                            </li>
                            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                                <span>Usuários</span>
                                <a class="d-flex align-items-center text-muted" href="{{ route('user.index') }}">
                                              <span data-feather="users"></span>
                                            </a>
                            </h6>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('user.create') }}">
                                <span data-feather="chevron-right"></span>
                                 Novo usuário
                              </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('user.index') }}">
                                    <span data-feather="chevron-right"></span>
                                    Ver usuários
                                  </a>
                            </li>
                        </ul>
                    </div>
                </nav>
                @endauth
                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
                    @yield('content')
                </main>
            </div>
        </div>
    </div>
</body>

<!-- Bootstrap core JavaScript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
<script>
    window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')

</script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>

<!-- Icons -->
<script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
<script>
    feather.replace()

</script>

<script>
        @if(Session::has('message'))
          var type = "{{ Session::get('alert-type', 'info') }}";
          switch(type){
              case 'info':
                  toastr.info("{{ Session::get('message') }}");
                  break;
              case 'warning':
                  toastr.warning("{{ Session::get('message') }}");
                  break;
              case 'success':
                  toastr.success("{{ Session::get('message') }}");
                  break;
              case 'error':
                  toastr.error("{{ Session::get('message') }}");
                  break;
          }
        @endif
</script>

</html>
