<?php
$conex = mysqli_connect("localhost", "root", "", "registro_bd");

if (isset($_POST['register'])) {
    // Verificar si los campos requeridos no están vacíos
    if (!empty($_POST['nombres']) &&
        !empty($_POST['fechaNacimiento']) &&
        !empty($_POST['email']) &&
        !empty($_POST['motivo']) &&
        !empty($_POST['genero'])) {
        
        $nombres = trim($_POST['nombres']);
        $apellidos = trim($_POST['apellidos']);
        $fechaNacimiento = trim($_POST['fechaNacimiento']);
        $email = trim($_POST['email']);
        $motivo = trim($_POST['motivo']);
        $genero = trim($_POST['genero']);
        $fechaRegistro = date("Y-m-d H:i:s");
        
        $consulta = "INSERT INTO estudiantes (nombres, apellidos, fechaNacimiento, email, motivo, genero, fechaRegistro)
                     VALUES ('$nombres', '$apellidos', '$fechaNacimiento', '$email', '$motivo', '$genero', '$fechaRegistro')";
        
        $resultado = mysqli_query($conex, $consulta);

        if ($resultado) {
            // Registro exitoso, redirige al usuario
            header("Location: " . $_SERVER['PHP_SELF'] . "?success=1");
            exit();
        } else {
            echo "<div class='alert alert-danger'>Error: " . mysqli_error($conex) . "</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>Por favor complete todos los campos.</div>";
    }
}

// Mostrar mensaje de éxito si está presente en la URL
if (isset($_GET['success'])) {
    echo "<div class='alert alert-success'>¡Registro exitoso!</div>";
}
?>