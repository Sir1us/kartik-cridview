<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var backend\models\CashdeskTimesheet $model
 */

$this->title = 'Create Cashdesk Timesheet';
$this->params['breadcrumbs'][] = ['label' => 'Cashdesk Timesheets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cashdesk-timesheet-create">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
