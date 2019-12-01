<?php global $options,$client_paied_progs;
if(!isset($_COOKIE['edu_user'])){
  wp_redirect('/login/');
  exit;
}
/**
 * Template Name: EDU Главная 
 */

locate_template('pronarkology_modul/header.php', true); 

$sedu = $_SESSION['sess_edu_user'];
$client_paied_progs = array();
if(is_serialized($sedu->client_paied_progs))
  $client_paied_progs = unserialize($sedu->client_paied_progs);
  
locate_template('pronarkology_modul/inc/header-content.php', true); 
locate_template('pronarkology_modul/inc/breadcrumbs-content.php', true); 

locate_template('pronarkology_modul/main.php', true); 

locate_template('pronarkology_modul/inc/footer-content.php', true);
locate_template('pronarkology_modul/footer.php', true); 

?>