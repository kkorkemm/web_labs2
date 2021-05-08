<?php
    $dt = date("d-m-Y H:i:s");
    $page = $_SERVER['REQUEST_URI'];
    $ref = $_SERVER['HTTP_REFERER'];
    $path = "$dt  |  $page  |  $ref \n";

    if (!is_dir("log")) {
        mkdir("log");
    }
    $file = fopen("log/".PATH_LOG.".txt", 'a') or die("Не удалось создать файл");
    fwrite($file, $path);
    fclose($file);