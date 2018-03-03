<?php 

$id = $_GET['id'];
$con = new PDO('mysql:dbname=feni;host=localhost', 'root', '');
$statement = $con->prepare("delete from teachers where id=$id");
$statement->execute();

header('Location: /');