<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Managers */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="managers-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password_hash')->textInput(['maxlength' => true]) ?>

    <?php //$form->field($model, 'date')->textInput() ?>

    <?php
        $clubs = \app\models\Clubs::find()->all();
        $items = ArrayHelper::map($clubs,'id','name');
        $params = [
            'prompt' => 'Выберите клуб'
        ];
        echo $form->field($model, 'clubID')->dropDownList($items,$params);
    ?>

    <?= $form->field($model, 'fullName')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Изменить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
