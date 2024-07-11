<!DOCTYPE html>

<html lang="es">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Meta Tags -->
    <title>{{ $pageTitle }}</title>
    <meta name="title" content="{{ $pageTitle }}">
    <meta name="description" content="{{ $pageDescription }}">

    <!-- Favicons para distintos dispositivos -->
    <link rel="icon" type="image/png" sizes="32x32" href="./img/favicon-glop-32x32.png">
    <link rel="icon" href="./img/favicon-glop-192x192.png" sizes="192x192" />
    <link rel="apple-touch-icon" href="./img/favicon-glop-180x180.png" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/scss/styles.scss', 'resources/js/main.js'])

    <!-- Styles -->
    @livewireStyles

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://metatags.io/">
    <meta property="og:title" content="{{ $pageTitle }}">
    <meta property="og:description" content="{{ $pageDescription }}">
    <meta property="og:image" content="https://metatags.io/assets/meta-tags-16a33a6a8531e519cc0936fbba0ad904e52d35f34a46c97a2c9f6f7dd7d336f2.png">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://metatags.io/">
    <meta property="twitter:title" content="{{ $pageTitle }}">
    <meta property="twitter:description" content="{{ $pageDescription }}">
    <meta property="twitter:image" content="https://metatags.io/assets/meta-tags-16a33a6a8531e519cc0936fbba0ad904e52d35f34a46c97a2c9f6f7dd7d336f2.png">

    

    <!-- Añadimos el manifest para que la web funcione con la tecnología PWA -->
    <link rel="manifest" href="manifest.json">

</head>

<body>

    <header class="header">
        <div class="header__ola"></div>
        @livewire('navigation-menu')
        <section class="header__main container">
            {{ $header }}
        </section>
    </header>

    <main class="main">

        {{ $slot }}

        <section class="join">
            <div class="join__container container">
                <h2 class="join__title"> Obtén acceso inmediato</h2>
                <p class="join__paragraph">Si dispones del software Glop, tienes la posibilidad de acceder en pocos minutos a
                    tus datos.
                </p>
                <form class="join__form">
                    <input type="email" class="join__input" placeholder="ejemplo@mail.com">
                    <input type="submit" class="join__input btn join__input--submit" value="¡Contratar servicio ahora!">
                </form>
            </div>
        </section>

    </main>

    <footer class="footer" id="footerTemplate">

        <section class="footer__container container">

            <figure class="footer__picture">
                <img src="img/Logo-Glop-Analytics.svg" class="footer__img" alt="logo de Glop Analytics en el footer">
            </figure>

            <div class="footer__content">
                <p class="footer__direction footer__direction--first">
                    <img src="img/icon-location.svg" class="footer__icon" alt="icono en el footer de localización">
                    Calle Río Duero Nº14 <br /> 03420 | Castalla <br /> Alicante | España
                </p>
                <div class="footer__contact">
                    <a href="tel:+34965561728" class="footer__direction footer__direction--second">
                        <img src="img/icon-phone.svg" class="footer__icon" alt="icono en el footer de teléfono">
                        +34 965 56 17 28
                    </a>
                    <a href="mailto:hola@glop.es " class="footer__direction">
                        <img src="img/icon-email.svg" class="footer__icon" alt="icono en el footer de email">
                        hola@glop.es
                    </a>
                </div>
                <nav class="footer__nav">
                    <a href="index.html" class="footer__link">Inicio</a>
                    <a href="contacto.html" class="footer__link">Contactar</a>
                    <a href="servicios.html" class="footer__link">Servicios</a>
                    <a href="sobrega.html" class="footer__link">+ Sobre GA</a>
                </nav>
                <div class="footer__social">
                    <a href="#" class="footer__smedia">
                        <img src="img/fb.svg" class="footer__media" alt="icono redes sociales de facebook">
                    </a>
                    <a href="#" class="footer__smedia">
                        <img src="img/instagram.svg" class="footer__media" alt="icono redes sociales de instagram">
                    </a>
                    <a href="#" class="footer__smedia">
                        <img src="img/twitter.svg" class="footer__media" alt="icono redes sociales de twitter">
                    </a>
                </div>
            </div>

        </section>

    </footer>
    <!-- Botón GoToTop con scroll -->
    <button id="goTop" class="scroll__gotop"></button>
    <!-- Cálculo del alto de la pantalla  para el scroll to top-->
    <span class="scroll__hidden">window.scrollY = <span id="position">0px</span></span>
    <!-- Llamamos al archivo de la librería jQuery -->
    <script src="js/libs/jquery.min.js"></script>

    @stack('modals')

    @livewireScripts

</body>

</html>
