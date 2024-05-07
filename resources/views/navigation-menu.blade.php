<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #005978;">
    <div class="container">
        <!--<img src="img/logo-envase.png" style="border-radius: 20px;" class="mr-2" />-->
        <p class="text-white" >12° Exposición y Congreso para la Ciencia y Tecnología Farmacéutica, Biotecnológica y Veterinaria</p>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent"
            style="font-family: sans-serif; font-size: 15px; font-weight: 300; line-height: 1.6;">
            <ul class="navbar-nav ml-auto">                
                <li class="nav-item dropdown d-flex"
                    style="background-color: #009ca7; border-radius: 20px; max-height: 40px !important;">
                    <span class="mt-2 ml-2">
                        <svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <circle fill="white" stroke="#000" stroke-width="1.1" cx="9.9" cy="6.4" r="4.4"></circle>
                            <path fill="white" stroke="#000" stroke-width="1.1" d="M1.5,19 C2.3,14.5 5.8,11.2 10,11.2 C14.2,11.2 17.7,14.6 18.5,19.2"></path>
                        </svg>
                    </span>
                    <a class="nav-link dropdown-toggle px-2" style="color: white !important;" href="#" role="button" data-toggle="dropdown"
                        aria-expanded="false">
                        ¡Hola {{ Auth::user()->name }}!
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('profile.show') }}">Mi Perfil</a>
                        <form method="POST" action="{{ route('logout') }}" x-data>
                            @csrf
                            <button class="dropdown-item" type=submit href="{{ route('logout') }}">Cerrar Sesión</a>
                        </form>

                    </div>
                </li>            
                <li class="nav-item">
                    <div class="d-flex">
                        <a target="blank" href="https://www.facebook.com/ETIFeventosytecnologia">
                            <span class="icon-navbar">
                                <i class="fa-brands fa-facebook"></i>
                            </span>
                        </a>
                        <a target="blank" href="https://twitter.com/etif_pharma">
                            <span class="icon-navbar">
                                <i class="fa-brands fa-twitter"></i>
                            </span>
                        </a>
                        <a target="blank" href="https://www.instagram.com/etif_pharma/">
                            <span class="icon-navbar">
                                <i class="fa-brands fa-instagram"></i>
                            </span>
                        </a>
                        <a target="blank" href="https://www.linkedin.com/company/2670349?goback=">
                            <span class="icon-navbar">
                                <i class="fa-brands fa-linkedin"></i>
                            </span>
                        </a>
                        <a target="blank" href="https://www.youtube.com/user/ETIFLatinoamerica">
                            <span class="icon-navbar">
                                <i class="fa-brands fa-youtube"></i>
                            </span>
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
<style>
    .li-icon{
        width: fit-content;
    }
    .fa-brands {
        padding: 5px;
    }
    .fa-brands:hover {
        color: silver;
        box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        border-radius: 50%;
    }
    .icon-navbar {
        font-size: 26px;
        color: white;
        margin-left: 10px;
        
    }
    .icon-navbar:hover {
        
    }
    .navbar-brand {
        white-space: initial;
    }
    .dropdown-menu {
        position: absolute !important;
    }
</style>
