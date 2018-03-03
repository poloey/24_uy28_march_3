<?php 

$id = $_GET['id'];
$con = new PDO('mysql:dbname=feni;host=localhost', 'root', '');
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
$statement = $con->prepare('select * from teachers where id=:id');
$statement->execute([
  ":id" => $id
]);
$teacher = $statement->fetch(PDO::FETCH_OBJ);
 ?>
<?php require 'header.php'; ?>

<div class="container mt-5">
  <form action="" method="post">
    <div class="form-group">
        <label for="name">Name</label>
        <input value="<?php echo $teacher->name ?>" type="text" name="name" id="name" class="form-control">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input value="<?php echo $teacher->email ?>" type="text" name="email" id="email" class="form-control">
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-outline-primary">update a teacher</button>
    </div>
    
    
    
  </form>
</div>

<?php require 'footer.php'; ?>