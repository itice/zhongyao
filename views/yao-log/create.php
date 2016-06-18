<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\YaoLog */

$this->title = '添加';
$this->params['breadcrumbs'][] = ['label' => '药材进出', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="yao-log-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
