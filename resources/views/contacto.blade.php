<x-app-layout>

    <x-slot name="pageTitle">
        Contacta con Glop | Todos tus datos en un único sitio
    </x-slot>
    <x-slot name="pageDescription">
        Contacta con el equipo del departamento de ventas de Glop para adquirir Glop Analytics si ya dispones de Glop Business
    </x-slot>

    <x-slot name="header">

        <figure>
            <img src="img/icon-costes-GA.svg" class="header__img" alt="contacta con glop para recibir información" />
        </figure>
        <hgroup>
            <h1 class="header__title"> Contacto <br><span class="header__title--slogan">Completa el formulario</span></h1>
            <h2 class="header__paragraph">
                Contacta con nuestro equipo del departamento de ventas para recibir más información de Glop Analytics y los
                beneficios
                que puede aportar a tu negocio.
            </h2>
        </hgroup>

    </x-slot>


    <div id="darkbg" class="dark-bg" onclick="toggleMenu()"></div>

    <section class="container">
        <!-- Formulario de inscripción con el método POST para mayor seguridad -->
        <form class="form" action="#" method="get" name="frmContacto" id="frmContacto">
            <!-- Agrupación de datos personales obligatorios -->
            <fieldset class="form__fieldset">
                <!-- Título del bloque de datos personales -->
                <legend class="form__legend">Datos Personales</legend>
                <!--  class="form__input" y label para el nombre -->
                <label class="form__label form__required" for="nombre">Nombre:</label>
                <!-- Controlamos que no se puedan enviar números y un máximo de 30 caracteres de forma nativa en HTML a través del atributo pattern. Aunque el control principal lo hacemos con la librería de jQuery validate.js -->
                <input class="form__input" type="text" name="nombre" id="nombre" placeholder="Primer Nombre" pattern="[a-zA-Z]{1,30}" required autofocus />
                <!-- Input para el apellido -->
                <label class="form__label form__required" for="apellidos">Apellidos:</label>
                <!-- Controlamos que no se puedan enviar números y un máximo de 50 caracteres de forma nativa en HTML a través del atributo pattern. Aunque el control principal lo hacemos con la librería de jQuery validate.js-->
                <input class="form__input" type="text" name="apellidos" id="apellidos" placeholder="Primer y segundo Apellido" pattern="[a-zA-Z]{1,30}" required />
                <!-- Label correo electrónico requerido el control principal lo hacemos con la librería de jQuery validate.js -->
                <label class="form__label form__required" for="eMail">eMail:</label>
                <!-- Input para solicitar el email -->
                <input class="form__input" type="email" name="email" id="eMail" placeholder="ejemplo@email.com" required>
            </fieldset>
            <!-- Input comentario -->
            <textarea class="form__textarea" name="cometario-form" id="cometario" cols="5" rows="5" placeholder="Añada un comentario si lo desea"></textarea>
            <div class="form__condiciones">
                <input class="form__condiciones--input" type="checkbox" name="condiciones" id="condiciones">
                <label class="form__condiciones--label condiciones" for="condiciones">Acepto condiciones de la política de cookies</label>
            </div>
            <!-- Botón de envío -->
            <input class="form__input btn btn--submit" type="submit" value="Enviar formulario" id="submit">
        </form>
        <footer class="footer-form">
            <p class="footer-form__paragraph">Los campos indicados con un <span class="footer-form__asterisco">*</span> son obligatorios</p>
        </footer>
    </section>

</x-app-layout>
