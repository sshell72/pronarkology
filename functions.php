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