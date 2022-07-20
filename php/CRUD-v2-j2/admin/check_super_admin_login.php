<?php

session_start();
//if(isset($_SESSION['level']) && $_SESSION['level'] === 1) {
// nếu empty thì nó sẽ = 0
// nên là khác 0 ms truy cập đc
if (empty($_SESSION['level'])) {
    header('location:../index.php');
}