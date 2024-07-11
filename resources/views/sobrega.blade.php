<x-app-layout>

    <x-slot name="pageTitle">
        Sobre Glop Analytics | Todo lo que necesitas saber de Glop Analytics y sus ventajas
    </x-slot>
    <x-slot name="pageDescription">
        Puedes descubrir todos las ventajas que te ofrece el servicio de Glop Analytics y como puede ayudarte
    </x-slot>

    <x-slot name="header">

      <!-- Ilustración en SVG añadida desde la etiqueta img -->
      <picture>
      <img src="img/mas-de-glop-analytics.svg" class="header__img" alt="conoce más sobre Google analytics" />
      </picture>
      <hgroup>
        <h1 class="header__title">+ sobre Glop Analytics <br><span class="header__title--slogan"> Información Ampliada
            de la herramienta qeu cambiará la forma de tomar decisions en tu negocio</span></h1>
      </hgroup>
      <a href="#" class="btn btn--jello">Contratar servicio</a>

    </x-slot>


    <div id="darkbg" class="dark-bg" onclick="toggleMenu()"></div>

    <section class="about container">
      <figure class="about__picture">
        <img src="img/about-services.svg" class="about__img"
          alt="ilustración de un resumen del servicio Glop Analytics">
      </figure>
      <div class="about__texts">
        <h2 class="about__title">Mantente productivo, donde quiera que estés</h2>
        <p class="about__paragraph">Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem possimus
          iste dolorem unde ab omnis similique, debitis laboriosam accusamus sed rerum qui, recusandae commodi quidem
          sequi repudiandae cumque aut doloremque.</p>
        <p class="about__paragraph"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab modi soluta accusamus
          consequatur! Voluptas reprehenderit tempore dolorum, asperiores vero.</p>
        <p class="about__paragraph">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab modi soluta accusamus
          consequatur! Voluptas reprehenderit
          tempore dolorum, asperiores vero.</p>
      </div>
    </section>


</x-app-layout>
