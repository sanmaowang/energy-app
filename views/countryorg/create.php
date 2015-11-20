<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CountryOrgRel */

$this->title = Yii::t('app', 'Create Country Org Rel');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Country Org Rels'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="country-org-rel-create">
	<div class="row">
		<div class="col-md-6">
		<h1>为<?php echo $org->name;?>添加成员国</h1>
    <?= $this->render('_form', [
        'model' => $model,
        'countries'=>$countries,
        'org'=>$org
    ]) ?>
		</div>
		<div class="col-md-6">
			<h2>已加入的成员国：</h2>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>国家</th>
						<th>加入时间</th>
						<th>退出时间</th>
						<th>操作</th>
					</tr>
				</thead>
			<?php if(count($rels)>0){ foreach ($rels as $key => $c) {?>
				<tr>
					<td><?php echo $c->country->name;?></td>
					<td>
						<?php echo $c->join_time?>
					</td>
					<td>
						<?php echo $c->exit_time;?>
					</td>
					<td>
						<?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $c->id], [
            'class' => 'btn btn-danger btn-xs',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
					</td>
				</tr>
			<?php }} ?>
			</table>

		</div>
	</div>
</div>
