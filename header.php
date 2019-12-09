<?php global $options;
$options = get_fields('options');
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
  <title><?php wp_title(); ?></title>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" type="image/png" href="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/img/favicon.png" />
  <link rel="stylesheet" href="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/css/style.css?ver=2.1"/>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>