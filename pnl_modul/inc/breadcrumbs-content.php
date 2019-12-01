  <div class="wrapper breadcrumbs">
    <div class="container">
      <ul>
        <?php get_page_bread($post->ID, $post->post_parent, '<li></li>');?>
        <li><?php echo (is_404())?'404 - не найдено !':get_the_title($post->ID);?></li>
      </ul>
    </div>
  </div>