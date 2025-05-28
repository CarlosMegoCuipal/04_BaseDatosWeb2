<?php

    require_once "Conexion.php";

    $sql = "SELECT * FROM persona WHERE estado = 1";
    $objectcon = new conexion();
    $con = $objectcon->getConexion();
    
    ////////////////////////////////////////////////////////////////////////////////////////
    $result = $con->query($sql);
    if($result->num_rows > 0){
        while($fila = $result->fetch_assoc()){
        echo "ID: " . $fila['id'] . "<br>";
        echo "Nombre Completo: " . $fila['nombres'] . " " . $fila ['apellidos'] . "<br>";
        echo "DNI:  " . $fila ['dni'] . "<br>";
        echo "Telefono: " . $fila ["telefono"] . "<br>";
        echo "Correo: " . $fila ["correo"] . "<br>";
        echo "Estado " . ($fila ['estado'] ==1 ? 'Activo' : 'Inactivo') . "<br>";
        echo "Fecha creacion: " . $fila ["fecha_creada"] . "<br>";
        echo "<hr>";
        }
    
    }else{
        echo "0 Resultados <br>";
    }
    ////////////////////////////////////////////////////////////////////////////////////////

    $sql_insert = "INSERT INTO persona (nombres, apellidos, dni, telefono, correo) 
            VALUES ('Jhonatan' , 'Lozano Paico', '7654321', '987654321', 'lozanoWilliams@gmaial.com')";
    if($con->query($sql_insert)){
        $ultimoid = $con->insert_id;
        echo "Registrado correctamente con iD: " . $ultimoid . "<br>";
    }else{
        echo "No se registro";
    }

    ////////////////////////////////////////////////////////////////////////////////////////
    //Hacer pruebas update

    $nuevo_correo = "williamPaico@gmail.com";
    $sql_Update = "UPDATE persona SET correo = '$nuevo_correo' WHERE id = 3";

    echo "Intentando actualizar el correo del ID: " . 3 . "<br>";
    if ($con->query($sql_Update)) {
        if ($con->affected_rows > 0) {
            echo "Correo actualizado correctamente para el ID " . 3 . ".<br>";
        } else {
            echo "No se actualizó el correo: " . 3 . ".<br>";
        }
    }
    echo "<hr>";

    ///////////////////////////////////////////////////////////////////////////////////////
    //Hacer pruebas con el delete

    $id_eliminar = $ultimoid;

    echo "Intentando eliminar el registro con ID: " . $id_eliminar . "<br>";
    $sql_delete = "DELETE FROM persona WHERE id = $id_eliminar";

    if ($con->query($sql_delete)) {
        if ($con->affected_rows > 0) {
            echo "Registro con ID " . $id_eliminar . " eliminado correctamente.<br>";
        } else {
            echo "No se encontró ningún registro con ID " . $id_eliminar . " para eliminar.<br>";
        }
    }
    echo "<hr>";