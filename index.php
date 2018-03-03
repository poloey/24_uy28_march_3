<?php require 'header.php' ; ?>
<?php 
$con = new PDO('mysql:dbname=feni;host=localhost', 'root', '');
$statement = $con->prepare('select * from teachers');
$statement->execute();

 $teachers = $statement->fetchAll(PDO::FETCH_OBJ);
?>
<div class="container mt-5">
  <table class="table table-bordered">
    <tr>
      <th>Name</th>
      <th>Email</th>
      <th>Action</th>
    </tr>
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
  </table>
</div>
<?php require 'footer.php' ; ?>
