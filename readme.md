# crud using pdo 

## connection with pdo 

~~~php
$con = new PDO('mysql:dbname=feni;host=localhost', 'root', '');
~~~

## create teacher table 

~~~php
$statement = $con->prepare('
  create table teachers(
    id serial,
    name varchar(30),
    email varchar(30)
  )
 ');
$statement->execute();
~~~

## seeding with dummy data 

~~~php
$statement = $con->prepare('insert into teachers(name, email) values(:name, :email)');
$statement->execute([
  ':name' => 'sarwar',
  ':email' => 'sarwar@gmail.com'
]);
~~~

## reading from database 

~~~php
$statement = $con->prepare('select * from teachers');
$statement->execute();
$teachers = $statement->fetchAll(PDO::FETCH_OBJ);
~~~
~~~html
<?php foreach($teachers as $teacher): ?>
  <tr>
    <td><?php echo $teacher->name ?></td>
    <td><?php echo $teacher->email ?></td>
    <td>
      <a href="edit.php?id=<?php echo $teacher->id ?>" class="btn btn-info">Edit</a>
      <a onclick="return confirm('Are you sure you want to delete this entry?')" href="delete.php?id=<?php echo $teacher->id ?>" class="btn btn-danger">Delete</a>
    </td>
  </tr>
<?php endforeach; ?>
~~~

## add a teacher 

~~~php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $con = new PDO('mysql:dbname=feni;host=localhost', 'root', '');
  $statement = $con->prepare('insert into teachers(name, email) values(:name, :email)');
  $statement->execute([
    ':name' => $name,
    ':email' => $email
  ]);
}
~~~

## edit teacher  or read single row     

~~~php
$id = $_GET['id'];
$con = new PDO('mysql:dbname=feni;host=localhost', 'root', '');
$statement = $con->prepare('select * from teachers where id=:id');
$statement->execute([
  ":id" => $id
]);
$teacher = $statement->fetch(PDO::FETCH_OBJ);
~~~

## update teacher 
~~~php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $statement = $con->prepare('update teachers set name=:name, email=:email where id=:id');
  $statement->execute([
    ':name' => $name,
    ':email' => $email,
    ':id' => $id
  ]);
}
~~~

## delete teacher 

~~~php
$id = $_GET['id'];
$con = new PDO('mysql:dbname=feni;host=localhost', 'root', '');
$statement = $con->prepare("delete from teachers where id=$id");
$statement->execute();

header('Location: /');
~~~


