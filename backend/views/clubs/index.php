<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchClubs */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Клубы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clubs-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить клуб', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            [
                'attribute'=>'cityID',
                'label'=>'Город',
                'format'=>'text',
                'content'=>function($data){
                    return $data->getCityName();
                },
                'filter' => \app\models\Clubs::getCityList()
            ],
            'addres',
            //'description',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
