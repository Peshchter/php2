{% extends "layouts/main.php" %}
{% block content %}
<div class="insert"><a href="/good/insert">Добавить</a></div>
{%if logged_in%}
<div class="">Вы вошли как {{user.name}}</div>
<div class="insert"><a href="/user/signOut">Выйти</a>

</div>
{%else%}
<div class="insert">
    <a href="/user/signIn">Войти</a>
    <a href="/user/reg">Зарегистрироваться</a>
</div>
{%endif%}
<?php
/**
 * @var array $goods
 * @var \App\models\Good $good
 */
?>
<div class="goods_block" style="display: flex; flex-direction: row; flex-wrap: wrap;">
    {% for good in goods %}
    <a href="/good/good/?id={{good.id}}">
        <div class="good_block" class="btn btn-light"
             style="display:flex; flex-direction: column;border: black 1px solid; margin: 10px;">
            <h1> {{ good.title }} </h1>
            <h3 class="price">{{ good.price }} руб. </h3>
            <p> {{ good.info }} </p>
            <a href="/good/delete/?id={{good.id}}" class="btn btn-danger">Удалить из базы</a>
            <a href="/basket/add/?id={{good.id}}" class="btn btn-success">В корзину</a>

        </div>
    </a>
    {%endfor%}
</div>
{% endblock %}

{% block basket %}
<div class="goods_block" style="display: flex; flex-direction: column; border: black 1px solid; margin: 10px;">
    <h2>Корзина</h2>
    {% for id,good in basket %}
    <div class="good_block" class="btn btn-light"
         style="display:flex; flex-direction: column;border: black 1px solid; margin: 10px;">
        <h1> {{ good.title}} </h1>
        <h3 class="price">{{ good.price }} руб. </h3>
        <p> Количество {{ good.count }} шт.</p>
        <a href="/basket/delete/?id={{id}}" class="btn btn-danger">Удалить из корзины</a>
    </div>
    {%else %}Пока пуста
    {%endfor%}
    {%if basket%}
          {%if logged_in%}
              <a href="/order/confirm/" class="btn btn-primary">Оформить заказ</a>
          {%else%}
              <a href="/user/reg/" class="btn btn-primary">Зарегистрируйтесь или войдите для оформления заказа</a>
          {%endif%}
          <a href="/basket/clear/" class="btn btn-danger">Очистить</a>
    {%endif%}
</div>
{% endblock %}