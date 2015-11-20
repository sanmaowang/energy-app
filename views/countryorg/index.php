<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Country Org Rels');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="country-org-rel-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Country Org Rel'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'country_id',
            'org_id',
            'join_time',
            'exit_time',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
