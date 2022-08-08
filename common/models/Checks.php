<?php

namespace common\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "checks".
 *
 * @property integer $id;
 * @property integer $date;
 * @property string $url;
 * @property integer http_code;
 * @property integer try;
 */
class Checks extends ActiveRecord
{
    /**
     * @return string
     */
    public static function tableName()
    {
        return 'checks';
    }

    /**
     * @return array
     */
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['date'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['url'], 'string'],
            [['date', 'http_code', 'try'], 'integer'],
        ];
    }

    /**
     * @return string[]
     */
    public function attributeLabels()
    {
        return [
            'url' => 'URL',
            'http_code' => 'http-код ответа',
            'try' => 'Номер попытки',
        ];
    }
}
