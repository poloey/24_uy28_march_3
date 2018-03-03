<?php 

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


?>
<?php require 'header.php'; ?>
<div class="container mt-5">
  <form action="" method="post">
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" class="form-control">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" name="email" id="email" class="form-control">
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-outline-primary">add a teacher</button>
    </div>
    
    
    
  </form>
</div>
<?php require 'footer.php'; ?>