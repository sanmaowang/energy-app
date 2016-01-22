<?php

use yii\helpers\Html;
use yii\web\View;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\CountryData */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Country Datas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="country-data-view">

    <h1><?= Html::encode($this->title.$name_cn) ?> </h1>
    <div id="container">
    	
    </div>
    <table class="table">
        <tr>
            <td>#</td>
            <td>年份</td>
            <td><?php echo $name_cn;?></td>
            <td>操作</td>
        </tr>
        <?php foreach ($fulldata as $key => $d) {?>
        <tr>
            <td><?= $key+1;?></td>
            <td><?= $d->data_version;?></td>
            <td><?php echo $d->data_value;?></td>
            <td><a href="<?= Url::to(['country-data/update','id'=>$d->id]); ?>">编辑</a> </td>
        </tr>
        <?php }?>
    </table>
</div>

<?php 
$this->registerJsFile(Yii::$app->request->baseUrl.'/js/highchart/highcharts.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJs("
$(function () {
    $('#container').highcharts({
        title: {
            text: '".$model->name.$name_cn."',
            x: -20 //center
        },
        subtitle: {
            text: 'Source: bp.com',
            x: -20
        },
        xAxis: {
            categories: ".$categories."
        },
        yAxis: {
            title: {
                text: '".$name_cn."'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [".$data."]
    });
});
  ",View::POS_END,'editor');
?>
