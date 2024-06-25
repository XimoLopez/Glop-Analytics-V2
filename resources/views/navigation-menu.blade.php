<nav class="nav">
    <figure class="nav__logo">
        <a href="{{ url('/') }}"> <img src="img/Logo-Glop-Analytics_BW.svg" class="nav__img" alt="Logo Glop analytics"></a>
    </figure>
    <div id="menu-mob" class="nav__links menu-mob">
        <a href="{{ url('/contacto') }}" class="nav__link">Contratar</a>
        <a href="{{ url('/servicios') }}" class="nav__link">Servicios</a>
        <a href="{{ url('/sobrega') }}" class="nav__link">+ Sobre GA</a>
    </div>
    <div class="nav__cta">
        <a href="#" class="open__modal nav__link btn btn--cta" data-target="modalAccess">Acceder</a>
    </div>
    <!-- Icono menu burger -->
    <button id="burger" class="hamburger hamburger--spring" type="button" onclick="toggleMenu()">
        <span class="hamburger-box">
            <span class="hamburger-inner"></span>
        </span>
    </button>
</nav>
