<?php

require 'includes/config/database.php';
$db = conectarDB();

//Autenticar el usuario

$errores = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    $email = mysqli_real_escape_string($db, filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (!$email) {
        $errores[] = "El correo electronico es obligatorio o no es valido";
    }

    if (!$password) {
        $errores[] = "La contraseña es obligatoria";
    }

    if (empty($errores)) {
        //revisar si el usuario existe
        $query = "SELECT * FROM usuarios WHERE email='${email}'";
        $resultado = mysqli_query($db, $query);

        if ($resultado->num_rows) {
            //revisar si el password es correcto
            $usuario = mysqli_fetch_assoc($resultado);
            //verificar si el password es correcto o no 
            $auth = password_verify($password, $usuario['password']);
            if ($auth) {
                //el usuario esta autenticado
                session_start();
                //llenar el arrego de la sesion
                $_SESSION['usuario'] = $usuario['email'];
                $_SESSION['login'] = true;

                header('Location:/admin');
            } else {
                $errores[] = 'La contraseña es incorrecta';
            }
        } else {
            $errores[] = "El usuario no existe";
        }
    }
}

//incluye el header
require 'includes/funciones.php';
incluirTemplate('header');
?>

<main class="contenedor seccion contenido-centrado">
    <h1>Iniciar Sesion</h1>

    <?php
    foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error ?>
        </div>
    <?php endforeach; ?>

    <form class="formulario" method="POST">
        <fieldset>
            <legend>Correo Electronico y Password</legend>


            <label for="correo">Correo Electronico</label>
            <input type="email" placeholder="Correo Electronico" id="correo" name="email" required />
            <label for="password">Contraseña</label>
            <input type="password" placeholder="Contraseña" id="password" name="password" required />

        </fieldset>
        <input type="submit" name="" value="Iniciar Sesion" class="boton boton-verde">
    </form>
</main>
<?php
incluirTemplate('footer');
?>