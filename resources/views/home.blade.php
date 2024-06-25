<x-app-layout>

    <x-slot name="header">

        <figure class="home__picture">
            <img src="img/ilustracion-header-home.svg" class="header__img" alt="Glop Analytics" />
        </figure>
        <hgroup>
            <h1 class="header__title"> Glop Analytics <br><span class="header__title--slogan"> Todo la información de tus
                    ventas y compras desde un solo lugar</span></h1>
            <h2 class="header__paragraph">
                Glop Analytics almacena todos tus datos más importantes en una ubicación segura. Accede a ellos desde
                cualquier lugar y analiza la salud de tu negocio en tiempo real.
            </h2>
        </hgroup>
        <a href="#" class="btn btn--jello">Contratar servicio</a>

    </x-slot>


    <div id="darkbg" class="dark-bg" onclick="toggleMenu()"></div>

    <section class="cards container">

        <article class="cards__item">
            <img src="img/icon-dashboard-GA.svg" class="cards__img" alt="icono de los servicios de Glop Analytics numero 1">
            <h3 class="cards__title">Acceso a tus datos, desde cualquier lugar.</h3>
            <p class="cards__paragraph">
                Usa tu smartphone, tableta o pc para acceder a tu cuenta y accede a tus datos desde todas partes. Pantallas
                totalmente adaptables a los dispositivos.
            </p>
        </article>

        <article class="cards__item">
            <img src="img/icon-segurida-GA.svg" class="cards__img" alt="icono de los servicios de Glop Analytics numero 2">
            <h3 class="cards__title">Acceso seguro y multiperfil</h3>
            <p class="cards__paragraph">
                La autenticación de 2 factores y el cifrado controlado por el usuario son solo algunos de los aspectos de
                seguridad y características que permiten ayudar a proteger tus datos.
            </p>
        </article>

        <article class="cards__item">
            <img src="img/icon-analisis-profundo-GA.svg" class="cards__img" alt="icono de los servicios de Glop Analytics numero 3">
            <h3 class="cards__title">Análisis profundo y comparativas</h3>
            <p class="cards__paragraph">
                Comparte los informes de forma segura con tus socios, empleados o gestores a través de correo electrónico,
                WhatApps, Telegram y más.
            </p>
        </article>

        <article class="cards__item">
            <img src="img/icon-costes-GA.svg" class="cards__img" alt="icono de los servicios de Glop Analytics numero 4">
            <h3 class="cards__title">Conozca y reduzca costes a gran velocidad</h3>
            <p class="cards__paragraph">
                Al tener la información en la palma de tu mano puedes tomar decisiones en segundos debido a los informes
                detallados que brinda Glop Analytics.
            </p>
        </article>

    </section>

    <section class="about container">
        <figure class="about__picture">
            <img src="img/about-services.svg" class="about__img" alt="ilustración de un resumen del servicio Glop Analytics">
        </figure>
        <div class="about__texts">
            <h2 class="about__title"> Mantente productivo, donde quiera que estés</h2>
            <p class="about__paragraph">Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem possimus
                iste dolorem unde ab omnis similique, debitis laboriosam accusamus sed rerum qui, recusandae commodi quidem
                sequi repudiandae cumque aut doloremque.</p>
            <p class="about__paragraph"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab modi soluta accusamus
                consequatur! Voluptas reprehenderit tempore dolorum, asperiores vero.</p>
            <p class="about__paragraph">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab modi soluta accusamus
                consequatur! Voluptas reprehenderit
                tempore dolorum, asperiores vero.</p>
            <a href="#" class="btn about__btn">Conoce más sobre GA</a>
        </div>
    </section>

    <!-- Testimonios generados didácticamente a través de la plantilla "tarjetas" por JavaScript y obteniendo datos desde la API https://randomuser.me/  -->
    <section class="testimony container" id="testimonios"></section>

</x-app-layout>
