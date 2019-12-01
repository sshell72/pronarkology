  <?php global $wpdb,$client_new_events,$get_client_new_events;
  $sedu = $_SESSION['sess_edu_user'];

  if(!empty($sedu->client_ava))
    $ava = $sedu->client_ava;
  
  $get_client_new_events = $wpdb->get_row("
    SELECT * 
    FROM wp_reg_user 
    WHERE ID = ".$_SESSION['sess_edu_user']->ID);
  $client_new_events = array();
  if(!empty($get_client_new_events->client_new_events) && is_serialized($get_client_new_events->client_new_events))
    $client_new_events = unserialize($get_client_new_events->client_new_events);
  
  ?>
  <div class="wrapper header">
    <div class="container">
      <div class="row align-items-center">
        <a href="/" class="col logo"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/edu_modul/assets/img/logo-7h.png" alt="logo"></a>
        <?php if(isset($_SESSION['sess_edu_user'])){?>
          <div class="col navigation">
            <div class="menu-container">
              <ul class="menu">
                <li><a href="/">МОИ ПРОГРАММЫ</a></li>
                <li><a href="/shop/">МАГАЗИН ПРОГРАММ</a></li>
                <li>
                  <a href="/events/">СОБЫТИЯ</a>
                  <?php if(!empty($client_new_events) && is_array($client_new_events)){?>
                    <a title="Новых событий - <?php echo count($client_new_events);?>" class="hasNewEvents" href="/events/"><?php echo count($client_new_events);?></a>
                  <?php } ?>
                </li>
              </ul>
              <div class="sidebar-menu">
                <?php get_template_part( 'edu_modul/inc/kurs', 'menu' ); ?>
              </div>
              <div class="close"></div>
            </div>
            <div class="burger-menu">
              <span></span>
              <span></span>
              <span></span>
            </div>
          </div>
          <div class="col account">
            <span class="ball">Баллы:</span>
            <a href="/credits/" class="credits summ_ball_profile">
             <div class="summ_ball">
              <?php echo $get_client_new_events->client_balls;?>
            </div>
          </a>
          <a href="#" class="profile" <?php if(!empty($ava)) echo 'style="background-image:url('.$ava.')"';?>><div <?php if(!empty($ava)) echo 'style="display:none;"';?> class="pf_dummy"></div></a>
          <div class="account-menu-trigger"></div>
          <ul class="account-menu">
            <li class="profile-icon"><a href="/profile/">Moй профиль</a></li>
            <li class="credit-icon"><a href="/credits/">Мои баллы</a></li>
            <li class="pass-icon"><a href="/restore/">Пароль</a></li>
            <li class="logout-icon"><a href="javascript:" id="do_exit">Выход</a></li>
          </ul>
        </div>
      <?php } ?>
    </div>
  </div>
</div>