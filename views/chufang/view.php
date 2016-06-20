<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Chufang */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => '处方管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="chufang-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
            'mobile',
            'address',
            'content:ntext',
            ['label'=>'登记日期','value'=>date('Y-m-d', $model->sign_at)],
            ['label'=>'处方','value'=>$model->chufangYaoText],
        ],
    ]) ?>

</div>
