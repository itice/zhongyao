<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ChufangSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '处方管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="chufang-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('添加处方', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'name',
            'mobile',
            'address',
            'content:ntext',
            ['attribute'=>'sign_at', 'value'=>function($model){
                return date('Y-m-d', $model->sign_at);
            }],
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
