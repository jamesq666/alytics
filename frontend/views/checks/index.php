<?php

use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\grid\GridView;
use app\models\ChecksSearch;

/* @var $this yii\web\View */
/* @var $dataProvider ActiveDataProvider */
/* @var $searchModel ChecksSearch */

$this->title = 'Просмотр списка проверок';
$this->params['breadcrumbs'][] = ['label' => 'Просмотр списка проверок', 'url' => ['index']];

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
                'label' => 'Дата проверки',
            ],
            [
                'attribute' => 'url',
                'label' => 'URL',
            ],
            [
                'attribute' => 'http_code',
                'label' => 'http-код',
            ],
            [
                'attribute' => 'try',
                'label' => 'Номер попытки',
            ],
        ],
    ]);
    ?>

</div>