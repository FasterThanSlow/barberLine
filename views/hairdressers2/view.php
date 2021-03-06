<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Hairdressers */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Hairdressers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product"> 
    <div class="container">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id, 'usersId' => $model->usersId], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id, 'usersId' => $model->usersId], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'workingTime',
            'possobilityOfDeparture',
            'usersId',
        ],
    ]) ?>

</div>
</div>
