<?php	
	
	add_image_size( 'single_min', 300, 200, true );
	
	add_theme_support( 'post-thumbnails' );
	
	add_action( 'category_add_form_fields', 'add_custom_form_field' );
	// Добавим произвольное поле в форму создания термина
	function add_custom_form_field( $term ) {
	?>
	<div class="form-subcategories">
		<label for="created-subcategories">
			<?php _e( 'Cоздать подкатегории' ); ?>
		</label>
		<input id="created-subcategories" type="checkbox" name="created_subcategories" value="1">
		<p><?php _e( 'Да' ); ?></p>
	</div>
	<?php
	}
	
	add_action( 'created_category', 'created_subcategories' );
	function created_subcategories( $term_id ) {
		
		if ( ! isset( $_POST['created_subcategories'] ) || $_POST['created_subcategories'] != 1 ) {
			return;
		}
		unset($_POST['created_subcategories']);
		$terms_arr = array('Наркологические клиники',
		'Реабилитационные центры',
		'Лечение наркомании',
		'Лечение алкоголизма',
		'Лечение игромании');
		
		foreach($terms_arr as $term)
		wp_insert_term( $term, 'category', array(
    'description' => '', 
    'parent'      => $term_id,
    'slug'        => '',
		) );
		
		return $term_id;
	}		
	
	register_nav_menus(array(
	'top_menu'    => 'Верхнее меню',  
	'bottom_menu' => 'Нижнее меню'     
	));
	
	function pnl_setup() {
		add_theme_support( 'custom-logo' );
	}
	add_action( 'after_setup_theme', 'pnl_setup' );
	
	//для хлебных крошек	
	function get_page_bread($id, $parent_id, $separator = '/'){
		global $wpbd, $wp_query;
		
		if($parent_id != 0 ){
			
			while($parent_id != 0){
				$the_post = get_post($parent_id);
				$the_title = $the_post->post_title;
				$parent_id = $the_post->post_parent;
				$new_link = '<a href="'.get_page_link($the_post->ID).'" title="'.$the_post->post_title.'">'.get_the_title($the_post->ID).'</a>';
				$the_link = str_replace('><','>'.$new_link.'<',$separator).$the_link;
			}
			
		} 
		
		$start_link = '<a href="'.home_url().'" title="Главная">Главная</a>';
		$start_link = str_replace('><','>'.$start_link.'<',$separator);
		$the_link = $start_link.$the_link;
		
		$hid = get_query_var('hid');
		$hsid = get_query_var('hsid');
		
		if(isset($hsid) && $hsid != '' && in_array($id,array('50','121'))){
			$the_post = get_post($id);
			$the_kurs_title = get_field('general',$hid);
			$the_kurs_title = $the_kurs_title['general_kurs_name'];
			$new_link = '<a href="'.get_page_link($the_post->ID).'hid/'.$hid.'/" title="'.$the_post->post_title.'">'.$the_post->post_title.' - "'.$the_kurs_title.'"'.'</a>';
			$the_link .= str_replace('><','>'.$new_link.'<',$separator);
		}
		echo $the_link;
	}
	
	//еще отзывы
	add_action('wp_ajax_download_more_reviews', 'download_more_reviews');
	add_action('wp_ajax_nopriv_download_more_reviews', 'download_more_reviews');
	function download_more_reviews(){
		global $wpdb;
		
		$options = get_fields('options');
		
		extract($_POST);
		
		$comments = get_commets_count($post_id);
		
		$args = array(
    'post_id' => $post_id,
    'offset' => $offset,
    'number' => $options["количество_комментариев"]
		);
		
		$coment_list_main = get_coment_list_main($args);
		
		
		echo json_encode(array(
    'error' => false,
    'comments' => (int)$comments,
    'offset' => (int)$offset,
    'coment_list_main' => $coment_list_main
		));
		
		die();
	}
	
	//новый отзыв
	add_action('wp_ajax_add_comment_send_request', 'add_comment_send_request');
	add_action('wp_ajax_nopriv_add_comment_send_request', 'add_comment_send_request');
	function add_comment_send_request(){
		global $wpdb,$options;
		
		$options = get_fields('options');
		
		if(empty($_POST["g-recaptcha-response"]) && !check_google_captcha($_POST["g-recaptcha-response"])){	
			echo json_encode(array(
			'error' => true,
			'info_title' => '!!!',
			'info_text' => 'Рекаптча не пройдена'
			));
			die();
		}
		
		extract($_POST);
		
		$args = array(
		'post_id' => $post_id
		);
		
		if( $comments = get_comments( $args ) ){
			foreach( $comments as $comment ){
				if(/* $comment->comment_author_IP == $_SERVER['REMOTE_ADDR'] || */ $email == $comment->comment_author_email){
					echo json_encode(array(
					'error' => true,
					'info_title' => '!!!',
					'info_text' => $options["оставляли_отзыв_ранее"]	
					));
					die();
				}
			}
		}
		
		if(empty($antibot)){
			echo json_encode(array(
			'error' => true,
			'antibot' => 'antibot'	
			));
			die();
		} 
		
		$data = [
		'comment_post_ID'      => strip_tags($post_id, '<br><p>'),
		'comment_author'       => strip_tags($name, '<br><p>'),
		'comment_author_email' => $email,
		'comment_content'      => strip_tags($text_review, '<br><p>'),
		'comment_author_IP'    => $_SERVER['REMOTE_ADDR'],
		'comment_approved'     => 0,
		'comment_meta'         => array(
    'rating_review' => strip_tags($rating_review, '<br><p>'),
    'title_review' 	=> strip_tags($title_review, '<br><p>')
		)
		];	
		$wp_insert_comment = wp_insert_comment( wp_slash($data) );
		
		if($wp_insert_comment){
			$home = get_template_directory();
			$home_uri = get_template_directory_uri();
			$dir = $home . "/img";
			if (!file_exists($dir)){
				mkdir($dir);
			}
			$dir = $home . "/img/comments";
			if (!file_exists($dir)){
				mkdir($dir);
			}
			
			
			if($_FILES){
				$filename=$_FILES['img']['name'];
				$filetype=$_FILES['img']['type'];
				$filename = strtolower($filename);
				$filetype = strtolower($filetype);
				$tmp_name = $_FILES["img"]["tmp_name"];
				$file_ext = pathinfo($filename, PATHINFO_EXTENSION);
				
				if($filetype == 'image/jpeg' || $filetype == 'image/png' || $filetype == 'image/jpg') {
					$whitelist = array("jpeg","png","jpg"); 
					if (in_array($file_ext, $whitelist)){
						$name = $wp_insert_comment.'.'.$file_ext;
						$res = move_uploaded_file($tmp_name, "$dir/$name");
						//масштабируем и обрезаем
						$srcc = "$dir/$name";
						$crop = true;
						$zoom = false;
						
						if($file_ext == 'jpg' || $file_ext == 'jpeg')
						$src = imagecreatefromjpeg($srcc);
						else
						$src = imagecreatefrompng($srcc);
						$srcWidth = imagesx($src);
						$srcHeight = imagesy($src);
						
						$maxWidth = 80;
						$maxHeight = 80;
						
						$k = $crop ? min($srcHeight/$maxHeight, $srcWidth/$maxWidth) :  max($srcHeight/$maxHeight, $srcWidth/$maxWidth); 
						$k = !$zoom && $k < 1 ? 1 : $k; 
						
						$xDiff = $srcWidth/$k - $maxWidth > 0 ? $srcWidth/$k - $maxWidth : 0;  
						$yDiff = $srcHeight/$k - $maxHeight > 0 ? $srcHeight/$k - $maxHeight: 0;
						$dst = imagecreatetruecolor($srcWidth/$k-$xDiff, $srcHeight/$k-$yDiff);
						if($file_ext == 'jpg' || $file_ext == 'jpeg'){
							imagecopyresampled($dst, $src, 0, 0, $xDiff/2*$k, $yDiff/2*$k, $srcWidth/$k-$xDiff, $srcHeight/$k-$yDiff, $srcWidth-$xDiff*$k, $srcHeight-$yDiff*$k);
							imagejpeg($dst, "$dir/$name", 100);
							}else{
							imagecopyresized($dst, $src, 0, 0, $xDiff/2*$k, $yDiff/2*$k, $srcWidth/$k-$xDiff, $srcHeight/$k-$yDiff, $srcWidth-$xDiff*$k, $srcHeight-$yDiff*$k); 
							$result = imagepng($dst, "$dir/$name");
						}
						//масштабируем и обрезаем end
						if($res == true){
							add_comment_meta( $wp_insert_comment, 'foto_review', "$name");
						}
					}
				}
			} 
		}
		
		if($wp_insert_comment){
			$result = array(
			'info_title' => 'Спасибо!',
			'info_text' => $options["успешный_отзыв"],
			'error' => false
			);
			}else{
			$result = array(
			'info_title' => 'Ошибка!',
			'info_text' => 'Ваш отзыв не был добавлен!',
			'error' => true
			);
		}
		echo json_encode($result);
		
		die();
	}	
	
	
	//Add an edit option in comment edit screen  
	add_action( 'add_meta_boxes_comment', 'extend_comment_add_meta_box' );
	function extend_comment_add_meta_box() {
		add_meta_box( 'title', __( 'Дополнительные поля' ), 'extend_comment_meta_box', 'comment', 'normal', 'high' );
	}
	
	function extend_comment_meta_box ( $comment ) {
		$rating_review = get_comment_meta( $comment->comment_ID, 'rating_review', true );
		$title_review = get_comment_meta( $comment->comment_ID, 'title_review', true );
		wp_nonce_field( 'extend_comment_update', 'extend_comment_update', false );
	?>
  
  <p>
    <label for="title_review"><?php _e( 'Заглавие' ); ?></label>
    <input type="text" name="title_review" value="<?php echo esc_attr( $title_review ); ?>" class="widefat" />
	</p>
  <p>
    <label for="rating_review"><?php _e( 'Rating: ' ); ?></label>
    <span class="commentratingbox">
			<?php
				if( $commentrating = get_comment_meta( get_comment_ID(), 'rating_review', true ) ) {
					
					$commentrating = wp_star_rating( array (
					'rating' => $commentrating,
					'echo'=> false
					));
					
					echo $commentrating;
				}
			?>
		</span>
	</p>
	<p>
		<label for="foto_review"><?php _e( 'Фото' ); ?></label>
		<?php 
			$foto_review = get_comment_meta(get_comment_ID(), 'foto_review', true);
			if($foto_review){
				echo '<img class="img-comments-columns" src="'.get_template_directory_uri().'/img/comments/'.$foto_review.'" />'; 
				}else{
				echo '<img class="img-comments-columns" src="'.get_template_directory_uri().'/img/comments/75.png" />'; 
			}
		?>
	</p>
	<?php
	}
	
	// Update comment meta data from comment edit screen 
	
	add_action( 'edit_comment', 'extend_comment_edit_metafields' );
	function extend_comment_edit_metafields( $comment_id ) {
		if( ! isset( $_POST['extend_comment_update'] ) || ! wp_verify_nonce( $_POST['extend_comment_update'], 'extend_comment_update' ) ) return;
		
		if ( ( isset( $_POST['rating_review'] ) ) && ( $_POST['rating_review'] != '') ) : 
    $rating_review = wp_filter_nohtml_kses($_POST['rating_review']);
		update_comment_meta( $comment_id, 'rating_review', $rating_review );
		else :
		delete_comment_meta( $comment_id, 'rating_review');
		endif;	
		
		if ( ( isset( $_POST['title_review'] ) ) && ( $_POST['title_review'] != '') ) : 
		$title_review = wp_filter_nohtml_kses($_POST['title_review']);
		update_comment_meta( $comment_id, 'title_review', $title_review );
		else :
		delete_comment_meta( $comment_id, 'title_review');
		endif;
		
		if ( ( isset( $_POST['foto_review'] ) ) && ( $_POST['foto_review'] != '') ) : 
		$foto_review = wp_filter_nohtml_kses($_POST['foto_review']);
		update_comment_meta( $comment_id, 'foto_review', $foto_review );
		else :
		delete_comment_meta( $comment_id, 'foto_review');
		endif;
	}
	
	// Отображение содержимого метаполей в админке
	add_filter( 'comment_text', 'modify_extend_comment');
	function modify_extend_comment( $text ){
		global $post;
		
		if( $commenttitle = get_comment_meta( get_comment_ID(), 'title_review', true ) ) {
			$commenttitle = '<strong>' . esc_attr( $commenttitle ) . '</strong><br/>';
			$text = $commenttitle . $text;
		}
		
		if( $commentrating = get_comment_meta( get_comment_ID(), 'rating_review', true ) ) {
			
			$commentrating = wp_star_rating( array (
			'rating' => $commentrating,
			'echo'=> false
			));
			
			$text = $text . $commentrating;
		}
		
		return $text;
	}
	add_action( 'wp_enqueue_scripts', 'check_count_extend_comments' );
	function check_count_extend_comments(){
		global $post;
		
		if( isset($post) && (int)$post->comment_count > 0 ){
			require_once ABSPATH .'wp-admin/includes/template.php';
			add_action('wp_enqueue_scripts', function(){
				wp_enqueue_style('dashicons');
			});
			
			$stars_css = '
			.star-rating .star-full:before { content: "\f155"; }
			.star-rating .star-empty:before { content: "\f154"; }
			.star-rating .star {
			color: #0074A2;
			display: inline-block;
			font-family: dashicons;
			font-size: 20px;
			font-style: normal;
			font-weight: 400;
			height: 20px;
			line-height: 1;
			text-align: center;
			text-decoration: inherit;
			vertical-align: top;
			width: 20px;
			}
			';
			
			wp_add_inline_style( 'dashicons', $stars_css );
		}
		
	}
	
	//добовляем данные
	add_filter( 'get_avatar_url', 'filter_function_name_4548', 10, 3 );
	function filter_function_name_4548( $url, $id_or_email, $args ){
		$foto_review = get_comment_meta(get_comment_ID(), 'foto_review', true);
		if($foto_review){
			$url = get_template_directory_uri().'/img/comments/'.$foto_review;
		}
		return $url;
	}
	
	function get_coment_list_main($args){
		$comments = get_comments($args);
		if( $comments ){
			$coment_list_main = '';
			foreach( $comments as $comment ){
				$comment_ID = $comment->comment_ID;
				$comment_author = $comment->comment_author;
				$comment_content = $comment->comment_content;
				$rating_review = get_comment_meta( $comment_ID, 'rating_review', true );
				$rating_review_percentage = 100/5*(int)$rating_review;
				$title_review = get_comment_meta( $comment_ID, 'title_review', true );
				$foto_review = get_comment_meta($comment_ID, 'foto_review', true);
				$foto_review = $foto_review ? $foto_review : '75.png';
				$coment_list_main .= '<div class="item">
				<div class="left">
				<div class="img"><img src="'.get_template_directory_uri().'/img/comments/'.$foto_review.'" alt="alt"></div>
				<div class="info">
				<div class="title">
				'.$comment_author.'
				</div>
				<div class="rating-wr">
				<div class="num">'.$rating_review.'.0</div>
				<div class="rating">
				<div class="percentage" style="width: '.$rating_review_percentage.'%;"></div>
				</div>
				</div>
				</div>
				</div>
				<div class="right">
				<div class="title">'.$title_review.'</div>
				<div class="desc">
				'.$comment_content.'
				</div>
				</div>
				</div>';
			}
		}
		return $coment_list_main;
	}			
	
	//вычисляем рейтинг
	function calculate_rating($post_id){
		$args = array(
    'post_id' => $post_id,
		);
		$comments = get_comments($args);
		if( $comments ){
			$raiting_sum = 0;
			foreach( $comments as $comment ){
				$comment_ID = $comment->comment_ID;
				$rating_review = get_comment_meta( $comment_ID, 'rating_review', true );
				$raiting_sum = (int)$raiting_sum + (int)$rating_review;
			}
			
			$raiting_ball = $raiting_sum / count($comments);
			return $raiting_ball;
		}
	}
	
	function check_google_captcha($captcha_value)
	{
		// переменная в которую будем сохранять результат работы
		$data['result']='';
		
		$secret = '6Lexd3UUAAAAADfePYfnHfQg8_IjiNcK1hnUmxgE';
		
		require_once (get_template_directory().'/lib/recaptcha/autoload.php');
		if (isset($captcha_value)) {
			$recaptcha = new \ReCaptcha\ReCaptcha($secret);
			$resp = $recaptcha->verify($captcha_value, $_SERVER['REMOTE_ADDR']);
			if ($resp->isSuccess()){
				$data['result']= true;
				} else {
				$data['result']= false;
			}
		}
		return $data['result'];
	}			
	
	add_action( 'admin_head', 'action_function_name_4366' );
	function action_function_name_4366(){
		// action...
		echo '<style>
		body.edit-comments-php .avatar.photo{
    width:auto;
    height:80px;
    
		}
		.img-comments-columns{
    display: block;
		}
		</style>';
	}			
	
	function get_commets_count($post_id){
		$args = array(
    'post_id' => $post_id,
		'count' => true // возвращает только count
		);
		$comments = get_comments($args);
		return $comments;
	}		
	
	
	function trim_word_to_news($text,$num,$dop_act=true){ 
		$excerpt_length = $num;
		if($dop_act) $excerpt_more = ' ...';
		$words = preg_split("/[\n\r\t ]+/", $text, $excerpt_length + 1, PREG_SPLIT_NO_EMPTY);
		if ( count($words) > $excerpt_length ) {
			array_pop($words);
			$text = implode(' ', $words);
			$text = $text . $excerpt_more;
			} else {
			$text = implode(' ', $words);
		}
		
		echo $text;
	}
	
	//Удаляем category из УРЛа категорий
	add_filter( 'category_link', function($a){
		return str_replace( 'category/', '', $a );
	}, 99 );
	
	add_filter( 'post_link', function($a){
		return str_replace( 'category/', '', $a );
	}, 99 );
	
	function get_category_parents_for_bread( $id, $link = false, $separator = '/', $cur_cat_check, $nicename = false, $visited = array() ) {
		$chain = '';
		$parent = &get_category( $id );
		
		if(empty($id)){
			return $chain .= '<a href="/" class="home" title="Главная">Главная</a>' . $separator;
		} 
		
		if ( $nicename )
    $name = $parent->slug;
		else
    $name = $parent->name;
		
		
		
		if ( ( $parent->parent != $parent->term_id ) && !in_array( $parent->parent, $visited ) ) {
			$visited[] = $parent->parent;
			$chain .= get_category_parents_for_bread( $parent->parent, $link, $separator, '',$nicename, $visited );
		}
		
		if ( ($parent->term_id != $cur_cat_check))
    $chain .= '<a href="' . get_category_link($parent->term_id) . '" title="' . $parent->name . '">'.$name.'</a>' . $separator;
		
		else
    $chain .= '<b>'.$name.'</b>';
		return $chain;
	}
	
	function get_posts_args($args){
		
		$query = new WP_Query( $args );	
		
		$data_array['posts_per_page'] = 4-$query->post_count;
		
		// Цикл
		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
				$query->the_post();
				$parametr_post = get_parametr_post(get_the_ID());
				$data_array['post_id'][] = get_the_ID();
				$args = array(
				'post_id' => get_the_ID(),
				'count' => true // возвращает только count
				);
				$comments = get_comments($args);
				$raiting_ball = calculate_rating(get_the_ID());
				$raiting_ball_percent = 100/5*$raiting_ball;
				$img_list = !get_field('изображение_списка') ? $options['изображение_заглушка'] : get_field('изображение_списка');
				echo '<a href="'.get_permalink().'" class="item revealator-once revealator-slideup">
				<div class="row">
				
				<div class="col-lg-3 img-container">
				<div class="img">
				<img src="'.$img_list.'" alt="alt">
				<div class="num"><span>№</span>'.get_field('nomer_centra').'</div>
				</div>
				</div>
				
				<div class="col-lg-9 content">
				<div class="i-head">
				<div class="title">'.get_the_title().'</div>
				<div class="rating-container">
				<div class="left">
				<div class="rating">
				<div class="percentage" style="width: '.$raiting_ball_percent.'%"></div>
				</div>
				<div class="info">Проголосовали: '.$comments.'</div>
				</div>
				<div class="right">
				<span>'.$raiting_ball.'</span>
				</div>
				</div>
				</div>
				<div class="description">'.get_the_content().'
				</div>
				<div class="panel">
				<div class="phone">
				<span>Телефон:</span>
				'.$parametr_post["tel_center"].'
				</div>
				<div class="adres">
				<span>Адрес:</span>
				'.$parametr_post["adress_center"].'
				</div>
				<div class="info">
				'.$parametr_post["info_center"].'
				</div>
				</div>
				</div>
				
				</div>
				</a>';
			}
		}
		wp_reset_postdata();
		
		return $data_array;
	}	
	
	function get_parametr_post($post_id){
		$parametr_post[] = '';
		$data_options = ['телефон','адрес','элпочта','инфо'];
		foreach($data_options as $do){
			$repeaters = get_field($do,$post_id);
			foreach($repeaters as $rp){
				switch ($do) {
					case 'телефон':
					$parametr_post['tel_center'] .= $rp['текст'].'<br>';
					break;
					case 'адрес':
					$parametr_post['adress_center'] .= $rp['индекс'].', '.$rp['область'].',<br>'.$rp['город'].', '.$rp['улица'].', '.$rp['дом'];
					break;
					case 'элпочта':
					$parametr_post['email_center'] .= '<a href="mailto:'.$rp['текст'].'">'.$rp['текст'].'</a><br>';
					break;
					case 'инфо':
					$parametr_post['info_center'] .= '<div class="'.$rp['класс'].'">'.$rp['текст'].'</div>';
					break;
				}
			}
		}
		return $parametr_post;
	}	
	
	function ic_enqueue($hook) {
		if ( 'post.php' != $hook ) {return;}
		wp_enqueue_script( 'api-maps', 'https://api-maps.yandex.ru/2.1/?apikey=72f03914-f58d-42bb-9a59-83d59ad9b597&lang=ru_RU' );
		wp_enqueue_script( 'my_custom_script', get_template_directory_uri() . '/pnl_modul/assets/js/map-ya.js' );
	}
	add_action( 'admin_enqueue_scripts', 'ic_enqueue' );
	// подключаем функцию активации мета блока (my_extra_fields)
	add_action('add_meta_boxes', 'my_map_fields', 1);
	function my_map_fields() {
		add_meta_box( 'map_fields', 'Карта', 'map_fields_box_func', 'post', 'normal', 'high'  );
	}
	
	function map_fields_box_func( $post ){
	$lat = get_field('lat') ? get_field('lat') : '55.75';
	$lon = get_field('lon') ? get_field('lon') : '37.63';
	?>

	<div id='map' class="map" data-lat="<?php echo $lat?>" data-lon="<?php echo $lon?>" style="width: 100%; height: 560px;"></div>

	<?php
	}		