<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Hairdressers */

$this->title = 'Update Hairdressers: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Hairdressers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id, 'usersId' => $model->usersId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="product"> 
    <div class="container">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>
