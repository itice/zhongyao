<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\YaoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Yaos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="yao-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Yao', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'yao',
            'price',
            'stock',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
