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
  <meta name="mailru-verification" content="956d492e06c9071d" />
  <meta name="yandex-verification" content="4b6585675f098407" />
	<?php wp_head(); ?>
  <script type="text/javascript">!function(){var t=document.createElement("script");t.type="text/javascript",t.async=!0,t.src="https://vk.com/js/api/openapi.js?162",t.onload=function(){VK.Retargeting.Init("VK-RTRG-398814-etpp5"),VK.Retargeting.Hit()},document.head.appendChild(t)}();</script><noscript><img src="https://vk.com/rtrg?p=VK-RTRG-398814-etpp5" style="position:fixed; left:-999px;" alt=""/></noscript>
</head>
<body <?php body_class(); ?>>