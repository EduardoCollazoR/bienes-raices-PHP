<?php

// importar la conexion
require '../includes/config/database.php';

$db = conectarDB();
// escribir el query
$query = 'SELECT * FROM propiedades';
//consultar la bd
$resultadoConsulta = mysqli_query($db, $query);
//recibir el resultado de otra pagina
$resultado = $_GET['resultado'] ?? null;
//incluye un template
require '../includes/funciones.php';
incluirTemplate('header');
?>

<main class="contenedor seccion">
    <h1>Administrador de Bienes Raices</h1>

    <!-- Condiccion de resultado en la url para imprimir la alerta  -->
    <?php
    if (intval($resultado) === 1) : ?>
        <p class="alerta exito">Anuncio Creado Correctamente</p>
    <?php endif; ?>
    <a href="/admin/propiedades/crear.php" class="boton boton-verde">Nueva Propiedad</a>


    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            <!-- mostrar los resultado-->
            <?php while ($propiedad = mysqli_fetch_assoc($resultadoConsulta)) : ?>
                <tr>
                    <td><?php echo $propiedad['id']; ?></td>
                    <td><?php echo $propiedad['titulo']; ?></td>
                    <td> <img class="imagen-tabla" src="/imagenes/<?php echo $propiedad['imagen'] ?>"></td>
                    <td>$ <?php echo $propiedad['precio']; ?></td>

                    <td>
                        <a href="" class="boton-rojo-block">Eliminar</a>
                        <a href="admin/propiedades/actualizar.php?id=<?php echo $propiedad['id']; ?>" class="boton-amarillo-block">Actualizar</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>

    </table>
</main>
<?php

//cerrar la conexion
mysqli_close($db);
incluirTemplate('footer');
?>