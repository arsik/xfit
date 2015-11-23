<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mdl-grid card-xfit">
    <div class="mdl-cell mdl-cell--3-col mdl-cell--8-col-tablet mdl-cell--6-col-phone menu-xfit">
        <ul id="cards-menu">
            <li class="active">С заморозкой</li>
            <li>Без заморозки</li>
            <li>Студенческая (15-21)</li>
            <li>Детская (3-14)</li>
            <li>Продление</li>
            <li>Корпоративная</li>
        </ul>
    </div>
    <div class="mdl-cell mdl-cell--9-col content-xfit">
        <div class="mdl-grid">
            <div class="mdl-cell mdl-cell--8-col">
                <h3>С заморозкой в клуб</h3>
                <form id="nl-form" class="nl-form two">
                    <select name="club">
                        <?php
                            $count = 1;
                            foreach($clubs as $club)
                            {
                            if($count == 1) echo '<option value="'.$count.'" selected>'.$club->name.'</option>';
                            else echo '<option value="'.$count.'">'.$club->name.'</option>';
                            $count++;
                            }
                        ?>
                    </select>
                    <div class="nl-overlay"></div>
                </form>
                <script src="nlform.js"></script>
                <script>
                    var nlform = new NLForm( document.getElementById( 'nl-form' ) );
                </script>
                <p>
                    Время посещения:
                    <select>
                        <option value="1">7:30 - 11:00</option>
                        <option value="2">11:00 - 24:00</option>
                    </select>
                </p>
                <p>
                    Срок действия карты:
                    <select>
                        <option value="1">30 дней</option>
                        <option value="2">182 дня</option>
                        <option value="2">365 дней</option>
                        <option value="2">730 дней</option>
                    </select>
                </p>
                <p>Описание:<br>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum possimus vero nisi. Repellendus fugiat sed voluptas, nemo! Commodi voluptatibus, earum nulla cupiditate culpa veniam, doloribus voluptate dolor neque qui eum id mollitia maxime. Laboriosam sapiente odio eligendi pariatur optio nostrum expedita nisi soluta at, possimus repudiandae quo molestiae facere rem quae natus commodi quam sint itaque ea, exercitationem aperiam? Debitis ducimus iusto voluptas repellat nostrum cupiditate eaque quaerat consequuntur in, numquam eligendi facilis autem optio.</p>
            </div>
            <div class="mdl-cell mdl-cell--4-col cards">
                <div class="bg-cards"></div>
                <p>15.000 Р</p>
                <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">Оформить карту</button>
                <span class="act">Индивидуальное предложение</span>
            </div>
        </div>
    </div>
</div>