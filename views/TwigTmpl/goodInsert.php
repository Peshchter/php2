<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forms</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

<div class="saveform" style="display: flex; justify-content: center;">
    <form action="" method="POST" style="width: 500px;">
        <div class="form-group">
            <label for="exampleInputEmail1">Название</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                   placeholder="Введите название"
                   name="title" value="{{good.title}}">
            <small id="emailHelp" class="form-text text-muted">Проверки нет</small>
        </div>
        <div class="form-group">
            <label for="examplename">Цена</label>
            <input type="number" class="form-control" id="examplename" aria-describedby="emailHelp"
                   placeholder="Введите цену"
                   name="price" value="{{good.price}}">
            <small id="name" class="form-text text-muted">Если пользователь существует, то данные обновятся</small>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Дополнительная информация</label>
            <input name="info" type="text" class="form-control" id="exampleInputPassword1" placeholder="Напишите инфу"
            value="{{good.info}}">
        </div>

        <button type="reset" class="btn btn-outline-secondary">Сброс</button>
        <button type="submit" class="btn btn-success">Сохранить</button>
        <input name="do" value="save" hidden>
        <input name="id" value="{{good.id}}" hidden>
    </form>
</div>
</body>
</html>