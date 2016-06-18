<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Chufang */

$this->title = '添加处方';
$this->params['breadcrumbs'][] = ['label' => 'Chufangs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="chufang-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
