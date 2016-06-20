<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\daterange\DateRangePicker;

/* @var $this yii\web\View */
/* @var $model app\models\YaoLogSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="yao-log-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>


    <?= $form->field($model, 'yao')->textInput(['class'=>'ui-autocomplete-yao form-control']) ?>

	<?=DateRangePicker::widget([
		'model'=>$model,
		'attribute'=>'date_range',
		'pluginOptions'=>[
		    'timePickerIncrement'=>7,
			'format'=>'Y-m-d'
		]
	])?>

    <div class="form-group">
        <?= Html::submitButton('搜索', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('重置', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

