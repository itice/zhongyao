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
	<?=$this->render('//layouts/__autocomplete_yao');?>
	
	<div class="form-group field-yaologsearch-date_range">
    <label class="control-label" for="yaologsearch-date_range">日期</label>
    <?=DateRangePicker::widget([
		'model'=>$model,
		'attribute'=>'date_range'
	])?>
    <div class="help-block"></div>
    </div>
	

    <div class="form-group">
        <?= Html::submitButton('搜索', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('重置', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

