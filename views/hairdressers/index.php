<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\HairdressersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Парикмахеры';
$this->params['breadcrumbs'][] = $this->title;
$hairdressers = $dataProvider->getModels();
?>
 

<div class="col-md-12 animated wow fadeInRight" data-wow-delay=".5s">

            <div class="mid-popular">
                
                <?php foreach ($hairdressers as $hairdresser):?>
                <div class="col-sm-4 item-grid item-gr  simpleCart_shelfItem">
                    <div class="grid-pro">
                        <div  class=" grid-product " >
                            <figure>		
                                <a href="<?= \yii\helpers\Url::toRoute(['services/index','hairdresser'=>$hairdresser->id]) ?>">
                                    <div class="grid-img">
                                        <?= Html::img("/barberLine/web/".$hairdresser->users->photos->path,['width'=>200,'height'=>200, 'class'=>'img-responsive']); ?>
                                    </div>
                                </a>		
                            </figure>	
                        </div>
                        <div class="women">
                            <h6><a href="<?= \yii\helpers\Url::toRoute(['services/index','hairdresser'=>$hairdresser->id]) ?>"><?= $hairdresser->users->username?></a></h6>
                            <a href="<?= \yii\helpers\Url::toRoute(['services/index','hairdresser'=>$hairdresser->id]) ?>" data-text="Услуги" class="but-hover1 item_add button_hairdressers">Услуги</a>
                        </div>
                    </div>
                </div>
                <?php endforeach;?>
                
                
                <div class="clearfix"></div>
            </div>
        </div>


    <div class="clearfix"></div>
</div>
