<div class="country-data-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'country_id')->textInput() ?>

    <?= $form->field($model, 'total_energy_production')->textInput() ?>

    <?= $form->field($model, 'total_energy_consumed')->textInput() ?>

    <?= $form->field($model, 'petroleum_reserves')->textInput() ?>

    <?= $form->field($model, 'carbon_emission')->textInput() ?>

    <?= $form->field($model, 'renewable_energy')->textInput() ?>

    <?= $form->field($model, 'gdp')->textInput() ?>

    <?= $form->field($model, 'population')->textInput() ?>

    <?= $form->field($model, 'per_energy_consumed')->textInput() ?>

    <?= $form->field($model, 'per_carbon_emission')->textInput() ?>

    <?= $form->field($model, 'date_version')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>