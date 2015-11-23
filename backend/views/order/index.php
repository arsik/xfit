<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Заказы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать заказ', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
                'attribute'=>'clubID',
                'label'=>'Клуб',
                'format'=>'text',
                'content'=>function($data){
                    return $data->getClubsName();
                },
                'filter' => \app\models\Order::getClubsList()
            ],
            [
                'attribute'=>'managerID',
                'label'=>'Менеджер',
                'format'=>'text',
                'content'=>function($data){
                    return $data->getManagersName();
                },
                'filter' => \app\models\Order::getManagersList()
            ],
            'payTime',
            'deliveryTime',
            'createTime',
            //'session',
            'fullCost',
            //'sms',
            'fio',
            'senderPhone',
            'geterPhone',
            //'special',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
