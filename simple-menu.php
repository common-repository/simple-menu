<?php
/*
Plugin Name: Simple Menu
Plugin URI: http://www.chefblogger.me
Description: Hide all non-essential and confusing Items from Admin Menu. 
Version: 1.0
Author: Eric-Oliver M&auml;chler
Author URI: http://www.ericmaechler.com
Requires at least: 4.0.1
Tested up to: 4.9
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


//Menupunkte ausblenden
 add_action( 'admin_menu', 'dashboard_remove_menu_pages' );  
  
function dashboard_remove_menu_pages() { 
 //remove_menu_page('edit.php'); // Entfernt den Menüpunkt Artikel
 //remove_menu_page('upload.php'); // Entfernt den Menüpunkt Mediathek
 //remove_menu_page('edit.php?post_type=page'); // Entfernt den Menüpunkt Seiten
 remove_menu_page('themes.php'); // Entfernt den Menüpunkt Design
 remove_menu_page('plugins.php'); // Entfernt den Menüpunkt Plugins
 remove_menu_page('users.php'); // Entfernt den Menüpunkt Benutzer
 remove_menu_page('tools.php'); // Entfernt den Menüpunkt Werkzeuge
 remove_menu_page('edit-comments.php'); // Entfernt den Menüpunkt Kommentare
 remove_menu_page('options-general.php');  // Entfernt den Menüpunkt Einstellungen
 
 remove_menu_page('admin.php?page=wpcf7');  // Entfernt den Menüpunkt Contact Form 7
 remove_menu_page('admin.php?page=wpseo_dashboard');  // Entfernt den Menüpunkt WPSEO
 remove_menu_page('admin.php?page=aiowpsec');  // Entfernt den Menüpunkt All In One WordPress Security and Firewall Plugin

 
}

function simplemenu_dashboard_widget() {
     global $wp_meta_boxes;
     unset(
          $wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins'],
          $wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary'],
          $wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']
     );
     wp_add_dashboard_widget( 'dashboard_custom_feed', 'Simple Menu' , 'simplemenu_dashboard_custom_feed_output' ); 
}

function simplemenu_dashboard_custom_feed_output() {
     echo '<div class="rss-widget">';
     echo 'Wenn sie dieses Plugin deaktivieren möchten, dann gehen Sie einfach in die <a href="plugins.php">Plugin Administration</a> und deaktivieren sie das Simple Menu Plugin. Sobald sie das deaktiviert werden, sehen sie wieder alle Menupunkte.';
     echo '</div>';
}
add_action('wp_dashboard_setup', 'simplemenu_dashboard_widget');



?>