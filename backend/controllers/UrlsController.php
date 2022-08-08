<?php

namespace backend\controllers;

use common\models\Checks;
use common\models\Urls;
use yii\db\ActiveRecord;
use yii\web\Controller;

/**
 * Urls controller
 */
class UrlsController extends Controller
{
    /**
     * @return void
     */
    public function actionCheck()
    {
        while (true) {
            $urls = $this->getUrls();

            if (empty($urls)) {
                echo 'Список url-адресов пуст!';
                break;
            }

            foreach ($urls as $url) {
                $prev_check = $this->getPrevCheck($url['url']);

                //есть пред. проверка ИЛИ ((первая цифра кода ответа = 4 И номер попытки < max кол-ва попыток) ИЛИ наступило время проверки)
                if (empty($prev_check) || ((mb_substr($prev_check['http_code'], 0, 1) == '4' && $prev_check['try'] < $url['try']) || (time() - $prev_check['date']) >= $url['periodicity'] * 60)) {
                    $response = get_headers($url['url']);

                    if ($response === false) {
                        continue;
                    }

                    $check = new Checks();
                    $check->url = $url['url'];
                    $check->http_code = mb_substr($response[0], 9, 3);

                    if (mb_substr($prev_check['http_code'], 0, 1) == '4' && $prev_check['try'] < $url['try']) {
                        $try = intval($prev_check['try']);
                        $check->try = ++$try;
                    } else {
                        $check->try = 0;
                    }

                    $check->save();
                }
            }

            sleep(60);
        }
    }

    /**
     * @return array|ActiveRecord[]
     */
    public function getUrls()
    {
        return Urls::find()
            ->indexBy('id')
            ->asArray()
            ->all();
    }

    /**
     * @return array|ActiveRecord[]
     */
    public function getPrevCheck($url)
    {
        return Checks::find()
            ->where(['url' => $url])
            ->orderBy('id DESC')
            ->limit(1)
            ->asArray()
            ->one();
    }
}
