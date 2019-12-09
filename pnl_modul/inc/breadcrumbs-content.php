  <!--<div class="wrapper breadcrumbs">
    <div class="container">
      <ul>
        <?php get_page_bread($post->ID, $post->post_parent, '<li></li>');?>
        <li><?php echo (is_404())?'404 - не найдено !':get_the_title($post->ID);?></li>
      </ul>
    </div>
  </div>-->
  <!--breadcrumbs-->
  <?php global $post,$wp_query;?>
  <div class="wrapper breadcrumbs revealator-once revealator-slideright">
    <div class="container">
      <?php      
      if($wp_query->query_vars['category_name']){
        $category_name = explode('/',$wp_query->query_vars['category_name']);
        $category_name = end($category_name);
        $the_category_parent = get_term_by( 'slug', $category_name, 'category' );
        $cat = $the_category_parent->term_id; 
        echo get_category_parents_for_bread($cat, 'TRUE', '<span class="sep">/</span>', '');?> 
        <span><?php the_title(); ?></span>
      <?php } ?>
    </div>
  </div>