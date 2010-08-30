<?php
$username = $_POST['username'];
$password = $_POST['password'];

$url = 'ftp://'.$username.':'.$password.'@ftp.wellingtonbuilders.com';
header('Location: '.$url);