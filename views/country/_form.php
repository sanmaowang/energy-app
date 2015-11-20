<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Country */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="country-form">

    <?php $form = ActiveForm::begin(); ?>
<!--
    <?= $form->field($model, 'code2l')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'code3l')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'english_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name_official')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'flag')->textInput(['maxlength' => true]) ?>
-->

    <?= $form->field($model, 'total_quantity_consumed')->textInput() ?>

    <?= $form->field($model, 'total_energy_consumed')->textInput() ?>

    <?= $form->field($model, 'petroleum_reserves')->textInput() ?>

    <?= $form->field($model, 'carbon_emission')->textInput() ?>

    <?= $form->field($model, 'renewable_energy')->textInput() ?>

    <?= $form->field($model, 'gdp')->textInput() ?>

    <?= $form->field($model, 'population')->textInput() ?>

    <?= $form->field($model, 'per_energy_consumed')->textInput() ?>

    <?= $form->field($model, 'per_carbon_emission')->textInput() ?>

    <?= $form->field($model, 'order')->textInput() ?>
    <!--
    <?= $form->field($model, 'latitude')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'longitude')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>
    -->
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
