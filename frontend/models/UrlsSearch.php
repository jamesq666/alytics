<?php

namespace app\models;

use common\models\Urls;
use yii\data\ActiveDataProvider;

class UrlsSearch extends Urls
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            //[['date'], 'integer'],
            [['url'], 'string'],
            //[['periodicity', 'try'], 'integer'],
        ];
    }

    /**
     * @param $params
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Urls::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this -> load($params);

        if (!$this -> validate()) {
            return $dataProvider;
        };

        $query->andFilterWhere([
            'id' => $this->id,
            'date' => $this->date,
            'periodicity' => $this->periodicity,
            'try' => $this->try,
        ]);

        $query->andFilterWhere(['like', 'url', $this->url]);

        return $dataProvider;
    }
}
