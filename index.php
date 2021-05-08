<?php 
  include 'inc/headers.inc.php'; 
  include 'inc/cookie.inc.php';
  // Имя файла журнала
  define('PATH_LOG', 'path.log');
  include 'inc/log.inc.php';
?>
<!DOCTYPE html>
<html>

<head>
  <title>
    <?=$title?>
  </title>
  <meta charset="utf-8" />
  <link rel="stylesheet" type="text/css" href="inc/style.css" />
</head>

<body>

  <div id="header">
    <!-- Верхняя часть страницы -->
    <img src="logo.gif" width="187" height="29" alt="Наш логотип" class="logo" />
    <span class="slogan">обо всём сразу</span>
    <!-- Верхняя часть страницы -->
  </div>
  <div id="content">
  <?php
    if ($visitCounter <= 1) {
      echo "<h4>Спасибо, что зашли на огонек</h4>";
    }
    else {
        echo "<h4>Вы зашли к нам $visitCounter раз</h4>";
        echo "<p style='padding: 0;'>Последнее посещение: $lastVisit</p>";
    }
  ?>
    <!-- Заголовок -->
    <h1><?= $header?></h1>
    <!-- Заголовок -->
    <!-- Область основного контента -->
    <?php 
      include 'inc/routing.inc.php'; 
    ?>
    <!-- Область основного контента -->
  </div>
  <div id="nav">
    <!-- Навигация -->
    <h2>Навигация по сайту</h2>
    <ul>
      <li><a href='index.php'>Домой</a>
      </li>
      <li><a href='index.php?id=contact'>Контакты</a>
      </li>
      <li><a href='index.php?id=about'>О нас</a>
      </li>
      <li><a href='index.php?id=info'>Информация</a>
      </li>
      <li><a href='index.php?id=gbook'>Гостевая книга</a>
      </li>
      <li><a href='index.php?id=log'>Журнал посещений</a></li>
    </ul>
    <!-- Навигация -->
  </div>
  <div id="footer">
    <!-- Нижняя часть страницы -->
    &copy; Супер-мега сайт, 2000 &ndash; <?= date('Y')?>
      <!-- Нижняя часть страницы -->
  </div>
</body>

</html>