<?php global $options;
	/**
		* Template Name: PNL Главная 
	*/
	
	locate_template('pnl_modul/header.php', true); 
	locate_template('pnl_modul/inc/header-content.php', true); 
	//locate_template('pnl_modul/inc/breadcrumbs-content.php', true); 
	
	locate_template('pnl_modul/main.php', true); 
	
	locate_template('pnl_modul/inc/footer-content.php', true);
	locate_template('pnl_modul/footer.php', true); 
	
?>