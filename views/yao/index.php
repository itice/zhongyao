<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\YaoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '药材管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="yao-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('添加药材', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('更新库存', ['update-store'], ['class' => 'btn btn-info']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'yao',
            'price',
            'stock',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
