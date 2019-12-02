<?php
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