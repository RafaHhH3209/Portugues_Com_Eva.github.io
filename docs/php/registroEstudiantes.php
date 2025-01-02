<?php
$user = "root";
$pass = "";
$host = "localhost";
$dbname = "formulario_db";

// Conexión a la base de datos
$conection = mysqli_connect($host, $user, $pass, $dbname);

if (!$conection) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Capturar datos del formulario
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$edad = $_POST['edad'];
$email = $_POST['email'];
$motivo = $_POST['motivo'];
$genero = $_POST['genero'];

// Insertar datos con consulta preparada
$stmt = $conection->prepare("INSERT INTO tabla (nombres, apellidos, edad, email, motivo, genero) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssisss", $nombres, $apellidos, $edad, $email, $motivo, $genero);

if ($stmt->execute()) {
    echo "Registro insertado exitosamente.";
} else {
    echo "Error al insertar el registro: " . $stmt->error;
}
$stmt->close();

// Mostrar registros de la tabla
$consulta = "SELECT * FROM tabla";
$result = $conection->query($consulta);

if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Nombres</th><th>Apellidos</th><th>Edad</th><th>Email</th><th>Motivo</th><th>Género</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>" . htmlspecialchars($row['id']) . "</td>
            <td>" . htmlspecialchars($row['nombres']) . "</td>
            <td>" . htmlspecialchars($row['apellidos']) . "</td>
            <td>" . htmlspecialchars($row['edad']) . "</td>
            <td>" . htmlspecialchars($row['email']) . "</td>
            <td>" . htmlspecialchars($row['motivo']) . "</td>
            <td>" . htmlspecialchars($row['genero']) . "</td>
        </tr>";
    }
    echo "</table>";
} else {
    echo "No hay registros en la tabla.";
}

// Cerrar conexión
mysqli_close($conection);
?>
