<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Variants */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="variants-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?php
        $options = \app\models\Options::find()->all();
        $items = ArrayHelper::map($options,'id','name');
        $params = [
            'prompt' => 'Выберите опцию'
        ];
        echo $form->field($model, 'optionID')->dropDownList($items,$params);
    ?>

    <?= $form->field($model, 'cost')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Изменить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
