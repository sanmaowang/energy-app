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
 * @property string $name_english
 * @property string $name_official
 * @property string $flag
 * @property integer $order
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
            [['latitude', 'longitude'], 'number'],
            [['code2l'], 'string', 'max' => 2],
            [['code3l'], 'string', 'max' => 3],
            [['name', 'name_official'], 'string', 'max' => 128],
            [['name_english'], 'string', 'max' => 64],
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
            'name_english' => Yii::t('app', 'English Name'),
            'name_official' => Yii::t('app', 'Name Official'),
            'flag' => Yii::t('app', 'Flag'),
            'order' => Yii::t('app', 'Order'),
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

    public function getOrgs() {
        return $this->hasMany(Organization::className(), ['id' => 'org_id'])
      ->viaTable('country_org_rel', ['country_id' => 'id']);
    }

    public function getData() {
        return $this->hasMany(CountryData::className(), ['country_id' => 'id']);    
    }
}
