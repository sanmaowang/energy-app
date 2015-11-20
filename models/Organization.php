<?php

namespace app\models;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

use Yii;

/**
 * This is the model class for table "organization".
 *
 * @property integer $id
 * @property string $name
 * @property string $english_name
 * @property string $create_date
 * @property integer $create_country
 * @property string $description
 * @property string $english_description
 * @property double $total_quantity_consumed
 * @property double $total_energy_consumed
 * @property double $petroleum_reserves
 * @property double $carbon_emission
 * @property double $renewable_energy
 * @property double $gdp
 * @property double $population
 * @property double $per_energy_consumed
 * @property double $per_carbon_emission
 * @property string $created_at
 * @property string $updated_at
 */
class Organization extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'organization';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['create_date', 'created_at', 'updated_at'], 'safe'],
            [['create_country'], 'integer'],
            [['description', 'english_description'], 'string'],
            [['total_quantity_consumed', 'total_energy_consumed', 'petroleum_reserves', 'carbon_emission', 'renewable_energy', 'gdp', 'population', 'per_energy_consumed', 'per_carbon_emission'], 'number'],
            [['name', 'english_name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', '名称'),
            'english_name' => Yii::t('app', 'English Name'),
            'create_date' => Yii::t('app', '发起时间'),
            'create_country' => Yii::t('app', '发起国'),
            'description' => Yii::t('app', '描述'),
            'english_description' => Yii::t('app', 'English Description'),
            'total_quantity_consumed' => Yii::t('app', '消费总量'),
            'total_energy_consumed' => Yii::t('app', '能源消费总量'),
            'petroleum_reserves' => Yii::t('app', '油气储量'),
            'carbon_emission' => Yii::t('app', '碳排放'),
            'renewable_energy' => Yii::t('app', '可再生能源产量'),
            'gdp' => Yii::t('app', 'GDP'),
            'population' => Yii::t('app', '人口'),
            'per_energy_consumed' => Yii::t('app', '人均能源消费量'),
            'per_carbon_emission' => Yii::t('app', '人均碳排放量'),
            'created_at' => Yii::t('app', 'Create Time'),
            'updated_at' => Yii::t('app', 'Update Time'),
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
