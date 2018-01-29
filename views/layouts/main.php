<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
        <script>
            new WOW().init();
        </script>
    </head>
    <body>
        <?php $this->beginBody() ?>
        <div class="header">
            <div class="header-grid">
                <div class="container">
                    <div class="header-left animated wow fadeInLeft" data-wow-delay=".5s">
                        <ul>
                            <li><i class="glyphicon glyphicon-headphones"></i><a href="#">24x7 live support</a></li>
                            <li><i class="glyphicon glyphicon-envelope" ></i><a href="mailto:info@example.com">@example.com</a></li>
                            <li><i class="glyphicon glyphicon-earphone" ></i>+1234 567 892</li>
                        </ul>
                    </div>
                    <div class="header-right animated wow fadeInRight" data-wow-delay=".5s">
                        <div class="header-right1">
                            
                            <ul>
                            <?php if(Yii::$app->user->isGuest):?>
                                <li><i class="glyphicon glyphicon-log-in" ></i><a href="<?= yii\helpers\Url::toRoute('site/login')?>">Авторизация</a></li>
                                <li><i class="glyphicon glyphicon-book" ></i><a href="<?= yii\helpers\Url::toRoute('site/signup')?>">Регистрация</a></li>
                            <?php else:?>
                               <li>
                                   <?=
                                        Html::beginForm(['/site/logout'], 'post')
                                        . Html::submitButton(
                                        'Выход (' . Yii::$app->user->identity->username . ')', ['class' => 'btn btn-link logout']
                                        )
                                        . Html::endForm()
                                    ?>
                                </li>
                            <?php endif;?>
                            </ul>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
            <div class="container">
                <div class="logo-nav">

                    <nav class="navbar navbar-default">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header nav_2">
                            <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <div class="navbar-brand logo-nav-left ">
                                <h1 class="animated wow pulse" data-wow-delay=".5s"><a href="<?=Yii::$app->homeUrl?>">Barber<span>Line</span></a></h1>
                            </div>

                        </div> 
                        <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">

                            <?php
                            if(Yii::$app->user->id == 5){
                                echo Nav::widget([
                                    'options' => ['class' => 'nav navbar-nav'],
                                    'items' => [
                                        ['label' => 'Главная', 'url' => ['/']],
                                        ['label' => 'Услуги', 'url' => ['/services/index']],
                                        ['label' => 'Услуги (управление)', 'url' => ['/services2/index']],
                                        ['label' => 'Парикмахеры', 'url' => ['/hairdressers/index']],
                                        ['label' => 'Парикмахеры (управление)', 'url' => ['/hairdressers2/index']],
                                        ['label' => 'Контакты', 'url' => ['/site/contact']]
                                    ],
                                ]);
                            }
                            else{
                                echo Nav::widget([
                                    'options' => ['class' => 'nav navbar-nav'],
                                    'items' => [
                                        ['label' => 'Главная', 'url' => ['/']],
                                        ['label' => 'Услуги', 'url' => ['/services/index']],
                                        ['label' => 'Парикмахеры', 'url' => ['/hairdressers/index']],
                                        ['label' => 'Контакты', 'url' => ['/site/contact']]
                                    ],
                                ]);
                            }
                            ?>
                        </div>
                    </nav>
                </div>
           
            </div>
            <?php if(Yii\helpers\Url::current() != "/barberLine/site/index"):?>
                <div class="banner-top">
                    <div class="container">
                        <h2 class="animated wow fadeInLeft" data-wow-delay=".5s"><?=$this->title?></h2>
                        <div class="clearfix"> </div>
                    </div>
                </div>    
            <?php endif;?>
                <?=
                Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ])
                ?>
                <?= $content ?>
   

  <div class="footer">
		<div class="container">
		<div class="footer-top">
		<div class="col-md-9 footer-top1">
		<h4>Программное средство "Online-сервис поиска и систематизации парикмахерских услуг"</h4>
		<p>Данный сайт предназначен для связи парикмахеров и клиентов парикмахерских услуг посредством единого сервиса</p>
		</div>
		<div class="col-md-3 footer-top2">
		<a href="<?= \yii\helpers\Url::toRoute(['site/contact']) ?>">Свяжитесь с нами</a>
		</div>
		<div class="clearfix"> </div>
		</div>
			<div class="footer-grids">
				<div class="col-md-4 footer-grid animated wow fadeInLeft" data-wow-delay=".5s">
					<h3>О нас</h3>
					<p>Сайт разработан  качестве выполненного дипломного проекта<span> Основное предназначение - поиск и систематизация паркимахерских услуг.</span></p>
				</div>
				<div class="col-md-4 footer-grid animated wow fadeInLeft" data-wow-delay=".6s">
					<h3>Контакты</h3>
					<ul>
						<li><i class="glyphicon glyphicon-map-marker" ></i>1234k Avenue, 4th block, <span>New York City.</span></li>
						<li class="foot-mid"><i class="glyphicon glyphicon-envelope" ></i><a href="mailto:info@example.com">info@example.com</a></li>
						<li><i class="glyphicon glyphicon-earphone" ></i>+1234 567 567</li>
					</ul>
				</div>
		
			
				<div class="clearfix"> </div>
			</div>
			
			<div class="copy-right animated wow fadeInUp" data-wow-delay=".5s">
				<p>&copy; BarberLine <?= date('Y') ?></p>
			</div>
		</div>
	</div>

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
