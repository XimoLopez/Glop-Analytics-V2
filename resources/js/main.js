// Importación de jQuery 
import jQuery from "jquery";
window.$ = jQuery;
/* 
  Script menú hamburger 
  */
//Funciona con la librería de https://jonsuh.com/hamburgers/ donde podemos descargar el CSS para ser usado
const toggleMenu = () => {
    const menu = document.getElementById("menu-mob");
    const burger = document.getElementById("burger");
    const darkBg = document.getElementById("darkbg");

    if (menu && burger && darkBg) {
        menu.classList.toggle("menu-open");
        burger.classList.toggle("is-active");
        darkBg.classList.toggle("visible");
    } else {
        console.error("No se encontraron uno o más elementos necesarios para el menú hamburguesa.");
    }
};

document.addEventListener('DOMContentLoaded', () => {
    const burgerButton = document.getElementById("burger");
    const darkBg = document.getElementById("darkbg");

    if (burgerButton) {
        burgerButton.addEventListener("click", toggleMenu);
    }

    if (darkBg) {
        darkBg.addEventListener("click", toggleMenu);
        darkBg.addEventListener("keypress", toggleMenu);
        darkBg.addEventListener("keydown", toggleMenu);
        darkBg.addEventListener("keyup", toggleMenu);
    }
});

/* 
  script Scroll GoToTop 
  */

let basicScrollTop = function () {
    // Seleccionamos el botón
    const btnTop = document.querySelector(".scroll__gotop");
    // Mostrar el botón
    const mostrarBtn = function () {
        let position = document.querySelector("#position");
        position.innerHTML = window.scrollY + "px";
        if (window.scrollY >= 300) {
            btnTop.classList.add("is-visible");
        } else {
            btnTop.classList.remove("is-visible");
        }
    };
    // Scroll suave y subir
    let TopscrollTo = function () {
        if (window.scrollY !== 0) {
            setTimeout(function () {
                window.scrollTo(0, window.scrollY - 30);
                TopscrollTo();
            }, 10);
        }
    };
    // Listeners
    window.addEventListener("scroll", mostrarBtn);
    btnTop.addEventListener("click", TopscrollTo);
};
basicScrollTop();

/* 
  jQuery & Ajax
    */

/** Template de la tarjeta de comentarios */
//Esperamos a que cargue el DOM
$(document).ready(() => {
    //Ejecutamos la función que carga el template y obtiene los datos de la API
    cargarTestimonios();
});

function cargarTestimonios() {
    //Declaramos una variable para el template de la tarjeta
    //Obtenemos de la API la url de la imagen, el nombre y el email para insertarlos en las etiquetas correspondientes
    const template = `
    <article class="testimony__item">
        <p class="testimony__text">
          Glop Analytics ha mejorado la productividad de nuestro equipo. Desde que contratamos el servicio, nuestro
          equipo posee
          de toda la información necesaria para tomar decisiones en menos tiempo.
        </p>

        <div class="testimony__info">
          <figure class="testimony__picture">
            <img src="" class="testimony__img" alt="">
          </figure>

          <div class="testimony__profile">
            <h3 class="testimony__name"></h3>
            <p class="testimony__job"></p>
          </div>
        </div>
      </article>
      
  `;

    //Declaramos constante para solicitar el JSON de la API
    const usersAPI = {
        url: "https://randomuser.me/api/?format=json&results=3",
        method: "GET",
        timeout: 0,
    };
    //Usamos el método AJAX de jQuery y jQuery para insertar los datos al DOM
    $.ajax(usersAPI).done(function (respuesta) {
        respuesta.results.forEach((e) => {
            //Declaro variable tarjeta para convertirla a objeto jQuery y cargar mostrar la template
            let tarjeta = $(template);
            //Añadimos la imagen
            $(tarjeta).find(".testimony__img").attr("src", e.picture.thumbnail);
            //Añadimos el nombre
            $(tarjeta)
                .find(".testimony__name")
                .text(`${e.name.first} ${e.name.last}`);
            //Añadimos el email
            $(tarjeta).find(".testimony__job").text(e.email);
            //Adjuntamos la tarjeta en el DOM
            $("#testimonios").append(tarjeta);
        });
    });

    /* Añadimos la página del footer de todas páginas que tengan la el identificador #footer */
    $("#footerTemplate").load("footer.html");
}
