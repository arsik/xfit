<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Viziting */

$this->title = 'Create Viziting';
$this->params['breadcrumbs'][] = ['label' => 'Vizitings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="viziting-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
