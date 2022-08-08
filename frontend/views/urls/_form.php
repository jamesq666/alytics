<?php

use common\models\Urls;
use yii\widgets\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model Urls */

?>

<div>

    <?php (Yii::$app->session->hasFlash('')); ?>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form -> field($model, 'url') -> textInput (['maxlength' => true]) ?>
    <?= $form -> field($model, 'periodicity') -> textInput (['maxlength' => true, 'type' => 'number']) ?>
    <?= $form -> field($model, 'try') -> textInput (['maxlength' => true, 'type' => 'number']) ?>

    <div>
        <?= Html::submitButton($model -> isNewRecord ? 'Создать' : 'Изменить', ['class' => $model -> isNewRecord ? 'btn btn-success'
            : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>