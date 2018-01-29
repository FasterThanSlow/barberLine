<?php
/* @var $this yii\web\View */

$this->title = 'BarberLine';
use yii\helpers\Html;
?>
<div class="banner">
    <div class="banner-right">
        <ul id="flexiselDemo2">	
            <?php foreach ($services as $service):?>
            
            <li>
                <div class="banner-grid">
                    <h2>Услуги</h2>
                    <div class="wome">
                         <a href="#"><?= Html::img("/barberLine/web/".$service->photos[0]->path,['width'=>200,'height'=>200, 'class'=>'img-responsive']); ?></a>
                        </a>
                        <div class="women simpleCart_shelfItem">
                           
                            <h6 ><a href="single.html"><?= $service->title ?></a></h6>
                            <p class="ba-price"><em class="item_price">$<?= $service->price ?></em></p>
                            <a href="#" data-text="Подробнее" class="but-hover1 item_add">Подробнее</a>
                        </div>							
                    </div>							
                </div>
            </li>
            <?php endforeach;?>
        </ul>
        <script type="text/javascript">
            $(window).load(function () {
                $("#flexiselDemo2").flexisel({
                    visibleItems: 1,
                    animationSpeed: 1000,
                    autoPlay: true,
                    autoPlaySpeed: 5000,
                    pauseOnHover: true,
                    enableResponsiveBreakpoints: true,
                    responsiveBreakpoints: {
                        portrait: {
                            changePoint: 480,
                            visibleItems: 1
                        },
                        landscape: {
                            changePoint: 640,
                            visibleItems: 1
                        },
                        tablet: {
                            changePoint: 768,
                            visibleItems: 1
                        }
                    }
                });

            });
        </script>
        <script type="text/javascript" src="js/jquery.flexisel.js"></script>

    </div>


</div>
