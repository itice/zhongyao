<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Yao */

$this->title = $model->yao;
$this->params['breadcrumbs'][] = ['label' => '药材管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="yao-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'yao',
            'price',
            'stock',
        ],
    ]) ?>

</div>
