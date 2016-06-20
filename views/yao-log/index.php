<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\YaoLogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '药材进出';
$this->params['breadcrumbs'][] = $this->title;

$query = clone $dataProvider->query;
$inc = $query->andWhere(['>','weight',0])->sum('weight') ?: '0.00';
$query = clone $dataProvider->query;
$dec = $query->andWhere(['<','weight',0])->sum('weight') ?: '0.00';
$dec = number_format(abs($dec), 2);
?>
<div class="yao-log-index">

    <h1><?= Html::encode($this->title) ?></h1>
    
    <?=$this->render('_search', ['model' => $searchModel]); ?>
	<?="收入:<span style='color:green'>$inc</span>克 支出:<span style='color:red'>$dec</span>克"?>
    <p>
        <?= Html::a('添加', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'yao',
        	['attribute'=>'weight', 'value'=>function($model){
       			return $model->weight > 0 ? "<span style='color:green'>+{$model->weight}</span>" : "<span style='color:red'>{$model->weight}</span>";
       		},'format'=>'raw'],
            'content',
        		
        	'created_at',
        ],
    ]); ?>
</div>
