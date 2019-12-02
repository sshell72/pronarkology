<?php global $options;
var_dump($_SERVER);
	//city
	$city_id_general = get_cat_ID('Москва');
	if(isset($_COOKIE["city_name"])){
		$city_id = $_COOKIE["city_name"];
		}else{
		$city_id = (isset($_SERVER['GEOIP_CITY']))
		? get_cat_ID($_SERVER['GEOIP_CITY'])
		: $city_id_general;
	}
	$parent_id = get_cat_ID('Город');
	
	$sub_cats = get_categories( array(
	'parent' => $parent_id,
	'hide_empty' => 0
	));
	if( $sub_cats ){
		foreach( $sub_cats as $cat ){
			if($cat->term_id == $city_id)
			$city_select = '<option value="'.$cat->term_id .'">'. $cat->name .'</option>';
		}
	}
	$city = get_cat_name( $city_id );
	$city_selects = $city_select;
	if( $sub_cats ){
		foreach( $sub_cats as $cat ){
			if($cat->term_id != $city_id)
			$city_selects .= '<option value="'.$cat->term_id .'">'. $cat->name .'</option>';
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
				<div class="city">
					<span class="revealator-once revealator-slideleft"> <?php echo $options['header'][0]['city-text']?> <br></span>
					<div class="drop revealator-once revealator-slideleft"><?php echo $city;?></div>
					<ul class="dropdown">
						<?php
							$parent_id = get_cat_ID('Город');
							$sub_cats = get_categories( array(
							'parent' => $parent_id,
							'hide_empty' => 0
							));
							if( $sub_cats ){
								foreach( $sub_cats as $cat ){
									echo '<li><a href=' . get_category_link( $cat->term_id ) . '>'. $cat->name .'</a></li>';
								}
							}
						?>
					</ul>
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
						<li class="menu-item-has-children"><a href="#">Наркологические клиники</a>
							<ul class="sub-menu">
								<li><a href="#">Что такое наркомания?</a></li>
								<li><a href="#">Какие признаки и симптомы у наркомании?</a></li>
								<li><a href="#">Как вылечить наркоманию?</a></li>
								<li><a href="#">Как реализовать принудительное лечение наркомании?</a></li>
								<li><a href="#">Как выбрать центр для лечения наркомании?</a></li>
							</ul>
						</li>
						<li class="menu-item-has-children"><a href="#">Реабилитационные центры</a>
							<ul class="sub-menu">
								<li><a href="#">Что такое наркомания?</a></li>
								<li><a href="#">Какие признаки и симптомы у наркомании?</a></li>
								<li><a href="#">Как вылечить наркоманию?</a></li>
								<li><a href="#">Как реализовать принудительное лечение наркомании?</a></li>
								<li><a href="#">Как выбрать центр для лечения наркомании?</a></li>
							</ul>
						</li>
						<li class="menu-item-has-children"><a href="#">Лечение наркомании</a>
							<ul class="sub-menu">
								<li><a href="#">Что такое наркомания?</a></li>
								<li><a href="#">Какие признаки и симптомы у наркомании?</a></li>
								<li><a href="#">Как вылечить наркоманию?</a></li>
								<li><a href="#">Как реализовать принудительное лечение наркомании?</a></li>
								<li><a href="#">Как выбрать центр для лечения наркомании?</a></li>
							</ul>
						</li>
						<li class="menu-item-has-children"><a href="#">Лечение алкоголизма</a>
							<ul class="sub-menu">
								<li><a href="#">Что такое наркомания?</a></li>
								<li><a href="#">Какие признаки и симптомы у наркомании?</a></li>
								<li><a href="#">Как вылечить наркоманию?</a></li>
								<li><a href="#">Как реализовать принудительное лечение наркомании?</a></li>
								<li><a href="#">Как выбрать центр для лечения наркомании?</a></li>
							</ul>
						</li>
						<li class="menu-item-has-children"><a href="#">Лечение игромании</a>
							<ul class="sub-menu">
								<li><a href="#">Что такое наркомания?</a></li>
								<li><a href="#">Какие признаки и симптомы у наркомании?</a></li>
								<li><a href="#">Как вылечить наркоманию?</a></li>
								<li><a href="#">Как реализовать принудительное лечение наркомании?</a></li>
								<li><a href="#">Как выбрать центр для лечения наркомании?</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</div>
		
	</div>
