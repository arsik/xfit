<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\OrderSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'managerID') ?>

    <?= $form->field($model, 'payTime') ?>

    <?= $form->field($model, 'deliveryTime') ?>

    <?= $form->field($model, 'createTime') ?>

    <?= $form->field($model, 'session') ?>

    <?= $form->field($model, 'fullCost') ?>

    <?= $form->field($model, 'sms') ?>

    <?= $form->field($model, 'fio') ?>

    <?= $form->field($model, 'senderPhone') ?>

    <?= $form->field($model, 'geterPhone') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
