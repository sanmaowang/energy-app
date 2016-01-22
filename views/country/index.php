<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = Yii::t('app', 'Countries');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="country-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <table class="table">
        <thead>
          <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Code2l</td>
            <?php foreach ($keys as $key => $v) {?>
            <td><?php echo $v->indicator_name_cn?></td>
            <?php }?>
          </tr>
        </thead>
        <?php foreach ($model as $key => $o) {?>
        <tr>
            <td><?php echo $o->id;?></td>
            <td><?php echo $o->name;?></td>
            <td><?php echo $o->code2l;?></td>
            <?php foreach ($keys as $key => $v) {?>
            <td><a href="<?php echo Url::to(['country/viewdata','id'=>$o->id,'type'=>$v->indicator_code]);?>" class="btn btn-xs btn-default">view</a></td>
            <?php }?>
        </tr>
        <?php }?>
    </table>
</div>