<?php  
    # Lista de acciones comunes para limpiar el resto del codigo
    if(isset($_POST['agregar'])){
        $insercion = [
            'id' => null,
            'Nombre' => $_POST['nombre'],
            'email' => $_POST['email'],
            'mensaje' => $_POST['mensaje']
        ];
        $wpdb->insert($tabla, $insercion);
    }
    if(isset($_POST['actualizar'])){
        $actualizacion = [
            'id' => $_POST['id2'],
            'Nombre' => $_POST['nombre2'],
            'email' => $_POST['email2'],
            'mensaje' => $_POST['mensaje2']
        ];
        $clausula_where = [
            'id' => $_POST['id2'],
        ];
        $wpdb->update($tabla, $actualizacion, $clausula_where);
    }
    if(isset($_POST['borrar'])){
        $clausula_where_borrado = [
            'id' => $_POST['id2'],
        ];
        $wpdb->delete($tabla, $clausula_where_borrado);
    }

    if(isset($_POST['selectTheme'])){
        $tablatemaselected = "{$wpdb->prefix}contacto_dlr_selected_theme";
        $actualizacionSelectedTheme = [
            'Nombre' => $_POST['selecciontema'],
        ];
        $clausula_where_selected = [
            'id' => 1,
        ];
        $wpdb->update($tablatemaselected, $actualizacionSelectedTheme, $clausula_where_selected);
    }

    if(isset($_POST['responder'])){
        wp_mail($_POST['email2'], 'Respuesta a: ' . $_POST['mensaje2'], $_POST['respuesta']);
    }
?>