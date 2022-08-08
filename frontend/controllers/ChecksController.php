<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use app\models\ChecksSearch;

/**
 * Checks controller
 */
class ChecksController extends Controller
{
    /**
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ChecksSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
}
