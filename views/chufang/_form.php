<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\ChufangYao;

/* @var $this yii\web\View */
/* @var $model app\models\Chufang */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="chufang-form">

    <?php $form = ActiveForm::begin(); ?>

<div class="row">
    <div class="col-xs-5">
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mobile')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>
    
    <?= $form->field($model, 'num')?>
    
    <?= $form->field($model,'sign_at_str')->widget('yii\jui\DatePicker',['dateFormat' => 'yyyy-MM-dd', 'options'=>['class'=>'form-control','style'=>'width:150px;'] ])?>
	</div>
    
    <div class="col-xs-5">
    <div class="grid-view">
		<table>
		  <thead>
		  <tr>
		    <th>药材</th>
		    <th>用量(克)</th>
		    <th><?= Html::a('添加', 'javascript:;', ['class' => 'btn-sm btn-success addsource']) ?></th>
		  </tr>
		  </thead>
		  <tbody class="source">
  <?php
  for($i=1;$i<=10;$i++) $newyaos[] = new ChufangYao();
  $chufangYao = $model->chufangYao ?: $newyaos;
  foreach ($chufangYao as $yao_model):
  ?>
  <tr>
    <td><?=Html::textInput('ChufangForm[yaos][]', $yao_model->yao,['class'=>'ui-autocomplete-yao form-control'])?></td>
    <td><?=Html::textInput('ChufangForm[weights][]', $yao_model->weight,['class'=>'form-control'])?></td>
    <td><?=Html::a('删除', 'javascript:;', ['class'=>'delsource iso'])?></td>
  </tr>
  <?php endforeach;?>
		   </tbody>
		</table>
	</div>
	</div>
</div>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php 
$this->registerCss("
	.delsource{width:30px;display:block}
    .grid-view table{width:785px; font:normal 12px '微软雅黑';}
    .grid-view thead th{padding:10px; font:normal 12px '微软雅黑'; color:#333; background:#f5f5f5; }
    .grid-view tbody td{text-align:center; padding:10px;}
		");
		
$this->registerJs("
	$('body').on('click', '.delsource', function(){
        if($('.source').children().length > 1)
            $(this).parent().parent().remove();
    });
    
    var source_html = '<tr>\
    <td><input type=\"text\" class=\"ui-autocomplete-yao form-control\" name=\"ChufangForm[yaos][]\" value=\"\"></td>\
    <td><input type=\"text\" class=\"form-control\" name=\"ChufangForm[weights][]\" value=\"\"></td>\
    <td><a class=\"delsource iso\" href=\"javascript:;\">删除</a></td>\
    </tr>';
    $('.addsource').click(function(){
        $('.source').append(source_html);
    });
		
		");
?>

<?=$this->render('//layouts/__autocomplete_yao');?>