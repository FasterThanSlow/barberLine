<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Авторизация';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="login">
    <div class="container">
        <?php
        $form = ActiveForm::begin([
                    'id' => 'login-form',
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

            <?=
            $form->field($model, 'rememberMe')->checkbox([
                'template' => "<a class=\"news-letter\" href=\"#\"> <label class=\"checkbox1\">{input}<i> </i>Forgot Password</label></a>\n<div class=\"col-lg-8\">{error}</div>",
            ])->label('Запомнить меня')
            ?>

</div>

            <div class="col-md-6 login-do animated wow fadeInRight" data-wow-delay=".5s">
                <label class="hvr-sweep-to-top login-sub">
<?= Html::submitInput('Авторизация', ['class' => '', 'name' => 'login-button']) ?>
                </label>
                    <p>У вас нет аккаунта?</p>
                    <a href="<?= \yii\helpers\Url::toRoute('site/signup') ?>" class="hvr-sweep-to-top">Регистрация</a>
            </div>
            <div class="clearfix"> </div>
        
    </div>
</div>
<?php ActiveForm::end(); ?>
		


