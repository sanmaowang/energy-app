<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Country */

$this->title = Yii::t('app', 'Create Country Data');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Countries'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="country-create">

    <div class="row">
    	<div class="col-md-6">
    		<?php foreach ($countrymodel->data as $key => $d) {?>
    		<div class="panel panel-default">
    			<div class="panel-heading">
    			 <b><?php echo $d->date_version;?> 的数据</b>
    			</div>
    			<div class="panel-body">
    				<table class="table">
					<tr>
						<td>能源生产总量</td>
						<td><?php echo $d->total_energy_production;?></td>
					</tr>
					<tr>
						<td>能源消费总量</td>
						<td><?php echo $d->total_energy_consumed;?></td>
					</tr>
					<tr>
						<td>油气储量</td>
						<td><?php echo $d->petroleum_reserves;?></td>
					</tr>
					<tr>
						<td>碳排放</td>
						<td><?php echo $d->carbon_emission;?></td>
					</tr>
					<tr>
						<td>可再生能源产量</td>
						<td><?php echo $d->renewable_energy;?></td>
					</tr>
					<tr>
						<td>GDP</td>
						<td><?php echo $d->population;?></td>
					</tr>
					<tr>
						<td>人口</td>
						<td><?php echo $d->total_energy_production;?></td>
					</tr>
					<tr>
						<td>人均能源消费量</td>
						<td><?php echo $d->per_energy_consumed;?></td>
					</tr>
					<tr>
						<td>人均碳排放量</td>
						<td><?php echo $d->per_carbon_emission;?></td>
					</tr>
    		</table>
    			</div>
    		</div>
    		
    		<?php }?>
    	</div>
    	<div class="col-md-6">
    		<div class="country-data-form">
    			<h2><?= Html::encode($this->title) ?></h2>
			    <?php $form = ActiveForm::begin(); ?>
					
					<input type="hidden" id="countrydata-country_id" class="form-control" name="CountryData[country_id]" value="<?php echo $countrymodel->id;?>"/>
			    <?= $form->field($model, 'date_version')->textInput() ?>
					
			    <?= $form->field($model, 'total_energy_production')->textInput() ?>

			    <?= $form->field($model, 'total_energy_consumed')->textInput() ?>

			    <?= $form->field($model, 'petroleum_reserves')->textInput() ?>

			    <?= $form->field($model, 'carbon_emission')->textInput() ?>

			    <?= $form->field($model, 'renewable_energy')->textInput() ?>

			    <?= $form->field($model, 'gdp')->textInput() ?>

			    <?= $form->field($model, 'population')->textInput() ?>

			    <?= $form->field($model, 'per_energy_consumed')->textInput() ?>

			    <?= $form->field($model, 'per_carbon_emission')->textInput() ?>


			    <div class="form-group">
			        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
			    </div>

			    <?php ActiveForm::end(); ?>

			</div>
    	</div>
    </div>

    

</div>
