<?php
/*
Plugin Name: Contacto DLR
Plugin URI: 
Description: Plugin de contacto con el administrador de la página
Version: 3.0
Author: Dario Lopera
License: GPLv2 or later
*/

use Illuminate\Support\Arr;
require_once dirname(__FILE__) . '/clases/shortcode_dlr.php';

# Dicha funcion activa el plugin en wordpress y crea las tres tablas necesarias para el funcionamiento del plugin
function Activar() {

    global $wpdb;

    $sql ="CREATE TABLE IF NOT EXISTS {$wpdb->prefix}contacto_dlr(
        `id` INT NOT NULL AUTO_INCREMENT,
        `Nombre` VARCHAR(45) NULL,
        `email` VARCHAR(45) NULL,
        `mensaje` VARCHAR(45) NULL,
        PRIMARY KEY (`id`));";
    $sql2 ="CREATE TABLE IF NOT EXISTS {$wpdb->prefix}contacto_dlr_theme(
        `id` INT NOT NULL AUTO_INCREMENT,
        `Nombre` VARCHAR(45) NULL,
        PRIMARY KEY (`id`));";
    $sql3 ="CREATE TABLE IF NOT EXISTS {$wpdb->prefix}contacto_dlr_selected_theme(
        `id` INT NOT NULL AUTO_INCREMENT,
        `Nombre` VARCHAR(45) NULL,
        PRIMARY KEY (`id`));";
    $wpdb->query($sql); 
    $wpdb->query($sql2);
    $wpdb->query($sql3);
    $tablatema = "{$wpdb->prefix}contacto_dlr_theme";
    $tablatemaselected = "{$wpdb->prefix}contacto_dlr_selected_theme";
    $insertTheme1 = [
        'id' => null,
        'Nombre' => 'Tema1',
    ];
    $insertTheme2 = [
        'id' => null,
        'Nombre' => 'Tema2',
    ];
    $insertTheme3 = [
        'id' => null,
        'Nombre' => 'Tema3',
    ];
    $insertSelectedTheme = [
        'id' => null,
        'Nombre' => 'Tema1',
    ];
    $wpdb->insert($tablatema, $insertTheme1);
    $wpdb->insert($tablatema, $insertTheme2);
    $wpdb->insert($tablatema, $insertTheme3);
    $wpdb->insert($tablatemaselected, $insertSelectedTheme);
}

function Desactivar() {
    flush_rewrite_rules();
}

register_activation_hook(__FILE__, 'Activar');
register_deactivation_hook(__FILE__, 'Desactivar');

add_action('admin_menu', 'CrearMenu');

# Creación del menú y del submenú de configuracion y asignacion a cada una de las páginas
function CrearMenu() {
    add_menu_page(
        'DarioPlugin',
        'Contacto DLR',
        'manage_options',
        plugin_dir_path(__FILE__).'admin/lista_contacto.php',
        null,
        plugin_dir_url(__FILE__).'admin/img/icon.png',
        '1',
    );

    add_submenu_page(
        plugin_dir_path(__FILE__).'admin/lista_contacto.php',
        'Seleccionar tema',
        'Seleccionar tema',
        'manage_options',
        plugin_dir_path(__FILE__).'admin/select_theme.php',
    );
}

# Agregación de Javascript
function AgregarBootstrapJS() {
    wp_enqueue_script('bootstrapjs', plugins_url('admin/bootstrap/js/bootstrap.min.js', __FILE__),array('jquery'));
}
add_action('admin_enqueue_scripts', 'AgregarBootstrapJS');

# Agregación de Bootstrap
function AgregarBootstrapCSS(){
    wp_enqueue_style('bootstrapCSS',plugins_url('admin/bootstrap/css/bootstrap.min.css',__FILE__));
}
add_action('admin_enqueue_scripts','AgregarBootstrapCSS');

# Muestra el formulario de contacto en las páginas en donde se le indique el shortcode
# Si se hace clic en enviar en el formulario, se inserta dicha información de la tabla
function MostrarContactForm(){
    global $wpdb;
    $_short = new shortcodedlr;
    $tabla = "{$wpdb->prefix}contacto_dlr";
    $tablatemaselected = "{$wpdb->prefix}contacto_dlr_selected_theme";
    $query = "SELECT * FROM $tablatemaselected";
    if(!empty($query)){
        $theme_selected = $wpdb->get_results($query,ARRAY_A);
    }
    if(isset($_POST['enviarContacto'])){
        $insercion2 = [
            'id' => null,
            'Nombre' => $_POST['nombrecontacto'],
            'email' => $_POST['emailcontacto'],
            'mensaje' => $_POST['mensajecontacto']
        ];
        $wpdb->insert($tabla, $insercion2);
    }
    if($theme_selected[0]['Nombre'] == 'Tema1'){
        $html = $_short->FormularioContacto1();
    }elseif($theme_selected[0]['Nombre'] == 'Tema2'){
        $html = $_short->FormularioContacto2();
    }elseif($theme_selected[0]['Nombre'] == 'Tema3'){
        $html = $_short->FormularioContacto3();
    }
    return $html;
}

# Registro de shortcode y retorno de la funcion anterior
add_shortcode('CNTC_DLR', 'MostrarContactForm');
