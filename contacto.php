<?php

require 'includes/funciones.php';
incluirTemplate('header');
?>
<main class="contenedor seccion">
  <h1>Contacto</h1>
  <picture>
    <source srcset="build/img/destacada3.webp" type="image/webp" />
    <source srcset="build/img/destacada3.jpg" type="image/jpg" />
    <img src="build/img/destacada3.jpg" alt="anuncio2" loading="lazy" />
  </picture>

  <h2>Llene el Formulario de Contacto</h2>
  <form action="" class="formulario">
    <fieldset>
      <legend>Informacion Personal</legend>

      <label for="nombre">Nombre</label>
      <input type="text" placeholder="Nombre" id="nombre" />
      <label for="correo">Correo Electronico</label>
      <input type="email" placeholder="Correo Electronico" id="correo" />
      <label for="tel">Telefono</label>
      <input type="tel" placeholder="Telefono" id="tel" />
      <label for="mensaje">Mensaje</label>
      <textarea id="mensaje"></textarea>
    </fieldset>

    <fieldset>
      <legend>Informacion Sobre la Propiedad</legend>
      <label for="opciones">Vende o Compra</label>
      <select id="opciones">
        <option value="" disabled selected>Seleccione</option>
        <option value="Compra">Compra</option>
        <option value="Vende">Vende</option>
      </select>
      <label for="presupuedto"> Precio o Presupuesto</label>
      <input type="number" placeholder="Presupuesto" id="presupuesto" />
    </fieldset>

    <fieldset>
      <legend>Contacto</legend>
      <p>Como desea ser contactado</p>
      <div class="forma-contacto">
        <label for="contactar-telefono">Telefono</label>
        <input name="contacto" type="radio" value="telefono" id="contactar-telefono" />
      </div>
      <div class="forma-contacto">
        <label for="contactar-correo">Correo Electronico</label>
        <input type="radio" name="contacto" value="correo" id="contactar-correo" />
      </div>
      <p>Si eligio telefono, elija la fecha y hora</p>
      <label for="fecha">Fecha</label>
      <input type="date" placeholder="Fecha" id="fecha" />
      <label for="hora">Hora</label>
      <input type="time" placeholder="Hora" id="hora" min="09:00" max="18:00" />
    </fieldset>

    <input type="submit" value="Enviar" class="boton-verde" />
  </form>
</main>
<?php
incluirTemplate('footer');
?>