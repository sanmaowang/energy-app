<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CountryOrgRel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="country-org-rel-form">

    <?php $form = ActiveForm::begin(); ?>
		<div class="form-group">
			<label class="control-label" for="countryorgrel-country_id">Country</label>
			<select class="form-control" name="CountryOrgRel[country_id]" id="countryorgrel-country_id">
				<?php foreach ($countries as $key => $c) {?>
				<option value="<?php echo $c->id?>"><?php echo $c->name;?></option>
				<?php }?>
			</select>
		</div>

		<input type="hidden" name="CountryOrgRel[org_id]" value="<?php echo $org->id;?>">

    <?= $form->field($model, 'join_time')->textInput() ?>

    <?= $form->field($model, 'exit_time')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', '加入') : Yii::t('app', '更新'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
