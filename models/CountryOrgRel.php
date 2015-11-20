<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "country_org_rel".
 *
 * @property integer $id
 * @property integer $country_id
 * @property integer $org_id
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
            [['country_id', 'org_id'], 'integer']
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
        ];
    }
}
