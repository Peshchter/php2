<!DOCTYPE html>
<html lang="ru">
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
            <label for="examplename">Логин</label>
            <input type="text" class="form-control" id="examplename" aria-describedby="emailHelp"
                   placeholder="Введите логин"
                   name="login" value="{{good.price}}">
            <small id="name" class="form-text text-muted">Если пользователь существует, то данные обновятся</small>
        </div>
        <div class="form-group">
            <label for="examplename2">Пароль</label>
            <input type="password" class="form-control" id="examplename2" aria-describedby="emailHelp"
                   placeholder="Придумайте пароль"
                   name="password" value="{{good.price}}">
        </div>

        <button type="submit" class="btn btn-success">Войти</button>
        <input name="do" value="save" hidden>
        <input name="id" value="{{good.id}}" hidden>
    </form>
</div>
</body>
</html>
