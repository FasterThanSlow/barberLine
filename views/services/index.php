<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ServicesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Услуги';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product">
    <div class="container">
        <div class="col-md-3 product-bottom">
            <!--categories-->
            <div class="categories animated wow fadeInUp animated" data-wow-delay=".5s" >
                <h3>Категории</h3>
                
                <ul class="cate">
                    <?php foreach ($categories as $key => $category):?>
                    <li><i class="glyphicon glyphicon-menu-right" ></i><a href="<?= \yii\helpers\Url::toRoute(['services/index','category'=>$key]) ?>"><?= $category ?></a></li>
                    <?php endforeach;?>
                </ul>
            </div>
            <!--//menu-->
            <!--price-->
            <div class="price animated wow fadeInUp animated" data-wow-delay=".5s" >
                <h3>Фильтр</h3>
               
                <div class="price-head">
                     <form action="" method="get">
                    <div class="col-md-6 price-head1">
                        <div class="price-top1">
                            <span class="start_price">$</span>
                            <input type="text" name="start_price"   value="<?= isset($_GET['start_price']) ? $_GET['start_price'] : "0" ?>">
                        </div>
                    </div>
                    <div class="col-md-6 price-head2">
                        <div class="price-top1">
                            <span class="end_price">$</span>
                            <input type="text" name="end_price"  value="<?= isset($_GET['end_price']) ? $_GET['end_price'] : "0" ?>">
                        </div>
                    </div>
                    <button class="btn btn-primary" style="margin-top: 20px; float: right;">Показать</button>
                    <div class="clearfix"></div>
                                    </form>

                </div>
            </div>
            <!--//price-->
        </div>
        <div class="col-md-9 animated wow fadeInRight" data-wow-delay=".5s">
            <div class="mens-toolbar">
                 <?php if($isHairdresser):?>
                <div style="margin-bottom: 20px;">
                    <a class="btn btn-primary" href="<?= \yii\helpers\Url::toRoute(['services/create']) ?>">Создать</a>
                </div>
                <?php endif;?>
                <p >Показано <?= $dataProvider->getCount() ?> из <?= $dataProvider->getTotalCount() ?> услуги</p>

                <p class="showing">Сортировать по
                    <select onchange="document.location = window.location.href.split('?')[0] + '?sort=' + this.options[this.selectedIndex].value">
                        <option value="">Выбрать</option>
                        <option value="title">Названию</option>
                        <option value="dateCreating">Дате создания</option>
                        <option value="price">Цене</option>
                    </select>
                </p> 
               


                <div class="clearfix"></div>		
            </div>

            <div class="mid-popular">
   
                <?php 
                $services = $dataProvider->getModels();
                foreach ($services as $service):?>
                <div class="col-sm-4 item-grid item-gr  simpleCart_shelfItem">
                    <div class="grid-pro">
                        <div  class=" grid-product " >
                            <figure>		
                                <a href="<?= \yii\helpers\Url::toRoute(['services/view','id'=>$service->id]) ?>l">
                                    <?php foreach ($service->photos as $photo):?>
                                    <div class="grid-img">
                                        <?= Html::img("/barberLine/web/".$photo->path,['width'=>200,'height'=>200, 'class'=>'img-responsive']); ?>
                                    </div>
                                    <?php endforeach;?>
                                </a>		
                            </figure>	
                        </div>
                        <div class="women">
                            <h6><a href="<?= \yii\helpers\Url::toRoute(['services/view','id'=>$service->id]) ?>"><?= $service->title ?></a></h6>
                            <p><em class="item_price">$<?= $service->price ?></em></p>
                            <a href="<?= \yii\helpers\Url::toRoute(['services/view','id'=>$service->id]) ?>" data-text="Подробнее" class="but-hover1 item_add">Подробнее</a>
                        </div>
                    </div>
                </div>
                <?php endforeach;?>
                
                
                <div class="clearfix"></div>
            </div>
        </div>


    <div class="clearfix"></div>
</div>			
</div>