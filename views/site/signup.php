<?php
 
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
 
$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="login">
    <div class="container">
        <?php
        $form = ActiveForm::begin([
                    'id' => 'form-signup',
                    'layout' => 'horizontal',
                    'fieldConfig' => [
                        'template' => "{label}\n<div class=\"login-mail\">{input}</div>{error}",
                        'labelOptions' => ['class' => 'col-lg-1 control-label'],
                    ],
        ]);
        ?>
        <div class="col-md-6 login-do1 animated wow fadeInLeft" data-wow-delay=".5s">
            <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'class' => '', 'template'=>"{input}<i class=\"glyphicon glyphicon-envelope\"></i>", 'placeholder' => 'Логин'])->label(false) ?>

            <?= $form->field($model, 'password')->passwordInput(['class' => '', 'placeholder' => 'Пароль'])->label(false) ?>

            <?= $form->field($model, 'email')->textInput(['class' => '', 'placeholder' => 'Email'])->label(false) ?>
          

</div>

            <div class="col-md-6 login-do animated wow fadeInRight" data-wow-delay=".5s">
                <label class="hvr-sweep-to-top login-sub">
<?= Html::submitInput('Регистрация', ['class' => '', 'name' => 'login-button']) ?>
                </label>
                    <p>Уже есть аккаунт?</p>
                    <a href="<?= \yii\helpers\Url::toRoute('site/login') ?>" class="hvr-sweep-to-top">Авторизация</a>
            </div>
            <div class="clearfix"> </div>
        
    </div>
</div>
<?php ActiveForm::end(); ?>

   