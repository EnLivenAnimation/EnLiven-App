<?php

$serverName = "remotemysql.com";
$dBUsername = "1dCoH3Y2yF";
$dBPassword = "N4fjbSMGqH";
$dBName = "1dCoH3Y2yF";

$conn = mysqli_connect($serverName,$dBUsername,$dBPassword,$dBName);
if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}