/* 
  Script menú hamburger 
  */
//Funciona con la librería de https://jonsuh.com/hamburgers/ donde podemos descargar el CSS para ser usado
//Añadir a la etiqueta button y al fondo el evento onclick="toggleMenu()
const toggleMenu = () => {
  document.getElementById("menu-mob").classList.toggle("menu-open"); //Añadir un id y una clase "menu-mob" a la etiqueta de la lista de enlaces
  document.getElementById("burger").classList.toggle("is-active"); //Añadir el id "burger" al boton del menu hamburger de la librería de jonsuh
  document.getElementById("darkbg").classList.toggle("visible"); //Añadir esto <div id="darkbg" class="darkbg"></div> después del main
};

/* 
  Script Pantalla Modal Acceso
  */

//función de autoinvocada  responsable de las interacciones con la interfaz de usuario, activan la visualización u ocultación de la ventana modal.
document.querySelectorAll(".open__modal").forEach((trigger) => {
  trigger.addEventListener("click", function () {
    hideAllModalWindows();
    showModalWindow(this);
  });
});

document.querySelectorAll(".modal__hide").forEach((closeBtn) => {

  closeBtn.addEventListener("click", function () {
    hideAllModalWindows();
  });
});

document.querySelector(".modal__fader").addEventListener("click", function () {
  hideAllModalWindows();
});

//Función que muestra la pantalla modal
function showModalWindow(buttonEl) {
  let modalTarget = "#" + buttonEl.getAttribute("data-target");
  //?NO entiendo porque usa el data-y no por ejemplo el ID ya que el nombre "modalAccess no se llama en ningún otro caso"?
  //Añadimos la clase "active" donde tenemos la clase modal__fader y la variable modalTarget declarada arriba
  document.querySelector(".modal__fader").className += " active";
  document.querySelector(modalTarget).className += " active";
}
//función que cierra todas las demás ventanas modales abiertas (Nos aseguramos de que solo hay una ventana modal abierta al mismo tiempo)
function hideAllModalWindows() {
  let modalFader = document.querySelector(".modal__fader");
  let modalWindows = document.querySelectorAll(".modal__window");

  if (modalFader.className.indexOf("active") !== -1) {
    modalFader.className = modalFader.className.replace("active", "");
  }

  modalWindows.forEach((modalWindow) => {
    if (modalWindow.className.indexOf("active") !== -1) {
      modalWindow.className = modalWindow.className.replace("active", "");
    }
  });
}

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

