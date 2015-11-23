<?php

/* @var $this yii\web\View */
use yii\bootstrap\Modal;
use yii\bootstrap\Alert;

$this->title = 'Администрирование';
$session = Yii::$app->session;
$inCart = $session->get('cards');
$session_order = $session->get('session_order');
$fullCart = $session['cart'];
$fullCost = $session->get('fullcost');
if($inCart == null) $inCart = 0;
if($fullCost == null) $fullCost = 0;
?>

<div class="row row-offcanvas row-offcanvas-right">

<div class="col-xs-12 col-sm-9">
  <p class="pull-right visible-xs">
    <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Меню</button>
  </p>
  <div class="row">

  </div><!--/row-->
</div><!--/span-->

  <?php
    $cities = \app\models\City::find()->count();
    $clubs = \app\models\Clubs::find()->count();
    $cards = \app\models\Cards::find()->count();
    $types = \app\models\Types::find()->count();
    $options = \app\models\Options::find()->count();
    $variants = \app\models\Variants::find()->count();
    $orders = \app\models\Order::find()->count();
  ?>

<div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
  <div class="list-group">
    <?php
    $session = Yii::$app->session;
    if($session->get('manager') == 2)
    {
    echo('<a href="/city" class="list-group-item">Города (' . $cities . ')</a>
    <a href="/clubs" class="list-group-item">Клубы (' . $clubs . ')</a>
    <a href="/cards" class="list-group-item">Карты (' . $cards . ')</a>
    <a href="/types" class="list-group-item">Типы карт (' . $types . ')</a>
    <a href="/options" class="list-group-item">Опции (' . $options . ')</a>
    <a href="/variants" class="list-group-item">Варианты (' . $variants . ')</a>');
    }
    ?>
    <a href="/order" class="list-group-item">Заказы (<?=$orders?>)</a>
  </div>
</div><!--/span-->

</div><!--/row-->
