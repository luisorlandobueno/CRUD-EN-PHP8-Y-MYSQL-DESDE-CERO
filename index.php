<!DOCTYPE html>
<html lang="en">

<?php

include "crud.php"

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>crud con php 8</title>
    <link rel="stylesheet" href="estilos.css">
</head>

<body>

    <div class="container">

        <form method="post" action="crud.php">

            <input type="hidden" name="id_actualizar" value="<?php echo isset($id_actualizar) ? $id_actualizar : ""; ?>">


            <label for="nombre">nombre:</label>
            <input type="text" name="nombre" value="<?php echo isset($nombre) ? $nombre : ""; ?>" require>

            <label for="email">email:</label>
            <input type="email" name="email" value="<?php echo isset($email) ? $email : ""; ?>" require>


            <?php if (isset($id_actualizar)) : ?>

                <button type="submit" name="actualizar">actualizar</button>

            <?php else : ?>



                <button type="submit" name="crear">crear</button>

            <?php endif; ?>

        </form>



        <h2>listado de usuarios</h2>
        <ul class="user-list">

            <?php

            include "crud.php"

            ?>

        </ul>










    </div>







</body>

</html>