<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Order */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
    $clubs = \app\models\Clubs::find()->all();
    $items = ArrayHelper::map($clubs,'id','name');
    $params = [
        'prompt' => 'Выберите клуб'
    ];
    echo $form->field($model, 'clubID')->dropDownList($items,$params);
    ?>

    <?php
        $managers = \app\models\Managers::find()->all();
        $items = ArrayHelper::map($managers,'id','username');
        $params = [
            'prompt' => 'Выберите менеджера'
        ];
        echo $form->field($model, 'managerID')->dropDownList($items,$params);
    ?>

    <?php //$form->field($model, 'deliveryTime')->textInput() ?>

    <?php //$form->field($model, 'createTime')->textInput() ?>

    <?php //$form->field($model, 'session')->textInput(['maxlength' => true]) ?>



    <?php //$form->field($model, 'sms')->textInput() ?>

    <?= $form->field($model, 'fio')->textInput(['maxlength' => true]) ?>

    <?=$form->field($model, 'fullCost')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'senderPhone')->textInput() ?>

    <?= $form->field($model, 'geterPhone')->textInput() ?>

    <?php //$form->field($model, 'payTime')->checkbox() ?>

    <?= $form->field($model, 'deliveryTime')->checkbox() ?>

    <?= $form->field($model, 'description')->textarea(['maxlength' => 256]) ?>

    <?= $form->field($model, 'special')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Изменить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
