<?php

namespace common\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "urls".
 *
 * @property integer $id;
 * @property integer $date;
 * @property string $url;
 * @property integer $periodicity;
 * @property integer $try;
 */
class Urls extends ActiveRecord
{
    /**
     * @return string
     */
    public static function tableName()
    {
        return 'urls';
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
            [['url', 'periodicity', 'try'], 'required'],
            [['url'], 'string', 'max' => 255],
            [['url'], 'url', 'defaultScheme' => ['http', 'https']],
            [['date', 'periodicity', 'try'], 'integer'],
            [['periodicity'], 'in', 'range' => [1, 5, 10]],
            [['try'], 'in', 'range' => [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10]],
        ];
    }

    /**
     * @return string[]
     */
    public function attributeLabels()
    {
        return [
            'url' => 'URL',
            'periodicity' => 'Частота проверки (каждые 1, 5, 10 минут)',
            'try' => 'Количество повторов, в случае ошибки (от 0 до 10)',
        ];
    }
}
