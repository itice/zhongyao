<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Yao */

$this->title = 'Create Yao';
$this->params['breadcrumbs'][] = ['label' => 'Yaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="yao-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
