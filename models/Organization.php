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
 * @property string $slug
 * @property string $english_name
 * @property string $founding_year
 * @property string $initiating_country
 * @property string $funding_model
 * @property string $top_funding_country
 * @property string $responsible_person
 * @property string $description
 * @property string $english_description
 * @property integer $created_at
 * @property integer $updated_at
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
            [['slug','founding_year'], 'safe'],
            [['description', 'english_description'], 'string'],
            [['created_at', 'updated_at'], 'integer'],
            [['name', 'english_name', 'responsible_person'], 'string', 'max' => 255],
            [['initiating_country', 'funding_model'], 'string', 'max' => 80],
            [['top_funding_country','founding_year'], 'string', 'max' => 25]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'slug'=>Yii::t('app', '简称'),
            'english_name' => Yii::t('app', 'English Name'),
            'founding_year' => Yii::t('app', '成立时间'),
            'initiating_country' => Yii::t('app', '发起国'),
            'funding_model' => Yii::t('app', '成员国出资模式'),
            'top_funding_country' => Yii::t('app', '最大出资国'),
            'responsible_person' => Yii::t('app', '现任负责人'),
            'description' => Yii::t('app', 'Description'),
            'english_description' => Yii::t('app', 'English Description'),
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

    public function getCountry() {
        return $this->hasMany(Country::className(), ['id' => 'country_id'])
      ->viaTable('country_org_rel', ['org_id' => 'id']);
    }
}
