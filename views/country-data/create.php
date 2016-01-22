<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CountryData */

$this->title = Yii::t('app', 'Create Country Data');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Country Datas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="country-data-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
