<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Yao */

$this->title = 'Update Yao: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Yaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="yao-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
