<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Countries');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="country-index">

    <h1><?= Html::encode($this->title) ?></h1>
<!--
    <p>
        <?= Html::a(Yii::t('app', 'Create Country'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
-->
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            // 'code2l',
            // 'code3l',
            'name',
            // 'english_name',
            // 'name_official',
            // 'flag',
            // 'order',
            'total_quantity_consumed',
            'total_energy_consumed',
            'petroleum_reserves',
            'carbon_emission',
            'renewable_energy',
            'gdp',
            'population',
            'per_energy_consumed',
            'per_carbon_emission',
            // 'latitude',
            // 'longitude',
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
