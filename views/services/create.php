<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Services */

$this->title = 'Создание услуги';
$this->params['breadcrumbs'][] = ['label' => 'Услуги', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product"> 
    <div class="container">
    <?= $this->render('_form', [
        'model' => $model,
        'model2' => $model2,
        'categories' => $categories
    ]) ?>
    </div>
</div>