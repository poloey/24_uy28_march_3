<?php

// $arr = ['apple', 'orage', 'banana',];
$con = new PDO('mysql:dbname=feni;host=localhost', 'root', '');
$statement = $con->prepare('
  create table teachers(
    id serial,
    name varchar(30),
    email varchar(30)
  )
 ');
$statement->execute();
