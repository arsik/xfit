<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchCards */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Карты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cards-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить карту', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute'=>'cardTypeID',
                'label'=>'Тип карты',
                'format'=>'text',
                'content'=>function($data){
                    return $data->getTypesName();
                },
                'filter' => \app\models\Cards::getTypesList()
            ],
            [
                'attribute'=>'clubID',
                'label'=>'Клуб',
                'format'=>'text',
                'content'=>function($data){
                    return $data->getClubsName();
                },
                'filter' => \app\models\Cards::getClubsList()
            ],
            'cost',
            'header',
            //'description',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
