<?php
    global $wpdb;
    $tabla = "{$wpdb->prefix}contacto_dlr";
    $query = "SELECT * FROM $tabla";
    $lista_contactos = $wpdb->get_results($query,ARRAY_A);

    include dirname(__FILE__) . '/acciones.php';
?>
<h3>El ShortCode del plugin de contacto es: [CNTC_DLR]</h3>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Mensaje</th>
            <th>Respuesta</th>
            <th colspan="3">Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($lista_contactos as $clave => $valor) { ?>
            <form action="" method="POST">
                <tr>
                    <td><input type="text" readonly name="id2" value="<?php echo $valor['id']; ?>"></td>
                    <td><input type="text" name="nombre2" value="<?php echo $valor['Nombre']; ?>"></td>
                    <td><input type="text" name="email2" value="<?php echo $valor['email']; ?>"></td>
                    <td><textarea name="mensaje2"><?php echo $valor['mensaje']; ?></textarea></td>
                    <td><textarea name="respuesta"></textarea></td>
                    <td><input type="submit" value="Actualizar" name="actualizar" class="btn btn-info"></td>
                    <td><input type="submit" value="Borrar" name="borrar" class="btn btn-danger"></td>
                    <td><input type="submit" value="Responder" name="responder" class="btn btn-warning"></td>
                </tr>
            </form>
        <?php } ?>
        <form action="" method="POST">
            <tr>
                <td></td>
                <td><input type="text" name="nombre" id=""></td>
                <td><input type="text" name="email" id=""></td>
                <td><input type="text" name="mensaje" id=""></td>
                <td><input type="submit" value="Agregar" name="agregar" class="btn btn-success"></td>
            </tr>
        </form>
    </tbody>
</table>




