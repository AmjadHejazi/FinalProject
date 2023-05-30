<?php
$conn = mysqli_connect('localhost', 'root', '', 'library');

if (!$conn) {
    //  echo "Faild";
    die("connection Faild:" . mysqli_connect_error());
}
