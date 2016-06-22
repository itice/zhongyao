<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Yao */

$this->title = '修改药材: ' . $model->yao;
$this->params['breadcrumbs'][] = ['label' => '药材库存', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->yao, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '修改';
?>
<div class="yao-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
