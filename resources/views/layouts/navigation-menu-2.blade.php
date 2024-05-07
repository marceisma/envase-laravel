<header class="bg-white">
    <nav class="navbar navbar-expand-lg navbar-light bg-white border shadow-sm">
        <!--<a class="navbar-brand" href="#">Navbar</a>-->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ $active == 'exposiciones' ? 'active btn btn-dark' : 'btn btn-sceondary' }}" href="#">Exposiciones</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $active == 'venta_stand' ? 'active btn btn-dark' : 'btn btn-sceondary' }}" href="#">Venta Stands</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ $active == 'empresas' ? 'active btn btn-light' : 'btn btn-sceondary' }}" role="button"
                        data-toggle="dropdown" aria-expanded="false">Empresas
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{route('empresa.panel')}}">Panel</a>
                        <a class="dropdown-item" href="{{route('empresa.create')}}">Nueva Empresa</a>
                    </div>
                </li>
                <!--
                <li class="nav-item">
                    <a class="nav-link {{ $active == 'mensajes' ? 'active' : '' }}" href="#">Marketing Empresas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $active == 'publicidad' ? 'active' : '' }}" href="#">Publicidad</a>
                </li>
                -->
            </ul>
        </div>
    </nav>
</header>
<style>
    .nav-link {
        color: black !important;
    }
    .nav-link:hover {
        text-decoration: underline;
    }
</style>
