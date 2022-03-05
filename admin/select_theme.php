<?php
    global $wpdb;
    $tabla = "{$wpdb->prefix}contacto_dlr_theme";
    $query = "SELECT * FROM $tabla";
    if(!empty($query)){
        $tema = $wpdb->get_results($query,ARRAY_A);
    }

    include dirname(__FILE__) . '/acciones.php';
    
?>
<h1>Seleccionar Tema</h1>
<h3>Tema 1</h3>
<img src="/wordpress/wp-content/plugins/darioplugin/admin/img/theme2.png" width="400" height="200" class="rounded float-left">
<h3>Tema 2</h3>
<img src="/wordpress/wp-content/plugins/darioplugin/admin/img/theme1.png" width="400" height="200" class="rounded float-left">
<h3>Tema 3</h3>
<img src="/wordpress/wp-content/plugins/darioplugin/admin/img/theme3.png" width="400" height="200" class="rounded float-left">
<div class="card">
  <div class="card-body">
  <form action="" method="post">
    <div class="form-group">
        <label for="my-select">Seleccionar tema de formulario de contacto</label>
        <select id="my-select" class="custom-select" name="selecciontema">
            <?php foreach ($tema as $clave => $valor) { ?>
                <option><?php echo $valor['Nombre']; ?></option>
            <?php } ?>
        </select>
        <input type="submit" value="Seleccionar" name="selectTheme" class="btn btn-success">
    </div>
</form>
  </div>
</div>
