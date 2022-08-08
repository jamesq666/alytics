<?php

use common\models\Urls;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model Urls */

$this -> title = 'Изменить url-адрес: ' . $model -> url;
$this -> params['breadcrumbs'][] = ['label' => 'Просмотр url-адресов', 'url' => ['index']];
$this -> params['breadcrumbs'][] = ['label' => $model -> url, 'url' => ['view', 'id' => $model -> id]];
$this -> params['breadcrumbs'][] = 'Изменить';
?>

<div>

    <h1><?= Html::encode($this -> title) ?></h1>

    <?= $this -> render('_form', [
        'model' => $model,
    ]) ?>

</div>