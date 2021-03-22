<?php

//base de datos
require '../../includes/config/database.php';

$db = conectarDB();


//arreglo con mensajes de errores
$errores = [];

// ejecutar el codigo despues de que el usuario envio el formulario

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // echo "<pre>";
    // var_dump($_POST);
    // echo "</pre>";

    $titulo = $_POST['titulo'];
    $precio = $_POST['precio'];
    $descripcion = $_POST['descripcion'];
    $habitaciones = $_POST['habitaciones'];
    $wc = $_POST['wc'];
    $estacionamiento = $_POST['estacionamiento'];
    $vendedorId = $_POST['vendedor'];


    if (!$titulo) {
        $errores[] = "Debes añadir un titulo";
    }

    if (!$precio) {
        $errores[] = "El precio es obligatorio";
    }
    if (strlen($descripcion) < 50) {
        $errores[] = "La descripcion es obligatoria y debe tener al menos 50 caracteres";
    }
    if (!$habitaciones) {
        $errores[] = "El numero de habitaciones es obligatorio";
    }
    if (!$wc) {
        $errores[] = "El numero de baños es obligatorio";
    }
    if (!$estacionamiento) {
        $errores[] = "El numero de lugares de estacionamiento es obligatorio";
    }
    if (!$vendedorId) {
        $errores[] = "Elije un vendedor";
    }

    // echo "<pre>";
    // var_dump($errores);
    // echo "</pre>";


    //revisar que el arreglo de errores este vacio
    if (empty($errores)) {
        //insertar en la base de datos
        $query = "INSERT INTO propiedades (titulo,precio, descripcion, habitacion,wc,estacionamiento,vendedorId) VALUES ('$titulo','$precio','$descripcion','$habitaciones','$wc','$estacionamiento','$vendedorId')";
        // echo $query;
        $resultado = mysqli_query($db, $query);
        if ($resultado) {
            echo "Insertado Correctamente";
        }
    }
}

require '../../includes/funciones.php';
incluirTemplate('header');
?>

<main class="contenedor seccion">
    <h1>Crear</h1>

    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error ?>
        </div>
    <?php endforeach; ?>

    <a href="/admin" class="boton boton-verde">Volver</a>


    <form class="formulario" method="POST" action="/admin/propiedades/crear.php">
        <fieldset>
            <legend>Informacion General</legend>

            <label for="titulo">Titulo</label>
            <input type="text" id="titulo" name="titulo" placeholder="Titulo">

            <label for="precio">Precio</label>
            <input type="number" id="precio" name="precio" placeholder="Precio">

            <label for="imagen">Imagen</label>
            <input type="file" id=" imagen" accept="image/jpeg, image/png">

            <label for="descripcion">Descripcion</label>
            <textarea id="descripcion" name="descripcion"></textarea>
        </fieldset>

        <fieldset>
            <legend> Informacion Propiedad
            </legend>
            <label for="habitaciones">Habitaciones</label>
            <input type="number" id="habitaciones" placeholder="Ej: 3" min="1" max="9" name="habitaciones">

            <label for="wc">Baños</label>
            <input type="number" id="wc" placeholder="Ej: 3" min="1" max="9" name="wc">

            <label for="estacionamiento">Estacionamiento</label>
            <input type="number" id="estacionamiento" placeholder="Ej: 3" min="1" max="9" name="estacionamiento">
        </fieldset>

        <fieldset>
            <legend>Vendedor</legend>

            <select name="vendedor">
                <option value="">Seleccione</option>
                <option value="1">Juan
                </option>
                <option value="2">Karen
                </option>
            </select>
        </fieldset>

        <input type="submit" value="Crear Propiedad" class="boton boton-verde">

    </form>
</main>
<?php
incluirTemplate('footer');
?>