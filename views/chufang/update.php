<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Chufang */

$this->title = '修改处方: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => '处方管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '修改处方';
?>
<div class="chufang-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
