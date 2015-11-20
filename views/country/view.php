<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Country */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Countries'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="country-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'code2l',
            'code3l',
            'name',
            'english_name',
            'name_official',
            'flag',
            'order',
            'total_quantity_consumed',
            'total_energy_consumed',
            'petroleum_reserves',
            'carbon_emission',
            'renewable_energy',
            'gdp',
            'population',
            'per_energy_consumed',
            'per_carbon_emission',
            'latitude',
            'longitude',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
