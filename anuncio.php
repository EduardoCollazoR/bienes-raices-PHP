<?php

require 'includes/funciones.php';
incluirTemplate('header');
?>

<main class="contenedor seccion contenido-centrado">
  <h1>Casa en Venta Junto al Bosque</h1>
  <picture>
    <source srcset="build/img/destacada.webp" type="image/webp" />
    <source srcset="build/img/destacada.jpg" type="image/jpg" />
    <img src="build/img/destacada.jpg" alt="anuncio2" loading="lazy" />
  </picture>

  <div class="resumen-propiedad">
    <p class="precio">$3,000,000</p>
    <ul class="iconos-caracteristicas">
      <li>
        <img class="icono" src="build/img/icono_wc.svg" alt="icono wc" />
        <p>3</p>
      </li>
      <li>
        <img class="icono" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento" />
        <p>3</p>
      </li>
      <li>
        <img class="icono" src="build/img/icono_dormitorio.svg" alt="icono dormitorio" />
        <p>4</p>
      </li>
    </ul>
    <p>
      Lorem ipsum dolor sit amet consectetur, adipisicing elit. Officia
      perspiciatis dolore sequi eveniet quo consequuntur et atque rem omnis
      numquam saepe, aut quis, nostrum minus. Magni sequi quam quas iste?
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis
      officia perspiciatis esse numquam cumque quis recusandae consequuntur
      odio totam! Blanditiis fugit quasi vero, obcaecati at sed pariatur
      placeat voluptates officia.
    </p>
    <p>
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae
      beatae exercitationem provident natus. Dignissimos ipsum et at
      voluptates, voluptate illo natus expedita fugit repellat distinctio
      vero, voluptas tenetur. A, sapiente!
    </p>
  </div>
</main>
<?php
incluirTemplate('footer');
?>