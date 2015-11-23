<?php

/* @var $this yii\web\View */

$this->title = 'X-FIT';
//hello
?>
<a name="top"></a>
<div class="be-together-section mdl-typography--text-center">
    <form id="nl-form" class="nl-form" action="/site/order" method="POST">
        <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
        Я из города
        <select name="city">
            <?php
                $count = 1;
                foreach($city as $cy)
                {
                    if($count == 1) echo '<option value="'.$count.'" selected>'.$cy->name.'</option>';
                    else echo '<option value="'.$count.'">'.$cy->name.'</option>';
                    $count++;
                }
            ?>
        </select>
        и хочу
        <select name="want">
            <option value="1" selected>оформить карту</option>
            <option value="2">продлить карту</option>
        </select>
        фитнес-сети X-FIT в
        <select name="club">
            <option value="1" selected>клубе</option>
            <option value="2">клуб 1</option>
            <option value="3">клуб 2</option>
            <option value="4">клуб 3</option>
        </select>
        <br/>
        Наиболее удобное время для посещения клуба это
        <select name="time">
            <option value="1" selected>любое время</option>
            <option value="2">только днем</option>
            <option value="3">только вечером</option>
            <option value="4">только утром</option>
            <option value="5">только в выходные</option>
        </select>
        <br>Данную карту приобретаю
        <select name="acquire">
            <option value="1" selected>себе</option>
            <option value="2">в подарок</option>
        </select>
        для
        <select name="age">
            <option value="1" selected>взрослого</option>
            <option value="2">ребенка</option>
            <option value="3">студента</option>
        </select>
        <br>
        Необходимый срок действия карты -
        <select name="expiry">
            <option value="1" selected>365 дней</option>
            <option value="2">182 дня</option>
            <option value="3">30 дней</option>
            <option value="3">730 дней</option>
        </select>
        <br>
        Возможность разморозки
        <select name="defrost">
            <option value="1" selected>нужна</option>
            <option value="2">не обязательна</option>
        </select>
        <br>
        Носитель оформляемой карты ранее посещал клуб
        <input type="text" value="" name="oldClub" placeholder="введите название клуба" data-subline="Пример: <em>Планета фитнес</em>"/>
        <div class="nl-submit-wrap">
            <button class="nl-submit" type="submit">Далее</button>
        </div>
        <div class="nl-overlay"></div>
    </form>
    <script>
        var nlform = new NLForm( document.getElementById( 'nl-form' ) );
    </script>
</div>