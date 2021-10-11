<form action="index.php?page=4" method="post">
    <div class="form-group">
        <label for="login" class="form-label">Логин: </label>
        <input id="login" name="login" class="form-control" type="text">
    </div>
    <div class="form-group">
        <label for="password" class="form-label">Пароль: </label>
        <input id="password" name="password" class="form-control" type="password">
    </div>
    <div class="form-group">
        <label for="confirm" class="form-label">Подтвердите пароль: </label>
        <input id="confirm" name="confirm" class="form-control" type="password">
    </div>
    <div class="form-group">
        <label for="email" class="form-label">Электронная почта: </label>
        <input id="email" name="email" class="form-control" type="email">
    </div>
    <div class="form-group">
        <button name="reg_button" class="btn btn-primary" type="submit">
            Зарегистрироваться
        </button>
    </div>
</form>


<?php
    if(isset($_POST['reg_button']))
    {
        register($_POST['login'], $_POST['password'], $_POST['email']);
    }
