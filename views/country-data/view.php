<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\CountryData */

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Country Datas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="country-data-view">

    <h1>Data</h1>
<table class="table">
    <?php foreach ($datamodel as $key => $m) {
        echo "<tr>";
        echo "<td>".$m['data_key']."</td>";
        echo "<td>".$m['data_value']."</td>";
        echo "<td>".$m['data_version']."</td>";
        echo "</tr>";
    };?>
</table>
</div>
