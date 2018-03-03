<?php 

$con = new PDO('mysql:host=localhost;dbname=feni', 'root', '');



$statement = $con->prepare('insert into teachers(name, email) values(:name, :email)');
$statement->execute([
  ':name' => 'sarwar',
  ':email' => 'sarwar@gmail.com'
]);