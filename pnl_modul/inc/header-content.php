<?php global $options;
	//var_dump($_SERVER["REMOTE_ADDR"]);
	//city
	if(empty($_SESSION['the_get_city_name'])){
		
		require_once(get_template_directory().'/lib/geoip/SxGeo.php');
		$sxGeo = new \IgI\SypexGeo\SxGeo(get_template_directory().'/lib/geoip/data/SxGeoCity.dat');
		$the_get_city = $sxGeo->getCityFull($_SERVER["REMOTE_ADDR"]);
		
		if(is_array($the_get_city)){
			if(preg_match('/область/is',$the_get_city['region']['name_ru'])){
				$the_get_city_name = $the_get_city['city']['name_ru'];
			}
			else {
				$the_get_city_name = $the_get_city['region']['name_ru'];
			}
		}
		$_SESSION['the_get_city_name'] = $the_get_city_name;
	}
	
	$city_id_general = $options['header'][0]['city-default'];
	if(isset($_COOKIE["city_name"]) && $_COOKIE["city_name"] != ''){
		$_SESSION['the_get_city_name'] = $_COOKIE["city_name"];
		}else{
		if(empty($_SESSION['the_get_city_name'])){
			
			require_once(get_template_directory().'/lib/geoip/SxGeo.php');
			$sxGeo = new \IgI\SypexGeo\SxGeo(get_template_directory().'/lib/geoip/data/SxGeoCity.dat');
			$the_get_city = $sxGeo->getCityFull($_SERVER["REMOTE_ADDR"]);
			
			if(is_array($the_get_city)){
				if(preg_match('/область/is',$the_get_city['region']['name_ru'])){
					$the_get_city_name = $the_get_city['city']['name_ru'];
				}
				else {
					$the_get_city_name = $the_get_city['region']['name_ru'];
				}
			}
			$_SESSION['the_get_city_name'] = $the_get_city_name;
		}
	}
	
	$city_term = get_term_by('name', $_SESSION['the_get_city_name'], 'category');
	$city_id = $city_term == false ? $city_id_general : $city_term->term_id;

	$sub_cats = get_categories( array(
	'show_count' => 0,
	'pad_counts' => 0,
	'hierarchical' => 1,
	'hide_empty' => 0,
  'parent' => 0,
  'exclude' => 1
	));
  
 $get_menu_cats = get_categories( array(
  'show_count' => 0,
  'pad_counts' => 0,
  'hierarchical' => 1,
  'hide_empty' => 0,
  'child_of' => $city_id,
  'orderby' => 'ID'
  ));
 
	if( $sub_cats ){
		foreach( $sub_cats as $cat ){
			if($cat->name == $_SESSION['the_get_city_name'])
			$city_select = '<option value="'.$cat->name .'">'. $cat->name .'</option>';

		}
	}
	$city_selects = $city_select;
	if( $sub_cats ){
		foreach( $sub_cats as $cat ){
			if($cat->term_id != $city_id)
			$city_selects .= '<option value="'.$cat->name .'">'. $cat->name .'</option>';
		}
	}
	//logo
	$logo_img = '';
	if( $custom_logo_id = get_theme_mod('custom_logo') ){
		$logo_img = wp_get_attachment_image( $custom_logo_id, 'full', false, array(
		'class'    => 'custom-logo',
		'alt' => 'logo',
		) );
	}
?>
<div class="wrapper-all">
	
	<!--header-->
	<div class="wrapper header">
		
		<div class="panel">
			<div class="container">
				<div class="burger-menu">
					<span></span>
					<span></span>
					<span></span>
				</div>
				<?php 
					wp_nav_menu( array(
					'container_class'=>'panel-menu-container',
					'menu_class'=>'panel-menu revealator-once revealator-slidedown',
					'theme_location'=>'top_menu'
					) );
				?>
				
				<form action="/" method="get" class="search-form">
					<input type="text" class="input-search" name="s" placeholder="Поиск">
					<button class="btn-search" type="submit"></button>
				</form>
			</div>
		</div>
		
		<div class="info">
			<div class="container">
				<a href="/" class="logo revealator-once revealator-slideright">
					<span class="img"><?php echo $logo_img; ?></span>
					<span class="text">
						<span><?php bloginfo('name');?></span>
						<?php bloginfo('description');?>
					</span>
				</a>
				<div class="phone revealator-once revealator-slideleft">
					<?php echo $options['header'][0]['phone-text']?> <br>
					<a href="tel:<?php echo $options['phone']?>"><?php echo $options['phone']?></a>
				</div>
				<div class="city revealator-once revealator-slideleft">
					<span class="revealator-once revealator-slideleft"> <?php echo $options['header'][0]['city-text']?> <br></span>
					<select class="dropdown js-example-basic-single" name="state">
						<?php
							echo $city_selects;
						?>
					</select>
				</div>
				<div class="btn-container revealator-once revealator-slideleft">
					<a href="#" class="btn btn-primary"><?php echo $options['header'][0]['btn-text']?></a>
				</div>
			</div>
		</div>
		
		<div class="menu">
			<div class="container">
				<div class="burger-menu">
					<span></span>
					<span></span>
					<span></span>
				</div>
				<div class="pro-menu-container">
					<div class="close"></div>
					<ul class="pro-menu">
            <?php if($get_menu_cats) foreach($get_menu_cats as $sbc){?>
						<li class="menu-item-has-children"><a href="<?php echo get_category_link($sbc->term_id); ?>"><?php echo $sbc->name; ?></a></li>
						<?php } ?>
					</ul>
				</div>
			</div>
		</div>
		
	</div>
