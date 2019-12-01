<?php global $options;?>
<!--footer-->
<div class="wrapper footer">
	<div class="container">
		<div class="row">
			
			<div class="col-lg-4 left revealator-once revealator-slideright">
				<div class="content">
					<a href="#">Пользовательское соглашение</a>
					<a href="#">Политика конфиденциальности</a>
				</div>
			</div>
			
			<div class="col-lg-4 center  revealator-once revealator-slideup">
				<span>Поделиться в соц.сетях:</span>
				<div class="socials">
					<a href="#"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/pnl_modul/assets/img/fb.png" alt="alt"></a>
					<a href="#"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/pnl_modul/assets/img/in.png" alt="alt"></a>
					<a href="#"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/pnl_modul/assets/img/yt.png" alt="alt"></a>
					<a href="#"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/pnl_modul/assets/img/vk.png" alt="alt"></a>
				</div>
			</div>
			
			<div class="col-lg-4 right  revealator-once revealator-slideleft">
				<div class="phone">
					Помощь консультанта <br>
					<a href="tel:8 (800) 775-81-03">8 (800) 775-81-03</a>
				</div>
				<div class="btn-container">
					<a href="#callback" class="btn btn-primary" data-fancybox>Задать вопрос</a>
				</div>
			</div>
			
		</div>
	</div>
</div>
<div class="wrapper footer-copyright">
	<div class="container revealator-once revealator-slideright">
		2019 © Федеральный Справочник Наркологических Клиник
	</div>
</div>

</div>

<div class="bg-menu"></div>

<!--pop ups-->
<div id="callback" style="display: none;">
	<div class="modal-window">
		<div class="title">Задать вопрос специалисту</div>
		<div class="desc">Специалист свяжется с вами в течении 30 минут</div>
		<form action="/">
			<div class="form-group">
				<input type="text" class="form-control name" name="name" placeholder="Имя">
			</div>
			<div class="form-group">
				<input type="tel" class="form-control phone" name="phone" placeholder="Телефон">
			</div>
			<div class="form-group">
				<select class="custom-select">
					<option selected>Время звонка - Сейчас</option>
					<option value="1">10:00</option>
					<option value="2">15:00</option>
					<option value="3">18:00</option>
					<option value="4">...</option>
				</select>
			</div>
			<button class="btn btn-primary btn-block" type="submit">Отправить</button>
		</form>
	</div>
</div>
<div id="podbor" style="display: none;">
	<div class="modal-window">
		<div class="title">Подобрать клинику</div>
		<div class="desc">Специалист свяжется с вами в течении 30 минут</div>
		<form action="/">
			<div class="form-group">
				<input type="text" class="form-control name" name="name" placeholder="Имя">
			</div>
			<div class="form-group">
				<input type="tel" class="form-control phone" name="phone" placeholder="Телефон">
			</div>
			<div class="form-group">
				<select class="custom-select">
					<option selected>Время звонка - Сейчас</option>
					<option value="1">10:00</option>
					<option value="2">15:00</option>
					<option value="3">18:00</option>
					<option value="4">...</option>
				</select>
			</div>
			<button class="btn btn-primary btn-block" type="submit">Отправить</button>
		</form>
	</div>
</div>
