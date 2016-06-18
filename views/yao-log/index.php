<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\YaoLogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '药材进出';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="yao-log-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('添加', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'yao',
        	['attribute'=>'weight', 'value'=>function($model){
       			$html = '';
       			if($model->weight > 0) $html .= "<span style='color:green'>+</span>";
       			$html .= $model->weight;
       			return $html;
       		},'format'=>'raw'],
            'content',
        		
        	'created_at',
        ],
    ]); ?>
</div>
