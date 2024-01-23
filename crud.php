<?php


include "conexion.php";

//create
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["crear"])) {

    $nombre = $_POST["nombre"];
    $email = $_POST["email"];

    $sql = "INSERT INTO usuarios(nombre , email)VALUES ('$nombre','$email')";

    if ($conn->query($sql) === TRUE) {

        echo "usuario creado exitosamente";
    } else {

        echo "error" . $sql . "<br>" . $conn->error;
    }
}


//read

$sql = "SELECT * FROM usuarios";

$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
        echo "<li class='user-item'>";
        echo "<span>ID: " . $row["id"] . "</span>";
        echo "<span>Nombre: " . $row["nombre"] . "</span>";
        echo "<span>Email: " . $row["email"] . "</span>";
        echo "<a class='edit-btn' href='index.php?editar=" . $row["id"] . "'>Editar</a>";
        echo "<a class='delete-btn' href='crud.php?eliminar=" . $row["id"] . "'>Eliminar</a>";
        echo "<li>";
    }
} else {

    echo "0 resultados";
}




// READ y mostrar el formulario de actualización

if (isset($_GET["editar"])) {
    $id_actualizar = $_GET["editar"];

    $sql = "SELECT * FROM usuarios WHERE id=$id_actualizar";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nombre = $row["nombre"];
        $email = $row["email"];
    }
}



//UPDATE
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["actualizar"])) {

    $id = $_POST["id_actualizar"];
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];

    $sql = "UPDATE usuarios SET nombre='$nombre' , email='$email' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {

        echo "Usuario actualizado exitosamente.";
    } else {

        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Limpiar las variables después de la actualización
    $id_actualizar = '';
    $nombre = '';
    $email = '';
}


//DELETE
if (isset($_GET["eliminar"])) {

    $id_eliminar = $_GET["eliminar"];

    $sql = "DELETE FROM usuarios WHERE id=$id_eliminar";

    if ($conn->query($sql) === TRUE) {

        echo "Usuario eliminado exitosamente.";
    } else {

        echo "Error al eliminar el usuario: " . $conn->error;
    }
}
