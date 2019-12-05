<?php
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
	
	add_action('wp_ajax_add_comment_send_request', 'add_comment_send_request');
	add_action('wp_ajax_nopriv_add_comment_send_request', 'add_comment_send_request');
	function add_comment_send_request(){
		global $wpdb;
		
		extract($_POST);
		
		$args = array(
		'post_id' => $post_id
		);
		
		if( $comments = get_comments( $args ) ){
			foreach( $comments as $comment ){
				if(/* $comment->comment_author_IP == $_SERVER['REMOTE_ADDR'] || */ $email == $comment->comment_author_email){
					echo json_encode(array(
					'email' => $email,
					'comment' => $comment->comment_author_email,
					'error' => true,
					'info_title' => 'Ошибкаc!',
					'info_text' => 'Ваш отзыв уже опубликован!'	
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
		'comment_post_ID'      => $post_id,
		'comment_author'       => $name,
		'comment_author_email' => $email,
		'comment_content'      => $text_review,
		'comment_author_IP'    => $_SERVER['REMOTE_ADDR'],
		'comment_approved'     => 1,
		'comment_meta'         => array(
		'rating_review' => $rating_review,
		'title_review' 	=> $title_review
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
			/* if($_FILES){
				
				if ( ! function_exists( 'wp_handle_upload' ) ) 
				require_once( ABSPATH . 'wp-admin/includes/file.php' );     
				
				$file = & $_FILES['img'];
				
				$overrides = [ 'test_form' => false ];
				
				$movefile = wp_handle_upload( $file, $overrides );
				echo json_encode(array(
				'movefile' => $movefile,
				'info_title' => 'Спасибоc!',
				'info_text' => 'Ваш отзыв добавлен!',
				'error' => false
				)); die(); 
				if ( $movefile && empty($movefile['error']) ) {
				$filename = $movefile['file'];
				$filetype = wp_check_filetype( basename( $filename ), null );
				$wp_upload_dir = wp_upload_dir();
				$attachment = array(
				'guid'           => $wp_upload_dir['url'] . '/' . basename( $filename ),
				'post_mime_type' => $filetype['type'],
				'post_title'     => preg_replace( '/\.[^.]+$/', '', basename( $filename ) ),
				'post_content'   => '',
				'post_status'    => 'inherit'
				);
				
				wp_insert_attachment( $attachment, $filename  );
				
				} else {
				echo "Возможны атаки при загрузке файла!\n";
				}
			} */
			
		}
		
		if($wp_insert_comment){
			$result = array(
			'info_title' => 'Спасибо!',
			'info_text' => 'Ваш отзыв добавлен!',
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
				for( $i=1; $i <= 5; $i++ ){
					echo '
					<span class="commentrating">
					<input type="radio" name="rating_review" id="rating_review" value="'. $i .'" '. checked( $i, $rating_review, 0 ) .'/>
					</span>';
				}
			?>
		</span>
	</p>
	<p>
		<label for="foto_review"><?php _e( 'Фото' ); ?></label>
		<input type="text" name="foto_review" value="<?php echo esc_attr( $foto_review ); ?>" class="widefat" />
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
	
	function myplugin_comment_columns( $columns )
	{
		$columns['foto'] = __( 'Фото' );
		return $columns;
	}
	add_filter( 'manage_edit-comments_columns', 'myplugin_comment_columns' );
	//добовляем данные
	function comment_column( $column, $comment_ID )
	{
		if ( 'foto' == $column ) {
			$foto_review = get_comment_meta($comment_ID, 'foto_review', true);
			if($foto_review){
				echo '<img src="'.get_template_directory_uri().'/img/comments/'.$foto_review.'" width="80" height="80" />'; 
				}else{
				echo '<img src="'.get_template_directory_uri().'/img/comments/75.png" width="80" height="80" />'; 
			}
		}
	}
add_filter( 'manage_comments_custom_column', 'comment_column', 10, 2 );	