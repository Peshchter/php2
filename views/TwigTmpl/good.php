<?php

/**
 * @var \App\models\Good $good
 */

?>
<a href="/good/goods/">Весь список</a>
<div class="" style="display: flex;">
    <div class="good_block"
         style="display:flex; flex-direction: column;border: black 1px solid; margin: 10px;">
        <h1> {{ good.title }} </h1>
        <h3 class="price">{{ good.price }} руб. </h3>
        <p> {{ good.info }}  </p>
        <a href="/good/insert/?id={{good.id}}">Изменить</a>
    </div>
</div>
