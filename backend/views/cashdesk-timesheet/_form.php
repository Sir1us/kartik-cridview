<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\datecontrol\DateControl;

/**
 * @var yii\web\View $this
 * @var backend\models\CashdeskTimesheet $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="cashdesk-timesheet-form">

    <?php $form = ActiveForm::begin(['type'=>ActiveForm::TYPE_HORIZONTAL]); echo Form::widget([

        'model' => $model,
        'form' => $form,
        'columns' => 1,
        'attributes' => [

            'id'=>['type'=> Form::INPUT_TEXT, 'options'=>['placeholder'=>'Enter ID...']],

            'cashier'=>['type'=> Form::INPUT_TEXT, 'options'=>['placeholder'=>'Enter Cashier...']],

            'cashdesk'=>['type'=> Form::INPUT_TEXT, 'options'=>['placeholder'=>'Enter Cashdesk...']],

            'opendt'=>['type'=> Form::INPUT_WIDGET, 'widgetClass'=>DateControl::classname(),'options'=>['type'=>DateControl::FORMAT_DATETIME]],

            'closedt'=>['type'=> Form::INPUT_WIDGET, 'widgetClass'=>DateControl::classname(),'options'=>['type'=>DateControl::FORMAT_DATETIME]],

        ]

    ]);

    echo Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']);
    ActiveForm::end(); ?>

</div>
