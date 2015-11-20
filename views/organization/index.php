<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Organizations');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="organization-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Organization'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'name',
            // 'english_name',
            // 'create_date',
            // 'create_country',
            // 'description:ntext',
            // 'english_description:ntext',
            'total_quantity_consumed',
            'total_energy_consumed',
            'petroleum_reserves',
            'carbon_emission',
            'renewable_energy',
            'gdp',
            'population',
            'per_energy_consumed',
            'per_carbon_emission',
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
