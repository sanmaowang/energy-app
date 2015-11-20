<?php

namespace app\models;
use app\models\Country;
use app\models\Organization;

use Yii;

/**
 * This is the model class for table "country_org_rel".
 *
 * @property integer $id
 * @property integer $country_id
 * @property integer $org_id
 * @property string $join_time
 * @property string $exit_time
 */
class CountryOrgRel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'country_org_rel';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['country_id', 'org_id'], 'integer'],
            [['country_id', 'org_id'], 'required'],
            [['country_id', 'org_id','join_time', 'exit_time'], 'safe']
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
            'org_id' => Yii::t('app', 'Org ID'),
            'join_time' => Yii::t('app', 'Join Time'),
            'exit_time' => Yii::t('app', 'Exit Time'),
        ];
    }

    public function getOrganization()
    {
        return $this->hasOne(Organization::className(), ['id' => 'org_id']);
    }

    public function getCountry()
    {
        return $this->hasOne(Country::className(), ['id' => 'country_id']);
    }
}
