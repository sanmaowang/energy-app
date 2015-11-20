<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Organization */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Organizations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="organization-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', '编辑'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', '编辑成员国'), ['countryorg/create', 'oid' => $model->id], ['class' => 'btn btn-info'])?>
        <?= Html::a(Yii::t('app', '删除'), ['delete', 'id' => $model->id], [
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
            'name',
            'english_name',
            'create_date',
            'create_country',
            'description:ntext',
            'english_description:ntext',
            'total_quantity_consumed',
            'total_energy_consumed',
            'petroleum_reserves',
            'carbon_emission',
            'renewable_energy',
            'gdp',
            'population',
            'per_energy_consumed',
            'per_carbon_emission',
            'created_at',
            'updated_at',
        ],
    ]) ?>
    
    <h2>成员国</h2>
    <?php if(count($model->countries) > 0){?>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>国家</th>
            </tr>
        </thead>
    <?php foreach ($model->countries as $key => $c) {?>
        <tr>
            <td><?= $c->name;?></td>
        </tr>
    <?php }?>
    </table>
    <?php }?>

</div>
