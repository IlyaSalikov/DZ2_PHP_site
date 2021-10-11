<?php
    if ( !isset($_POST['upd_button']) )
    {
        echo
        '<form action="index.php?page=3" method="post" enctype="multipart/form-data">
    <input type="file" name="image" class="form-control">
    <button type="submit" class="btn btn-primary" name="upd_button">
        Отправить файл
    </button>
</form>';
    } else {
        if ( $_FILES['image']['error'] != 0 )
        {
            echo '<div class="alert alert-danger"> Ошибка '.$_FILES['image']['error'].' при чтении файла</div>';
            exit();
        }
        if( is_uploaded_file($_FILES['image']['tmp_name']) )
        {
            move_uploaded_file($_FILES['image']['tmp_name'], 'img/'.$_FILES['image']['name']);
            echo '<div class="alert alert-success">Файл успешно загружен!</div>';
        }
    }


    ?>

