<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Viziting */

$this->title = 'Update Viziting: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Vizitings', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="viziting-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
