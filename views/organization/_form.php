<?php

use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Organization */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="organization-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'english_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'create_date')->textInput() ?>

    <?= $form->field($model, 'create_country')->textInput() ?>

    <?= $form->field($model, 'total_quantity_consumed')->textInput() ?>

    <?= $form->field($model, 'total_energy_consumed')->textInput() ?>

    <?= $form->field($model, 'petroleum_reserves')->textInput() ?>

    <?= $form->field($model, 'carbon_emission')->textInput() ?>

    <?= $form->field($model, 'renewable_energy')->textInput() ?>

    <?= $form->field($model, 'gdp')->textInput() ?>

    <?= $form->field($model, 'population')->textInput() ?>

    <?= $form->field($model, 'per_energy_consumed')->textInput() ?>

    <?= $form->field($model, 'per_carbon_emission')->textInput() ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'english_description')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php 
$this->registerCssFile(Yii::$app->request->baseUrl.'/css/bootstrap-datepicker.min.css', [], 'css-datepicker');
$this->registerCssFile(Yii::$app->request->baseUrl.'/js/redactor/redactor.css', [], 'css-redactor');
$this->registerJsFile(Yii::$app->request->baseUrl.'/js/redactor/redactor.min.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile(Yii::$app->request->baseUrl.'/js/bootstrap-datepicker.min.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJs("
$(function(){
  $('#organization-description').redactor();
  $('#organization-english_description').redactor();
  $('#organization-create_date').datepicker({
    format: 'yyyy-mm-dd',
    startDate: '-3d'
})

});
  ",View::POS_END,'editor');
?>
