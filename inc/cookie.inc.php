<?php

$visitCounter = 0;
if (isset($_COOKIE['visitCounter'])) {
    $visitCounter = $_COOKIE['visitCounter']; 
}
$visitCounter++;

$lastVisit = '';
if (isset($_COOKIE['lastVisit'])) {
    $lastVisit = $_COOKIE['lastVisit'];
}

if(date('d-m-Y', $_COOKIE['lastVisit']) != date('d-m-Y')) {
    setcookie('visitCounter', $visitCounter);
    setcookie('lastVisit', date("d.m.Y H:i:s")); 
}   
