<?php 
global $options,$client_paied_progs;

?>
<div class="wrapper block-2">
  <div class="container">
    <h1 class="title">Мои программы</h1>
    <div class="row">
      <?php if($options['edu_setting']['foto_author']){ ?>
        <div class="col-xl-4 item-container">
          <div class="item">
            <div class="h2">Привет, <span><?php echo ($_SESSION['sess_edu_user']->client_nik)?$_SESSION['sess_edu_user']->client_nik:$_SESSION['sess_edu_user']->client_name;?></span></div>
            <div class="author_video">
            <?php if(empty($options['edu_setting']['video_author'])){ ?>
              <img src="<?php echo $options['edu_setting']['foto_author']['sizes']['large'];?>" alt="author" class="aligncenter author_main_page">
            <?php } else { ?>
                <?php echo $options['edu_setting']['video_author']; ?>
            <?php }?>
            </div>
            <div class="h2"><?php echo $options['edu_setting']['hello_zag'];?></div>
            <?php echo $options['edu_setting']['hello_text'];?>
          </div>
        </div>
      <?php } ?>
      <?php if(!empty($client_paied_progs)) foreach($client_paied_progs as $pr){
        $the_kurs_options = get_field('general',$pr);
        ?>
        <div class="col-xl-4 col-md-6 item-container">
          <div class="item" onclick="document.location.href = '/kurs/hid/<?php echo $pr;?>/'">
            <div class="first">
              <div class="i-title"><?php echo $the_kurs_options['general_kurs_name'];?></div>
            </div>
            <div class="last">
              <div class="image" style="background-image:url(<?php echo $the_kurs_options['general_kurs_img']['sizes']['medium'];?>);"></div>
              <div class="desc"><?php echo $the_kurs_options['general_kurs_desc'];?></div>
              <div class="text-center"><a href="/kurs/hid/<?php echo $pr;?>/" class="btn btn-danger">Продолжить</a></div>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
</div>