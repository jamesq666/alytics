<?php

namespace app\models;

use common\models\Checks;
use yii\data\ActiveDataProvider;

class ChecksSearch extends Checks
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['url', 'http_code'], 'string', 'max' => 255],
            //[['date'], 'integer'],
            //[['try'], 'integer'],
        ];
    }

    /**
     * @param $params
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Checks::find();

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
        ]);

        $query->andFilterWhere(['like', 'url', $this->url])
            ->andFilterWhere(['like', 'http_code', $this->http_code])
            ->andFilterWhere(['like', 'try', $this->try]);

        return $dataProvider;
    }
}
