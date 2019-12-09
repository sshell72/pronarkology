<?php 
	global $options,$wp_query;
	
	the_post(); 
	
	$comments = get_commets_count($post->ID);
	
	$raiting_ball = calculate_rating($post->ID);
	$raiting_ball_percent = 100/5*$raiting_ball;
	
	$parametr_post = get_parametr_post($post->ID);
	
	$category_name = explode('/',$wp_query->query_vars['category_name']);
	$category_post = end($category_name);
	
	$lat = get_field('lat') ? get_field('lat') : '55.75';
	$lon = get_field('lon') ? get_field('lon') : '37.63';
?>
<!--block-13-->
<div class="wrapper block-13">
	<div class="container">
		
		<!--items-->
		<div class="item">
			<div class="row">
				
				<div class="col-lg-3 img-container revealator-once revealator-slideright">
					<div class="img">
						<img src="<?php echo get_field('фото_фронт')?>" alt="alt">
						<div class="num"><span>№</span><?php echo get_field('nomer_centra')?></div>
					</div>
				</div>
				
				<div class="col-lg-9 content revealator-once revealator-slideleft">
					<div class="i-head">
						<div class="title"><?php the_title()?></div>
						<div class="rating-container">
							<div class="left">
								<div class="rating">
									<div class="percentage" style="width: <?php echo $raiting_ball_percent?>%;"></div>
								</div>
								<div class="info">Проголосовали: <?php echo $comments;?></div>
							</div>
							<div class="right">
								<span><?php echo $raiting_ball?></span>
							</div>
						</div>
					</div>
					<div class="description">
						<?php the_content()?>
					</div>
					<div class="panel">
						
						<div class="phone">
							<span>Телефон:</span>
							<?php echo $parametr_post['tel_center'];?>
						</div>
						<div class="adres">
							<span>Адрес:</span>
							<?php echo $parametr_post['adress_center'];?>
						</div>
						<div class="email">
							<span>Эл.почта:</span>
							<?php echo $parametr_post['email_center'];?>
						</div>
						<div class="info">
							<?php echo $parametr_post['info_center'];?>
						</div>
					</div>
					<div class="form">
						<label for="">Оставить заявку:</label>
						<input type="tel" class="form-control phone" placeholder="Ваш телефон">
						<button class="btn btn-primary">Отправить</button>
					</div>
				</div>
				
			</div>
		</div>
		<!--end items-->
	</div>
</div>

<!--block-14-->
<div class="wrapper block-14">
	<div class="container">
		<div class="block-title revealator-once revealator-slideright"><span><span>Описание центра</span></span></div>
		<p class="revealator-once revealator-slideleft"><?php the_field('описание_центра')?></p>
		<strong>В нашем наркологическом центре:</strong>
		<ul class="revealator-once revealator-slideright">
			<?php $vnncs = get_field('в_нашем_наркологическом_центре');
				foreach($vnncs as $vn){
					echo '<li>'.$vn['текст'].'</li>';
				}
			?>
		</ul>
	</div>
</div>

<!--block-15-->
<div class="wrapper block-15">
	<div class="container">
		<div class="block-title revealator-once revealator-slideright">
		<span><span>Направления деятельности</span></span></div>
		<div class="row">
			<?php $nds = get_field('направления_деятельности');
				foreach($nds as $nd){
					echo '<div class="col-lg-3 col-md-6">
					<div class="item revealator-once revealator-slideup">
					<div class="img"><img src="'.$nd['фото'].'" alt="alt"></div>
					<div class="text">'.$nd['текст'].'</div>
					</div>
					</div>';
				}
			?>
			
		</div>
		<div class="text-center revealator-once revealator-slidedown">
			<a href="#callback" class="btn btn-primary" data-fancybox>Задать вопрос специалисту</a>
		</div>
	</div>
</div>

<!--block-3-->
<div class="wrapper block-3">
	<div class="container">
		<div class="title revealator-once revealator-slideright"><span><span>Наши преимущества</span></span></div>
		<div class="row justify-content-center">
			<?php $nds = get_field('наши_преимущества');
				foreach($nds as $nd){
					echo '<div class="col-xl-2 col-md-4 item-container revealator-once revealator-slideup revealator-delay1">
					<div class="img"><img src="'.$nd['фото'].'" alt="alt"></div>
					<div class="title">'.$nd['текст'].'</div>
					</div>';
				}
			?>
		</div>
	</div>
</div>
</div>

<!--block-16-->
<div class="wrapper block-16">
	<div class="container">
		<div class="block-title revealator-once revealator-slideright"><span><span>Условия проживания</span></span>
		</div>
		<div class="slider">
			<?php $nds = get_field('условия_проживания');
				foreach($nds as $nd){
					echo '<div class="slide revealator-once revealator-slideup">
					<a href="/img/block-16-1.jpg" class="item" data-fancybox="block-16">
					<div class="img" style="background-image:url('.$nd['фото'].');"></div>
					</a>
					</div>';
				}
			?>
			
		</div>
	</div>
</div>

<!--block-17-->
<div class="wrapper block-17">
	<div class="container">
		<div class="block-title revealator-once revealator-slideright">
		<span><span>Расположение клиник из нашего каталога</span></span></div>
	</div>
	<div class="map-container">
		<div id='map' class="map" data-lat="<?php echo $lat?>" data-lon="<?php echo $lon?>"  style="width: 100%; height: 560px;"></div>
		<!--<div class="map" width="100%" height="560px">
			<iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3ANDni5tAumOYweG2UobCZgHulqKqe-OkF&amp;source=constructor&amp;scroll=false" width="100%" height="560" frameborder="0"></iframe>
		</div>-->
		
		<div class="map-info">
			<div class="container">
				<div class="white-container revealator-once revealator-slideright">
					<h3>Контакты:</h3>
					<div class="phone">
						<span>Телефон:</span>
						<?php $repeaters = get_field('телефон');
							$i = 0;
							$count_repeaters = count($repeaters);
							foreach($repeaters as $rp){
								$i++;
								$span_tel = $count_repeaters > $i ? '<span class="dot">&nbsp;</span>' : '<br>';
								echo $rp['текст'].$span_tel;
							}
						?>
					</div>
					<div class="adres">
						<span>Адрес:</span>
						<?php echo $parametr_post['adress_center']; ?>
					</div>
					<div class="email">
						<span>Эл.почта:</span>
						<?php echo $parametr_post['email_center']; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!--block-18 Отзывы реальных людей-->
<div class="wrapper block-18">
	<div class="container">
		<div class="block-title revealator-once revealator-slideright"><span><span>Отзывы реальных людей</span></span>
		</div>
		<?php
			$num = $options["количество_комментариев"];
			$args = array(
			'post_id' => $post->ID,
			'number' => $num
			);
			
			$coment_list_main = get_coment_list_main($args);
			echo $coment_list_main;
			
			if($comments > $num){
			?>
			<div id='reviev-but' class="text-center revealator-once revealator-slidedown">
				<button id="download_more_reviews" class="btn btn-primary" data-offsets='<?php echo $num?>' data-offset='<?php echo $num?>'>Загрузить еще отзывы<img src="<?php bloginfo( 'stylesheet_directory' ); ?>/pnl_modul/assets/img/loading.gif" id="hp_loading" alt=""></button>
			</div>
		<?php }?>
	</div>
</div>

<!--block-19-->
<div class="wrapper block-19">
	<form action="/" method="post" id="commentform" data-id="<?php echo $post->ID?>">
		<div class="container">
			<div class="block-title revealator-once revealator-slideright"><span><span>Оставить отзыв</span></span></div>
			<div class="row">
				
				<div class="col-md-4">
					<div class="form-group revealator-once revealator-slideright">
						<input id="name" name="name"  type="text" class="form-control" placeholder="Ваше имя" required >
					</div>
					<div class="form-group revealator-once revealator-slideright">
						<input id="email" name="email"  type="text" autocomplete="off" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" class="form-control" placeholder="Эл. почта" required >
					</div>
					<div class="form-group revealator-once revealator-slideright">
						<div class="custom-file">
							<input name="inputGroupFile01"  type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
							<label class="custom-file-label" for="inputGroupFile01">Прикрепить фото</label>
							<div class="red-text foto-limit"><p></p></div>
						</div>
						<div class="red-text size-limit"><p><?php echo $options['превышен_размер_фото']?></p></div>
						<div class="red-text type-limit"><p><?php echo $options['тип_фото_не_поддерживается']?></p></div>
					</div>
					<div class="form-group revealator-once revealator-slideright">
						<label for="">Ваша оценка:</label>
						<div class="rating2">
							<span>&starf;</span><span>&starf;</span><span>&starf;</span><span>&starf;</span><span>&starf;</span>
						</div>
						<input id="rating_review" name="rating_review"  type="text" required >
					</div>
					<div class="captcha_wrapper">
						<script src="https://www.google.com/recaptcha/api.js"></script>
						<div class="g-recaptcha" data-sitekey="6Lexd3UUAAAAALsoupiAJbA6L16FxM7jiWV-S38z"></div>
						<div class="red-text robot-limit"><p><?php echo $options['не_заполнили_робот']?></p></div>
					</div>
				</div>
				<div class="col-md-8">
					<div class="form-group revealator-once revealator-slideleft">
						<input id="title_review" name="title_review"   type="text" class="form-control" placeholder="Заглавие отзыва" required >
					</div>
					<div class="form-group revealator-once revealator-slideleft">
						<textarea name="text_review" id="text_review" cols="30" rows="10" class="form-control" placeholder="Текст отзыва" required value="Текст комментария"></textarea>
						<div class="red-text character-limit"><p><?php echo $options['1000_символов']?></p></div>
					</div>
					
					<div class="form-group revealator-once revealator-slideleft">
						<button type="submit" name="submit" id="submit" class="btn btn-primary">Добавить отзыв<img src="<?php bloginfo( 'stylesheet_directory' ); ?>/pnl_modul/assets/img/loading.gif" id="hp_loading" alt=""></button>
					</div>
				</div>
				
			</div>
		</div>
	</form>
</div>

<!--block-12-->
<div class="wrapper block-12">
	<div class="container">
		<div class="row head">
			<div class="col-md-12">
				<div class="block-title revealator-once revealator-slideright"><span><span>Рекомендуемые клиники</span></span>
				</div>
			</div>
		</div>
		<!--items-->
		<?php 
			$args = array(
			'post__not_in' => [$post->ID],
			'posts_per_page' => 4,
			'meta_query' => array(
			'relation'     => 'AND',
			'special_accommodation_clause' => array(
			'key'   => 'special_accommodation',
			'value' => 1
			),
			'raiting_clause' => array(
			'key'     => 'raiting',
			), 
			),
			'orderby' => array(
			'special_accommodation_clause' => 'DESC',
			'raiting_clause' => 'DESC',
			'comment_count'=> 'DESC'
			)
			);	
			$data_array = get_posts_args($args);
			$data_array['post_id'][] = $post->ID;
			$args = array(
			'post__not_in' => $data_array['post_id'],
			'category_name' => $category_post,
			'posts_per_page' => $data_array['posts_per_page'],
			'meta_query' => array(
			'raiting_clause' => array(
			'key'     => 'raiting',
			), 
			),
			'orderby' => array(
			'raiting_clause' => 'DESC',
			'comment_count'=> 'DESC'
			)
			);	
			get_posts_args($args);
		?>
		<!--end items-->
		
	</div>
</div>

