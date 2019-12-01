<?php global $options;?>
<div class="wrapper footer">
  <div class="container">
    <div class="row justify-content-center align-items-center">
      <div class="col-md-4 text-align">
        <a href="/"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/img/logo-7h.png" alt="logo" class="logo"></a>
      </div>
      <div class="col-md-4">
        <ul class="menu">
          <li><a href="/">МОИ ПРОГРАММЫ</a></li>
          <li><a href="/shop/">МАГАЗИН ПРОГРАММ</a></li>
          <li><a href="/events/">СОБЫТИЯ</a></li>
        </ul>
      </div>
      <div class="col-md-4">
        <div class="title">КОНТАКТЫ</div>
        <a href="#callback" class="btn btn-danger" data-fancybox>СВЯЗАТЬСЯ С НАМИ</a>
                <div class="socials">
          <a class="item yt" target="_blank" href="<?php echo $options['socnet']['youtube'];?>"></a>
          <a class="item fb" target="_blank" href="<?php echo $options['socnet']['facebook'];?>"></a>
          <a class="item vk" target="_blank" href="<?php echo $options['socnet']['vkontakte'];?>"></a>
          <a class="item in" target="_blank" href="<?php echo $options['socnet']['instagramm'];?>"></a>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <ul class="nav">
          <li><a href="#">Условия оказания услуг</a></li>
          <li><a href="#">Политика конфиденциальности</a></li>
          <li><a href="#">Предупреждение</a></li>
          <li><a href="#">Условия возврата</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>

<div class="wrapper copyright">
  <div class="container">© <?php echo date('Y');?> www.Community7h.org Все права защищены.</div>
</div>

<!--pop-up-->
<div id="callback" style="display: none;">
  <div class="modal-window">
    <div class="title">Заказ звонка</div>
    <form action="./" method="post" id="callback_form">
      <form action="#" method="post">
        <div class="form-group">
          <input type="text" name="call_name" class="form-control name" id="call-name" value="" onkeyup="this.setAttribute('value', this.value);" required>
          <label for="call-name">Вас зовут</label>
        </div>
        <div class="form-group">
          <input type="tel" name="call_tel" class="form-control tel" id="call-phone" value="" onkeyup="this.setAttribute('value', this.value);" required>
          <label for="call-phone">Ваш телефон</label>
        </div>
        <button class="btn btn-danger btn-block">Заказать звонок <img src="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/img/loading.gif" id="hp_loading" alt=""></button>
      </form>
    </form>
  </div>
</div>


<div id="my_program_callback" style="display: none;">
<div class="modal-window"></div>
</div>

<?php $rryaff=false; if($rryaff):?>
<script type="text/javascript">
  document.ondragstart = test; 
  document.onselectstart = test; 
  document.oncontextmenu = test; 

  function test() { 
    return false 
  } 
  function preventSelection(element){
    var preventSelection = false;

    function addHandler(element, event, handler){
      if (element.attachEvent) 
        element.attachEvent('on' + event, handler);
      else 
        if (element.addEventListener) 
          element.addEventListener(event, handler, false);
      }
      function removeSelection(){
        if (window.getSelection) { window.getSelection().removeAllRanges(); }
        else if (document.selection && document.selection.clear)
          document.selection.clear();
      }
      function killCtrlA(event){
        var event = event || window.event;
        var sender = event.target || event.srcElement;

        if (sender.tagName.match(/INPUT|TEXTAREA/i))
          return;

        var key = event.keyCode || event.which;
        if (event.ctrlKey && key == 'A'.charCodeAt(0))  
        {
          removeSelection();

          if (event.preventDefault) 
            event.preventDefault();
          else
            event.returnValue = false;
        }
      }


      addHandler(element, 'mousemove', function(){
        if(preventSelection)
          removeSelection();
      });
      addHandler(element, 'mousedown', function(event){
        var event = event || window.event;
        var sender = event.target || event.srcElement;
        preventSelection = !sender.tagName.match(/INPUT|TEXTAREA/i);
      });

      
      addHandler(element, 'mouseup', function(){
        if (preventSelection)
          removeSelection();
        preventSelection = false;
      });

      addHandler(element, 'keydown', killCtrlA);
      addHandler(element, 'keyup', killCtrlA);
    }
    preventSelection(document);


  </script>
  <style>
    body{
     -moz-user-select: none;
     -o-user-select:none;
     -khtml-user-select: none;
     -webkit-user-select: none;
     -ms-user-select: none;
     user-select: none;
   }
 </style> 
<?php endif;?>