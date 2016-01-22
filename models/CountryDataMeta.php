<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "country_data_meta".
 *
 * @property integer $id
 * @property string $indicator_code
 * @property string $indicator_name
 * @property string $indicator_name_cn
 * @property string $source_note
 * @property string $source_note_cn
 * @property string $source_organization
 * @property string $source_organization_cn
 */
class CountryDataMeta extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'country_data_meta';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['source_note', 'source_note_cn', 'source_organization', 'source_organization_cn'], 'string'],
            [['indicator_code'], 'string', 'max' => 64],
            [['indicator_name', 'indicator_name_cn'], 'string', 'max' => 128]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'indicator_code' => Yii::t('app', 'Indicator Code'),
            'indicator_name' => Yii::t('app', 'Indicator Name'),
            'indicator_name_cn' => Yii::t('app', 'Indicator Name Cn'),
            'source_note' => Yii::t('app', 'Source Note'),
            'source_note_cn' => Yii::t('app', 'Source Note Cn'),
            'source_organization' => Yii::t('app', 'Source Organization'),
            'source_organization_cn' => Yii::t('app', 'Source Organization Cn'),
        ];
    }
}
