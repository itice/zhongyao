<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\YaoLog */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="yao-log-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($model, 'yao')->textInput(['maxlength' => true, 'class'=>'ui-autocomplete-yao form-control']) ?>

    <?= $form->field($model, 'weight')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?=$this->render('//layouts/__autocomplete_yao');?>