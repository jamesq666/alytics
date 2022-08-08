<?php

use common\models\Urls;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model Urls */

$this -> title = 'Создать url-адрес';
//$this -> params['breadcrumbs'][] = ['label' => 'Просмотр url-адресов', 'url' => ['index']];
$this -> params['breadcrumbs'][] = $this -> title;
?>

<div>

    <h1><?= Html::encode($this -> title) ?></h1>

    <?= $this -> render('_form', [
        'model' => $model,
    ]) ?>

</div>