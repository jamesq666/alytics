<?php

use common\models\Urls;
use yii\widgets\DetailView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model Urls */

$this -> title = 'Просмотр url-адреса: ' . $model -> url;
$this -> params['breadcrumbs'][] = ['label' => 'Просмотр url-адресов', 'url' => ['index']];
$this -> params['breadcrumbs'][] = 'Просмотр';

?>
<div>

    <h1><?= Html::encode($this -> title) ?></h1>

    <p>

        <?= Html::a('Изменить', ['update', 'id' => $model -> id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model -> id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы действиетльно хотите удалить данную запись?',
                'method' => 'post',
            ],
        ]) ?>

    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'date',
            'url',
            'periodicity',
            'try',
        ],
    ]) ?>

</div>
