<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\YaoLog */

$this->title = 'Create Yao Log';
$this->params['breadcrumbs'][] = ['label' => 'Yao Logs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="yao-log-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
