<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var backend\models\CashdeskTimesheetSearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="cashdesk-timesheet-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'cashier') ?>

    <?= $form->field($model, 'cashdesk') ?>

    <?= $form->field($model, 'opendt') ?>

    <?= $form->field($model, 'closedt') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
