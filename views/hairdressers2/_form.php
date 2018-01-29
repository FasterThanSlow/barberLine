<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Hairdressers */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hairdressers-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'workingTime')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'possobilityOfDeparture')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'usersId')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
