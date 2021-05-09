<?php
/* Основные настройки --------------------------------------- */

    const DB_HOST = 'localhost';
    const DB_LOGIN = 'root';
    const DB_PASSWORD = 'root';
    const DB_NAME = 'gbook';

    $connection = mysqli_connect(DB_HOST, DB_LOGIN, DB_PASSWORD, DB_NAME);
    if ($connection) {
        echo 'Подключение прошло успешно!';
    }
    else {
        echo 'Ошибка';
    }

/* Основные настройки */

/* Сохранение записи в БД ------------------------------------ */

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        if ($_POST['name'] != '' && $_POST['email'] != '' && $_POST['msg'] != '') {
            $name = trim($_POST['name']);
            $email = trim($_POST['email']);
            $msg = trim($_POST['msg']);

            $insert = "INSERT INTO msgs (name, email, msg) VALUES ('$name', '$email', '$msg')";
            $resultINSERT = mysqli_query($connection, $insert);

            if (!$resultINSERT) {
                echo 'Произошла ошибка INSERT';
            }
        }
    }

/* Сохранение записи в БД */

/* Удаление записи из БД -------------------------------------- */

    if (isset($_POST['delete'])) {
        $delete = "DELETE FROM msgs WHERE id =". $_POST['delete'];
        $resultDELETE = mysqli_query($connection, $delete);

        if (!$resultDELETE) {
            echo 'Произошла ошибка DELETE';
        }
     }

/* Удаление записи из БД */
?>
<h3>Оставьте запись в нашей Гостевой книге</h3>

<form method="post" action="<?= $_SERVER['REQUEST_URI']?>">
Имя: <br /><input type="text" name="name" value="<?= $_POST['name'] ?>"/><br />
Email: <br /><input type="text" name="email" value="<?= $_POST['email'] ?>"/><br />
Сообщение: <br /><textarea name="msg" value="<?= $_POST['msg'] ?>"></textarea><br />

<br />

<input type="submit" value="Отправить!" />

</form>
<?php
/* Вывод записей из БД ----------------------------------------- */

    $select = "SELECT id, name, email, msg, UNIX_TIMESTAMP(datetime) as dt FROM msgs ORDER BY id DESC";
    $resultSELECT = mysqli_query($connection, $select);

    if (!$resultSELECT) {
        echo 'Произошла ошибка SELECT';
    }

    $rows = mysqli_fetch_all($resultSELECT, MYSQLI_ASSOC);

    mysqli_close($connection);

    echo "<p><b>Всего записей в гостевой книге:". mysqli_num_rows($resultSELECT) . "</b></p>";
    foreach ($rows as $row) {
        echo "<p>";
        echo "<a href=mailto:". $row['email'] .">". $row['name']. "</a>";
        echo "  " . date("d-m-Y H:i:s", $row['dt']);
        echo "  написал(-а)  ";
        echo "<b>" . $row['msg'] . "</b>";
        echo "<form method='post'> <button name='delete' value=".$row['id']. ">Удалить</button></form>";
        echo "</p>";
    }

    // print_r($rows);


/* Вывод записей из БД */
?>