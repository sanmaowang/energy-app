<?php

namespace app\models;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

use Yii;

/**
 * This is the model class for table "country".
 *
 * @property integer $id
 * @property string $code2l
 * @property string $code3l
 * @property string $name
 * @property string $english_name
 * @property string $name_official
 * @property string $flag
 * @property integer $order
 * @property double $total_quantity_consumed
 * @property double $total_energy_consumed
 * @property double $petroleum_reserves
 * @property double $carbon_emission
 * @property double $renewable_energy
 * @property double $gdp
 * @property double $population
 * @property double $per_energy_consumed
 * @property double $per_carbon_emission
 * @property string $latitude
 * @property string $longitude
 * @property integer $created_at
 * @property integer $updated_at
 */
class Country extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'country';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order', 'created_at', 'updated_at'], 'integer'],
            [['total_quantity_consumed', 'total_energy_consumed', 'petroleum_reserves', 'carbon_emission', 'renewable_energy', 'gdp', 'population', 'per_energy_consumed', 'per_carbon_emission', 'latitude', 'longitude'], 'number'],
            [['code2l'], 'string', 'max' => 2],
            [['code3l'], 'string', 'max' => 3],
            [['name', 'name_official'], 'string', 'max' => 128],
            [['english_name'], 'string', 'max' => 64],
            [['flag'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'code2l' => Yii::t('app', 'Code2l'),
            'code3l' => Yii::t('app', 'Code3l'),
            'name' => Yii::t('app', 'Name'),
            'english_name' => Yii::t('app', 'English Name'),
            'name_official' => Yii::t('app', 'Name Official'),
            'flag' => Yii::t('app', 'Flag'),
            'order' => Yii::t('app', 'Order'),
            'total_quantity_consumed' => Yii::t('app', '消费总量'),
            'total_energy_consumed' => Yii::t('app', '能源消费总量'),
            'petroleum_reserves' => Yii::t('app', '油气储量'),
            'carbon_emission' => Yii::t('app', '碳排放'),
            'renewable_energy' => Yii::t('app', '可再生能源产量'),
            'gdp' => Yii::t('app', 'GDP'),
            'population' => Yii::t('app', '人口'),
            'per_energy_consumed' => Yii::t('app', '人均能源消费量'),
            'per_carbon_emission' => Yii::t('app', '人均碳排放量'),
            'latitude' => Yii::t('app', 'Latitude'),
            'longitude' => Yii::t('app', 'Longitude'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
//                'value' => new Expression('NOW()'),
            ],
        ];
    }
}
