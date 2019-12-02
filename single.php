<?php global $options;
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

	locate_template('pnl_modul/header.php', true); 
	locate_template('pnl_modul/inc/header-content.php', true); 
	locate_template('pnl_modul/inc/breadcrumbs-content.php', true); 
	
	locate_template('pnl_modul/single-center.php', true); 
	
	locate_template('pnl_modul/inc/footer-content.php', true);
	locate_template('pnl_modul/footer.php', true); 
	
?>