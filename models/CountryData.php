<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "country_data".
 *
 * @property integer $id
 * @property integer $country_id
 * @property string $data_key
 * @property string $data_value
 * @property string $data_version
 */
class CountryData extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'country_data';
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['country_id'], 'integer'],
            [['data_version'], 'string','max'=>25],
            [['data_key'], 'string', 'max' => 80],
            [['data_value'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'country_id' => Yii::t('app', 'Country ID'),
            'data_key' => Yii::t('app', 'Data Key'),
            'data_value' => Yii::t('app', 'Data Value'),
            'data_version' => Yii::t('app', 'Data Version'),
        ];
    }
}
