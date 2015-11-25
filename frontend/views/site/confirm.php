<?php

$this->title = 'Оформление клубной карты';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="confirm">
    <div class="confirm-content">
        <h5>Подтверждение заказа</h5>
        <form action="https://money.yandex.ru/eshop.xml" method="post">
<!--            <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />-->

            <input name="shopId" value="1234" type="hidden"/>
            <input name="scid" value="4321" type="hidden"/>
            <input name="sum" value="100.50" type="hidden">

            <input name="customerNumber" value="abc000" type="hidden"/>
            <div class="mdl-textfield mdl-js-textfield">
                <input class="mdl-textfield__input" type="text" id="fio">
                <label class="mdl-textfield__label" for="fio">ФИО</label>
            </div>
            <div class="mdl-textfield mdl-js-textfield">
                <input class="mdl-textfield__input" type="text" id="email" name="cps_email">
                <label class="mdl-textfield__label" for="email">Ваш email</label>
            </div>
            <div class="mdl-textfield mdl-js-textfield">
                <input class="mdl-textfield__input" type="text" id="phone" name="cps_phone">
                <label class="mdl-textfield__label" for="phone">Ваш телефон</label>
            </div>
            <h6>Данные на карте</h6>
            <div class="mdl-textfield mdl-js-textfield">
                <input class="mdl-textfield__input" type="text" id="fio">
                <label class="mdl-textfield__label" for="fio">ФИО владельца карты</label>
            </div>
            <div class="mdl-textfield mdl-js-textfield">
                <input class="mdl-textfield__input" type="text" id="age">
                <label class="mdl-textfield__label" for="age">Дата рождения</label>
            </div>
            <h6>Информация о заказе</h6>
            <p>- Город: <strong>Казань</strong></p>
            <p>- Клуб: <strong>X-FIT АК БАРС</strong></p>
            <p>- Клубная карта: <strong>X-FIT PRO</strong></p><br>
            <span class="price">Итого: <strong>25 000 руб.</strong></span>
            <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">Оформить карту</button>
        </form>
    </div>
</div>


<style>
    .confirm {
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        flex-direction: column;
    }
    .confirm-content {
        width: 100%;
        max-width: 560px;
        min-height: 420px;
        background: rgba(0,0,0,.50);
        margin-top: 3.5vh;
        margin-bottom: 3.5vh;
        box-sizing: border-box;
        color: #fff;
        padding: 20px 30px;
    }
    .mdl-textfield {
        width: 100%;
    }
    .mdl-textfield__input {
        border-bottom: 1px solid rgba(255,255,255,.22);
    }
    .mdl-textfield__label {
        color: rgba(255,255,255,.22);
    }
    .md-input-container:not(.md-input-invalid).md-input-focused .md-input {
        border-color: rgba(255,255,255,.90);
    }
    .mdl-textfield__label::after {
        background-color: #58ff3b;
    }
    .mdl-button {
        float: right;
    }
    .price {
        font-size: 16px;
    }
    strong {
        color: #68ff65;
    }
</style>