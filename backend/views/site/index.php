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
    $orders = \app\models\Order::find()->count();
    $viziting = \app\models\Viziting::find()->count();
    $duration = \app\models\Duration::find()->count();
  ?>

<div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
  <div class="list-group">
    <?php
    if(Yii::$app->user->identity->username == "admin")
    {
      echo('<a href="/city" class="list-group-item">Города (' . $cities . ')</a>
      <a href="/clubs" class="list-group-item">Клубы (' . $clubs . ')</a>
      <a href="/cards" class="list-group-item">Карты (' . $cards . ')</a>
      <a href="/types" class="list-group-item">Типы карт (' . $types . ')</a>
      <a href="/viziting" class="list-group-item">Время посещений (' . $viziting . ')</a>
      <a href="/duration" class="list-group-item">Сроки действия карт (' . $duration . ')</a>');
    }
    ?>
    <a href="/order" class="list-group-item">Заказы (<?=$orders?>)</a>
  </div>
</div><!--/span-->

</div><!--/row-->
