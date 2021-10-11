<?php
    function register($login, $password, $email)
    {
        $login = trim( htmlspecialchars($login) );
        $password = trim( htmlspecialchars($password) );
        $email1 = trim( htmlspecialchars($email) );

        if( $login == '' || $password == '' || $email = '' )
        {
            echo '<div class="alert alert-danger"> Вы должны заполнить все поля</div>';
            return false;
        }

        if( strlen($login) < 3 || strlen($login) > 30 )
        {
            echo '<div class="alert alert-danger"> Длина логина должна быть от 3 до 30 символов!</div>';
            return false;
        }

        if( strlen($password) < 8 || strlen($password) > 25 )
        {
            echo '<div class="alert alert-danger"> Длина пароля должна быть от 8 до 25 символов!</div>';
            return false;
        }

        if( $_POST['confirm'] != $_POST['password'])
        {
            echo '<div class="alert alert-danger"> Ошибка при вводе пароля </div>';
            return false;
        }

        // Открываем файл на чтение и запись с перемещением курсора в начало файла
        $file = fopen("data.txt", "a+");

        // $file - дескриптор (обработчик) файла
        while ( $string = fgets($file) )
        {
            $dataLogin = substr( $string, 0, strpos($string, ":"));

            if ( $dataLogin == $login ) {
                echo '<div class="alert alert-danger"> Такой пользователь уже существует </div>';
                return false;
            }
        }
        $dataString = $login.":".md5($password).":".$email1."\n";
        fputs($file, $dataString);
        return true;
    }
