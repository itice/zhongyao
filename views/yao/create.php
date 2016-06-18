<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Yao */

$this->title = '添加药材';
$this->params['breadcrumbs'][] = ['label' => '药材库存', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="yao-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
