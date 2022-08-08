<?php

namespace frontend\controllers;

use common\models\Urls;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use app\models\UrlsSearch;

/**
 * Urls controller
 */
class UrlsController extends Controller
{
    /**
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new UrlsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * @return Response|string
     */
    public function actionCreate()
    {
        $model = new Urls();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                Yii::$app->session->setFlash('success', "url-адрес успешно добавлен");
            } else {
                Yii::$app->session->setFlash('error', "url-адрес не добавлен");
            }
            return $this->redirect(['create']);
        }
        return $this->render('create', [
            'model' => $model
        ]);
    }

    /**
     * @param $id
     * @return string|Response
     * @throws NotFoundHttpException
     */
    public function actionUpdate($id)
    {
        $model = $this -> findModel($id);

        if ($model -> load(Yii::$app -> request -> post()) && $model -> save() ) {
            return $this -> redirect(['view', 'id' => $model -> id]);
        } else {
            return $this -> render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * @param $id
     * @return Response
     * @throws NotFoundHttpException
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function actionDelete($id)
    {
        $model = $this -> findModel($id) -> delete();

        return $this -> redirect(['index']);
    }

    /**
     * @param $id
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionView($id)
    {
        return $this -> render('view', [
            'model' => $this -> findModel($id),
        ]);
    }

    /**
     * @param $id
     * @return Urls|null
     * @throws NotFoundHttpException
     */
    protected function findModel($id)
    {
        if (($model = Urls::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
