<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "full_country".
 *
 * @property integer $id
 * @property integer $enabled
 * @property string $code3l
 * @property string $code2l
 * @property string $name
 * @property string $name_official
 * @property string $flag_32
 * @property string $flag_128
 * @property string $latitude
 * @property string $longitude
 * @property integer $zoom
 */
class FullCountry extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'full_country';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'code3l', 'code2l', 'name'], 'required'],
            [['id', 'enabled', 'zoom'], 'integer'],
            [['latitude', 'longitude'], 'number'],
            [['code3l'], 'string', 'max' => 3],
            [['code2l'], 'string', 'max' => 2],
            [['name'], 'string', 'max' => 64],
            [['name_official'], 'string', 'max' => 128],
            [['flag_32', 'flag_128'], 'string', 'max' => 255],
            [['name'], 'unique'],
            [['code3l'], 'unique'],
            [['code2l'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'enabled' => Yii::t('app', 'Enabled'),
            'code3l' => Yii::t('app', 'Code3l'),
            'code2l' => Yii::t('app', 'Code2l'),
            'name' => Yii::t('app', 'Name'),
            'name_official' => Yii::t('app', 'Name Official'),
            'flag_32' => Yii::t('app', 'Flag 32'),
            'flag_128' => Yii::t('app', 'Flag 128'),
            'latitude' => Yii::t('app', 'Latitude'),
            'longitude' => Yii::t('app', 'Longitude'),
            'zoom' => Yii::t('app', 'Zoom'),
        ];
    }
}
