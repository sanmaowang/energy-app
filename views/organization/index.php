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
    <table class="table">
    <?php foreach ($orgs as $key => $org) {?>
    <tr>
      <td width="100"><?php echo $org->name;?></td>
      <td>
        <?php foreach ($org->country as $key => $c) {
          echo $c->name.",";
        }?>
      </td>
    </tr>
    <?php }?>
    </table>
</div>
