<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchManagers */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Менеджеры';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="managers-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить менеджера', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'username',
            'date',
            [
                'attribute'=>'clubID',
                'label'=>'Клуб',
                'format'=>'text',
                'content'=>function($data){
                    return $data->getClubsName();
                },
                'filter' => \app\models\Managers::getClubsList()
            ],
            'fullName',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
