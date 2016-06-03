<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
use backend\models\CashdeskTimesheet;
use kartik\widgets\DateTimePicker;
use kartik\widgets\DatePicker;
use kartik\export\ExportMenu;


/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var backend\models\CashdeskTimesheetSearch $searchModel
 */

$this->title = 'Cashdesk Timesheets';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cashdesk-timesheet-index">
    <div class="page-header">
            <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php /* echo Html::a('Create Cashdesk Timesheet', ['create'], ['class' => 'btn btn-success'])*/  ?>
    </p>

    <?php
    $gridColumns = [
            [
                'class'=>'kartik\grid\SerialColumn'
            ],
            [
                'attribute'=>'cashier',
                'width'=>'310px',
                'value'=>function ($model) {
                    return $model->cashier;
                },
               /* 'filterType'=>GridView::FILTER_SELECT2,
                'filter'=>ArrayHelper::map(CashdeskTimesheet::find()->orderBy('cashier')->asArray()->all(), 'cashier', 'cashier'),
                'filterWidgetOptions'=>[
                    'pluginOptions'=>['allowClear'=>true],
                ],
                'filterInputOptions'=>['placeholder'=>'Any supplier'],*/
                'group'=>true,  // enable grouping
                'groupHeader'=>function ($model) { // Closure method
                    return [
                        /*'mergeColumns'=>[[1,3]], // columns to merge in summary*/
                        'content'=>[             // content to show in each summary cell
                            1 => 'Cashier Number (' . $model->cashier . ')',
                            3=>GridView::F_COUNT,
                            /*5=>GridView::FILTER_DATE_RANGE,
                            6=>GridView::FILTER_DATE,*/
                        ],
                        /*'contentFormats'=>[      // content reformatting for each summary cell
                            4=>['format'=>'number', 'decimals'=>2],
                            5=>['format'=>'number', 'decimals'=>0],
                            6=>['format'=>'number', 'decimals'=>2],
                        ],
                        'contentOptions'=>[      // content html attributes for each summary cell
                            1=>['style'=>'font-variant:small-caps'],
                            4=>['style'=>'text-align:right'],
                            5=>['style'=>'text-align:right'],
                            6=>['style'=>'text-align:right'],
                        ],*/

                        // html attributes for group summary row
                        'options'=>['class'=>'danger','style'=>'font-weight:bold;']
                    ];
                }
            ],
            'id',
            'cashier',
            'cashdesk',
            [
                'attribute'=>'opendt',
                'format'=>['date', 'php:Y-m-d H:i:s']],
            [
                'attribute'=>'closedt',
                'format'=>['date', 'php:Y-m-d H:i:s']],
            [
                'class' => 'yii\grid\ActionColumn',
                'buttons' => [
                    'update' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', Yii::$app->urlManager->createUrl(['cashdesk-timesheet/view','id' => $model->id,'edit'=>'t']), [
                            'title' => Yii::t('yii', 'Edit'),
                        ]);}

                ],
            ],
    ];
/*    echo ExportMenu::widget([
        'dataProvider' => $dataProvider,
        'columns' => $gridColumns
    ]);*/

    // Renders a export dropdown menu

    Pjax::begin();
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumns,
        'showPageSummary'=>false,
        'pjax'=>true,
        'striped'=>false,
        'hover'=>true,
        'responsive'=>true,
        'condensed'=>true,
        'floatHeader'=>true,
        'export' => [
            'fontAwesome' => false,
        ],
        'toolbar' => ['{export}', '{toggleData}'],
        'panel'=>['type'=>'primary', 'heading'=>'Grid Grouping Example'],
    ]); Pjax::end(); ?>

</div>
