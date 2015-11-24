<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Cards */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cards-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
        $types = \app\models\Types::find()->all();
        $items = ArrayHelper::map($types,'id','name');
        $params = [
            'prompt' => 'Выберите тип карты'
        ];
        echo $form->field($model, 'cardTypeID')->dropDownList($items,$params);
    ?>

    <?php
        $clubs = \app\models\Clubs::find()->all();
        $items = ArrayHelper::map($clubs,'id','name');
        $params = [
            'prompt' => 'Выберите клуб'
        ];
        echo $form->field($model, 'clubID')->dropDownList($items,$params);
    ?>

    <?= $form->field($model, 'cost')->textInput() ?>

    <?= $form->field($model, 'header')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textArea(['maxlength' => true]) ?>

    <?php
    $vizitings = \app\models\Viziting::find()->all();
    $items = ArrayHelper::map($vizitings,'id','title');
    $params = [
        'prompt' => 'Выберите время'
    ];
    echo $form->field($model, 'vizitingID')->dropDownList($items,$params);
    ?>

    <?php
    $durations = \app\models\Duration::find()->all();
    $items = ArrayHelper::map($durations,'id','title');
    $params = [
        'prompt' => 'Выберите срок'
    ];
    echo $form->field($model, 'durationID')->dropDownList($items,$params);
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Изменить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
