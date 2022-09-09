<?php

function registerFunction($name, $email, $password, $image) {
    $connection_database = mysqli_connect("localhost", "root", "", "portfolio");
    $insert_user = "INSERT INTO `user` (`name`, `email`, `password`, `image`) VALUES ('$name', '$email', '$password', '$image') ";
    $query = mysqli_query($connection_database, $insert_user);
    $result = mysqli_affected_rows($connection_database);
    if($result == 1) {
        return true;
    } else {
        return false;
    }
}

function loginFunction($email, $password) {
    $connection_database = mysqli_connect("localhost", "root", "", "portfolio");
    $select_user = "SELECT * FROM `user` WHERE `email` = '$email' && `password` = '$password' ";
    $query = mysqli_query($connection_database, $select_user);
    $result = mysqli_fetch_assoc($query);
    return $result;
}