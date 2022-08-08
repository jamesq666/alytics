<?php

namespace backend\controllers;

use common\models\Checks;
use common\models\Urls;
use yii\web\Controller;

/**
 * Urls controller
 */
class UrlsController extends Controller
{
    /**
     * @return string
     */
    public function actionCheck()
    {
        $urls = Urls::find()
            ->indexBy('id')
            ->asArray()
            ->all();

        foreach ($urls as $key => $url) {
            $response = get_headers($url['url']);

            $check = new Checks();
            $check->url = $url['url'];
            $check->http_code = mb_substr($response[0], 9, 3);
            $check->try = 0;
            $check->save();
        }

        //todo заменить на подходящий функционал с очередями
        while (true) {
            sleep(60);

            foreach ($urls as $key => $url) {
                $prev_check = Checks::find()
                    ->where(['url' => $url['url']])
                    ->orderBy('id DESC')
                    ->limit(1)
                    ->asArray()
                    ->one();

                $er = (mb_substr($prev_check['http_code'], 0, 1) == '4') && ($prev_check['try'] < $url['try']);

                if ($er || (time() - $prev_check['date']) >= $url['periodicity'] * 60) {
                    $try = intval($prev_check['try']);
                    $response = get_headers($url['url']);

                    $check = new Checks();
                    $check->url = $url['url'];
                    $check->http_code = mb_substr($response[0], 9, 3);

                    if ($er) {
                        $check->try = ++$try;
                    } else {
                        $check->try = 0;
                    }

                    $check->save();
                }
            }
        }
    }
}
