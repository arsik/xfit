<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Variants */

$this->title = 'Добавление варианта';
$this->params['breadcrumbs'][] = ['label' => 'Варианты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="variants-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
