<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Hairdressers */

$this->title = 'Create Hairdressers';
$this->params['breadcrumbs'][] = ['label' => 'Hairdressers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hairdressers-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
