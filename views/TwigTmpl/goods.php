<?php
/**
 * @var array $goods
 * @var \App\models\Good $good
 */
?>

<div class="insert"><a href="/good/insert">Добавить</a></div>

<div class="goods_block" style="display: flex; flex-direction: row; flex-wrap: wrap;">
    {% for good in goods %}
        <a href="/good/good/?id={{good.id}}">
            <div class="good_block"
                 style="display:flex; flex-direction: column;border: black 1px solid; margin: 10px;">
                <h1> {{ good.title }} </h1>
                <h3 class="price">{{ good.price }} руб. </h3>
                <p> {{ good.info }}  </p>
                <a href="/good/delete/?id={{good.id}}">Удалить</a>
            </div>
        </a>
    {%endfor%}
</div>
