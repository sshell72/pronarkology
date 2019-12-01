<?php global $options;
	$options = get_fields('options');
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="<?php bloginfo( 'stylesheet_directory' ); ?>/pnl_modul/assets/img/favicon.png"/>
		<title><?php wp_title(); ?></title>
		
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_directory' ); ?>/pnl_modul/assets/css/style.css?ver=2.1"/>
		<?php wp_head(); ?>
	</head>
<body <?php body_class(); ?>>