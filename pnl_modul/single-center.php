<<<<<<< HEAD
<?php the_post(); ?>
<!--block-13-->
<div class="wrapper block-13">
	<div class="container">
		
		<!--items-->
		<div class="item">
			<div class="row">
				
				<div class="col-lg-3 img-container revealator-once revealator-slideright">
					<div class="img">
						<img src="<?php bloginfo( 'stylesheet_directory' ); ?>/pnl_modul/assets/img/block-13-1.jpg" alt="alt">
						<div class="num"><span>№</span>1</div>
					</div>
				</div>
				
				<div class="col-lg-9 content revealator-once revealator-slideleft">
					<div class="i-head">
						<div class="title"><?php the_title()?></div>
						<div class="rating-container">
							<div class="left">
								<div class="rating">
									<div class="percentage" style="width: 70%;"></div>
								</div>
								<div class="info">Проголосовали: 13</div>
							</div>
							<div class="right">
								<span>3.7</span>
							</div>
						</div>
					</div>
					<div class="description">
						<?php the_content()?>
					</div>
					<div class="panel">
						
						<div class="phone">
							<span>Телефон:</span>
							<?php $repeaters = get_field('телефон');
								foreach($repeaters as $rp){
									echo $rp['текст'].'<br>';
								}
							?>
						</div>
						<div class="adres">
							<span>Адрес:</span>
							<?php $repeaters = get_field('адрес');
								foreach($repeaters as $rp){
									echo $rp['индекс'].', '.$rp['область'].',<br>'.$rp['город'].', '.$rp['улица'].', '.$rp['дом'];
								}
							?>
						</div>
						<div class="email">
							<span>Эл.почта:</span>
							<?php $repeaters = get_field('элпочта');
								foreach($repeaters as $rp){
									echo '<a href="mailto:'.$rp['текст'].'">'.$rp['текст'].'</a><br>';
								}
							?>
						</div>
						<div class="info">
							<div class="gos">
								Гос. <br>
								Учреждение
							</div>
							<div class="fiz">
								Любое физ. <br>
								состояние
							</div>
							<div class="psih">
								Любое псих. <br>
								состояние
							</div>
						</div>
					</div>
					<div class="form">
						<label for="">Оставить заявку:</label>
						<input type="tel" class="form-control phone" placeholder="Ваш телефон">
						<button class="btn btn-primary">Отправить</button>
					</div>
				</div>
				
			</div>
		</div>
		<!--end items-->
	</div>
=======
<!--block-13-->
<div class="wrapper block-13">
    <div class="container">
        
        <!--items-->
        <div class="item">
            <div class="row">
                
                <div class="col-lg-3 img-container revealator-once revealator-slideright">
                    <div class="img">
                        <img src="<?php bloginfo( 'stylesheet_directory' ); ?>/pnl_modul/assets/img/block-13-1.jpg" alt="alt">
                        <div class="num"><span>№</span>1</div>
                    </div>
                </div>
                
                <div class="col-lg-9 content revealator-once revealator-slideleft">
                    <div class="i-head">
                        <div class="title">Центр восстановления им.Академика павлова в ростове-на дону</div>
                        <div class="rating-container">
                            <div class="left">
                                <div class="rating">
                                    <div class="percentage" style="width: 70%;"></div>
                                </div>
                                <div class="info">Проголосовали: 13</div>
                            </div>
                            <div class="right">
                                <span>3.7</span>
                            </div>
                        </div>
                    </div>
                    <div class="description">
                        Флагман – единственная в России системная клиника с максимальной персонификацией помощи и защитой личной информации. Все сотрудники центра СПАСЕНИЕ ПРЕМИУМ обладают большим опытом в лечении всех видов зависимостей, являются авторами уникальных запатентованных методик лечения и реабилитации.
                    </div>
                    <div class="panel">

                        <div class="phone">
                            <span>Телефон:</span>
                            8 (800) 775-81-03<br>
                            8 (800) 775-81-03
                        </div>
                        <div class="adres">
                            <span>Адрес:</span>
                            111500, г.Костанай, Костанайская <br>
                            область, г.Рудный, ул.Ленина, 68
                        </div>
                        <div class="email">
                            <span>Эл.почта:</span>
                            <a href="mailto:renessans@mail.com ">renessans@mail.com</a>
                        </div>
                        <div class="info">
                            <div class="gos">
                                Гос. <br>
                                Учреждение
                            </div>
                            <div class="fiz">
                                Любое физ. <br>
                                состояние
                            </div>
                            <div class="psih">
                                Любое псих. <br>
                                состояние
                            </div>
                        </div>
                    </div>
                    <div class="form">
                        <label for="">Оставить заявку:</label>
                        <input type="tel" class="form-control phone" placeholder="Ваш телефон">
                        <button class="btn btn-primary">Отправить</button>
                    </div>
                </div>
            
            </div>
        </div>
        <!--end items-->
    </div>
>>>>>>> 01faf99a3fb0b901c4ccc8866bc526fe666aed44
</div>

<!--block-14-->
<div class="wrapper block-14">
<<<<<<< HEAD
	<div class="container">
		<div class="block-title revealator-once revealator-slideright"><span><span>Описание центра</span></span></div>
		<p class="revealator-once revealator-slideleft"><?php the_field('описание_центра')?></p>
		<strong>В нашем наркологическом центре:</strong>
		<ul class="revealator-once revealator-slideright">
			<?php $vnncs = get_field('в_нашем_наркологическом_центре');
				foreach($vnncs as $vn){
					echo '<li>'.$vn['текст'].'</li>';
				}
			?>
		</ul>
	</div>
=======
    <div class="container">
        <div class="block-title revealator-once revealator-slideright"><span><span>Описание центра</span></span></div>
        <p class="revealator-once revealator-slideleft">Флагман – единственная в России системная клиника с максимальной персонификацией помощи и защитой личной информации. Все сотрудники центра СПАСЕНИЕ ПРЕМИУМ обладают большим опытом в лечении всех видов зависимостей, являются авторами уникальных запатентованных методик лечения и реабилитации. Все сотрудники центра СПАСЕНИЕ ПРЕМИУМ обладают большим опытом в лечении всех видов зависимостей, являются авторами уникальных запатентованных методик лечения и реабилитации.</p>
        <strong>В нашем наркологическом центре:</strong>
        <ul class="revealator-once revealator-slideright">
            <li>проводят комплексное лечение наркомании;</li>
            <li>тщательно работают с восстановлением психики пациента;</li>
            <li>проводят курс социальной адаптации.</li>
        </ul>
    </div>
>>>>>>> 01faf99a3fb0b901c4ccc8866bc526fe666aed44
</div>

<!--block-15-->
<div class="wrapper block-15">
<<<<<<< HEAD
	<div class="container">
		<div class="block-title revealator-once revealator-slideright">
		<span><span>Направления деятельности</span></span></div>
		<div class="row">
			<?php $nds = get_field('направления_деятельности');
				foreach($nds as $nd){
					echo '<div class="col-lg-3 col-md-6">
					<div class="item revealator-once revealator-slideup">
					<div class="img"><img src="'.$nd['фото'].'" alt="alt"></div>
					<div class="text">'.$nd['текст'].'</div>
					</div>
					</div>';
				}
			?>
			
		</div>
		<div class="text-center revealator-once revealator-slidedown">
			<a href="#callback" class="btn btn-primary" data-fancybox>Задать вопрос специалисту</a>
		</div>
	</div>
=======
    <div class="container">
        <div class="block-title revealator-once revealator-slideright">
            <span><span>Направления деятельности</span></span></div>
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="item revealator-once revealator-slideup">
                    <div class="img"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/pnl_modul/assets/img/block-15-1.png" alt="alt"></div>
                    <div class="text">Лечение алкоголизма</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="item revealator-once revealator-slideup">
                    <div class="img"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/pnl_modul/assets/img/block-15-2.png" alt="alt"></div>
                    <div class="text">Лечение алкоголизма</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="item revealator-once revealator-slideup">
                    <div class="img"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/pnl_modul/assets/img/block-15-3.png" alt="alt"></div>
                    <div class="text">Лечение алкоголизма</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="item revealator-once revealator-slideup">
                    <div class="img"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/pnl_modul/assets/img/block-15-4.png" alt="alt"></div>
                    <div class="text">Лечение алкоголизма</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="item revealator-once revealator-slideup">
                    <div class="img"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/pnl_modul/assets/img/block-15-5.png" alt="alt"></div>
                    <div class="text">Лечение алкоголизма</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="item revealator-once revealator-slideup">
                    <div class="img"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/pnl_modul/assets/img/block-15-6.png" alt="alt"></div>
                    <div class="text">Лечение алкоголизма</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="item revealator-once revealator-slideup">
                    <div class="img"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/pnl_modul/assets/img/block-15-7.png" alt="alt"></div>
                    <div class="text">Лечение алкоголизма</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="item revealator-once revealator-slideup">
                    <div class="img"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/pnl_modul/assets/img/block-15-8.png" alt="alt"></div>
                    <div class="text">Лечение алкоголизма</div>
                </div>
            </div>
        </div>
        <div class="text-center revealator-once revealator-slidedown">
            <a href="#callback" class="btn btn-primary" data-fancybox>Задать вопрос специалисту</a>
        </div>
    </div>
>>>>>>> 01faf99a3fb0b901c4ccc8866bc526fe666aed44
</div>

<!--block-3-->
<div class="wrapper block-3">
<<<<<<< HEAD
	<div class="container">
		<div class="title revealator-once revealator-slideright"><span><span>Наши преимущества</span></span></div>
		<div class="row justify-content-center">
			<?php $nds = get_field('наши_преимущества');
				foreach($nds as $nd){
					echo '<div class="col-xl-2 col-md-4 item-container revealator-once revealator-slideup revealator-delay1">
					<div class="img"><img src="'.$nd['фото'].'" alt="alt"></div>
					<div class="title">'.$nd['текст'].'</div>
					</div>';
				}
			?>
		</div>
	</div>
</div>
=======
    <div class="container">
        <div class="title revealator-once revealator-slideright"><span><span>Наши преимущества</span></span></div>
        <div class="row justify-content-center">
            <div class="col-xl-2 col-md-4 item-container revealator-once revealator-slideup revealator-delay1">
                <div class="img"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/pnl_modul/assets/img/a-1.png" alt="alt"></div>
                <div class="title">Соответствие ГОСТ Р 54990 - 2018</div>
            </div>
            <div class="col-xl-2 col-md-4 item-container revealator-once revealator-slideup revealator-delay2">
                <div class="img"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/pnl_modul/assets/img/a-2.png" alt="alt"></div>
                <div class="title">Научно - одобренная программа лечения</div>
            </div>
            <div class="col-xl-2 col-md-4 item-container revealator-once revealator-slideup revealator-delay3">
                <div class="img"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/pnl_modul/assets/img/a-3.png" alt="alt"></div>
                <div class="title">Полный штат профильных специалистов</div>
            </div>
            <div class="col-xl-2 col-md-4 item-container revealator-once revealator-slideup revealator-delay4">
                <div class="img"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/pnl_modul/assets/img/a-4.png" alt="alt"></div>
                <div class="title">Без религиозного уклона</div>
            </div>
            <div class="col-xl-2 col-md-4 item-container revealator-once revealator-slideup revealator-delay5">
                <div class="img"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/pnl_modul/assets/img/a-5.png" alt="alt"></div>
                <div class="title">Эффективная программа для лечения зависимости от соли и спайса</div>
            </div>
            <div class="col-xl-2 col-md-4 item-container revealator-once revealator-slideup revealator-delay6">
                <div class="img"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/pnl_modul/assets/img/a-6.png" alt="alt"></div>
                <div class="title">Профессиональная работа в преодолении созависимости</div>
            </div>
        </div>
    </div>
>>>>>>> 01faf99a3fb0b901c4ccc8866bc526fe666aed44
</div>

<!--block-16-->
<div class="wrapper block-16">
<<<<<<< HEAD
	<div class="container">
		<div class="block-title revealator-once revealator-slideright"><span><span>Условия проживания</span></span>
		</div>
		<div class="slider">
			<?php $nds = get_field('условия_проживания');
				foreach($nds as $nd){
					echo '<div class="slide revealator-once revealator-slideup">
					<a href="/img/block-16-1.jpg" class="item" data-fancybox="block-16">
					<div class="img" style="background-image:url('.$nd['фото'].');"></div>
					</a>
					</div>';
				}
			?>
			
		</div>
	</div>
=======
    <div class="container">
        <div class="block-title revealator-once revealator-slideright"><span><span>Условия проживания</span></span>
        </div>
        <div class="slider">
            <div class="slide revealator-once revealator-slideup">
                <a href="/img/block-16-1.jpg" class="item" data-fancybox="block-16">
                    <div class="img" style="background-image:url(/img/block-16-1.jpg);"></div>
                </a>
            </div>
            <div class="slide revealator-once revealator-slideup">
                <a href="/img/block-16-1.jpg" class="item" data-fancybox="block-16">
                    <div class="img" style="background-image:url(/img/block-16-1.jpg);"></div>
                </a>
            </div>
            <div class="slide revealator-once revealator-slideup">
                <a href="/img/block-16-1.jpg" class="item" data-fancybox="block-16">
                    <div class="img" style="background-image:url(/img/block-16-1.jpg);"></div>
                </a>
            </div>
            <div class="slide revealator-once revealator-slideup">
                <a href="/img/block-16-1.jpg" class="item" data-fancybox="block-16">
                    <div class="img" style="background-image:url(/img/block-16-1.jpg);"></div>
                </a>
            </div>
            <div class="slide revealator-once revealator-slideup">
                <a href="/img/block-16-1.jpg" class="item" data-fancybox="block-16">
                    <div class="img" style="background-image:url(/img/block-16-1.jpg);"></div>
                </a>
            </div>
        </div>
    </div>
>>>>>>> 01faf99a3fb0b901c4ccc8866bc526fe666aed44
</div>

<!--block-17-->
<div class="wrapper block-17">
<<<<<<< HEAD
	<div class="container">
		<div class="block-title revealator-once revealator-slideright">
		<span><span>Расположение клиник из нашего каталога</span></span></div>
	</div>
	<div class="map-container">
		
		<div class="map">
			<iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3ANDni5tAumOYweG2UobCZgHulqKqe-OkF&amp;source=constructor&amp;scroll=false" width="100%" height="560" frameborder="0"></iframe>
		</div>
		
		<div class="map-info">
			<div class="container">
				<div class="white-container revealator-once revealator-slideright">
					<h3>Контакты:</h3>
					<div class="phone">
						<span>Телефон:</span>
						<?php $repeaters = get_field('телефон');
							$i = 0;
							$count_repeaters = count($repeaters);
							foreach($repeaters as $rp){
								$i++;
								$span_tel = $count_repeaters > $i ? '<span class="dot">&nbsp;</span>' : '<br>';
								echo $rp['текст'].$span_tel;
							}
						?>
					</div>
					<div class="adres">
						<span>Адрес:</span>
						<?php $repeaters = get_field('адрес');
							foreach($repeaters as $rp){
								echo $rp['индекс'].', '.$rp['область'].',<br>'.$rp['город'].', '.$rp['улица'].', '.$rp['дом'].'<br>';
							}
						?>
					</div>
					<div class="email">
						<span>Эл.почта:</span>
						<?php $repeaters = get_field('элпочта');
							foreach($repeaters as $rp){
								echo '<a href="mailto:'.$rp['текст'].'">'.$rp['текст'].'</a><br>';
							}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
=======
    <div class="container">
        <div class="block-title revealator-once revealator-slideright">
            <span><span>Расположение клиник из нашего каталога</span></span></div>
    </div>
    <div class="map-container">
        
        <div class="map">
            <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3ANDni5tAumOYweG2UobCZgHulqKqe-OkF&amp;source=constructor&amp;scroll=false" width="100%" height="560" frameborder="0"></iframe>
        </div>
        
        <div class="map-info">
            <div class="container">
                <div class="white-container revealator-once revealator-slideright">
                    <h3>Контакты:</h3>
                    <div class="phone">
                        <span>Телефон:</span>
                        8 (800) 775-81-03 <span class="dot">&nbsp;</span> 8 (800) 775-81-03
                    </div>
                    <div class="adres">
                        <span>Адрес:</span>
                        111500, г.Костанай, Костанайская <br>
                        область, г.Рудный, ул.Ленина, 68
                    </div>
                    <div class="email">
                        <span>Эл.почта:</span>
                        <a href="mailto:renessans@mail.com ">renessans@mail.com</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
>>>>>>> 01faf99a3fb0b901c4ccc8866bc526fe666aed44
</div>

<!--block-18-->
<div class="wrapper block-18">
<<<<<<< HEAD
	<div class="container">
		<div class="block-title revealator-once revealator-slideright"><span><span>Отзывы реальных людей</span></span>
		</div>
		
		<div class="item revealator-once revealator-slideup">
			<div class="left">
				<div class="img"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/pnl_modul/assets/img/block-18-1.png" alt="alt"></div>
				<div class="info">
					<div class="title">
						Анна Сергеевна, 28 лет <br>
						г. Керчь
					</div>
					<div class="rating-wr">
						<div class="num">4.0</div>
						<div class="rating">
							<div class="percentage" style="width: 80%;"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="right">
				<div class="title">Жить прежней жизнью уже не было сил.</div>
				<div class="desc">
					Равным образом консультация с широким активом играет важную роль в формировании существенных финансовых и административных условий. Равным образом консультация с широким активом играет важную роль в формировании существенных финансовых и административных условий. Равным образом консультация с широким активом играет важную роль в формировании существенных финансовых и административных условий.
				</div>
			</div>
		</div>
		<div class="item revealator-once revealator-slideup">
			<div class="left">
				<div class="img"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/pnl_modul/assets/img/block-18-1.png" alt="alt"></div>
				<div class="info">
					<div class="title">
						Анна Сергеевна, 28 лет <br>
						г. Керчь
					</div>
					<div class="rating-wr">
						<div class="num">4.0</div>
						<div class="rating">
							<div class="percentage" style="width: 80%;"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="right">
				<div class="title">Жить прежней жизнью уже не было сил.</div>
				<div class="desc">
					Равным образом консультация с широким активом играет важную роль в формировании существенных финансовых и административных условий. Равным образом консультация с широким активом играет важную роль в формировании существенных финансовых и административных условий. Равным образом консультация с широким активом играет важную роль в формировании существенных финансовых и административных условий.
				</div>
			</div>
		</div>
    
	</div>
=======
    <div class="container">
        <div class="block-title revealator-once revealator-slideright"><span><span>Отзывы реальных людей</span></span>
        </div>
        
        <div class="item revealator-once revealator-slideup">
            <div class="left">
                <div class="img"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/pnl_modul/assets/img/block-18-1.png" alt="alt"></div>
                <div class="info">
                    <div class="title">
                        Анна Сергеевна, 28 лет <br>
                        г. Керчь
                    </div>
                    <div class="rating-wr">
                        <div class="num">4.0</div>
                        <div class="rating">
                            <div class="percentage" style="width: 80%;"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="right">
                <div class="title">Жить прежней жизнью уже не было сил.</div>
                <div class="desc">
                    Равным образом консультация с широким активом играет важную роль в формировании существенных финансовых и административных условий. Равным образом консультация с широким активом играет важную роль в формировании существенных финансовых и административных условий. Равным образом консультация с широким активом играет важную роль в формировании существенных финансовых и административных условий.
                </div>
            </div>
        </div>
        <div class="item revealator-once revealator-slideup">
            <div class="left">
                <div class="img"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/pnl_modul/assets/img/block-18-1.png" alt="alt"></div>
                <div class="info">
                    <div class="title">
                        Анна Сергеевна, 28 лет <br>
                        г. Керчь
                    </div>
                    <div class="rating-wr">
                        <div class="num">4.0</div>
                        <div class="rating">
                            <div class="percentage" style="width: 80%;"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="right">
                <div class="title">Жить прежней жизнью уже не было сил.</div>
                <div class="desc">
                    Равным образом консультация с широким активом играет важную роль в формировании существенных финансовых и административных условий. Равным образом консультация с широким активом играет важную роль в формировании существенных финансовых и административных условий. Равным образом консультация с широким активом играет важную роль в формировании существенных финансовых и административных условий.
                </div>
            </div>
        </div>
    
    </div>
>>>>>>> 01faf99a3fb0b901c4ccc8866bc526fe666aed44
</div>

<!--block-19-->
<div class="wrapper block-19">
<<<<<<< HEAD
	<form action="/" method="post" id="commentform" data-id="<?php echo $post->ID?>">
	<div class="container">
		<div class="block-title revealator-once revealator-slideright"><span><span>Оставить отзыв</span></span></div>
		<div class="row">
			
			<div class="col-md-4">
				<div class="form-group revealator-once revealator-slideright">
					<input id="name" name="name"  type="text" class="form-control" placeholder="Ваше имя" required value="Test">
				</div>
				<div class="form-group revealator-once revealator-slideright">
					<input id="email" name="email"  type="text" class="form-control" placeholder="Эл. почта" required value="test@test.test">
				</div>
				<div class="form-group revealator-once revealator-slideright">
					<div class="custom-file">
						<input name="inputGroupFile01"  type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
						<label class="custom-file-label" for="inputGroupFile01">Прикрепить фото</label>
					</div>
				</div>
				<div class="form-group revealator-once revealator-slideright">
					<label for="">Ваша оценка:</label>
					<div class="rating2">
						<span>&starf;</span><span>&starf;</span><span>&starf;</span><span>&starf;</span><span>&starf;</span>
					</div>
					<input id="rating_review" name="rating_review"  type="text" hidden required>
				</div>
			</div>
			<div class="col-md-8">
				<div class="form-group revealator-once revealator-slideleft">
					<input id="title_review" name="title_review"   type="text" class="form-control" placeholder="Заглавие отзыва" required value="Заглавие">
				</div>
				<div class="form-group revealator-once revealator-slideleft">
					<textarea name="text_review" id="text_review" cols="30" rows="10" class="form-control" placeholder="Текст отзыва" required value="Текст комментария">Текст комментария</textarea>
				</div>
				<div class="form-group revealator-once revealator-slideleft">
					<button type="submit" name="submit" id="submit" class="btn btn-primary">Добавить отзыв</button>
				</div>
				</div>
				
			</div>
		</div>
	</form>
=======
    <div class="container">
        <div class="block-title revealator-once revealator-slideright"><span><span>Оставить отзыв</span></span></div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group revealator-once revealator-slideright">
                    <input type="text" class="form-control" placeholder="Ваше имя">
                </div>
                <div class="form-group revealator-once revealator-slideright">
                    <input type="text" class="form-control" placeholder="Эл. почта">
                </div>
                <div class="form-group revealator-once revealator-slideright">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                        <label class="custom-file-label" for="inputGroupFile01">Прикрепить фото</label>
                    </div>
                </div>
                <div class="form-group revealator-once revealator-slideright">
                    <label for="">Ваша оценка:</label>
                    <div class="rating2">
                        <span>&starf;</span><span>&starf;</span><span>&starf;</span><span>&starf;</span><span>&starf;</span>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="form-group revealator-once revealator-slideleft">
                    <input type="text" class="form-control" placeholder="Заглавие отзыва">
                </div>
                <div class="form-group revealator-once revealator-slideleft">
                    <textarea name="" id="" cols="30" rows="10" class="form-control" placeholder="Текст отзыва"></textarea>
                </div>
                <div class="form-group revealator-once revealator-slideleft">
                    <button class="btn btn-primary">Добавить отзыв</button>
                </div>
            </div>
        </div>
    </div>
>>>>>>> 01faf99a3fb0b901c4ccc8866bc526fe666aed44
</div>

<!--block-12-->
<div class="wrapper block-12">
<<<<<<< HEAD
	<div class="container">
		<div class="row head">
			<div class="col-md-12">
				<div class="block-title revealator-once revealator-slideright"><span><span>Рекомендуемые клиники</span></span>
				</div>
			</div>
		</div>
		
		<!--items-->
		<a href="#" class="item revealator-once revealator-slideup">
			<div class="row">
				
				<div class="col-lg-3 img-container">
					<div class="img">
						<img src="<?php bloginfo( 'stylesheet_directory' ); ?>/pnl_modul/assets/img/block-12-1.jpg" alt="alt">
						<div class="num"><span>№</span>1</div>
					</div>
				</div>
				
				<div class="col-lg-9 content">
					<div class="i-head">
						<div class="title">Флагман</div>
						<div class="rating-container">
							<div class="left">
								<div class="rating">
									<div class="percentage" style="width: 70%;"></div>
								</div>
								<div class="info">Проголосовали: 13</div>
							</div>
							<div class="right">
								<span>3.7</span>
							</div>
						</div>
					</div>
					<div class="description">
						Флагман – единственная в России системная клиника с максимальной персонификацией помощи и защитой личной информации. Все сотрудники центра СПАСЕНИЕ ПРЕМИУМ обладают большим опытом в лечении всех видов зависимостей, являются авторами уникальных запатентованных методик лечения и реабилитации.
					</div>
					<div class="panel">
						<div class="phone">
							<span>Телефон:</span>
							8 (800) 775-81-03 <br>
							8 (800) 775-81-03
						</div>
						<div class="adres">
							<span>Адрес:</span>
							111500, г.Костанай, Костанайская <br>
							область, г.Рудный, ул.Ленина, 68
						</div>
						<div class="info">
							<div class="gos">
								Гос. <br>
								Учреждение
							</div>
							<div class="fiz">
								Любое физ. <br>
								состояние
							</div>
							<div class="psih">
								Любое псих. <br>
								состояние
							</div>
						</div>
					</div>
				</div>
				
			</div>
		</a>
		<a href="#" class="item revealator-once revealator-slideup">
			<div class="row">
				
				<div class="col-lg-3 img-container">
					<div class="img">
						<img src="<?php bloginfo( 'stylesheet_directory' ); ?>/pnl_modul/assets/img/block-12-1.jpg" alt="alt">
						<div class="num"><span>№</span>1</div>
					</div>
				</div>
				
				<div class="col-lg-9 content">
					<div class="i-head">
						<div class="title">Флагман</div>
						<div class="rating-container">
							<div class="left">
								<div class="rating">
									<div class="percentage" style="width: 70%;"></div>
								</div>
								<div class="info">Проголосовали: 13</div>
							</div>
							<div class="right">
								<span>3.7</span>
							</div>
						</div>
					</div>
					<div class="description">
						Флагман – единственная в России системная клиника с максимальной персонификацией помощи и защитой личной информации. Все сотрудники центра СПАСЕНИЕ ПРЕМИУМ обладают большим опытом в лечении всех видов зависимостей, являются авторами уникальных запатентованных методик лечения и реабилитации.
					</div>
					<div class="panel">
						<div class="phone">
							<span>Телефон:</span>
							8 (800) 775-81-03 <br>
							8 (800) 775-81-03
						</div>
						<div class="adres">
							<span>Адрес:</span>
							111500, г.Костанай, Костанайская <br>
							область, г.Рудный, ул.Ленина, 68
						</div>
						<div class="info">
							<div class="gos">
								Гос. <br>
								Учреждение
							</div>
							<div class="fiz">
								Любое физ. <br>
								состояние
							</div>
							<div class="psih">
								Любое псих. <br>
								состояние
							</div>
						</div>
					</div>
				</div>
				
			</div>
		</a>
		<a href="#" class="item revealator-once revealator-slideup">
			<div class="row">
				
				<div class="col-lg-3 img-container">
					<div class="img">
						<img src="<?php bloginfo( 'stylesheet_directory' ); ?>/pnl_modul/assets/img/block-12-1.jpg" alt="alt">
						<div class="num"><span>№</span>1</div>
					</div>
				</div>
				
				<div class="col-lg-9 content">
					<div class="i-head">
						<div class="title">Флагман</div>
						<div class="rating-container">
							<div class="left">
								<div class="rating">
									<div class="percentage" style="width: 70%;"></div>
								</div>
								<div class="info">Проголосовали: 13</div>
							</div>
							<div class="right">
								<span>3.7</span>
							</div>
						</div>
					</div>
					<div class="description">
						Флагман – единственная в России системная клиника с максимальной персонификацией помощи и защитой личной информации. Все сотрудники центра СПАСЕНИЕ ПРЕМИУМ обладают большим опытом в лечении всех видов зависимостей, являются авторами уникальных запатентованных методик лечения и реабилитации.
					</div>
					<div class="panel">
						<div class="phone">
							<span>Телефон:</span>
							8 (800) 775-81-03 <br>
							8 (800) 775-81-03
						</div>
						<div class="adres">
							<span>Адрес:</span>
							111500, г.Костанай, Костанайская <br>
							область, г.Рудный, ул.Ленина, 68
						</div>
						<div class="info">
							<div class="gos">
								Гос. <br>
								Учреждение
							</div>
							<div class="fiz">
								Любое физ. <br>
								состояние
							</div>
							<div class="psih">
								Любое псих. <br>
								состояние
							</div>
						</div>
					</div>
				</div>
				
			</div>
		</a>
		<!--end items-->
		
	</div>
=======
    <div class="container">
        <div class="row head">
            <div class="col-md-12">
                <div class="block-title revealator-once revealator-slideright"><span><span>Рекомендуемые клиники</span></span>
                </div>
            </div>
        </div>
        
        <!--items-->
        <a href="#" class="item revealator-once revealator-slideup">
            <div class="row">
                
                <div class="col-lg-3 img-container">
                    <div class="img">
                        <img src="<?php bloginfo( 'stylesheet_directory' ); ?>/pnl_modul/assets/img/block-12-1.jpg" alt="alt">
                        <div class="num"><span>№</span>1</div>
                    </div>
                </div>
                
                <div class="col-lg-9 content">
                    <div class="i-head">
                        <div class="title">Флагман</div>
                        <div class="rating-container">
                            <div class="left">
                                <div class="rating">
                                    <div class="percentage" style="width: 70%;"></div>
                                </div>
                                <div class="info">Проголосовали: 13</div>
                            </div>
                            <div class="right">
                                <span>3.7</span>
                            </div>
                        </div>
                    </div>
                    <div class="description">
                        Флагман – единственная в России системная клиника с максимальной персонификацией помощи и защитой личной информации. Все сотрудники центра СПАСЕНИЕ ПРЕМИУМ обладают большим опытом в лечении всех видов зависимостей, являются авторами уникальных запатентованных методик лечения и реабилитации.
                    </div>
                    <div class="panel">
                        <div class="phone">
                            <span>Телефон:</span>
                            8 (800) 775-81-03 <br>
                            8 (800) 775-81-03
                        </div>
                        <div class="adres">
                            <span>Адрес:</span>
                            111500, г.Костанай, Костанайская <br>
                            область, г.Рудный, ул.Ленина, 68
                        </div>
                        <div class="info">
                            <div class="gos">
                                Гос. <br>
                                Учреждение
                            </div>
                            <div class="fiz">
                                Любое физ. <br>
                                состояние
                            </div>
                            <div class="psih">
                                Любое псих. <br>
                                состояние
                            </div>
                        </div>
                    </div>
                </div>
            
            </div>
        </a>
        <a href="#" class="item revealator-once revealator-slideup">
            <div class="row">
                
                <div class="col-lg-3 img-container">
                    <div class="img">
                        <img src="<?php bloginfo( 'stylesheet_directory' ); ?>/pnl_modul/assets/img/block-12-1.jpg" alt="alt">
                        <div class="num"><span>№</span>1</div>
                    </div>
                </div>
                
                <div class="col-lg-9 content">
                    <div class="i-head">
                        <div class="title">Флагман</div>
                        <div class="rating-container">
                            <div class="left">
                                <div class="rating">
                                    <div class="percentage" style="width: 70%;"></div>
                                </div>
                                <div class="info">Проголосовали: 13</div>
                            </div>
                            <div class="right">
                                <span>3.7</span>
                            </div>
                        </div>
                    </div>
                    <div class="description">
                        Флагман – единственная в России системная клиника с максимальной персонификацией помощи и защитой личной информации. Все сотрудники центра СПАСЕНИЕ ПРЕМИУМ обладают большим опытом в лечении всех видов зависимостей, являются авторами уникальных запатентованных методик лечения и реабилитации.
                    </div>
                    <div class="panel">
                        <div class="phone">
                            <span>Телефон:</span>
                            8 (800) 775-81-03 <br>
                            8 (800) 775-81-03
                        </div>
                        <div class="adres">
                            <span>Адрес:</span>
                            111500, г.Костанай, Костанайская <br>
                            область, г.Рудный, ул.Ленина, 68
                        </div>
                        <div class="info">
                            <div class="gos">
                                Гос. <br>
                                Учреждение
                            </div>
                            <div class="fiz">
                                Любое физ. <br>
                                состояние
                            </div>
                            <div class="psih">
                                Любое псих. <br>
                                состояние
                            </div>
                        </div>
                    </div>
                </div>
            
            </div>
        </a>
        <a href="#" class="item revealator-once revealator-slideup">
            <div class="row">
                
                <div class="col-lg-3 img-container">
                    <div class="img">
                        <img src="<?php bloginfo( 'stylesheet_directory' ); ?>/pnl_modul/assets/img/block-12-1.jpg" alt="alt">
                        <div class="num"><span>№</span>1</div>
                    </div>
                </div>
                
                <div class="col-lg-9 content">
                    <div class="i-head">
                        <div class="title">Флагман</div>
                        <div class="rating-container">
                            <div class="left">
                                <div class="rating">
                                    <div class="percentage" style="width: 70%;"></div>
                                </div>
                                <div class="info">Проголосовали: 13</div>
                            </div>
                            <div class="right">
                                <span>3.7</span>
                            </div>
                        </div>
                    </div>
                    <div class="description">
                        Флагман – единственная в России системная клиника с максимальной персонификацией помощи и защитой личной информации. Все сотрудники центра СПАСЕНИЕ ПРЕМИУМ обладают большим опытом в лечении всех видов зависимостей, являются авторами уникальных запатентованных методик лечения и реабилитации.
                    </div>
                    <div class="panel">
                        <div class="phone">
                            <span>Телефон:</span>
                            8 (800) 775-81-03 <br>
                            8 (800) 775-81-03
                        </div>
                        <div class="adres">
                            <span>Адрес:</span>
                            111500, г.Костанай, Костанайская <br>
                            область, г.Рудный, ул.Ленина, 68
                        </div>
                        <div class="info">
                            <div class="gos">
                                Гос. <br>
                                Учреждение
                            </div>
                            <div class="fiz">
                                Любое физ. <br>
                                состояние
                            </div>
                            <div class="psih">
                                Любое псих. <br>
                                состояние
                            </div>
                        </div>
                    </div>
                </div>
            
            </div>
        </a>
        <!--end items-->

    </div>
>>>>>>> 01faf99a3fb0b901c4ccc8866bc526fe666aed44
</div>

