<?php

use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\grid\GridView;
use app\models\UrlsSearch;

/* @var $this yii\web\View */
/* @var $dataProvider ActiveDataProvider */
/* @var $searchModel UrlsSearch */

$this->title = 'Просмотр url-адресов';
$this->params['breadcrumbs'][] = ['label' => 'Просмотр url-адресов', 'url' => ['index']];

?>

<div>

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary' => false,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'id',
            [   'attribute' => 'date',
                'format' => ['date', 'php:d-m-Y H:i:s'],
                'label' => 'Дата добавления',
            ],
            [
                'attribute' => 'url',
                'label' => 'URL',
            ],
            [
                'attribute' => 'periodicity',
                'label' => 'Частота проверки (в минутах)',
            ],
            [
                'attribute' => 'try',
                'label' => 'Количество повторов, в случае ошибки',
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>

</div>